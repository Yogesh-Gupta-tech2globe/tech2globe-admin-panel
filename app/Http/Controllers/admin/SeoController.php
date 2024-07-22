<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminsRole;
use Session;
use Auth;

class SeoController extends Controller
{
    public function index(){
        Session::put('page','seo');

        //Set Admin/Subadmins Permissions for SEO Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'seo'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This Module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'seo'])->first()->toArray();
        }

        $pagename = "SEO";
        // $logs = Activity::with('admins')->orderBy('id','desc')->get();
        return view('admin.seo.seo')->with(compact('pagesModule','pagename'));
    }

    public function addEditSeo(Request $request, $id=null)
    {
        Session::put('page','seo');

        if($id==""){
            $title = "Add Page SEO";
            $seo = '';
            $message = "Page SEO Details added Successfully";
        }else{
            $title = "Edit Page SEO";
            $seo = '';
            $message = "Page SEO Details updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();
        
            $rules = [
                'title' => 'required',
                'industry' => 'required',
                'designation' => 'required',
                'country' => 'required',
                'job_profile' => 'required',
                'skills' => 'required',
                'posted_on' => 'required',
                'positions' => 'required',
                'experience' => 'required',
                'qualification' => 'required',
                'salary' => 'required',
            ];

            $customMessages = [
                'title.required' => 'Job Title is required',
                'industry.required' => 'Industry is required',
                'designation.required' => 'Designation is required',
                'country.required' => 'Country is required',
                'job_profile.required' => 'Job Profile is required',
                'skills.required' => 'Skills is required',
                'posted_on.required' => 'Posted On is required',
                'positions.required' => 'Positions is required',
                'experience.required' => 'Experience is required',
                'qualification.required' => 'Qualification is required',
                'salary.required' => 'Salary is required',
            ];

            $this->validate($request,$rules,$customMessages);
            
            $country = explode('|',$data['country']);
            if(!empty($data['state'])){
                $state = explode('|',$data['state']);
                $state = $state[1];
            }else{
                $state = '';
            }

            $job->title = $data['title'];
            $job->industry = $data['industry'];
            $job->designation = $data['designation'];
            $job->country = $country[1];
            $job->state = $state;
            $job->city = $data['city'];
            $job->job_profile = $data['job_profile'];
            $job->skills = $data['skills'];
            $job->posted_on = $data['posted_on'];
            $job->num_of_post = $data['positions'];
            $job->experience = $data['experience'];
            $job->qualification = $data['qualification'];
            $job->salary = $data['salary'];
            if($job->save()){
                activity($title)
                ->performedOn($job)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Jobs','submodule' => 'Jobs'])
                ->log('');

                return redirect('admin/jobs')->with('success_message',$message);
            }
        }


        return view('admin.seo.add-edit-seo')->with(compact('title','seo'));
    }
}
