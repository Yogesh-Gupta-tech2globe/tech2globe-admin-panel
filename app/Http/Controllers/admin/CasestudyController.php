<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminsRole;
use App\Models\casestudy;
use App\Models\faq;
use App\Models\casestudy_category;
use App\Models\tech2globe_all_pages;
use Auth;
use Session;
use Image;
use Str;

class CasestudyController extends Controller
{
    public function index()
    {
        Session::put('page','case_study');

        $pagename = "Case Study";

        $casestudy = casestudy::where('page_id','!=',0)->get()->toArray();
        $category = casestudy_category::get()->toArray();
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

        return view('admin.ourWork.caseStudy.caseStudy')->with(compact('pagesModule','pagename','casestudy','category','allInnerPages'));
    }

    public function addEditCasestudy(Request $request, $id=null)
    {
        if($id==""){
            $title = "Link Case Study";
            $casestudy = new casestudy();
            $message = "Case Study linked Successfully";
            $allCasestudy = casestudy::where('page_id',0)->get()->toArray();
        }else{
            $title = "Edit Case Study";
            $casestudy = casestudy::find($id);
            $message = "Case Study updated Successfully";
            $allCasestudy = casestudy::get()->toArray();
        }

        $allInnerPages = tech2globe_all_pages::get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'page_id' => 'required',
                'casestudy_id' => 'required',
            ];

            $customMessages = [
                'page_id.required' => 'Inner Page is required',
                'casestudy_id.required' => 'Casestudy is required',
            ];

            $this->validate($request,$rules,$customMessages);

            if(casestudy::where('id',$data['casestudy_id'])->update(['page_id'=>$data['page_id']])){
                activity($title)
                ->performedOn(casestudy::find($data['casestudy_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Our Work','submodule' => 'Case Study'])
                ->log('');
            }
            return redirect('admin/case-study')->with('success_message',$message);
        }

        return view('admin.ourWork.caseStudy.add-edit-case-study2')->with(compact('title','casestudy','allInnerPages','allCasestudy'));
    }

    public function createsections(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            $casestudy = casestudy::find($data['casestudyId']);

            if($data['section'] == "1"){

                $rules = [
                    // 'catid' => 'required',
                    'page_id' => 'required',
                ];
    
                $customMessages = [
                    // 'catid.required' => 'Category is required',
                    'page_id.required' => 'Inner Page is required',
                ];
    
                $this->validate($request,$rules,$customMessages);

                $slug = Str::slug($data['name']);

                if(!empty($data['bannerImage']) && !empty($data['current_image'])){

                    $rules = [
                        'bannerImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:100|dimensions:width=573,height=226',
                    ];
        
                    $customMessages = [
                        'bannerImage.required' => 'Banner Image is required',
                        'bannerImage.image' => 'Valid Image is required',
                        'bannerImage.mimes' => 'Banner Image should be in jpg,jpeg,gif,svg,png format',
                        'bannerImage.max' => 'Banner Image size should not be greater than 100 KB',
                        'bannerImage.dimensions' => 'Banner Image Dimensions should be 573x226px',
                    ];
        
                    $this->validate($request,$rules,$customMessages);

                       
                    $imagePath = public_path('images/casestudy/bannerImage/'.$data['current_image']);
    
                    if(file_exists($imagePath)){
                        if(unlink($imagePath)){
                            
                        }else{
                            return redirect()->back()->with('error_message','There is some error on deleting Image!');
                        }
                    }else{
                        return redirect()->back()->with('error_message','Image not found! Please contact Admin');
                    }
                }
    
                if($request->hasFile('bannerImage')){
                    $image_tmp = $request->file('bannerImage');
                    if($image_tmp->isValid()){
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName = rand(111,98999).'.'.$extension;
                        $image_path = 'images/casestudy/bannerImage/'.$imageName;
                        Image::make($image_tmp)->save($image_path);
                    }
                }else if(!empty($data['current_image'])){
                    $imageName = $data['current_image'];
                }else{
                    $imageName = "";
                }
    
                // $casestudy->category_id = $data['catid'];
                $casestudy->page_id = $data['page_id'];
                $casestudy->name = $data['name'];
                $casestudy->bannerImage = $imageName;
                $casestudy->save();

                return response()->json(['message'=>'Section One is updated.','link'=>$slug]);

            }else if($data['section'] == "2"){

                $rules = [
                    'description' => 'required',
                    'cproblem' => 'required',
                    'tsolution' => 'required',
                    'kmilestones' => 'required',
                    'csatisfiction' => 'required',
                    'pduration' => 'required',
                    'mprocessed' => 'required',
                ];
    
                $customMessages = [
                    'description.required' => 'Project Description is required',
                    'cproblem.required' => 'Clients Problem is required',
                    'tsolution.required' => 'Tech2globe Solution is required',
                    'kmilestones.required' => 'Key Milestones is required',
                    'csatisfiction.required' => 'Client Satisfaction is required',
                    'pduration.required' => 'Project Duration is required',
                    'mprocessed.required' => 'Menues Processed is required',
                ];
    
                $this->validate($request,$rules,$customMessages);

                $slug = Str::slug($casestudy['name']);
    
                $casestudy->projectDescription = $data['description'];
                $casestudy->client_problem = $data['cproblem'];
                $casestudy->tech2globe_solution = $data['tsolution'];
                $casestudy->key_milestones = $data['kmilestones'];
                $casestudy->client_satisfaction = $data['csatisfiction'];
                $casestudy->project_duration = $data['pduration'];
                $casestudy->menues_processed = $data['mprocessed'];
                $casestudy->save();

                return response()->json(['message'=>'Section Two is updated. Proceed Further','link'=>$slug]);
            }else if($data['section'] == "3"){

                $rules = [
                    'aheading' => 'required',
                    'adescription' => 'required',
                    'aimage' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500',
                ];
    
                $customMessages = [
                    'aheading.required' => 'About Heading is required',
                    'adescription.required' => 'About Description is required',
                    'aimage.image' => 'Valid Image is required',
                    'aimage.mimes' => 'Image should be in jpg,jpeg,gif,svg,png format',
                    'aimage.max' => 'Image size should not be greater than 500 KB',
                ];
    
                $this->validate($request,$rules,$customMessages);

                if(empty($casestudy['about_image'])){
                    $rules = [
                        'aimage' => 'required',
                    ];

                    $customMessages = [
                        'aimage.required' => 'Image is required',
                    ];

                    $this->validate($request,$rules,$customMessages);
                }

                $slug = Str::slug($casestudy['name']);

                if(!empty($data['aimage']) && !empty($data['current_image'])){
                       
                    $imagePath = public_path('images/casestudy/aboutImage/'.$data['current_image']);
    
                    if(file_exists($imagePath)){
                        if(unlink($imagePath)){
                            
                        }else{
                            return redirect()->back()->with('error_message','There is some error on deleting Image!');
                        }
                    }else{
                        return redirect()->back()->with('error_message','Image not found! Please contact Admin');
                    }
                }
    
                if($request->hasFile('aimage')){
                    $image_tmp = $request->file('aimage');
                    if($image_tmp->isValid()){
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName = rand(111,98999).'.'.$extension;
                        $image_path = 'images/casestudy/aboutImage/'.$imageName;
                        Image::make($image_tmp)->save($image_path);
                    }
                }else if(!empty($data['current_image'])){
                    $imageName = $data['current_image'];
                }else{
                    $imageName = "";
                }
    
                $casestudy->about_heading = $data['aheading'];
                $casestudy->about_description = $data['adescription'];
                $casestudy->about_image = $imageName;
                $casestudy->save();

                return response()->json(['message'=>'Section Three is updated. Proceed Further','link'=>$slug]);
            }else if($data['section'] == "4"){

                $rules = [
                    'heading4' => 'required',
                    'description4' => 'required',
                ];
    
                $customMessages = [
                    'heading4.required' => 'Section Heading is required',
                    'description4.required' => 'Section Description is required',
                ];
    
                $this->validate($request,$rules,$customMessages);

                $slug = Str::slug($casestudy['name']);
    
                $casestudy->heading4 = $data['heading4'];
                $casestudy->description4 = $data['description4'];
                $casestudy->card_heading4 = json_encode($data['cardHeading']);
                $casestudy->card_content4 = json_encode($data['cardContent']);
                $casestudy->save();

                return response()->json(['message'=>'Section Four is updated. Proceed Further','link'=>$slug]);
            }else if($data['section'] == "5"){

                $rules = [
                    'heading5' => 'required',
                    'content5' => 'required',
                    'image5' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:500',
                ];
    
                $customMessages = [
                    'heading5.required' => 'Section Heading is required',
                    'content5.required' => 'Section Content is required',
                    'image5.required' => 'Image is required',
                    'image5.image' => 'Valid Image is required',
                    'image5.mimes' => 'Image should be in jpg,jpeg,gif,svg,png format',
                    'image5.max' => 'Image size should not be greater than 500 KB',
                ];
    
                $this->validate($request,$rules,$customMessages);

                $slug = Str::slug($casestudy['name']);

                if(!empty($data['image5']) && !empty($data['current_image'])){

                       
                    $imagePath = public_path('images/casestudy/bannerImage/'.$data['current_image']);
    
                    if(file_exists($imagePath)){
                        if(unlink($imagePath)){
                            
                        }else{
                            return redirect()->back()->with('error_message','There is some error on deleting Image!');
                        }
                    }else{
                        return redirect()->back()->with('error_message','Image not found! Please contact Admin');
                    }
                }
    
                if($request->hasFile('image5')){
                    $image_tmp = $request->file('image5');
                    if($image_tmp->isValid()){
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName = rand(111,98999).'.'.$extension;
                        $image_path = 'images/casestudy/bannerImage/'.$imageName;
                        Image::make($image_tmp)->save($image_path);
                    }
                }else if(!empty($data['current_image'])){
                    $imageName = $data['current_image'];
                }else{
                    $imageName = "";
                }
    
                $casestudy->heading5 = $data['heading5'];
                $casestudy->content5 = $data['content5'];
                $casestudy->image5 = $imageName;
                $casestudy->save();

                return response()->json(['message'=>'Section Five is updated. Proceed Further','link'=>$slug]);
            }
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $casestudy = new casestudy();

            if($data['section'] == "1"){

                $rules = [
                    'catid' => 'required',
                    'page_id' => 'required',
                    'name' => 'required|unique:casestudy,name',
                    'bannerImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:500|dimensions:ratio=3/2',
                ];
    
                $customMessages = [
                    'catid.required' => 'Category is required',
                    'page_id.required' => 'Inner Page is required',
                    'name.required' => 'Case Study name is required',
                    'name.unique' => 'This Case Study name is already exist! Try a different one',
                    'bannerImage.required' => 'Banner Image is required',
                    'bannerImage.image' => 'Valid Image is required',
                    'bannerImage.mimes' => 'Banner Image should be in jpg,jpeg,gif,svg,png format',
                    'bannerImage.max' => 'Banner Image size should not be greater than 500 KB',
                    'bannerImage.dimensions' => 'Banner Image Dimensions should be in a ratio 3/2',
                ];
    
                $this->validate($request,$rules,$customMessages);
    
                $slug = Str::slug($data['name']);
    
                if($request->hasFile('bannerImage')){
                    $image_tmp = $request->file('bannerImage');
                    if($image_tmp->isValid()){
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName = rand(111,98999).'.'.$extension;
                        $image_path = 'images/casestudy/bannerImage/'.$imageName;
                        Image::make($image_tmp)->save($image_path);
                    }
                }else{
                    $imageName = "";
                }
    
                $fileContent = '
                @extends("layout.layout")
                @section("content")
                <?php $base_url = "http://localhost:8000"; ?>

                    <div class="case-study-banner-container">
                        <div class="case-study-banner-overlay"></div>
                        <img src="{{ url("images/casestudy/bannerImage/".$bannerImage."") }}" alt="Banner" class="img-fluid">
                        <h1 class="fs-1">{{$name}}</h1>
                    </div>

                    <main id="caseStudyContainer">

                        @if(!empty($projectDescription))
                            <section id="projectOverview" class="">
                                <h3>Project Overview</h3>
                                <div class="container my-3">
                                    <p>
                                        {{$projectDescription}}
                                    </p>
                                    <div class="row py-3 g-3">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="card p-3 h-100">
                                                <h5 class="card-title m-0">Client\'s Problem</h5>
                                                <hr>
                                                <p>
                                                    {{$client_problem}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="card p-3 h-100">
                                                <h5 class="card-title m-0">Tech2Globe\'s Solution</h5>
                                                <hr>
                                                <p>
                                                    {{$tech2globe_solution}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="card p-3 h-100">
                                                <h5 class="card-title m-0">Key Milestones</h5>
                                                <hr>
                                                <ul>
                                                    <li>{{$key_milestones}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="row-cols-12">
                                                <div class="col">
                                                    <div class="card h-100">
                                                        <div class="card-body d-flex align-items-center">
                                                            <div class="icon-col">
                                                                <i class="fa-solid fa-gauge-high fa-2x"></i>
                                                            </div>
                                                            <div class="text-col ms-3">
                                                                <h5 class="card-title">Client Satisfaction</h5>
                                                                <p class="card-text">{{$client_satisfaction}}/10</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                                <div class="col my-3">
                                                    <div class="card h-100">
                                                        <div class="card-body d-flex align-items-center">
                                                            <div class="icon-col">
                                                                <i class="fa-solid fa-calendar-days fa-2x"></i>
                                                            </div>
                                                            <div class="text-col ms-3">
                                                                <h5 class="card-title">Project Duration</h5>
                                                                <p class="card-text">{{$project_duration}} Days</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                                <div class="col">
                                                    <div class="card h-100">
                                                        <div class="card-body d-flex align-items-center">
                                                            <div class="icon-col">
                                                                <i class="fa-solid fa-bars fa-2x"></i>
                                                            </div>
                                                            <div class="text-col ms-3">
                                                                <h5 class="card-title">Menus Processed</h5>
                                                                <p class="card-text">{{$menues_processed}} (new + existing)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    
                                    </div>
                    
                            </section>
                        @endif

                        @if(!empty($about_heading))
                            <section id="lefImageRightText" class=" section-with-bg">
                                <h3>About {{$name}}</h3>
                                <div class="container my-3">
                                    <div class="row gy-2">
                                        <div class="col-md-6 order-md-1 order-2">
                                            <h6 class="fw-bold title">
                                                {{$about_heading}}
                                            </h6>
                                            <p>
                                                {{$about_description}}
                                            </p>
                                        </div>
                                        <div class="col-md-6 order-md-2 order-1"><img src="{{ url("images/casestudy/aboutImage/".$about_image) }}" alt="About Us" class="img-fluid rounded">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif

                        @if(!empty($heading4))
                            <section id="outlineCardsTopDescription" class="">
                                <h3>{{$heading4}}</h3>
                                <div class="container">
                                    <p>{{$description4}} </p>
                                    @php
                                        $heading = json_decode($card_heading4);
                                        $content = json_decode($card_content4);
                                    @endphp
                                    <div class="outline-cards-carousel owl-carousel owl-theme">
                                        
                                        @for($i = 0; $i < count($heading); $i++)
                                            <div class="item">
                                                <div class="card h-100">
                                                    <h6>{{$heading[$i]}}</h6>
                                                    <p>
                                                        {{$content[$i]}}
                                                    </p>
                                                </div>
                                            </div>
                                        @endfor
                                        
                                    </div>
                                </div>
                            </section>
                        @endif

                        @if(!empty($heading5))
                            <section id="rightImageLeftTextBottomParagraph" class=" section-with-bg">
                                <h3>{{$heading5}}</h3>
                                <div class="container my-3">
                                    <div class="row mb-3 gy-2">
                                        <div class="col-md-6">
                                            <img src="{{ url("images/casestudy/bannerImage/".$image5) }}" alt="Challenges Faced" class="img-fluid rounded">
                                        </div>
                                        <div class="col-md-6">
                                           @php echo $content5; @endphp
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif
                        
                    </main>
                
                @endsection
                ';
    
                $filePath = resource_path('views/casestudy/'.$slug.'.blade.php');
    
                //Creating the file
                file_put_contents($filePath, $fileContent);
    
                // Adding a route dynamically
                $routeContent = '
                Route::get("/casestudy/'.$slug.'", function () {

                    $casestudy = casestudy::where("name","'.$data['name'].'")->first();
                    return view("casestudy/'.$slug.'", $casestudy);

                });';
    
                $routePath = base_path('routes/casestudy.php');
                file_put_contents($routePath, $routeContent,FILE_APPEND | LOCK_EX);    

                $casestudy->category_id = $data['catid'];
                $casestudy->page_id = $data['page_id'];
                $casestudy->name = $data['name'];
                $casestudy->bannerImage = $imageName;
                $casestudy->save();

                $message = "Case Study added Successfully and it is live now! Proceed Further by click on edit Button";
                return redirect('admin/case-study')->with('success_message',$message);

                // return response()->json(['message'=>'Section One is completed and your page is live now! Proceed Further','link'=>$slug]);
            }
        }
    }

    public function casestudyCategory()
    {   
        $pagename = "Case Study Category";
        $category = casestudy_category::get()->toArray();

        //Set Admin/Subadmins Permissions for Portfolio Module
        $portfolioModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'resources'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($portfolioModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'resources'])->first()->toArray();
        }

        return view('admin.resources.caseStudy.category')->with(compact('pagesModule','pagename','category'));
    }

    public function addEditCasestudyCategory(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add Case study Category";
            $category = new casestudy_category;
            $message = "Case Study Category added Successfully";
        }else{
            $title = "Edit Case study Category";
            $category = casestudy_category::find($id);
            $message = "Case Study Category updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name' => 'required|max:40|unique:casestudy_category,name',
            ];

            $customMessages = [
                'name.required' => 'Category name is required',
                'name.max' => 'Name should not be greater than 40 characters.',
                'name.unique' => 'Enter Category Name is already present, Try a different one',
            ];

            $this->validate($request,$rules,$customMessages);

            $category->name = $data['name'];
            if($category->save()){
                activity($title)
                ->performedOn($category)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'Case Study Category'])
                ->log('');

                return redirect('admin/resources/case-study-category')->with('success_message',$message);
            }
        }
    }

    public function updateCasestudyCat(Request $request){

        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(casestudy_category::where('id',$data['casestudy_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(casestudy_category::find($data['casestudy_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'Case study Category'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'casestudy_id'=>$data['casestudy_id']]);
        }
    }

    public function updateCasestudy(Request $request){

        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(casestudy::where('id',$data['casestudy_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(casestudy::find($data['casestudy_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Our Work','submodule' => 'Case study'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'casestudy_id'=>$data['casestudy_id']]);
        }
    }

    public function index2()
    {
        Session::put('page','rcase_study');

        $pagename = "Case Study";

        $casestudy = casestudy::get()->toArray();
        $category = casestudy_category::get()->toArray();
        $allInnerPages = tech2globe_all_pages::get()->toArray();

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

        return view('admin.resources.caseStudy.caseStudy')->with(compact('pagesModule','pagename','casestudy','category','allInnerPages'));
    }

    public function addCasestudy(Request $request)
    {
        $title = "Add Case Study";
        $casestudy = new casestudy();

        if($request->isMethod('post')){
            $data = $request->all();
    
            $rules = [
                'catid' => 'required',
                'name' => 'required|unique:casestudy,name',
                'bannerImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:100|dimensions:width=573,height=226',
            ];

            $customMessages = [
                'catid.required' => 'Category is required',
                'name.required' => 'Case Study name is required',
                'name.unique' => 'This Case Study name is already exist! Try a different one',
                'bannerImage.required' => 'Banner Image is required',
                'bannerImage.image' => 'Valid Image is required',
                'bannerImage.mimes' => 'Banner Image should be in jpg,jpeg,gif,svg,png format',
                'bannerImage.max' => 'Banner Image size should not be greater than 100 KB',
                'bannerImage.dimensions' => 'Banner Image Dimensions should be 573x226px',
            ];

            $this->validate($request,$rules,$customMessages);

            $slug = Str::slug($data['name']);

            if($request->hasFile('bannerImage')){
                $image_tmp = $request->file('bannerImage');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,98999).'.'.$extension;
                    $image_path = 'images/casestudy/bannerImage/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else{
                $imageName = "";
            }

            $fileContent = '
            @extends("layout.layout")
            @section("content")
            @php $base_url = "/"; @endphp

                @include("include.breadcrumb-case-study-detail", ["name" => $casestudy["name"]])

                <section class="container cartFeature inner-page-content new-content case-study-inner-page pt-0">

                    <div class="row">
                        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                        <div class="main-banner-container">
                            <h1 style="text-transform: uppercase;">TECH2GLOBE PROVIDED {{$casestudy["name"]}}</h1>
                            <img src="{{ url("images/casestudy/bannerImage/".$casestudy["bannerImage"]."") }}" alt="case-study-banner" width="100%">
                        </div>

                        <div class="content-container">
                            @if(!empty($casestudy["filecode"]))
                                {!! $casestudy["filecode"] !!}
                            @endif
                        </div>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 sidebar">
                        <div class="about-get-your-footprints-section">
                            <div class="row mb-3">
                            <div class="col-12 d-flex align-items-center justify-content-start gap-3">
                                <i class="fa-solid fa-circle-play"></i>
                                <h3 style="font-size: 16px; font-weight: 600; text-transform: uppercase;">WHAT WE DO IN {{$casestudy["name"]}}</h3>
                            </div>
                            </div>
                            <figure class="position-relative mb-0">
                            <img src="/images/new-page-images/about/human-resources-concept-with-man_23-2150389099.jpg" alt="" class="img-fluid">
                            <a href="https://www.youtube.com/watch?v=eUJc53n0cRg" target="_blank" class="play-icon position-absolute"></a>
                            </figure>
                        </div>
                        @include("include.query-form")
                        <div class="custom-portfolio-testi-container mt-4">
                            <a href="/portfolio" target="_blank">
                            <div class="card border-0 rounded-0 shadow">
                                <div class="icon-container">
                                <i class="fa-brands fa-codepen"></i>
                                </div>
                                <div class="text-container d-flex align-items-center justify-content-center gap-4 me-5">
                                <p class="mb-0 pb-0 text-light">PORTFOLIO</p>
                                <div class="right-arrow">
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </div>
                                </div>
                            </div>
                            </a>

                            <a href="/testimonial" target="_blank">
                            <div class="card border-0 rounded-0 shadow">
                                <div class="icon-container">
                                <i class="fa-regular fa-pen-to-square"></i>
                                </div>
                                <div class="text-container d-flex align-items-center justify-content-center gap-4 me-5">
                                <p class="mb-0 pb-0 text-light">TESTIMONIAL</p>
                                <div class="right-arrow">
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        </div>
                    </div>

                    <div class="row mb-5 mt-5 more-case-study-section">
                        <h2 class="text-center mb-5">More Case Studies</h2>

                        @foreach ($allCasestudy as $row)
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-img">
                                        <a href="{{ url("case-studies/".Str::slug($row["name"])."") }}"><img src="{{ url("images/casestudy/bannerImage/".$row["bannerImage"]) }}" alt=""></a>
                                    </div>
                                    <div class="card-description p-3">
                                        <h5 style="color: #DC3545;">{{$row["name"]}}</h5>
                                        <p class="mb-0">{{ Str::limit($row["projectDescription"], 150, " ...") }} <a href="{{ url("case-studies/".Str::slug($row["name"])."") }}" style="color: #DC3545; text-decoration: none;">Read More</a></p>
                                    </div>
                                </div>  
                            </div> 
                        @endforeach
                        
                        <div class="col-12 text-center mt-4">
                        <a href="/case-studies"><button class="btn btn-danger">More Case Study <i class="fa-solid fa-angles-right"></i></button></a>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <h2 class="text-center mb-5">Our Competitive Advantages</h2>

                        <ul class="ocadvatage-container">
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/technology-cs1.png" alt="technology">
                            </div>
                            <span>Latest <br>Technology</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/modal-cs1.png" alt="technology">
                            </div>
                            <span>Flexible <br>Engagement Model</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/cyber-cs1.png" alt="technology">
                            </div>
                            <span>Cyber <br> Security</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/innovation-cs1.png" alt="technology">
                            </div>
                            <span>Scalability &<br>
                            Innovation</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/support-cs1.png" alt="technology">
                            </div>
                            <span>Multi Language <br>
                            Support</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/global-reachcs1.png" alt="technology">
                            </div>
                            <span>Global <br>
                            Reach</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/customer-support-cs1.png" alt="technology">
                            </div>
                            <span>Rich Customer <br>
                            Support</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/certified-professional-cs1.png" alt="technology">
                            </div>
                            <span>Certified <br>
                            Professionals</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/multi-level-cs1.png" alt="technology">
                            </div>
                            <span>Multi-Level <br>
                            Hierarchy</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/brand-management-cs1.png" alt="technology">
                            </div>
                            <span>Brand <br>
                            Management</span>
                        </li>
                        </ul>
                    </div>
                </section>
            
            @endsection
            ';

            $filePath = resource_path('views/casestudy/'.$slug.'.blade.php');

            //Creating the file
            file_put_contents($filePath, $fileContent);

            // Adding a route dynamically
            $routeContent = '
            Route::get("/case-studies/'.$slug.'", function () {

                $casestudy = casestudy::where("name","'.$data['name'].'")->first();
                $allCasestudy = casestudy::select("name","bannerImage","projectDescription")->where("id","!=",$casestudy["id"])->where("r_status",1)->latest()->take(4)->get();

                return view("casestudy/'.$slug.'", ["casestudy" => $casestudy, "allCasestudy" => $allCasestudy]);

            });';

            $routePath = base_path('routes/casestudy.php');
            file_put_contents($routePath, $routeContent,FILE_APPEND | LOCK_EX);    

            $casestudy->category_id = $data['catid'];
            $casestudy->page_id = 0;
            $casestudy->name = $data['name'];
            $casestudy->bannerImage = $imageName;
            if($casestudy->save()){
                activity($title)
                ->performedOn($casestudy)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'Case Study'])
                ->log('');

                $message = "Case Study added Successfully and it is live now! Proceed Further by click on edit Button";
                return redirect('admin/resources/case-study')->with('success_message',$message);
            }
        }
    }

    public function editCasestudy(Request $request, $id)
    {
        $title = "Edit Case Study";
        $casestudy = casestudy::find($id);
        $message = "Case Study updated Successfully";

        $category = casestudy_category::get()->toArray();
        $allInnerPages = tech2globe_all_pages::get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            if($data['section'] == "1"){

                $rules = [
                    'catid' => 'required',
                    'name' => 'required',
                    'bannerImage' => 'image|mimes:jpg,png,jpeg,gif,svg|max:100|dimensions:width=573,height=226',
                ];
    
                $customMessages = [
                    'catid.required' => 'Category is required',
                    'name.required' => 'Case Study name is required',
                    'bannerImage.image' => 'Valid Image is required',
                    'bannerImage.mimes' => 'Banner Image should be in jpg,jpeg,gif,svg,png format',
                    'bannerImage.max' => 'Banner Image size should not be greater than 100 KB',
                    'bannerImage.dimensions' => 'Banner Image Dimensions should be 573x226px',
                ];
    
                $this->validate($request,$rules,$customMessages);
    
                $slug = Str::slug($data['name']);
    
                if(!empty($data['bannerImage']) && !empty($data['current_image'])){
                       
                    $imagePath = public_path('images/casestudy/bannerImage/'.$data['current_image']);
    
                    if(file_exists($imagePath)){
                        if(unlink($imagePath)){
                            
                        }else{
                            return redirect()->back()->with('error_message','There is some error on deleting Image!');
                        }
                    }else{
                        return redirect()->back()->with('error_message','Image not found! Please contact Admin');
                    }
                }
    
                if($request->hasFile('bannerImage')){
                    $image_tmp = $request->file('bannerImage');
                    if($image_tmp->isValid()){
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName = rand(111,98999).'.'.$extension;
                        $image_path = 'images/casestudy/bannerImage/'.$imageName;
                        Image::make($image_tmp)->save($image_path);
                    }
                }else if(!empty($data['current_image'])){
                    $imageName = $data['current_image'];
                }else{
                    $imageName = "";
                }
    
                $casestudy->category_id = $data['catid'];
                $casestudy->name = $data['name'];
                $casestudy->bannerImage = $imageName;
                if($casestudy->save()){
                    activity($title)
                    ->performedOn($casestudy)
                    ->causedBy(Auth::guard('admin')->user())
                    ->withProperties(['module' => 'Resources','submodule' => 'Case Study'])
                    ->log('');

                    return redirect('admin/resources/case-study')->with('success_message',$message);
                }
            }else if($data['section'] == "2"){
                $filecode = $data['filecode'];

                $rules = [
                    'filecode' => 'required',
                ];
    
                $customMessages = [
                    'filecode.required' => 'File code is required',
                ];
    
                $this->validate($request,$rules,$customMessages);

                $casestudy->filecode = $filecode;
                if($casestudy->save()){
                    activity($title)
                    ->performedOn($casestudy)
                    ->causedBy(Auth::guard('admin')->user())
                    ->withProperties(['module' => 'Resources','submodule' => 'Case Study'])
                    ->log('');

                    return redirect('admin/resources/case-study')->with('success_message',$message);
                }
            }else if($data['section'] == "3"){

                $rules = [
                    'description' => 'required|max:500',
                ];
    
                $customMessages = [
                    'description.required' => 'Project Description is required',
                    'description.max' => 'In Project Description only 500 characters are allowed.',
                ];
    
                $this->validate($request,$rules,$customMessages);

                $casestudy->projectDescription = $data['description'];
                $casestudy->info1 = $data['info1'];
                $casestudy->infoval1 = $data['infoval1'];
                $casestudy->info2 = $data['info2'];
                $casestudy->infoval2 = $data['infoval2'];
                $casestudy->info3 = $data['info3'];
                $casestudy->infoval3 = $data['infoval3'];
                if($casestudy->save()){
                    activity($title)
                    ->performedOn($casestudy)
                    ->causedBy(Auth::guard('admin')->user())
                    ->withProperties(['module' => 'Resources','submodule' => 'Case Study'])
                    ->log('');

                    return redirect('admin/resources/case-study')->with('success_message',$message);
                }
            }
        }

        return view('admin.resources.caseStudy.add-edit-case-study2')->with(compact('title','casestudy','category','allInnerPages'));
    }

    public function update(Request $request){

        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(casestudy::where('id',$data['casestudy_id'])->update(['r_status'=>$status])){
                activity('Update')
                ->performedOn(casestudy::find($data['casestudy_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Resources','submodule' => 'Case study'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'casestudy_id'=>$data['casestudy_id']]);
        }
    }

    public function getCasestudy(Request $request){
        if($request->ajax()){
            $data = $request->all();
    
            $categoryId = $data['catid'];
            $categoryNameId = $data['categoryNameId'];
            $categoryNameId = str_replace("#","",$categoryNameId);

            $casestudy = casestudy::where('category_id',$categoryId)->where('r_status',1)->get();

            $output = '
            <div class="tab-pane active" id="'.$categoryNameId.'">
                <div class="row">';
                    
                if(count($casestudy) > 0){
                    foreach($casestudy as $row){
                        $output .= '<div class="col-md-4 col-sm-6 col-xs-12 case-study-outer mb-4">
                            <div class="card h-100 border rounded shadow bg-light">
                                <div class="image-container pt-3 px-3">
                                    <img class="lazyload rounded img-fluid"
                                        src="/images/casestudy/bannerImage/'.$row['bannerImage'].'"
                                        alt="'.$row['name'].'">
                                </div>
                                <div class="content p-4 pt-0">
                                    <h5 class="text-danger">'.$row['name'].'</h5>
                                    <p>'.Str::limit($row['projectDescription'], 150, ' ...').'</p>
                                    <a href="'.url("case-studies/".Str::slug($row['name'])."").'" target="_blank" class="btn">Read More </a>
                                </div>
                            </div>
                        </div>';
                    }
                }else{
                    $output .= 'No Casestudy Found';
                }
            $output .= '</div>
            </div>';
         
            return $output;
        }
    }
}


                       