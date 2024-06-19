<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminsRole;
use App\Models\contact_social;
use App\Models\company_branch;
use App\Models\achievements;
use App\Models\sitelogo;
use App\Models\recaptcha;
use Session;
use Auth;
use Image;

class ExtrasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    

    public function contactSocial()
    {
        Session::put('page','contact_social');

        $pageName = "Contact & Social Media";
        $social = contact_social::where('cat_status', '=', '1')->get()->toArray();
        $skypeid = contact_social::where('name','Skype ID')->first();
        $mailid = contact_social::where('name','Mail ID')->first();
        $phone = contact_social::where('name','Phone Number')->first();

        //Set Admin/Subadmins Permissions for Extras Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Extras'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Extras'])->first()->toArray();
        }

        return view('admin.extras.contact_social.contact_social')->with(compact('pagesModule','pageName','social','skypeid','mailid','phone'));
    }

    public function addEditSocialMedia(Request $request, $id=null)
    {
        Session::put('page','contact_social');

        if($id==""){
            $title = "Add Social Media";
            $social = new contact_social;
            $message = "New Social Media added Successfully";
        }else{
            $title = "Edit Social Media";
            $social = contact_social::find($id);
            $message = "Social Media updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name' => 'required',
                'link' => 'required',
            ];

            $customMessages = [
                'name.required' => 'Social Platform is required',
                'link.required' => 'Redirection Link is required',
            ];

            $this->validate($request,$rules,$customMessages);

            if($data['name'] == 'facebook'){
                $icon = '<i class="fa-brands fa-facebook-f facebook-bg"></i>';
            }elseif($data['name'] == 'linkdin'){
                $icon = '<i class="fa-brands fa-linkedin-in linkedin-bg"></i>';
            }elseif($data['name'] == 'instagram'){
                $icon = '<i class="fa-brands fa-instagram insta-bg"></i>';
            }elseif($data['name'] == 'youtube'){
                $icon = '<i class="fa-brands fa-youtube youtube-bg"></i>';
            }elseif($data['name'] == 'twitter'){
                $icon = '<i class="fa-brands fa-twitter twitter-bg"></i>';
            }

            $social->cat_status = 1;
            $social->name = $data['name'];
            $social->link = $data['link'];
            $social->icon = $icon;
            $social->save();
            
            return redirect('admin/contact-social')->with('success_message',$message);
        }

        return view('admin.extras.contact_social.add-edit-social-media')->with(compact('title','social'));
    }

    public function updateContactdetails(Request $request){
        $data = $request->all();

        if(!empty($data['skypeid'])){

            $rules = [
                'skypeid' => 'required',
            ];

            $customMessages = [
                'name.required' => 'Skype Id is required',
            ];

            $this->validate($request,$rules,$customMessages);

            $contact = contact_social::where('name','Skype ID')->first();

            $contact->cat_status = 0;
            $contact->name = "Skype ID";
            $contact->link = $data['skypeid'];
            $contact->save();
            
            return $message = 'Skype ID Updated successfully!';

        }else if(!empty($data['mailid'])){
            $contact = contact_social::where('name','Mail ID')->first();

            $contact->cat_status = 0;
            $contact->name = "Mail ID";
            $contact->link = $data['mailid'];
            $contact->save();
            
            return $message = 'Mail ID Updated successfully!';
        }else if(!empty($data['phone'])){
            
            $contact = contact_social::where('name','Phone Number')->first();

            $contact->cat_status = 0;
            $contact->name = "Phone Number";
            $contact->link = $data['phone'];
            $contact->save();
            
            return $message = 'Phone Number Updated successfully!';
        }
    }

    public function updateSocial(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            contact_social::where('id',$data['social_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'social_id'=>$data['social_id']]);
        }
    }

    public function companyBranch()
    {
        Session::put('page','company_branch');

        $pageName = "Company Branch Management";

        $company = company_branch::get()->toArray();

        //Set Admin/Subadmins Permissions for Extras Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Extras'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Extras'])->first()->toArray();
        }

        return view('admin.extras.company_branch.company_branch')->with(compact('pagesModule','pageName','company'));
    }

    public function addEditCompanyBranch(Request $request, $id=null)
    {
        Session::put('page','company_branch');

        if($id==""){
            $title = "Add Company Branch";
            $company = new company_branch;
            $message = "New Company Branch added Successfully";
        }else{
            $title = "Edit Company Branch";
            $company = company_branch::find($id);
            $message = "Existing Company Branch updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name' => 'required|max:30',
                'location' => 'required',
                'phone' => 'required|regex:/^[0-9\W]+$/u',
                'googlemap' => 'required',
                'flag' => 'required|image|max:200',
            ];

            $customMessages = [
                'name.required' => 'Branch Name is required',
                'name.max' => 'Maximum 30 characters are allowed for Branch Name',
                'location.required' => 'Branch Location is required',
                'phone.required' => 'Branch Phone is required',
                'phone.regex' => 'Only Numeric and Special symbols characters are allowed in Phone',
                'googlemap.required' => 'Embed a map is required',
                'flag.required' => 'Country Flag is required',
                'flag.image' => 'Only Images are allowed',
                'flag.max' => 'Image should not be greater than 200 Kb',
            ];

            $this->validate($request,$rules,$customMessages);

            if(!empty($data['flag']) && !empty($data['current_image'])){

                       
                $imagePath = public_path('images/flag/'.$data['current_image']);

                if(file_exists($imagePath)){
                    if(unlink($imagePath)){
                        
                    }else{
                        return redirect()->back()->with('error_message','There is some error on deleting Image!');
                    }
                }else{
                    return redirect()->back()->with('error_message','Image not found! Please contact Admin');
                }
            }

            if($request->hasFile('flag')){
                $image_tmp = $request->file('flag');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,98999).'.'.$extension;
                    $image_path = 'images/flag/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }

            $company->name = $data['name'];
            $company->location = $data['location'];
            $company->phone = $data['phone'];
            $company->google_map = $data['googlemap'];
            $company->flag = $imageName;
            $company->save();
            
            return redirect('admin/company-branch')->with('success_message',$message);
        }

        return view('admin.extras.company_branch.add-edit-company-branch')->with(compact('title','company'));
    }

    public function updateBranch(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            company_branch::where('id',$data['branch_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'branch_id'=>$data['branch_id']]);
        }
    }

    public function achievements()
    {
        Session::put('page','achievements');

        $pageName = "Achievements";

        $achievements = achievements::get()->toArray();

        //Set Admin/Subadmins Permissions for Extras Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Extras'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Extras'])->first()->toArray();
        }

        return view('admin.extras.achievements.achievements')->with(compact('pagesModule','pageName','achievements'));
    }

    public function addEditAchievements(Request $request, $id=null)
    {
        Session::put('page','achievements');

        if($id==""){
            $title = "Add Achievements";
            $achievements = new achievements;
            $message = "New Achievements added Successfully";
        }else{
            $title = "Edit Achievement";
            $achievements = achievements::find($id);
            $message = "Existing Achievement updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name' => 'required|max:30',
                'url' => 'required',
                'image' => 'required|image|max:200',
            ];

            $customMessages = [
                'name.required' => 'Name is required',
                'name.max' => 'Maximum 30 characters are allowed for Name',
                'url.required' => 'Redirection Url is required',
                'image.required' => 'Achievement Image is required',
                'image.image' => 'Only Images are allowed',
                'image.max' => 'Image should not be greater than 200 Kb',
            ];

            $this->validate($request,$rules,$customMessages);

            if(!empty($data['image']) && !empty($data['current_image'])){

                       
                $imagePath = public_path('images/achievements/'.$data['current_image']);

                if(file_exists($imagePath)){
                    if(unlink($imagePath)){
                        
                    }else{
                        return redirect()->back()->with('error_message','There is some error on deleting Image!');
                    }
                }else{
                    return redirect()->back()->with('error_message','Image not found! Please contact Admin');
                }
            }

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,98999).'.'.$extension;
                    $image_path = 'images/achievements/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }

            $achievements->name = $data['name'];
            $achievements->url = $data['url'];
            $achievements->image = $imageName;
            $achievements->save();
            
            return redirect('admin/achievements')->with('success_message',$message);
        }

        return view('admin.extras.achievements.add-edit-achievements')->with(compact('title','achievements'));
    }

    public function updateAchievements(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            achievements::where('id',$data['achievements_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'achievements_id'=>$data['achievements_id']]);
        }
    }

    public function sitelogo()
    {
        Session::put('page','site_logo');

        $pageName = "Site Logo";
        $sitelogo = sitelogo::find(1);

        //Set Admin/Subadmins Permissions for Extras Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Extras'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Extras'])->first()->toArray();
        }

        return view('admin.extras.sitelogo.sitelogo')->with(compact('pagesModule','pageName','sitelogo'));
    }

    public function sitelogoupdate(Request $request){
        $sitelogo = sitelogo::find(1);
       
        $data = $request->all();

        $rules = [
            'logo' => 'required|image|max:200',
        ];

        $customMessages = [
            'logo.required' => 'Update logo is required',
            'logo.image' => 'Only Images are allowed',
            'logo.max' => 'Image should not be greater than 200 Kb',
        ];

        $this->validate($request,$rules,$customMessages);

        if(!empty($data['logo']) && !empty($data['current_image'])){

                    
            $imagePath = public_path('images/logo/'.$data['current_image']);

            if(file_exists($imagePath)){
                if(unlink($imagePath)){
                    
                }else{
                    return redirect()->back()->with('error_message','There is some error on deleting Image!');
                }
            }else{
                return redirect()->back()->with('error_message','Image not found! Please contact Admin');
            }
        }

        if($request->hasFile('logo')){
            $image_tmp = $request->file('logo');
            if($image_tmp->isValid()){
                //Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = rand(111,98999).'.'.$extension;
                $image_path = 'images/logo/'.$imageName;
                Image::make($image_tmp)->save($image_path);
            }
        }else if(!empty($data['current_image'])){
            $imageName = $data['current_image'];
        }else{
            $imageName = "";
        }

        $sitelogo->name = $imageName;
        $sitelogo->save();

        $message = "Site logo updated Successfully";
        
        return redirect('admin/site-logo')->with('success_message',$message);
    }

    public function recaptcha()
    {
        Session::put('page','recaptcha');

        $pageName = "Recaptcha";
        $recaptcha = recaptcha::find(1);

        //Set Admin/Subadmins Permissions for Extras Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Extras'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Extras'])->first()->toArray();
        }

        return view('admin.extras.recaptcha.recaptcha')->with(compact('pagesModule','pageName','recaptcha'));
    }

    public function recaptchaupdate(Request $request){

        if($request->isMethod('post')){
            $recaptcha = recaptcha::find(1);
            $data = $request->all();

            $rules = [
                'site_key' => 'required',
                'secret_key' => 'required',
            ];
    
            $customMessages = [
                'site_key.required' => 'Site key is required',
                'secret_key.required' => 'Secret Key is required',
            ];
    
            $this->validate($request,$rules,$customMessages);

            $recaptcha->site_key = $data['site_key'];
            $recaptcha->secret_key = $data['secret_key'];
            $recaptcha->save();

            $message = "Recaptcha updated Successfully";
        
            return redirect('admin/recaptcha')->with('success_message',$message);
        }
    }
    
}
