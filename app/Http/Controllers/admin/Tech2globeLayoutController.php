<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsRole;
use App\Models\tech2globe_header_category;
use App\Models\tech2globe_header_sub_category;
use Illuminate\Http\Request;
use Auth;
use Session;

class Tech2globeLayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('page','tech2globe_layout');

        //Set Admin/Subadmins Permissions for Layout Module
        $layoutModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($layoutModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->first()->toArray();
        }

        return view('admin.tech2globeCmsLayout.layout')->with(compact('pagesModule'));
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
    public function show()
    {
        Session::put('page','tech2globe_all_layout');

        // $layout = Layout::get()->toArray();
        // $landingPage = landing_pages::get()->toArray();
    
        //Set Admin/Subadmins Permissions for Layout Module
        $layoutModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($layoutModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->first()->toArray();
        }

        return view('admin.tech2globeCmsLayout.all-layout')->with(compact('pagesModule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Controlling Header of Tech2globe Website
    public function header()
    {
        Session::put('page','tech2globe_header');

        $mainMenu = tech2globe_header_category::get()->toArray();
        $subMenu = tech2globe_header_sub_category::get()->toArray();
    
        //Set Admin/Subadmins Permissions for Layout Module
        $layoutModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($layoutModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->first()->toArray();
        }

        return view('admin.tech2globeCmsLayout.header')->with(compact('pagesModule','mainMenu','subMenu'));

    }

    // Controlling Footer of Tech2globe Website
    public function footer()
    {
        Session::put('page','tech2globe_footer');

        // $layout = Layout::get()->toArray();
        // $landingPage = landing_pages::get()->toArray();
    
        //Set Admin/Subadmins Permissions for Layout Module
        $layoutModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($layoutModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->first()->toArray();
        }

        return view('admin.tech2globeCmsLayout.footer')->with(compact('pagesModule'));

    }

    public function addEditMainMenu(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add Main Menu";
            $mainMenu = new tech2globe_header_category;
            $message = "New Main Menu added Successfully";
        }else{
            $title = "Edit Main Menu";
            $mainMenu = tech2globe_header_category::find($id);
            $message = "Main Menu updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            // print_r($data); die;

            $rules = [
                'categoryName' => 'required',
            ];

            $customMessages = [
                'categoryName.required' => 'Main Menu name is required',
            ];

            $this->validate($request,$rules,$customMessages);

            $mainMenu->categoryName = $data['categoryName'];
            $mainMenu->page_url = $data['page_url'];
            $mainMenu->save();
            
            return redirect('admin/tech2globe-layout/header')->with('success_message',$message);
        }

        return view('admin.tech2globeCmsLayout.add-edit-mainMenu')->with(compact('title','mainMenu'));
    }

    public function addEditSubMenu(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add Sub Menu";
            $subMenu = new tech2globe_header_sub_category;
            $message = "New Sub Menu added Successfully";
        }else{
            $title = "Edit Sub Menu";
            $subMenu = tech2globe_header_sub_category::find($id);
            $message = "Sub Menu updated Successfully";
        }

        $mainMenu = tech2globe_header_category::get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            //  print_r($data); die;

            $rules = [
                'category_id' => 'required',
                'subCategoryName' => 'required',
            ];

            $customMessages = [
                'category_id.required' => 'Main Menu is required',
                'subCategoryName.required' => 'Sub Menu name is required',
            ];

            $this->validate($request,$rules,$customMessages);

            $subMenu->category_id = $data['category_id'];
            $subMenu->subCategoryName = $data['subCategoryName'];
            $subMenu->page_url = $data['page_url'];
            $subMenu->save();
            
            return redirect('admin/tech2globe-layout/header')->with('success_message',$message);
        }

        return view('admin.tech2globeCmsLayout.add-edit-subMenu')->with(compact('title','subMenu','mainMenu'));
    }
}
