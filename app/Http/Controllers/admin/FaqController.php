<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminsRole;
use App\Models\faq;
use App\Models\tech2globe_all_pages;
use Session;
use Auth;

class FaqController extends Controller
{
    public function index()
    {
        Session::put('page','faq');

        $pagename = "FAQ";
        $faq = faq::where('page_id','!=',0)->latest()->get()->toArray();
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

        return view('admin.ourWork.faq.faq')->with(compact('pagesModule','pagename','faq','allInnerPages'));
    }

    public function addEditFaq(Request $request, $id=null)
    {
        if($id==""){
            $title = "Link FAQ";
            $faq = new faq();
            $message = "FAQ added Successfully";
            $allFAQ = faq::where('page_id',0)->get()->toArray();
        }else{
            $title = "Edit FAQ";
            $faq = faq::find($id);
            $message = "FAQ updated Successfully";
            $allFAQ = faq::get()->toArray();
        }

        $allInnerPages = tech2globe_all_pages::get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'page_id' => 'required',
                'faq_id' => 'required',
            ];

            $customMessages = [
                'page_id.required' => 'Inner Page is required',
                'faq_id.required' => 'Please Select an FAQ',
            ];

            $this->validate($request,$rules,$customMessages);          

            if(faq::where('id',$data['faq_id'])->update(['page_id'=>$data['page_id']])){
                activity($title)
                ->performedOn(faq::find($data['faq_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Our Work','submodule' => 'FAQ'])
                ->log('');
            }
            
            return redirect('admin/faq')->with('success_message',$message);
        }

        return view('admin.ourWork.faq.add-edit-faq')->with(compact('title','faq','allInnerPages','allFAQ'));
    }

    public function update(Request $request){

        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(faq::where('id',$data['faq_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(faq::find($data['faq_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Our Work','submodule' => 'FAQ'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'faq_id'=>$data['faq_id']]);
        }
    }

    public function index2()
    {
        Session::put('page','rfaq');

        $pagename = "FAQ";
        $faq = faq::latest()->get()->toArray();

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

        return view('admin.resources.faq.faq')->with(compact('pagesModule','pagename','faq'));
    }

    public function addEditFaq2(Request $request, $id=null)
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

            for($i=0; $i < count($data['question']); $i++){

                if($id==""){
                    $faq = new faq();
                }

                $faq->page_id = 0;
                $faq->question = $data['question'][$i];
                $faq->answer = $data['answer'][$i];
                if($faq->save()){
                    activity($title)
                    ->performedOn($faq)
                    ->causedBy(Auth::guard('admin')->user())
                    ->withProperties(['module' => 'Resources','submodule' => 'FAQ'])
                    ->log('');
                }
            }
            
            return redirect('admin/resources/faq')->with('success_message',$message);
        }

        return view('admin.resources.faq.add-edit-faq')->with(compact('title','faq'));
    }

    public function update2(Request $request){

        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(faq::where('id',$data['faq_id'])->update(['r_status'=>$status])){
                activity('Update')
                ->performedOn(faq::find($data['faq_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'FAQ'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'faq_id'=>$data['faq_id']]);
        }
    }
}
