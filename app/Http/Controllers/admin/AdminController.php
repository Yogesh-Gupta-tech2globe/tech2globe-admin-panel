<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\AdminsRole;
use Validator;
use Session;
use Image;

class AdminController extends Controller
{
    //
    public function dashboard(){
        Session::put('page','dashboard');

        return view('admin.dashboard');
    }

    public function login(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            // echo"<pre>"; print_r($data); die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:30'
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required',
            ];

            $this->validate($request,$rules,$customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){

                // Remember Admin email and password with cookies

                if(isset($data['remember'])&&!empty($data['remember'])){
                    setcookie("email",$data['email'],time()+3600);
                    setcookie("password",$data['password'],time()+3600);
                }else{
                    setcookie("email","");
                    setcookie("password","");
                }
                
                return redirect("admin/dashboard");
            }else{
                return redirect()->back()->with("error_message","Invalid Email or Password");
            }
        }
        return view('admin.login');
    }

    // public function register(){
    //     return view('admin.register');
    // }

    // public function forgot_password(){
    //     return view('admin.forgot-password');
    // }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function update_password(Request $request){

        //Set Admin/Subadmins Permissions for Setting Module
        $settingModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'setting'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($settingModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'setting'])->first()->toArray();
        }

        if($request->isMethod('post')){
            $data = $request->all();
            
            // Check if current password is correct
            if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
                //Check if new password and confirm password is matching
                if($data['new_pwd']==$data['confirm_pwd']){
                    //Update password
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);

                    return redirect()->back()->with('success_message','Your Password is updated Successfully!');

                }else{
                    return redirect()->back()->with('error_message','Your New password and Confirm password is not matching!');
                }
            }
            else{
                return redirect()->back()->with('error_message','Your current password is Incorrect!');
            }
        }

        Session::put('page','update_password');

        return view('admin.update_password');
    }

    public function checkCurrentPassword(Request $request){

        $data = $request->all();
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
            return "true";
        }
        else{
            return "false";
        }
    }

    public function update_details(Request $request){

        //Set Admin/Subadmins Permissions for Setting Module
        $settingModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'setting'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($settingModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'setting'])->first()->toArray();
        }

        if($request->isMethod('post')){
            $data = $request->all();
            
            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'admin_image' => 'image',
            ];

            $customMessages = [
                'admin_name.required' => 'Name is required',
                'admin_name.regex' => 'Valid Name is required',
                'admin_image.image' => 'Valid Image is required',
            ];

            $this->validate($request,$rules,$customMessages);

            // Upload Admin Image

            if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
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

            Admin::where('email',Auth::guard('admin')->user()->email)->update(['name'=>$data['admin_name'],'image'=>$imageName]);

            return redirect()->back()->with('success_message','Admin Details is updated Successfully!');
            
        }

        Session::put('page','update_details');

        return view('admin.update_details');
    }

}
