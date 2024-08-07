<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminsRole;
use App\Models\blog;
use App\Models\tech2globe_all_pages;
use Auth;
use Session;

class BlogController extends Controller
{
    public function index()
    {
        Session::put('page','blog');

        $pagename = "Blog";
        $blog = blog::get()->toArray();
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

        return view('admin.ourWork.blog.blog')->with(compact('pagesModule','pagename','blog','allInnerPages'));
    }

    public function addEditBlog(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add Blog";
            $blog = new blog();
            $message = "Blog added Successfully";
        }else{
            $title = "Edit Blog";
            $blog = blog::find($id);
            $message = "Blog updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'page_id' => 'required',
                'blog_id' => 'required',
            ];

            $customMessages = [
                'page_id.required' => 'Inner Page is required',
                'blog_id.required' => 'Please Select a Blog',
            ];

            $this->validate($request,$rules,$customMessages);

            for($i=0; $i < count($data['blog_id']); $i++){

                if($id==""){
                    $blog = new blog();
                }
                
                $blog->page_id = $data['page_id'];
                $blog->blog_id = $data['blog_id'][$i];
                if($blog->save()){
                    activity($title)
                    ->performedOn($blog)
                    ->causedBy(Auth::guard('admin')->user())
                    ->withProperties(['module' => 'Our Work','submodule' => 'Blog'])
                    ->log('');
                }

            }
            return redirect('admin/blog')->with('success_message',$message);
        }

        $allInnerPages = tech2globe_all_pages::get()->toArray();
   
        $endpoint = 'https://blog.tech2globe.com/wp-json/wp/v2/posts?per_page=100';
        $response = file_get_contents($endpoint);

        if ($response === false) {
            echo "Error fetching posts";
        } else {
            // Convert JSON response to array
            $posts = json_decode($response, true);
        }

        return view('admin.ourWork.blog.add-edit-blog')->with(compact('title','blog','allInnerPages','posts'));
    }

    public function update(Request $request){

        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(blog::where('id',$data['blog_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(blog::find($data['blog_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Our Work','submodule' => 'Blog'])
                ->log('Status');

                return response()->json(['status'=>$status, 'blog_id'=>$data['blog_id']]);
            }
        }
    }

}
