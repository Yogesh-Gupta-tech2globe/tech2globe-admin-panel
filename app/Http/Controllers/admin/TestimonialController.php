<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminsRole;
use App\Models\testimonial;
use Session;
use Auth;

class TestimonialController extends Controller
{
    public function index()
    {
        Session::put('page','testimonial');

        $testimonial = testimonial::get()->toArray();

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

        return view('admin.ourWork.testimonial.testimonial')->with(compact('pagesModule','testimonial'));
    }

    public function addEditTestimonial(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add Testimonial";
            $testimonial = new testimonial();
            $message = "Testimonial added Successfully";
        }else{
            $title = "Edit Testimonial";
            $testimonial = testimonial::find($id);
            $message = "Testimonial updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name' => 'required',
                'info' => 'required',
                'type' => 'required',
            ];

            $customMessages = [
                'name.required' => 'Customer Name is required',
                'info.required' => 'Customer Info required',
                'type.required' => 'Please choose type of Testimonial',
            ];

            $this->validate($request,$rules,$customMessages);
            
            if($data['type'] == "text"){

                $rules = [
                    'rating' => 'required',
                    'comment' => 'required',
                ];
    
                $customMessages = [
                    'rating.required' => 'Rating is required',
                    'comment.required' => 'Client comment is required',
                ];
    
                $this->validate($request,$rules,$customMessages);
            }else if($data['type'] == "video"){

                $rules = [
                    'video_url' => 'required',
                ];
    
                $customMessages = [
                    'video_url.required' => 'Video Url is required',
                ];
    
                $this->validate($request,$rules,$customMessages);
            }
            

            $testimonial->customer_name = $data['name'];
            $testimonial->customer_info = $data['info'];
            $testimonial->type = $data['type'];
            $testimonial->ratings = $data['rating'];
            $testimonial->comment = $data['comment'];
            $testimonial->video_url = $data['video_url'];
            $testimonial->save();
            return redirect('admin/testimonial')->with('success_message',$message);
        }

        return view('admin.ourWork.testimonial.add-edit-testimonial')->with(compact('title','testimonial'));
    }

    public function update(Request $request){

        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            testimonial::where('id',$data['testimonial_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'testimonial_id'=>$data['testimonial_id']]);
        }
    }
}
