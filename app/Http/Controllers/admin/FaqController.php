<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminsRole;
use App\Models\faq;
use Session;
use Auth;

class FaqController extends Controller
{
    public function index()
    {
        Session::put('page','faq');

        $pagename = "FAQ";
        $faq = faq::get()->toArray();

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

        return view('admin.ourWork.faq.faq')->with(compact('pagesModule','pagename','faq'));
    }

    public function addEditFaq(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add FAQ";
            $faq = new faq();
            $message = "FAQ added Successfully";
        }else{
            $title = "Edit FAQ";
            $faq = faq::find($id);
            $message = "FAQ updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'question' => 'required',
                'answer' => 'required',
            ];

            $customMessages = [
                'question.required' => 'Please Enter a Question',
                'answer.required' => 'Please Enter a Answer',
            ];

            $this->validate($request,$rules,$customMessages);
            

            $faq->question = $data['question'];
            $faq->answer = $data['answer'];
            $faq->save();
            return redirect('admin/faq')->with('success_message',$message);
        }

        return view('admin.ourWork.faq.add-edit-faq')->with(compact('title','faq'));
    }

    public function update(Request $request){

        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            faq::where('id',$data['faq_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'faq_id'=>$data['faq_id']]);
        }
    }
}
