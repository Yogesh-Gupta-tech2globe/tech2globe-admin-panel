<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsRole;
use App\Models\tech2globe_header_category;
use App\Models\tech2globe_header_sub_category;
use App\Models\tech2globe_all_pages;
use App\Models\layout;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\DB;

class Tech2globeLayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Session::put('page','tech2globe_layout');

        $mainMenu = tech2globe_header_category::get()->toArray();

        if($request->ajax()){
            $data = $request->all();
            $subMenu = tech2globe_header_sub_category::where('category_id',$data['category_id'])->get()->toArray();

            $subMenuHtml = '';

            if(!empty($subMenu)){
                foreach($subMenu as $row){
                    $subMenuHtml .= '<option value="'.$row['id'].'">'.$row['subCategoryName'].'</option>';
                }
            }else{
                $subMenuHtml = '<option>No Sub Menu Found in this Menu</option>';
            }

            
            return response()->json($subMenuHtml);
        }

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

        return view('admin.tech2globeCmsLayout.layout')->with(compact('pagesModule','mainMenu'));
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

        $mainMenu = tech2globe_header_category::get()->toArray();
        $subMenu = tech2globe_header_sub_category::get()->toArray();
        $allPages = tech2globe_all_pages::get()->toArray();
    
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

        return view('admin.tech2globeCmsLayout.all-layout')->with(compact('pagesModule','mainMenu','subMenu','allPages'));
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
        $allPages = tech2globe_all_pages::get()->toArray();
    
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

        // $allPagesData = [$mainMenu,$subMenu,$allPages];
        $allPagesData = DB::table('tech2globe_header_category')
            ->leftJoin('tech2globe_header_sub_category', 'tech2globe_header_category.id', '=', 'tech2globe_header_sub_category.category_id')
            ->leftJoin('tech2globe_all_pages', 'tech2globe_header_sub_category.id', '=', 'tech2globe_all_pages.sub_category_id')
            ->select('tech2globe_header_category.categoryName as categoryName1', 'tech2globe_header_category.page_url as pageUrl1', 'tech2globe_header_sub_category.subCategoryName as categoryName2', 'tech2globe_header_sub_category.page_url as pageUrl2', 'tech2globe_all_pages.page_name as pageName', 'tech2globe_all_pages.page_url as pageUrl')
            ->get();

        // echo "<pre>"; print_r($allPagesData); die;

        return view('admin.tech2globeCmsLayout.header')->with(compact('pagesModule','mainMenu','subMenu','allPages','allPagesData'));

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

    public function deleteMainMenu($id){

        if(tech2globe_header_category::where('id',$id)->delete()){
            return redirect()->back()->with('success_message','Main Menu deleted successfully!');
        }else{
            return redirect()->back()->with('error_message','Something went wrong!');
        }
    }

    public function deleteSubMenu($id){

        if(tech2globe_header_sub_category::where('id',$id)->delete()){
            return redirect()->back()->with('success_message','Sub Menu deleted successfully!');
        }else{
            return redirect()->back()->with('error_message','Something went wrong!');
        }

    }

    public function updateMainMenu(Request $request){
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            tech2globe_header_category::where('id',$data['mainMenu_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'mainMenu_id'=>$data['mainMenu_id']]);
        }
    }

    public function updateSubMenu(Request $request){
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            tech2globe_header_sub_category::where('id',$data['subMenu_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'subMenu_id'=>$data['subMenu_id']]);
        }
    }

    public function checkPageUrl(Request $request){
        $data = $request->all();
        
        if(tech2globe_all_pages::where('page_url', $data['pageUrl'])->exists() || tech2globe_header_category::where('page_url', $data['pageUrl'])->exists() || tech2globe_header_sub_category::where('page_url', $data['pageUrl'])->exists() || layout::where('page_url', $data['pageUrl'])->exists()){
            return false;
        }else{
            return true;
        }
    }
}
