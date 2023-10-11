<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\portfolio;
use App\Models\portfolio_category;
use App\Models\AdminsRole;
use Illuminate\Http\Request;
use Session;
use Validator;
use Image;
use Storage;
use Illuminate\Support\Facades\File;
use Auth;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('page','portfolio');

        $portfolio = Portfolio::get()->toArray();
        // dd($portfolio);

        //Set Admin/Subadmins Permissions for Portfolio Module
        $portfolioModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'portfolio'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($portfolioModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'portfolio'])->first()->toArray();
        }

        return view('admin.portfolio.portfolio')->with(compact('portfolio','pagesModule'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add Portfolio";
            $portfolio = new portfolio;
            $message = "Portfolio added Successfully";
        }else{
            $title = "Edit Portfolio";
            $portfolio = portfolio::find($id);
            $message = "Portfolio updated Successfully";
        }

        $portfolio_category = portfolio_category::get()->toArray();
        //dd($portfolio_category);

        if($request->isMethod('post')){
            $data = $request->all();

            // print_r($data); die;

            $rules = [
                'title' => 'required',
                'category_id' => 'required',
                'website' => 'required',
                'portfolio_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ];

            $customMessages = [
                'title.required' => 'Portfolio title is required',
                'category_id.required' => 'Category is required',
                'website.required' => 'Website Link is required',
                'portfolio_image.image' => 'Valid Image is required',
                'portfolio_image.mimes' => 'Image should be in jpg,jpeg,gif,svg,png format',
                'portfolio_image.max' => 'Image size should not be greater than 2 MB',
            ];

            $this->validate($request,$rules,$customMessages);
            
            if(!empty($data['portfolio_image']) && !empty($data['current_image'])){

                       
                $imagePath = public_path('admin/img/portfolio-images/'.$data['current_image']);

                if(file_exists($imagePath)){
                    if(unlink($imagePath)){
                        
                    }else{
                        return redirect()->back()->with('error_message','There is some error on deleting Image!');
                    }
                }else{
                    return redirect()->back()->with('error_message','Image not found! Please contact Admin');
                }
            }

            if($request->hasFile('portfolio_image')){
                $image_tmp = $request->file('portfolio_image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,98999).'.'.$extension;
                    $image_path = 'admin/img/portfolio-images/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }

            $portfolio->title = $data['title'];
            $portfolio->cat_id = $data['category_id'];
            $portfolio->technology = $data['technology'];
            $portfolio->website_link = $data['website'];
            $portfolio->content = $data['content'];
            $portfolio->image = $imageName;
            $portfolio->status = 1;
            $portfolio->save();
            return redirect('admin/portfolio')->with('success_message',$message);
        }

        return view('admin.portfolio.add-edit-portfolio')->with(compact('title','portfolio_category','portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            portfolio::where('id',$data['portfolio_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'portfolio_id'=>$data['portfolio_id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        // Get the image path from the model

        $portfolio = Portfolio::findOrFail($request->route('id'));
        $imageName = $portfolio->image;        
        $imagePath = public_path('admin/img/portfolio-images/'.$imageName);

        if(file_exists($imagePath)){
            if(unlink($imagePath)){
                portfolio::where('id',$id)->delete();
                return redirect()->back()->with('success_message','Portfolio deleted successfully!');
            }else{
                return redirect()->back()->with('error_message','There is some error on deleting Image!');
            }
        }else{
            return redirect()->back()->with('error_message','Image not found! Please contact Admin');
        }
    
    }
}
