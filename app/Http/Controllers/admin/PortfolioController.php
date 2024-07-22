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

        $portfolio = Portfolio::where('page_id','!=',0)->get()->toArray();
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
        Session::put('page','rportfolio');

        $portfolioCat = portfolio_category::get()->toArray();

        //Set Admin/Subadmins Permissions for Portfolio Module
        $portfolioModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'resources'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($portfolioModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'resources'])->first()->toArray();
        }

        return view('admin.resources.portfolio.portfolio_category')->with(compact('portfolioCat','pagesModule'));
    }

    public function addEditPortfolioCategory(Request $request, $id=null){

        if($id==""){
            $title = "Add Portfolio Category";
            $portfolio_category = new portfolio_category;
            $message = "Portfolio Category added Successfully";
        }else{
            $title = "Edit Portfolio Category";
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
            if($portfolio_category->save()){
                activity($title)
                ->performedOn($portfolio_category)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'Portfolio Category'])
                ->log('');

                return redirect('admin/resources/portfolio-category')->with('success_message',$message);
            }
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

            if(portfolio_category::where('id',$data['portfolio_cat_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(portfolio_category::find($data['portfolio_cat_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resorces','submodule' => 'Portfolio Category'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'portfolio_cat_id'=>$data['portfolio_cat_id']]);
        }
    }

    public function portfolioSubCategory()
    {
        Session::put('page','rportfolio');

        $portfolioCat = portfolio_category::get()->toArray();
        $portfolioSubCat = portfolio_sub_category::get()->toArray();

        //Set Admin/Subadmins Permissions for Portfolio Module
        $portfolioModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'resources'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($portfolioModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'resources'])->first()->toArray();
        }

        return view('admin.resources.portfolio.portfolio_subcategory')->with(compact('portfolioCat','portfolioSubCat','pagesModule'));
    }

    public function addEditPortfolioSubCategory(Request $request, $id=null){

        if($id==""){
            $title = "Add Portfolio Sub Category";
            $portfolio_sub_category = new portfolio_sub_category;
            $message = "Portfolio Sub Category added Successfully";
        }else{
            $title = "Edit Portfolio Sub Category";
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
            if($portfolio_sub_category->save()){
                activity($title)
                ->performedOn($portfolio_sub_category)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'Portfolio Sub Category'])
                ->log('');

                return redirect('admin/resources/portfolio-subcategory')->with('success_message',$message);
            }
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

            if(portfolio_sub_category::where('id',$data['portfolio_subcat_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(portfolio_sub_category::find($data['portfolio_subcat_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'Portfolio Sub Category'])
                ->log('Status');
            }
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
            $title = "Link Portfolio";
            $portfolio = new portfolio;
            $message = "Portfolio linked Successfully";
            $allPortfolio = portfolio::where('page_id',0)->get()->toArray();
        }else{
            $title = "Edit Portfolio";
            $portfolio = portfolio::find($id);
            $message = "Portfolio updated Successfully";
            $allPortfolio = portfolio::get()->toArray();
        }

        $allInnerPages = tech2globe_all_pages::get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'page_id' => 'required',
                'portfolio_id' => 'required',
            ];

            $customMessages = [
                'page_id.required' => 'Inner Page is required',
                'portfolio_id.required' => 'Portfolio is required',
            ];

            $this->validate($request,$rules,$customMessages);

            if(portfolio::where('id',$data['portfolio_id'])->update(['page_id'=>$data['page_id']])){
                activity($title)
                ->performedOn(portfolio::find($data['portfolio_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Our Work','submodule' => 'Portfolio'])
                ->log('');
            }
            return redirect('admin/portfolio')->with('success_message',$message);
        }

        return view('admin.ourWork.portfolio.add-edit-portfolio')->with(compact('title','allPortfolio','portfolio','allInnerPages'));
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

    public function update2(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(portfolio::where('id',$data['portfolio_id'])->update(['r_status'=>$status])){
                activity('Update')
                ->performedOn(portfolio::find($data['portfolio_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'Portfolio'])
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

    public function index2()
    {
        Session::put('page','rportfolio');

        $portfolio = Portfolio::get()->toArray();
        $portfoliocat = portfolio_category::get()->toArray();
        $portfoliosubcat = portfolio_sub_category::get()->toArray();
        $allInnerPages = tech2globe_all_pages::get()->toArray();

        //Set Admin/Subadmins Permissions for Our Work Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'resources'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'resources'])->first()->toArray();
        }

        return view('admin.resources.portfolio.portfolio')->with(compact('portfolio','pagesModule','allInnerPages','portfoliocat','portfoliosubcat'));
    }

    public function edit2(Request $request, $id=null)
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
                'category_id' => 'required',
                'subcategory_id' => 'required',
                // 'page_id' => 'required',
                'website' => 'required',
                'content' => 'required',
                'portfolio_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:100|dimensions:width=200,height=265',
            ];

            $customMessages = [
                'title.required' => 'Portfolio title is required',
                'category_id.required' => 'Category is required',
                'subcategory_id.required' => 'Sub Category is required',
                // 'page_id.required' => 'Inner Page is required',
                'website.required' => 'Website Link is required',
                'content.required' => 'Short Description is required',
                'portfolio_image.image' => 'Valid Image is required',
                'portfolio_image.mimes' => 'Image should be in jpg,jpeg,gif,svg,png format',
                'portfolio_image.max' => 'Image size should not be greater than 100KB',
                'portfolio_image.dimensions' => 'Image Dimensions should be 200 X 265px',
            ];

            $this->validate($request,$rules,$customMessages);
            
            if(!empty($data['portfolio_image']) && !empty($data['current_image'])){

                       
                $imagePath = public_path('images/portfolio/'.$data['current_image']);

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
                    $image_path = 'images/portfolio/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }

            $portfolio->title = $data['title'];
            $portfolio->cat_id = $data['category_id'];
            $portfolio->sub_cat_id = $data['subcategory_id'];
            $portfolio->page_id = 0;
            $portfolio->website_link = $data['website'];
            $portfolio->content = $data['content'];
            $portfolio->image = $imageName;
            if(isset($data['r_status'])){
                $portfolio->r_status = 1;
            }else{
                $portfolio->r_status = 0;
            }
            if($portfolio->save()){
                activity($title)
                ->performedOn($portfolio)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'Portfolio'])
                ->log('');
            }
            return redirect('admin/resources/portfolio')->with('success_message',$message);
        }

        return view('admin.resources.portfolio.add-edit-portfolio')->with(compact('title','portfolio_category','portfolio','portfolio_subcategory','allInnerPages'));
    }

    public function getPortfolioSubcat(Request $request){
        if($request->ajax()){
            $data = $request->all();
    
            $categoryId = $data['catid'];
            $categoryNameId = $data['categoryNameId'];
            $categoryNameId = str_replace("#","",$categoryNameId);

            $subCat = portfolio_sub_category::where('cat_id',$categoryId)->where('status',1)->get();
            $b = 1;
            
            $output = '
                <div class="mt-0 tab-pane active" id="'.$categoryNameId.'">
                           
                    <div class="tabbable pt-0" id="mygallery">
                        <ul class="nav nav-tabs portfolio-tab-container-sub-service mb-4">';
                            
                        if(count($subCat) > 0){
                            foreach($subCat as $item){
                                $output .= '<li>
                                                <a class="' . ($b == 1 ? 'active' : '') . ' subcatbtn" catid="'.$categoryId.'" subcatid="'.$item['id'].'" id="'.$categoryNameId.'-'.$item['id'].'-tab" data-bs-target="#'.$categoryNameId.'-'.$item['id'].'"  data-bs-toggle="tab">'.$item['name'].'</a>
                                            </li>';
                                $b++;
                            }
                        }else{
                            $output .= 'No Sub Category Found';
                        }
            $output .= '</ul>
                    </div>

                    <div class="tab-content" id="portfolioContainer">
                        
                    </div>
                    
                </div>';


            return $output;
        }
    }

    public function getPortfolio(Request $request){
        if($request->ajax()){
            $data = $request->all();
    
            $categoryId = $data['catid'];
            $subcatid = $data['subcatid'];
            $categoryNameId = $data['categoryNameId'];
            $categoryNameId = str_replace("#","",$categoryNameId);

            $portfolio = portfolio::where('cat_id',$categoryId)->where('sub_cat_id',$subcatid)->where('r_status',1)->get();

            $output = '
            <div class="tab-pane active" id="'.$categoryNameId.'">
                <div class="row inner_portfolio-container-newsite">';
                    
                if(count($portfolio) > 0){
                    foreach($portfolio as $row){
                        $output .= '<div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="portfolio_imagBg">
                                    <a href="'. $row['website_link'] .'" target="_blank">
                                        <div class="portfolio-img">
                                            <img src="/images/portfolio/'.$row['image'].'" />
                                        </div>
                                    </a>
                                    <h3>'.$row['title'].'</h3>
                                    <p>'.$row['content'].'</p>
                                    <div class="text-center inner-portfolio-btn-newsite">
                                        <a href="'.$row['website_link'].'" target="_blank" class="portfolio-button">View Project</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }else{
                    $output .= 'No Portfolio Found';
                }
            $output .= '</div>
            </div>';
         
            return $output;
        }
    }
}


        
                       
