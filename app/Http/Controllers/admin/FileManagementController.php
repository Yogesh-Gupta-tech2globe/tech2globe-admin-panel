<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\AdminsRole;
use App\Models\file_data;
use App\Models\include_files;
use Illuminate\Support\Facades\File;
use Str;

class FileManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('page','file_management');
        $pageName = "All Files";

        //Set Admin/Subadmins Permissions for File Management Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This Module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->first()->toArray();
        }

        // Specify the views directory path
        $viewsDirectory = resource_path('views');

        // Check if the views directory exists
        if (File::isDirectory($viewsDirectory)) {
            // Get an array of files in the views directory
            $files = File::files($viewsDirectory);

            // Count the number of files in the views directory
            $fileCount = count($files);

            // return "Number of files in views directory: $fileCount";
        } else {
            // return "Views directory not found.";
        }

        $fileData = file_data::get()->toArray();

        return view('admin.fileManagement.all-files')->with(compact('pagesModule', 'pageName', 'fileCount','fileData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id=null)
    {
        if($id==""){
            $title = "Upload New File";
            $fileData = new file_data;
            $message = "New File uploaded Successfully";
        }else{
            $title = "Edit Existing File";
            $fileData = file_data::find($id);
            $message = "File updated Successfully";
        }

        if($request->isMethod('post')){
            
            $fileCode = $request->input('fileCode');
            $processedHtmlContent = htmlspecialchars($fileCode);
            $fileName = $request->input('fileName');

            $rules = [
                'fileCode' => 'required',
            ];

            $customMessages = [
                'fileCode.required' => 'File code is required',
            ];

            $this->validate($request,$rules,$customMessages);

            if(empty($id)){
                $rules = [
                    'fileName' => 'required|unique:file_data,file_name',
                ];
    
                $customMessages = [
                    'fileName.required' => 'File Name is required',
                    'fileName.unique' => 'This File Name is already exist! Try a different one',
                ];
    
                $this->validate($request,$rules,$customMessages); 
            }

            $slug = Str::slug($fileName);

            $filePath = resource_path('views/' . $slug . '.blade.php');

            $newContent = '
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            '.$fileCode.'
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection';

            file_put_contents($filePath, $newContent);
           
            //Insert Data in database
            $fileData->file_name = $fileName;
            $fileData->file_slug = $slug;
            $fileData->file_code = $processedHtmlContent;
            $fileData->save();

            activity($title)
                ->performedOn($fileData)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'File Management','submodule' => 'Files'])
                ->log('');

            $latestId = $fileData->id;

            if(empty($id)){
                // Adding a route dynamically
                $routeContent = '
                Route::get("/admin/page/'.$latestId.'", function () {

                    $data = ["pageName" => "'.$fileName.'"];
                    return view("'.$slug.'", $data);

                });';

                $routePath = base_path('routes/pages.php');
                file_put_contents($routePath, $routeContent,FILE_APPEND | LOCK_EX);
            }
            
            if(empty($id)){
                return redirect('admin/all-files')->with('success_message',$message);
            }else{
                return redirect('admin/add-edit-file/'.$id.'')->with('success_message',$message);
            }
        }

        return view('admin.fileManagement.add-edit-new-file')->with(compact('title', 'fileData'));
    }

    public function linkedFiles()
    {
        Session::put('page','linked_files');
        $pageName = "Linked Files";

        $fileData = file_data::where('linked_status','!=','0')->get()->toArray();

        //Set Admin/Subadmins Permissions for File Management Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This Module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->first()->toArray();
        }

        return view('admin.fileManagement.linked-files')->with(compact('pagesModule','pageName','fileData'));
    }

    public function unlinkedFiles()
    {
        Session::put('page','unlinked_files');
        $pageName = "Unlinked Files";

        $fileData = file_data::where('linked_status','=','0')->get()->toArray();

        //Set Admin/Subadmins Permissions for File Management Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This Module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->first()->toArray();
        }

        return view('admin.fileManagement.unlinked-files')->with(compact('pagesModule','pageName','fileData'));
    }

    public function cssFiles(Request $request)
    {
        Session::put('page','css_files');
        $pageName = "CSS Files";

        $filePath = public_path('css/style.css');
        $content = File::exists($filePath) ? File::get($filePath) : '';

        //Set Admin/Subadmins Permissions for File Management Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This Module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->first()->toArray();
        }

        if($request->isMethod('post')){
            $filePath = public_path('css/style.css');
            File::put($filePath, $request->fileCode);

            return redirect('admin/css-files')->with('success_message', 'File updated successfully!');
        }

        return view('admin.fileManagement.css-files')->with(compact('pagesModule','pageName','content'));
    }

    public function jsFiles(Request $request)
    {
        Session::put('page','js_files');
        $pageName = "JS Files";

        $filePath = public_path('js/main.js');
        $content = File::exists($filePath) ? File::get($filePath) : '';

        //Set Admin/Subadmins Permissions for File Management Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This Module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->first()->toArray();
        }

        if($request->isMethod('post')){
            $filePath = public_path('js/main.js');
            File::put($filePath, $request->fileCode);

            return redirect('admin/js-files')->with('success_message', 'File updated successfully!');
        }

        return view('admin.fileManagement.js-files')->with(compact('pagesModule','pageName','content'));
    }

    public function includeFiles()
    {
        Session::put('page','include_files');
        $pageName = "Include Files";

        //Set Admin/Subadmins Permissions for File Management Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This Module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'fileManagement'])->first()->toArray();
        }

        $fileData = include_files::get()->toArray();

        return view('admin.fileManagement.include-files')->with(compact('pagesModule', 'pageName','fileData'));
    }

    public function createInclude(Request $request, $id=null)
    {
        if($id==""){
            $title = "Upload New Include File";
            $fileData = new include_files;
            $message = "New File uploaded Successfully";
        }else{
            $title = "Edit Existing Include File";
            $fileData = include_files::find($id);
            $message = "File updated Successfully";
        }

        if($request->isMethod('post')){
            
            $fileCode = $request->input('fileCode');
            $processedHtmlContent = htmlspecialchars($fileCode);
            $fileName = $request->input('fileName');

            $rules = [
                'fileCode' => 'required',
            ];

            $customMessages = [
                'fileCode.required' => 'File code is required',
            ];

            $this->validate($request,$rules,$customMessages);

            if(empty($id)){
                $rules = [
                    'fileName' => 'required|unique:include_files,file_name',
                ];
    
                $customMessages = [
                    'fileName.required' => 'File Name is required',
                    'fileName.unique' => 'This File Name is already exist! Try a different one',
                ];
    
                $this->validate($request,$rules,$customMessages); 
            }

            $slug = Str::slug($fileName);

            $filePath = resource_path('views/include/' . $slug . '.blade.php');

            file_put_contents($filePath, $fileCode);
           
            //Insert Data in database
            $fileData->file_name = $slug;
            $fileData->file_code = $processedHtmlContent;
            $fileData->save();

            activity($title)
                ->performedOn($fileData)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'File Management','submodule' => 'Include Files'])
                ->log('');
            
            if(empty($id)){
                return redirect('admin/include-files')->with('success_message',$message);
            }else{
                return redirect('admin/add-edit-include-file/'.$id.'')->with('success_message',$message);
            }
        }

        return view('admin.fileManagement.add-edit-new-file')->with(compact('title', 'fileData'));
    }
}
