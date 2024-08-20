<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\CareerFormMail;
use App\Mail\PendingJobRequestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use App\Models\AdminsRole;
use App\Models\jobs;
use App\Models\jobRequests;
use Session;
use Auth;
use Image;
use Mail;


class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('page','jobs');
        $pagename = "Jobs";
        $jobs = jobs::orderBy('created_at','desc')->get()->toArray();

        //Set Admin/Subadmins Permissions for Our Event Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Jobs'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Jobs'])->first()->toArray();
        }

        return view('admin.jobs.jobs')->with(compact('pagesModule','pagename','jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $jobRequest = new jobRequests();
            $jobTitle = jobs::select('title')->where('id',$data['vacancy_id'])->first();

            $rules = [
                'fname' => 'required|alpha',
                'lname' => 'required|alpha',
                'email' => 'required|email',
                'website' => 'nullable|url',
                'vacancy_id' => 'required',
                'cctcl' => 'required',
                'cctct' => 'required',
                'ectcl' => 'required',
                'ectct' => 'required',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
                'file' => 'required|max:3000|mimes:pdf,jpg,png,docx',
            ];

            $customMessages = [
                'fname.required' => 'First Name is required',
                'fname.alpha' => 'Only alphabetic characters allowed in first name',
                'lname.required' => 'Last Name is required',
                'lname.alpha' => 'Only alphabetic characters allowed in last name',
                'email.required' => 'Email is required',
                'email.email' => 'Please enter a valid email',
                'website.url' => 'Please enter a valid url in Website/portfolio field',
                'vacancy_id.required' => 'Vacancy name is required',
                'cctcl.required' => 'Current CTC in lakhs is required',
                'cctct.required' => 'Current CTC in thousands is required',
                'ectcl.required' => 'Expected CTC in lakhs is required',
                'ectct.required' => 'Expected CTC in thousands is required',
                'phone.required' => 'Phone number is required',
                'phone.regex' => 'Please enter a valid phone Number',
                'phone.min' => 'Phone number should have atleast 10 numbers',
                'phone.max' => 'Phone number should have atmost 13 numbers',
                'file.required' => 'Resume is required',
                'file.max' => 'Resume should not be greater than 3 MB',
                'file.mimes' => 'Upload file must be pdf, jpg, png, word, or doc',
            ];

            $this->validate($request,$rules,$customMessages);

            if($request->file('file')){
                $file = $request->file('file');
                if($file->isValid()){
                    $resumeName = time() . '_' . $file->getClientOriginalName();
                    $file_path = $file->storeAs('resume', $resumeName, 'public');
                }
            }else{
                $resumeName = "";
            }
            
            
            $jobRequest->fname = $data['fname'];
            $jobRequest->lname = $data['lname'];
            $jobRequest->email = $data['email'];
            $jobRequest->website = $data['website'];
            $jobRequest->vacancy_id = $data['vacancy_id'];
            $jobRequest->cctcl = $data['cctcl'];
            $jobRequest->cctct = $data['cctct'];
            $jobRequest->ectcl = $data['ectcl'];
            $jobRequest->ectct = $data['ectct'];
            $jobRequest->StartDate = $data['StartDate'];
            $jobRequest->phone = $data['phone'];
            $jobRequest->organization = $data['organization'];
            $jobRequest->np = $data['np'];
            $jobRequest->comment = $data['comment'];
            $jobRequest->file = $resumeName;
            $jobRequest->save();

             // Send the informed mail to hr
             Mail::to('yogesh.gupta@tech2globe.in')->send(new CareerFormMail($data,$resumeName,$jobTitle));

            return response()->json(['message'=>'Applied for this post Successfully.']);
        }

        $pageName = "Career Form";
        $vacancy = jobs::select('title')->where('id',$id)->first();

        return view('career-form')->with(compact('vacancy', 'pageName','id'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        Session::put('page','job_applications');
        $pagename = "Job Applications";
        $jobs = jobRequests::orderBy('created_at','desc')->get();
        $alljobs = jobs::get()->toArray();

        //Set Admin/Subadmins Permissions for Our Event Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Jobs'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Jobs'])->first()->toArray();
        }

        return view('admin.jobs.job-applications')->with(compact('pagesModule','pagename','jobs','alljobs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function addEditJob(Request $request, $id=null)
    {
        Session::put('page','jobs');

        if($id==""){
            $title = "Post Job";
            $job = new jobs();
            $message = "New Job Posted Successfully";
        }else{
            $title = "Edit Job";
            $job = jobs::find($id);
            $message = "Existing Job updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();
        
            $rules = [
                'title' => 'required|regex:/^[a-zA-Z]+(\s+[a-zA-Z]+)*$/',
                'industry' => 'required|regex:/^[a-zA-Z]+(\s+[a-zA-Z]+)*$/',
                'designation' => 'required|regex:/^[a-zA-Z]+(\s+[a-zA-Z]+)*$/',
                'country' => 'required',
                'job_profile' => 'required',
                'skills' => 'required',
                'posted_on' => 'required|date|after:today',
                'positions' => 'required',
                'experience' => 'required',
                'qualification' => 'required',
                'salary' => 'required',
            ];

            $customMessages = [
                'title.required' => 'Job Title is required',
                'title.regex' => 'Job Title should have only Alphabetic charaters',
                'industry.required' => 'Industry is required',
                'industry.regex' => 'Industry should have only Alphabetic charaters',
                'designation.required' => 'Designation is required',
                'designation.regex' => 'Designation should have only Alphabetic charaters',
                'country.required' => 'Country is required',
                'job_profile.required' => 'Job Profile is required',
                'skills.required' => 'Skills is required',
                'posted_on.required' => 'Posted On is required',
                'posted_on.date' => 'Published Date is not a valid date',
                'posted_on.after' => 'Published Date should be greater than Today Date',
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


        return view('admin.jobs.add-edit-job')->with(compact('title','job'));
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

            if(jobs::where('id',$data['job_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(jobs::find($data['job_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Jobs','submodule' => 'Jobs'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'job_id'=>$data['job_id']]);
        }
    }

    public function updateRequest(Request $request, $id)
    {
        if($request->isMethod('post')){
            $jobRequest = jobRequests::find($id);

            $jobRequest->status = $request->status;
            if($jobRequest->save()){
                activity("Update")
                ->performedOn($jobRequest)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Jobs','submodule' => 'Job Applications'])
                ->log('Status');

                return redirect('admin/job-applications')->with('success_message','Status Updated Successfully.');
            }
        }
    }

    public function jobRequestSendPendingMail(){
        $pendingJobsRequest = jobRequests::where('status',1)->orderBy('id','desc')->get();
        $alljobs = jobs::get()->toArray();

        if(Mail::to('yogesh.gupta@tech2globe.in')->send(new PendingJobRequestMail($pendingJobsRequest,$alljobs))){
            return response()->json(['success'=>'Mail Send Successfully']);
        }else{
            return response()->json(['error'=>'There is some issue.']);
        }
    }
}
