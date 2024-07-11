<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\portfolio;
use App\Models\portfolio_category;
use App\Models\portfolio_sub_category;
use App\Models\AdminsRole;
use App\Models\tech2globe_all_pages;
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
        // $portfoliocat = portfolio_category::get()->toArray();
        // $portfoliosubcat = portfolio_sub_category::get()->toArray();
        $allInnerPages = tech2globe_all_pages::get()->toArray();

        //Set Admin/Subadmins Permissions for Our Work Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'ourWork'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'ourWork'])->first()->toArray();
        }

        return view('admin.ourWork.portfolio.portfolio')->with(compact('portfolio','pagesModule','allInnerPages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function portfolioCategory()
    {
        Session::put('page','portfolio');

        $portfolioCat = portfolio_category::get()->toArray();
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

        return view('admin.ourWork.portfolio.portfolio_category')->with(compact('portfolioCat','pagesModule'));
    }

    public function addEditPortfolioCategory(Request $request, $id=null){

        if($id==""){
            $portfolio_category = new portfolio_category;
            $message = "Portfolio Category added Successfully";
        }else{
            $portfolio_category = portfolio_category::find($id);
            $message = "Portfolio Category updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name' => 'required|max:40|unique:portfolio_category,name',
            ];

            $customMessages = [
                'name.required' => 'Category name is required',
                'name.max' => 'Name should not be greater than 40 characters.',
                'name.unique' => 'Enter Category Name is already present, Try a different one',
            ];

            $this->validate($request,$rules,$customMessages);


            $portfolio_category->name = $data['name'];
            $portfolio_category->save();
            return redirect('admin/portfolio-category')->with('success_message',$message);
        }

    }

    public function updatePortfolioCat(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            portfolio_category::where('id',$data['portfolio_cat_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'portfolio_cat_id'=>$data['portfolio_cat_id']]);
        }
    }

    public function portfolioSubCategory()
    {
        Session::put('page','portfolio');

        $portfolioCat = portfolio_category::get()->toArray();
        $portfolioSubCat = portfolio_sub_category::get()->toArray();

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

        return view('admin.ourWork.portfolio.portfolio_subcategory')->with(compact('portfolioCat','portfolioSubCat','pagesModule'));
    }

    public function addEditPortfolioSubCategory(Request $request, $id=null){

        if($id==""){
            $portfolio_sub_category = new portfolio_sub_category;
            $message = "Portfolio Sub Category added Successfully";
        }else{
            $portfolio_sub_category = portfolio_sub_category::find($id);
            $message = "Portfolio Sub Category updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'cat_id' => 'required',
                'name' => 'required|max:40',
            ];

            $customMessages = [
                'cat_id.required' => 'Category is required',
                'name.required' => 'Sub Category name is required',
                'name.max' => 'Name should not be greater than 40 characters.',
            ];

            $this->validate($request,$rules,$customMessages);

            if($id = null){
                $rules = [
                    'name' => 'unique:portfolio_sub_category,name',
                ];
    
                $customMessages = [
                    'name.unique' => 'Enter Sub Category Name is already present, Try a different one',
                ];
    
                $this->validate($request,$rules,$customMessages); 
            }

            $portfolio_sub_category->cat_id = $data['cat_id'];
            $portfolio_sub_category->name = $data['name'];
            $portfolio_sub_category->save();
            return redirect('admin/portfolio-subcategory')->with('success_message',$message);
        }

    }

    public function updatePortfolioSubCat(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            portfolio_sub_category::where('id',$data['portfolio_subcat_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'portfolio_subcat_id'=>$data['portfolio_subcat_id']]);
        }
    }

    public function getsubcategory(Request $request)
    {
        $catid = $request->catid;
        $subcategory = portfolio_sub_category::where('cat_id',$catid)->get()->toArray();
        
        $subCatHtml = '';

        if(!empty($subcategory)){
            foreach($subcategory as $row){
                $subCatHtml .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
        }else{
            $subCatHtml = '<option value="">No Sub Category Found in this Category</option>';
        }

        
        return response()->json($subCatHtml);
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
            $portfolio_subcategory = [];
        }else{
            $title = "Edit Portfolio";
            $portfolio = portfolio::find($id);
            $message = "Portfolio updated Successfully";
            $portfolio_subcategory = portfolio_sub_category::where('cat_id',$portfolio['cat_id'])->get()->toArray();
        }

        $portfolio_category = portfolio_category::get()->toArray();
        $allInnerPages = tech2globe_all_pages::get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'title' => 'required',
                // 'category_id' => 'required',
                // 'subcategory_id' => 'required',
                'page_id' => 'required',
                'website' => 'required',
                'content' => 'required',
                'portfolio_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:100|dimensions:width=200,height=265',
            ];

            $customMessages = [
                'title.required' => 'Portfolio title is required',
                // 'category_id.required' => 'Category is required',
                // 'subcategory_id.required' => 'Sub Category is required',
                'page_id.required' => 'Inner Page is required',
                'website.required' => 'Website Link is required',
                'content.required' => 'Short Description is required',
                'portfolio_image.image' => 'Valid Image is required',
                'portfolio_image.mimes' => 'Image should be in jpg,jpeg,gif,svg,png format',
                'portfolio_image.max' => 'Image size should not be greater than 100KB',
                'portfolio_image.dimensions' => 'Image Dimensions should be 200 X 265px',
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
            $portfolio->cat_id = 0;
            $portfolio->sub_cat_id = 0;
            $portfolio->page_id = $data['page_id'];
            $portfolio->technology = $data['technology'];
            $portfolio->website_link = $data['website'];
            $portfolio->content = $data['content'];
            $portfolio->image = $imageName;
            if($portfolio->save()){
                activity($title)
                ->performedOn($portfolio)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Our Work','submodule' => 'Portfolio'])
                ->log('');
            }
            return redirect('admin/portfolio')->with('success_message',$message);
        }

        return view('admin.ourWork.portfolio.add-edit-portfolio')->with(compact('title','portfolio_category','portfolio','portfolio_subcategory','allInnerPages'));
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

            if(portfolio::where('id',$data['portfolio_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(portfolio::find($data['portfolio_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Our Work','submodule' => 'Portfolio'])
                ->log('Status');
            }
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
