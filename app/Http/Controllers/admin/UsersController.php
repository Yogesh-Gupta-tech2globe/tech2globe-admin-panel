<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminsRole;
use Illuminate\Http\Request;
use Session;
use Validator;
use Image;
use Illuminate\Support\Facades\File;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('page','users');

        $users = Admin::where('type',['subadmin'])->get();

        //Set Admin/Subadmins Permissions for Users Module
        $usersModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'users'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($usersModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'users'])->first()->toArray();
        }

        return view('admin.users.users')->with(compact('users','pagesModule'));
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add User";
            $users = new Admin;
            $message = "User added Successfully";
        }else{
            $title = "Edit User";
            $users = Admin::find($id);
            $message = "User updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            // print_r($data); die;

            if($id == ""){
                $usersCount = Admin::where('email',$data['email'])->count();
                if($usersCount>0){
                    return redirect()->back()->with('error_message','User already exists!');
                }
            }

            $rules = [
                'name' => 'required',
                'role' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'user_image' => 'image|max:1024',
            ];

            $customMessages = [
                'name.required' => 'User Name is required',
                'role.required' => 'User Role is required',
                'email.required' => 'email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required',
                'user_image.image' => 'Valid User Image is required',
                'user_image.max' => 'Image size should not be greater than 1 MB',
            ];

            $this->validate($request,$rules,$customMessages);
            
            if(!empty($data['user_image']) && !empty($data['current_image'])){

                       
                $imagePath = public_path('admin/img/photos/'.$data['current_image']);

                if(file_exists($imagePath)){
                    if(unlink($imagePath)){
                        
                    }else{
                        return redirect()->back()->with('error_message','There is some error on deleting Image!');
                    }
                }else{
                    return redirect()->back()->with('error_message','Image not found! Please contact Admin');
                }
            }

            if($request->hasFile('user_image')){
                $image_tmp = $request->file('user_image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,98999).'.'.$extension;
                    $image_path = 'admin/img/photos/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }

            $users->name = $data['name'];
            $users->type = 'subadmin';
            $users->role = $data['role'];
            $users->email = $data['email'];
            $users->password = bcrypt($data['password']);
            $users->image = $imageName;
            $users->status = 1;
            $users->save();
            return redirect('admin/users')->with('success_message',$message);
        }

        return view('admin.users.add-edit-users')->with(compact('title','users'));
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

            Admin::where('id',$data['user_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'user_id'=>$data['user_id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
         // Get the image path from the model

         $users = Admin::findOrFail($request->route('id'));
         $imageName = $users->image;        
         $imagePath = public_path('admin/img/photos/'.$imageName);
 
         if(file_exists($imagePath)){
             if(unlink($imagePath)){
                 Admin::where('id',$id)->delete();
                 return redirect()->back()->with('success_message','User deleted successfully!');
             }else{
                 return redirect()->back()->with('error_message','There is some error on deleting Profile Image!');
             }
         }else{
            Admin::where('id',$id)->delete();
            return redirect()->back()->with('success_message','User deleted successfully!');
         }
    }

    public function updateRole($id, Request $request){

        //Set Admin/Subadmins Permissions for Users Module
        $usersModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'users'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($usersModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'users'])->first()->toArray();
        }

        if($request->isMethod('post')){
            $data = $request->all();

            //print_r($data); die;

            //Delete all earlier roles for Users
            AdminsRole::where(['admin_id'=>$id,'module'=>$data['module']])->delete();

            //Add new roles for Users Dynamically

            foreach ($data as $key => $value){
                if(isset($value['view'])){
                    $view = $value['view'];
                }else{
                    $view = 0;
                }
                if(isset($value['edit'])){
                    $edit = $value['edit'];
                }else{
                    $edit = 0;
                }
                if(isset($value['full'])){
                    $full= $value['full'];
                }else{
                    $full = 0;
                }
            }

            $role = new AdminsRole;
            $role->admin_id = $id;
            $role->module = $key;
            $role->view_access = $view;
            $role->edit_access = $edit;
            $role->full_access = $full;
            $role->save();

            $message = "User Roles updated Successfully!";
            return redirect()->back()->with('success_message',$message);
        }

        $userRoles = AdminsRole::where('admin_id',$id)->get()->toArray();
        $userDetails = Admin::where('id',$id)->first()->toArray();
        $title = "Update ".$userDetails['name']." User Roles/Permission";

        return view('admin.users.update-roles')->with(compact('title','id','userRoles'));
    }
}
