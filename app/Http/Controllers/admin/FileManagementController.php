<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\AdminsRole;
use App\Models\file_data;
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
            <?php $base_url = "http://localhost:8000"; ?>
            '.$fileCode.'
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                {{-- @include("include.blog") --}}
                @include("include.faq")
            @endsection';

            file_put_contents($filePath, $newContent);
           
            //Insert Data in database
            $fileData->file_name = $fileName;
            $fileData->file_slug = $slug;
            $fileData->file_code = $processedHtmlContent;
            $fileData->save();

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
            
            return redirect('admin/all-files')->with('success_message',$message);
        }

        return view('admin.fileManagement.add-edit-new-file')->with(compact('title', 'fileData'));
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
    public function show(string $id)
    {
        //
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

    public function linkedFiles()
    {
        Session::put('page','linked_files');
        $pageName = "Linked Files";

        $fileData = file_data::where('linked_status','!=','0')->get()->toArray();

        return view('admin.fileManagement.linked-files')->with(compact('pageName','fileData'));
    }

    public function unlinkedFiles()
    {
        Session::put('page','unlinked_files');
        $pageName = "Unlinked Files";

        $fileData = file_data::where('linked_status','=','0')->get()->toArray();

        return view('admin.fileManagement.unlinked-files')->with(compact('pageName','fileData'));
    }
}
