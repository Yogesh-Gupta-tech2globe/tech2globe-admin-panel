<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsRole;
use App\Models\tech2globe_top_header;
use App\Models\tech2globe_middle_header;
use App\Models\tech2globe_header_category;
use App\Models\tech2globe_header_sub_category;
use App\Models\tech2globe_all_pages;
use App\Models\layout;
use App\Models\tech2globe_footer_category;
use App\Models\tech2globe_footer_sub_category;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Image;

class Tech2globeLayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Session::put('page','tech2globe_layout');

        $mainMenu = tech2globe_header_category::get()->toArray();

        if($request->ajax()){
            $data = $request->all();
            $subMenu = tech2globe_header_sub_category::where('category_id',$data['category_id'])->get()->toArray();

            $subMenuHtml = '';

            if(!empty($subMenu)){
                foreach($subMenu as $row){
                    $subMenuHtml .= '<option value="'.$row['id'].'">'.$row['subCategoryName'].'</option>';
                }
            }else{
                $subMenuHtml = '<option>No Sub Menu Found in this Menu</option>';
            }

            
            return response()->json($subMenuHtml);
        }

        //Set Admin/Subadmins Permissions for Layout Module
        $layoutModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($layoutModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->first()->toArray();
        }

        return view('admin.tech2globeCmsLayout.layout')->with(compact('pagesModule','mainMenu'));
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
    public function show()
    {
        Session::put('page','tech2globe_all_layout');

        $mainMenu = tech2globe_header_category::get()->toArray();
        $subMenu = tech2globe_header_sub_category::get()->toArray();
        $allPages = tech2globe_all_pages::get()->toArray();
    
        //Set Admin/Subadmins Permissions for Layout Module
        $layoutModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($layoutModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->first()->toArray();
        }

        return view('admin.tech2globeCmsLayout.all-layout')->with(compact('pagesModule','mainMenu','subMenu','allPages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Controlling Header of Tech2globe Website
    public function header(Request $request)
    {
        Session::put('page','tech2globe_header');

        $mainMenu = tech2globe_header_category::get()->toArray();
        $subMenu = tech2globe_header_sub_category::get()->toArray();
        $allPages = tech2globe_all_pages::get()->toArray();
        $topNavbar = tech2globe_top_header::find(1);
        $middleNavbar = tech2globe_middle_header::find(1);
    
        //Set Admin/Subadmins Permissions for Layout Module
        $layoutModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($layoutModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->first()->toArray();
        }

    
        $allPagesData = DB::table('tech2globe_header_category')
            ->leftJoin('tech2globe_header_sub_category', 'tech2globe_header_category.id', '=', 'tech2globe_header_sub_category.category_id')
            ->leftJoin('tech2globe_all_pages', 'tech2globe_header_sub_category.id', '=', 'tech2globe_all_pages.sub_category_id')
            ->select('tech2globe_header_category.categoryName as categoryName1', 'tech2globe_header_category.page_url as pageUrl1', 'tech2globe_header_sub_category.subCategoryName as categoryName2', 'tech2globe_header_sub_category.page_url as pageUrl2', 'tech2globe_all_pages.page_name as pageName', 'tech2globe_all_pages.page_url as pageUrl')
            ->get();

        if($request->isMethod('post')){
            $data = $request->all();
           
            if(array_key_exists('topNavbar', $data)){

                $message = "Top Navbar updated Successfully!";

                // echo "<pre>"; print_r($data); die;

                //Updating Social Link Icon 1
                if(!empty($data['socialLink1Icon'])){

                    if(!empty($topNavbar['socialLink1Icon'])){  

                        $socialLink1IconPath = public_path('images/icons/'.$topNavbar['socialLink1Icon']);
        
                        if(file_exists($socialLink1IconPath)){
                            if(unlink($socialLink1IconPath)){

                            }else{
                                return redirect()->back()->with('error_message','There is some error on deleting Icon!');
                            }
                        }else{
                            return redirect()->back()->with('error_message','Icon not found! Please contact Admin');
                        }
                    }

                    
                    if($request->hasFile('socialLink1Icon')){
                        $image_tmp = $request->file('socialLink1Icon');
                        if($image_tmp->isValid()){
                            //Get Image Extension
                            $extension = $image_tmp->getClientOriginalExtension();
                            //Generate New Image Name
                            $socialLink1Icon = rand(111,98999).'.'.$extension;
                            $image_path = 'images/icons/'.$socialLink1Icon;
                            Image::make($image_tmp)->save($image_path);
                        }
                    } 

                }else{
                    $socialLink1Icon = $topNavbar['socialLink1Icon'];
                }

                //Updating Social Link Icon 2
                if(!empty($data['socialLink2Icon'])){

                    if(!empty($topNavbar['socialLink2Icon'])){  

                        $socialLink2IconPath = public_path('images/icons/'.$topNavbar['socialLink2Icon']);
        
                        if(file_exists($socialLink2IconPath)){
                            if(unlink($socialLink2IconPath)){

                            }else{
                                return redirect()->back()->with('error_message','There is some error on deleting Icon!');
                            }
                        }else{
                            return redirect()->back()->with('error_message','Icon not found! Please contact Admin');
                        }
                    }

                    
                    if($request->hasFile('socialLink2Icon')){
                        $image_tmp = $request->file('socialLink2Icon');
                        if($image_tmp->isValid()){
                            //Get Image Extension
                            $extension = $image_tmp->getClientOriginalExtension();
                            //Generate New Image Name
                            $socialLink2Icon = rand(111,98999).'.'.$extension;
                            $image_path = 'images/icons/'.$socialLink2Icon;
                            Image::make($image_tmp)->save($image_path);
                        }
                    } 

                }else{
                    $socialLink2Icon = $topNavbar['socialLink2Icon'];
                }

                //File old section Content
               
                $oldSectionContent = '
                <div class="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-5">
                                <img src="images/icons/'.$topNavbar['socialLink1Icon'].'" class="icon" alt="Skype">
                                <a href="skype:'.$topNavbar['socialLink1Text'].'?call">'.$topNavbar['socialLink1Text'].'</a>
                            </div>
                            <div class="col-md-3 col-sm-7">
                                <img src="images/icons/'.$topNavbar['socialLink2Icon'].'" class="icon" alt="Gmail">
                                <!-- <i class="fa-solid fa-envelope text-white pt-1"></i> -->
                                <a href="mailto:'.$topNavbar['socialLink2Text'].'">'.$topNavbar['socialLink2Text'].'</a>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="link float-end">
                                    <a href="<?php echo $base_url . "'.$topNavbar['innerPage1Link'].'"; ?>">'.$topNavbar['innerPage1Text'].'</a>
                                    <a href="<?php echo $base_url . "'.$topNavbar['innerPage2Link'].'"; ?>">'.$topNavbar['innerPage2Text'].'</a>
                                    <a href="<?php echo $base_url . "'.$topNavbar['innerPage3Link'].'"; ?>">'.$topNavbar['innerPage3Text'].'</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

                //  $oldSectionContent = preg_replace('/\s+/', ' ', $oldSectionContent);

                //File new section Content
                $newSectionContent = '
                <div class="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-5">
                                <img src="images/icons/'.$socialLink1Icon.'" class="icon" alt="Skype">
                                <a href="skype:'.$data['socialLink1Text'].'?call">'.$data['socialLink1Text'].'</a>
                            </div>
                            <div class="col-md-3 col-sm-7">
                                <img src="images/icons/'.$socialLink2Icon.'" class="icon" alt="Gmail">
                                <!-- <i class="fa-solid fa-envelope text-white pt-1"></i> -->
                                <a href="mailto:'.$data['socialLink2Text'].'">'.$data['socialLink2Text'].'</a>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="link float-end">
                                    <a href="<?php echo $base_url . "'.$data['innerPage1Link'].'"; ?>">'.$data['innerPage1Text'].'</a>
                                    <a href="<?php echo $base_url . "'.$data['innerPage2Link'].'"; ?>">'.$data['innerPage2Text'].'</a>
                                    <a href="<?php echo $base_url . "'.$data['innerPage3Link'].'"; ?>">'.$data['innerPage3Text'].'</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';


                $filePath = resource_path('views/layout/header.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);

                //Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
                 

                $topNavbar->socialLink1Icon = $socialLink1Icon;
                $topNavbar->socialLink1Text = $data['socialLink1Text'];
                $topNavbar->socialLink2Icon = $socialLink2Icon;
                $topNavbar->socialLink2Text = $data['socialLink2Text'];
                $topNavbar->innerPage1Text = $data['innerPage1Text'];
                $topNavbar->innerPage1Link = $data['innerPage1Link'];
                $topNavbar->innerPage2Text = $data['innerPage2Text'];
                $topNavbar->innerPage2Link = $data['innerPage2Link'];
                $topNavbar->innerPage3Text = $data['innerPage3Text'];
                $topNavbar->innerPage3Link = $data['innerPage3Link'];
                $topNavbar->save();
                return redirect('admin/tech2globe-layout/header')->with('success_message',$message);
            }

            if(array_key_exists('middleNavbar', $data)){

                $message = "Middle Navbar updated Successfully!";

                // echo "<pre>"; print_r($data); die;

                //Updating Website Logo
                if(!empty($data['websiteLogo'])){

                    if(!empty($middleNavbar['websiteLogo'])){  

                        $websiteLogoPath = public_path('images/logo/'.$middleNavbar['websiteLogo']);
        
                        if(file_exists($websiteLogoPath)){
                            if(unlink($websiteLogoPath)){

                            }else{
                                return redirect()->back()->with('error_message','There is some error on deleting Logo!');
                            }
                        }else{
                            return redirect()->back()->with('error_message','Logo not found! Please contact Admin');
                        }
                    }

                    
                    if($request->hasFile('websiteLogo')){
                        $image_tmp = $request->file('websiteLogo');
                        if($image_tmp->isValid()){
                            //Get Image Extension
                            $extension = $image_tmp->getClientOriginalExtension();
                            //Generate New Image Name
                            $websiteLogo = rand(111,98999).'.'.$extension;
                            $image_path = 'images/logo/'.$websiteLogo;
                            Image::make($image_tmp)->save($image_path);
                        }
                    } 

                }else{
                    $websiteLogo = $middleNavbar['websiteLogo'];
                }

        
                $branchNumber = [];
                $countryFlag = [];
                $branchCountry = [];
                $branchAddress = [];
                $branchWebsite = [];

                foreach($data as $content => $value){

                    if(str_contains($content,'branchNumber')){
                        array_push($branchNumber,$value);
                    }else if(str_contains($content,'countryFlag')){
                        
                        if($request->hasFile($content)){
                            $image_tmp = $request->file($content);
                            if($image_tmp->isValid()){
                                //Get Image Extension
                                $extension = $image_tmp->getClientOriginalExtension();
                                //Generate New Image Name
                                $countryFlagImage = rand(111,98999).'.'.$extension;
                                $image_path = 'images/svgs/'.$countryFlagImage;
                                Image::make($image_tmp)->save($image_path);
                            }
                        }
                        array_push($countryFlag,$countryFlagImage);
                    }else if(str_contains($content,'branchCountry')){
                        array_push($branchCountry,$value); 
                    }else if(str_contains($content,'branchAddress')){
                        array_push($branchAddress,$value); 
                    }else if(str_contains($content,'branchWebsite')){
                        array_push($branchWebsite,$value); 
                    }
                }

                // print_r($countryFlag); die;

                            
                function findMissingValues($array1, $array2) {
                    $missingIndexes = array();

                    // Loop through the first array and check for missing values in the second array
                    foreach ($array1 as $index => $value) {
                        if (!in_array($value, $array2)) {
                            $missingIndexes[] = $index;
                        }
                    }

                    return $missingIndexes;
                }

                $previousCountryFlag = explode(",",$middleNavbar['countryFlag']);

                if(!empty($previousCountryFlag) && empty($countryFlag)){
                    // Sample arrays
                    $array1 = explode(",",$middleNavbar['branchNumber']);
                    $array2 = $branchNumber;

                    // Find the missing values
                    $missingIndexes = findMissingValues($array1, $array2);

                    rsort($missingIndexes);

                    foreach ($missingIndexes as $index) {
                        if (isset($previousCountryFlag[$index])) {
                            array_splice($previousCountryFlag, $index, 1);
                        }
                    }

                    $countryFlag = $previousCountryFlag;
                
                }else if((!empty($previousCountryFlag)) && (!empty($countryFlag))){

                    // Sample arrays
                    $array1 = explode(",",$middleNavbar['branchNumber']);
                    $array2 = $branchNumber;

                    // Find the missing values
                    $missingIndexes = findMissingValues($array1, $array2);

                    if(!empty($missingIndexes)){

                        rsort($missingIndexes);

                        foreach ($missingIndexes as $index) {
                            if (isset($previousCountryFlag[$index])) {
                                array_splice($previousCountryFlag, $index, 1);
                            }
                        }

                        $countryFlag = array_merge($previousCountryFlag,$countryFlag);
                        
                    }else{
                        $countryFlag = array_merge($previousCountryFlag,$countryFlag);
                    }

                }


                $implodeBranchNumber = implode(",",$branchNumber);
                $implodeCountryFlag = implode(",",$countryFlag);
                $implodeBranchCountry = implode(",",$branchCountry);
                $implodeBranchAddress = implode("+++",$branchAddress);
                $implodeBranchWebsite = implode(",",$branchWebsite);

                $explodeBranchNumber = explode(",",$middleNavbar['branchNumber']);
                $explodeCountryFlag = explode(",",$middleNavbar['countryFlag']);
                $explodeBranchCountry = explode(",",$middleNavbar['branchCountry']);

                //File old section Content
               
                $oldSectionContent = '
                <div class="bottom-header">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-3 col-sm-12">
                                <div class="row">
                                    <nav class="navbar navbar-expand-lg header-location">
                                        <div class="container">
                                            <a class="navbar-brand" href="http://localhost:8000"><img src="images/logo/'.$middleNavbar['websiteLogo'].'" class="brand-logo" alt="Tech 2 globe Logo"></a>
                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <ul class="navbar-nav mb-2 mb-lg-0">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link global-dropdown dropdown-toggle w-100" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span class="global">Global</span>
                                                        </a>
                                                        <ul class="dropdown-menu global-list">';
                                                            for($j=0; $j < count($explodeCountryFlag); $j++){

                                                                $oldSectionContent .= '<li><a target="_blank" class="dropdown-item" href="https://www.tech2globe.com/">
                                                                        <div class="global-icon">
                                                                            <img src="images/svgs/'.$explodeCountryFlag[$j].'" alt="'.$explodeBranchCountry[$j].'"> '.$explodeBranchCountry[$j].'
                                                                        </div>
                                                                    </a>
                                                                </li>';

                                                            }
                                                            
                                                        $oldSectionContent .= '</ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-8 offset-1 col-sm-12 mt-3 d-none d-lg-block">
                                <div class="row align-items-center">';
                                
                                for($i=0; $i<count($explodeCountryFlag); $i++){

                                    $oldSectionContent .= '<div class="col-md-3 col-sm-6 d-flex align-items-center">
                                        <div class="flag-icon">
                                            <img src="images/svgs/'.$explodeCountryFlag[$i].'" alt="'.$explodeBranchCountry[$i].'">
                                        </div>
                                        <div class="ms-3">
                                            <!-- <h6>Phone</h6> -->
                                            <a href="tel:'.$explodeBranchNumber[$i].'">'.$explodeBranchNumber[$i].'</a>
                                        </div>
                                    </div>';
                                }
    
                            $oldSectionContent .= '</div>
                            </div>
                        </div>
                    </div>
                </div>';

                //File new section Content
                $newSectionContent = '
                <div class="bottom-header">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-3 col-sm-12">
                                <div class="row">
                                    <nav class="navbar navbar-expand-lg header-location">
                                        <div class="container">
                                            <a class="navbar-brand" href="http://localhost:8000"><img src="images/logo/'.$websiteLogo.'" class="brand-logo" alt="Tech 2 globe Logo"></a>
                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <ul class="navbar-nav mb-2 mb-lg-0">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link global-dropdown dropdown-toggle w-100" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span class="global">Global</span>
                                                        </a>
                                                        <ul class="dropdown-menu global-list">';
                                                            for($j=0; $j < count($countryFlag); $j++){

                                                                $newSectionContent .= '<li><a target="_blank" class="dropdown-item" href="https://www.tech2globe.com/">
                                                                        <div class="global-icon">
                                                                            <img src="images/svgs/'.$countryFlag[$j].'" alt="'.$branchCountry[$j].'"> '.$branchCountry[$j].'
                                                                        </div>
                                                                    </a>
                                                                </li>';

                                                            }
                                                            
                                                        $newSectionContent .= '</ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-8 offset-1 col-sm-12 mt-3 d-none d-lg-block">
                                <div class="row align-items-center">';
                                
                                for($i=0; $i<count($countryFlag); $i++){

                                    $newSectionContent .= '<div class="col-md-3 col-sm-6 d-flex align-items-center">
                                        <div class="flag-icon">
                                            <img src="images/svgs/'.$countryFlag[$i].'" alt="'.$branchCountry[$i].'">
                                        </div>
                                        <div class="ms-3">
                                            <!-- <h6>Phone</h6> -->
                                            <a href="tel:'.$branchNumber[$i].'">'.$branchNumber[$i].'</a>
                                        </div>
                                    </div>';
                                }
    
                            $newSectionContent .= '</div>
                            </div>
                        </div>
                    </div>
                </div>';


                $filePath = resource_path('views/layout/header.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
                    
                //Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
                 

                $middleNavbar->websiteLogo = $websiteLogo;
                $middleNavbar->countryFlag = $implodeCountryFlag;
                $middleNavbar->branchNumber = $implodeBranchNumber;
                $middleNavbar->branchCountry = $implodeBranchCountry;
                $middleNavbar->branchAddress = $implodeBranchAddress;
                $middleNavbar->branchWebsite = $implodeBranchWebsite;
                $middleNavbar->save();
                return redirect('admin/tech2globe-layout/header')->with('success_message',$message);
            }
        }



        return view('admin.tech2globeCmsLayout.header')->with(compact('pagesModule','mainMenu','subMenu','allPages','allPagesData','topNavbar','middleNavbar'));

    }

    // Controlling Footer of Tech2globe Website
    public function footer()
    {
        Session::put('page','tech2globe_footer');
        $footerPages = tech2globe_footer_sub_category::get()->toArray();
        $footerCategory = tech2globe_footer_category::get()->toArray();
        
    
        //Set Admin/Subadmins Permissions for Layout Module
        $layoutModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($layoutModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->first()->toArray();
        }

        return view('admin.tech2globeCmsLayout.footer')->with(compact('pagesModule','footerPages','footerCategory'));

    }

    public function addEditMainMenu(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add Main Menu";
            $mainMenu = new tech2globe_header_category;
            $message = "New Main Menu added Successfully";
        }else{
            $title = "Edit Main Menu";
            $mainMenu = tech2globe_header_category::find($id);
            $message = "Main Menu updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            // print_r($data); die;

            $rules = [
                'categoryName' => 'required',
            ];

            $customMessages = [
                'categoryName.required' => 'Main Menu name is required',
            ];

            $this->validate($request,$rules,$customMessages);

            $mainMenu->categoryName = $data['categoryName'];
            $mainMenu->page_url = $data['page_url'];
            $mainMenu->save();
            
            return redirect('admin/tech2globe-layout/header')->with('success_message',$message);
        }

        return view('admin.tech2globeCmsLayout.add-edit-mainMenu')->with(compact('title','mainMenu'));
    }

    public function addEditSubMenu(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add Sub Menu";
            $subMenu = new tech2globe_header_sub_category;
            $message = "New Sub Menu added Successfully";
        }else{
            $title = "Edit Sub Menu";
            $subMenu = tech2globe_header_sub_category::find($id);
            $message = "Sub Menu updated Successfully";
        }

        $mainMenu = tech2globe_header_category::get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            //  print_r($data); die;

            $rules = [
                'category_id' => 'required',
                'subCategoryName' => 'required',
            ];

            $customMessages = [
                'category_id.required' => 'Main Menu is required',
                'subCategoryName.required' => 'Sub Menu name is required',
            ];

            $this->validate($request,$rules,$customMessages);

            $subMenu->category_id = $data['category_id'];
            $subMenu->subCategoryName = $data['subCategoryName'];
            $subMenu->page_url = $data['page_url'];
            $subMenu->save();
            
            return redirect('admin/tech2globe-layout/header')->with('success_message',$message);
        }

        return view('admin.tech2globeCmsLayout.add-edit-subMenu')->with(compact('title','subMenu','mainMenu'));
    }

    public function deleteMainMenu($id){

        if(tech2globe_header_category::where('id',$id)->delete()){
            return redirect()->back()->with('success_message','Main Menu deleted successfully!');
        }else{
            return redirect()->back()->with('error_message','Something went wrong!');
        }
    }

    public function deleteSubMenu($id){

        if(tech2globe_header_sub_category::where('id',$id)->delete()){
            return redirect()->back()->with('success_message','Sub Menu deleted successfully!');
        }else{
            return redirect()->back()->with('error_message','Something went wrong!');
        }

    }

    public function updateMainMenu(Request $request){
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            tech2globe_header_category::where('id',$data['mainMenu_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'mainMenu_id'=>$data['mainMenu_id']]);
        }
    }

    public function updateSubMenu(Request $request){
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            tech2globe_header_sub_category::where('id',$data['subMenu_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'subMenu_id'=>$data['subMenu_id']]);
        }
    }

    public function checkPageUrl(Request $request){
        $data = $request->all();
        
        if(tech2globe_all_pages::where('page_url', $data['pageUrl'])->exists() || tech2globe_header_category::where('page_url', $data['pageUrl'])->exists() || tech2globe_header_sub_category::where('page_url', $data['pageUrl'])->exists() || layout::where('page_url', $data['pageUrl'])->exists()){
            return false;
        }else{
            return true;
        }
    }

    public function addEditFooterPages(Request $request, $id=null)
    {
        $footerCategory = tech2globe_footer_category::get()->toArray();
        $mainMenu = tech2globe_header_category::get()->toArray();
        $subMenu = tech2globe_header_sub_category::get()->toArray();
        $allPages = tech2globe_all_pages::get()->toArray();

        $allPagesData = DB::table('tech2globe_header_category')
            ->leftJoin('tech2globe_header_sub_category', 'tech2globe_header_category.id', '=', 'tech2globe_header_sub_category.category_id')
            ->leftJoin('tech2globe_all_pages', 'tech2globe_header_sub_category.id', '=', 'tech2globe_all_pages.sub_category_id')
            ->select('tech2globe_header_category.categoryName as categoryName1', 'tech2globe_header_category.page_url as pageUrl1', 'tech2globe_header_sub_category.subCategoryName as categoryName2', 'tech2globe_header_sub_category.page_url as pageUrl2', 'tech2globe_all_pages.page_name as pageName', 'tech2globe_all_pages.page_url as pageUrl')
            ->get();

        if($id==""){
            $title = "Add Footer Pages";
            $footerPages = new tech2globe_footer_sub_category;
            $message = "New Footer Page added Successfully";
        }else{
            $title = "Edit Footer Page";
            $footerPages = tech2globe_footer_sub_category::find($id);
            $message = "Footer Page updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            // print_r($data); die;

            $rules = [
                'category_id' => 'required',
                'pageName' => 'required|max:20',
                'pageLink' => 'required',
            ];

            $customMessages = [
                'category_id.required' => 'Category is required',
                'pageName.required' => 'Page Name is required',
                'pageName.max' => 'Page Name not be greater than 20 Letters',
                'pageLink.required' => 'Page Linked is required',
            ];

            $this->validate($request,$rules,$customMessages);

            $footerPages->category_id = $data['category_id'];
            $footerPages->sub_category_name = $data['pageName'];
            $footerPages->page_link = $data['pageLink'];
            $footerPages->save();
            
            return redirect('admin/tech2globe-layout/footer')->with('success_message',$message);
        }

        return view('admin.tech2globeCmsLayout.add-edit-footerPages')->with(compact('title','footerPages','footerCategory','allPagesData'));
    }

    public function updateFooterPages(Request $request){
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            tech2globe_footer_sub_category::where('id',$data['footerPages_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'footerPages_id'=>$data['footerPages_id']]);
        }
    }

    public function deleteFooterPages($id){

        if(tech2globe_footer_sub_category::where('id',$id)->delete()){
            return redirect()->back()->with('success_message','Footer Page deleted successfully!');
        }else{
            return redirect()->back()->with('error_message','Something went wrong!');
        }
    }

    public function addEditFooterSocialIcons(Request $request, $id=null)
    {
        $footerCategory = tech2globe_footer_category::get()->toArray();
       

        if($id==""){
            $title = "Add Footer Social Icons";
            $footerPages = new tech2globe_footer_sub_category;
            $message = "New Footer Social Icon added Successfully";
        }else{
            $title = "Edit Footer Social Icons";
            $footerPages = tech2globe_footer_sub_category::find($id);
            $message = "Footer Social Icon updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            // print_r($data); die;

            $rules = [
                'pageName' => 'required',
                'pageLink' => 'required|url',
            ];

            $customMessages = [
                'pageName.required' => 'Social Platform is required',
                'pageLink.required' => 'Page Linked is required',
                'pageLink.url' => 'Please enter a valid url',
            ];

            $this->validate($request,$rules,$customMessages);

            $footerPages->category_id = 5;
            $footerPages->sub_category_name = $data['pageName'];
            $footerPages->page_link = $data['pageLink'];
            $footerPages->save();
            
            return redirect('admin/tech2globe-layout/footer')->with('success_message',$message);
        }

        return view('admin.tech2globeCmsLayout.add-edit-footerSocialIcons')->with(compact('title','footerPages','footerCategory'));
    } 
}
