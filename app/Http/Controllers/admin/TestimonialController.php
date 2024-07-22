<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminsRole;
use App\Models\testimonial;
use App\Models\tech2globe_all_pages;
use Session;
use Auth;

class TestimonialController extends Controller
{
    public function index()
    {
        Session::put('page','testimonial');

        $testimonial = testimonial::where('page_id','!=',0)->get()->toArray();
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

        return view('admin.ourWork.testimonial.testimonial')->with(compact('pagesModule','testimonial','allInnerPages'));
    }

    public function addEditTestimonial(Request $request, $id=null)
    {
        if($id==""){
            $title = "Link Testimonial";
            $testimonial = new testimonial();
            $message = "Testimonial added Successfully";
            $allTestimonial = testimonial::where('page_id',0)->get();
        }else{
            $title = "Edit Testimonial";
            $testimonial = testimonial::find($id);
            $message = "Testimonial updated Successfully";
            $allTestimonial = testimonial::get();
        }

        $allInnerPages = tech2globe_all_pages::get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'page_id' => 'required',
                'testimonial_id' => 'required',
            ];

            $customMessages = [
                'page_id.required' => 'Select Page is required',
                'testimonial_id.required' => 'Select testimonial is required',
            ];

            $this->validate($request,$rules,$customMessages);
            
            if(testimonial::where('id',$data['testimonial_id'])->update(['page_id'=>$data['page_id']])){
                activity($title)
                ->performedOn(testimonial::find($data['testimonial_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Our Work','submodule' => 'Testimonial'])
                ->log('');

                return redirect('admin/testimonial')->with('success_message',$message);
            }
        }

        return view('admin.ourWork.testimonial.add-edit-testimonial')->with(compact('title','testimonial','allInnerPages','allTestimonial'));
    }

    public function update(Request $request){

        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(testimonial::where('id',$data['testimonial_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(testimonial::find($data['testimonial_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Our Work','submodule' => 'Testimonial'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'testimonial_id'=>$data['testimonial_id']]);
        }
    }

    public function index2()
    {
        Session::put('page','rtestimonial');

        $testimonial = testimonial::get()->toArray();

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

        return view('admin.resources.testimonial.testimonial')->with(compact('pagesModule','testimonial'));
    }

    public function addEditTestimonial2(Request $request, $id=null)
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
                    // 'page_id' => 'required',
                    'rating' => 'required',
                    'comment' => 'required',
                ];
    
                $customMessages = [
                    // 'page_id.required' => 'Inner Page is required',
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
            $testimonial->page_id = 0;
            $testimonial->ratings = $data['rating'];
            $testimonial->comment = $data['comment'];
            $testimonial->video_url = 0;
            if(isset($data['r_status'])){
                $testimonial->r_status = 1;
            }else{
                $testimonial->r_status = 0;
            }
            if($testimonial->save()){
                activity($title)
                ->performedOn($testimonial)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'Testimonial'])
                ->log('');

                return redirect('admin/resources/testimonial')->with('success_message',$message);
            }
        }

        return view('admin.resources.testimonial.add-edit-testimonial')->with(compact('title','testimonial'));
    }

    public function update2(Request $request){

        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(testimonial::where('id',$data['testimonial_id'])->update(['r_status'=>$status])){
                activity('Update')
                ->performedOn(testimonial::find($data['testimonial_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'Testimonial'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'testimonial_id'=>$data['testimonial_id']]);
        }
    }
}
