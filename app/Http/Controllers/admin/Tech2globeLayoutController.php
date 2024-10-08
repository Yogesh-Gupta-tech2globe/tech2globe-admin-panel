<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsRole;
use App\Models\tech2globe_top_header;
use App\Models\tech2globe_middle_header;
use App\Models\tech2globe_header_category;
use App\Models\tech2globe_header_sub_category;
use App\Models\tech2globe_all_pages;
use App\Models\tech2globe_pages_category;
use App\Models\layout;
use App\Models\tech2globe_footer_category;
use App\Models\tech2globe_footer_sub_category;
use App\Models\file_data;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Image;
use Str;

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
                $subMenuHtml .= '<option value="">Select Sub Menu</option>';
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

    public function getPageCategory(Request $request){
        if($request->ajax()){
            $data = $request->all();
            $pageCategory = tech2globe_pages_category::where('category_id',$data['category_id'])->where('sub_category_id',$data['subCategory_id'])->get()->toArray();

            $pageCategoryHtml = '';

            if(!empty($pageCategory)){
                $pageCategoryHtml .= '<option value="">Select Page Category</option>';
                foreach($pageCategory as $row){
                    $pageCategoryHtml .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                }
            }else{
                $pageCategoryHtml = '<option>No Page Category Found in this Sub Menu</option>';
            }

            
            return response()->json($pageCategoryHtml);
        }
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

    // Controlling Header of Tech2globe Website
    public function header(Request $request)
    {
        Session::put('page','tech2globe_header');

        $mainMenu = tech2globe_header_category::get()->toArray();
        $subMenu = tech2globe_header_sub_category::get()->toArray();
        $allPages = tech2globe_all_pages::get()->toArray();
        $pagesCategory = tech2globe_pages_category::get()->toArray();
        // $topNavbar = tech2globe_top_header::find(1);
        // $middleNavbar = tech2globe_middle_header::find(1);
    
        //Set Admin/Subadmins Permissions for Layout Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'headfoot'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'headfoot'])->first()->toArray();
        }

    
        // $allPagesData = DB::table('tech2globe_header_category')
        //     ->leftJoin('tech2globe_header_sub_category', 'tech2globe_header_category.id', '=', 'tech2globe_header_sub_category.category_id')
        //     ->leftJoin('tech2globe_all_pages', 'tech2globe_header_sub_category.id', '=', 'tech2globe_all_pages.sub_category_id')
        //     ->select('tech2globe_header_category.categoryName as categoryName1', 'tech2globe_header_category.page_url as pageUrl1', 'tech2globe_header_sub_category.subCategoryName as categoryName2', 'tech2globe_header_sub_category.page_url as pageUrl2', 'tech2globe_all_pages.page_name as pageName', 'tech2globe_all_pages.page_url as pageUrl')
        //     ->get();

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

        return view('admin.tech2globeCmsLayout.header')->with(compact('pagesModule','mainMenu','subMenu','allPages','pagesCategory'));

    }

    // Controlling Header of Tech2globe Website
    public function mobileheader(Request $request)
    {
        Session::put('page','tech2globe_mobile_header');

        $mainMenu = tech2globe_header_category::get()->toArray();
        $subMenu = tech2globe_header_sub_category::get()->toArray();
        $allPages = tech2globe_all_pages::get()->toArray();
        $pagesCategory = tech2globe_pages_category::get()->toArray();
        // $topNavbar = tech2globe_top_header::find(1);
        // $middleNavbar = tech2globe_middle_header::find(1);
    
       //Set Admin/Subadmins Permissions for Layout Module
       $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'headfoot'])->count();
       $pagesModule = array();

       if(Auth::guard('admin')->user()->type=="admin"){
           $pagesModule['view_access'] = 1;
           $pagesModule['edit_access'] = 1;
           $pagesModule['full_access'] = 1;
       }else if($ModuleCount==0){
           $message = "This module is restricted for you!";
           return redirect('admin/dashboard')->with('error_message',$message);
       }else{
           $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'headfoot'])->first()->toArray();
       }


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



        return view('admin.tech2globeCmsLayout.mobileheader')->with(compact('pagesModule','mainMenu','subMenu','allPages','pagesCategory'));

    }

    // Controlling Footer of Tech2globe Website
    public function footer()
    {
        Session::put('page','tech2globe_footer');
        $footerPages = tech2globe_footer_sub_category::get()->toArray();
        $footerCategory = tech2globe_footer_category::get()->toArray();
        
    
        //Set Admin/Subadmins Permissions for Layout Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'headfoot'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'headfoot'])->first()->toArray();
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

        $fileData = file_data::get()->toArray();

        $allpageurl = DB::table('tech2globe_header_category')
            ->select('page_url', 'file_id')
            ->distinct()
            ->union(DB::table('tech2globe_header_sub_category')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_pages_category')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_all_pages')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_footer_sub_category')->select('page_url', 'file_id'))
            ->get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            // print_r($data); die;

            $rules = [
                'categoryName' => 'required|max:30',
            ];

            $customMessages = [
                'categoryName.required' => 'Main Menu name is required',
                'categoryName.max' => 'Main Menu name characters should not be greater than 30',
            ];

            $this->validate($request,$rules,$customMessages);

            $pageUrl = '';
            $fileid = null;

            if(!empty($data['file_id'])){

                if($id==""){
                    $rules = [
                        'file_id' => 'required',
                        'page_url' => 'required|max:35|unique:tech2globe_all_pages,page_url|unique:tech2globe_header_category,page_url|unique:tech2globe_header_sub_category,page_url|unique:tech2globe_pages_category,page_url',
                    ];
        
                    $customMessages = [
                        'file_id.required' => 'File Linked is required',
                        'page_url.required' => 'Page url is required',
                        'page_url.max' => 'Page Url characters should not be greater than 35',
                        'page_url.unique' => 'This Page url is already exist! Try a different one',
                    ]; 
    
                    $this->validate($request,$rules,$customMessages);    
                }else{
                    $rules = [
                        'file_id' => 'required',
                        'page_url' => 'required',
                    ];
        
                    $customMessages = [
                        'file_id.required' => 'File Linked is required',
                        'page_url.required' => 'Page url is required',
                    ]; 
    
                    $this->validate($request,$rules,$customMessages);    
                }
                
                $pageUrl = Str::slug($data['page_url']);
                $fileid = $data['file_id'];

                //Fetching old file data
                $fileDatabyIdOld = file_data::find($mainMenu['file_id']);

                //Fetching file data
                $fileDatabyId = file_data::find($fileid);

                // Managing a route dynamically
                $oldRouteContent='';
                if($id != '' && !empty($mainMenu['page_url']) && !empty($mainMenu['file_id'])){
                $oldRouteContent = '
                Route::get("/'.$mainMenu['page_url'].'", function () {

                    $data = ["pageName" => "'.$mainMenu['categoryName'].'"];
                    return view("'.$fileDatabyIdOld['file_slug'].'", $data);

                });';
                }

                $newRouteContent = '
                Route::get("/'.$pageUrl.'", function () {

                    $data = ["pageName" => "'.$data['categoryName'].'"];
                    return view("'.$fileDatabyId['file_slug'].'", $data);

                });';

                $routePath = base_path('routes/mainMenu.php');

                // Read the entire file
                $currentContent = file_get_contents($routePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldRouteContent, $newRouteContent, $currentContent);

                if($id != '' && $newContent !== $currentContent){
                    file_put_contents($routePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($routePath, $newRouteContent,FILE_APPEND | LOCK_EX);
                }

                if($id != '' && $mainMenu['file_id'] != $data['file_id'] && !empty($mainMenu['page_url']) && !empty($mainMenu['file_id'])){

                    $filelinkedStatusOld = $fileDatabyIdOld['linked_status'];
                    $filelinkedStatusOld--;
                    $fileDatabyIdOld->linked_status = $filelinkedStatusOld;
                    $fileDatabyIdOld->save();

                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }else{
                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }
            }

            if(empty($data['file_id']) && !empty($data['page_url2'])){
                $a = $data['page_url2'];
                $b = explode(',',$a);
                $pageUrl = $b[0];
                $fileid = $b[1];

                //Fetching old file data
                $fileDatabyIdOld = file_data::find($mainMenu['file_id']);

                //Fetching file data
                $fileDatabyId = file_data::find($fileid);

                if($id != '' && $mainMenu['file_id'] != $fileid && !empty($mainMenu['page_url']) && !empty($mainMenu['file_id'])){

                    $filelinkedStatusOld = $fileDatabyIdOld['linked_status'];
                    $filelinkedStatusOld--;
                    $fileDatabyIdOld->linked_status = $filelinkedStatusOld;
                    $fileDatabyIdOld->save();

                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }else{
                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }
            }

            $mainMenu->type = $data['customRadio'];
            $mainMenu->categoryName = $data['categoryName'];
            $mainMenu->page_url = $pageUrl;
            $mainMenu->file_id = $fileid;
            if($mainMenu->save()){
                activity($title)
                ->performedOn($mainMenu)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Header & Footer','submodule' => 'Main Menu'])
                ->log('');

                return redirect('admin/tech2globe-layout/header')->with('success_message',$message);
            }
            
        }

        return view('admin.tech2globeCmsLayout.add-edit-mainMenu')->with(compact('title','mainMenu','fileData','allpageurl'));
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
        $fileData = file_data::get()->toArray();

        $allpageurl = DB::table('tech2globe_header_category')
            ->select('page_url', 'file_id')
            ->distinct()
            ->union(DB::table('tech2globe_header_sub_category')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_pages_category')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_all_pages')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_footer_sub_category')->select('page_url', 'file_id'))
            ->get()->toArray();

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

            $pageUrl = '';
            $fileid = null;

            if(!empty($data['file_id'])){

                if($id==""){
                    $rules = [
                        'file_id' => 'required',
                        'page_url' => 'required|max:35|unique:tech2globe_all_pages,page_url|unique:tech2globe_header_category,page_url|unique:tech2globe_header_sub_category,page_url|unique:tech2globe_pages_category,page_url',
                    ];
        
                    $customMessages = [
                        'file_id.required' => 'File Linked is required',
                        'page_url.required' => 'Page url is required',
                        'page_url.max' => 'Page Url characters should not be greater than 35',
                        'page_url.unique' => 'This Page url is already exist! Try a different one',
                    ]; 
    
                    $this->validate($request,$rules,$customMessages);    
                }else{
                    $rules = [
                        'file_id' => 'required',
                        'page_url' => 'required',
                    ];
        
                    $customMessages = [
                        'file_id.required' => 'File Linked is required',
                        'page_url.required' => 'Page url is required',
                    ]; 
    
                    $this->validate($request,$rules,$customMessages);    
                }
                
                $pageUrl = Str::slug($data['page_url']);
                $fileid = $data['file_id'];

                //Fetching old file data
                $fileDatabyIdOld = file_data::find($subMenu['file_id']);

                //Fetching file data
                $fileDatabyId = file_data::find($fileid);

                // Managing a route dynamically
                $oldRouteContent='';
                if($id!="" && !empty($subMenu['page_url']) && !empty($subMenu['file_id'])){
                $oldRouteContent = '
                Route::get("/'.$subMenu['page_url'].'", function () {

                    $data = ["pageName" => "'.$subMenu['subCategoryName'].'"];
                    return view("'.$fileDatabyIdOld['file_slug'].'", $data);

                });';
                }

                $newRouteContent = '
                Route::get("/'.$pageUrl.'", function () {

                    $data = ["pageName" => "'.$data['subCategoryName'].'"];
                    return view("'.$fileDatabyId['file_slug'].'", $data);

                });';

                $routePath = base_path('routes/subMenu.php');

                // Read the entire file
                $currentContent = file_get_contents($routePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldRouteContent, $newRouteContent, $currentContent);

                if($id != '' && $newContent !== $currentContent){
                    file_put_contents($routePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($routePath, $newRouteContent,FILE_APPEND | LOCK_EX);
                }

                if($id != '' && $subMenu['file_id'] != $data['file_id'] && !empty($subMenu['page_url']) && !empty($msubMenu['file_id'])){

                    $filelinkedStatusOld = $fileDatabyIdOld['linked_status'];
                    $filelinkedStatusOld--;
                    $fileDatabyIdOld->linked_status = $filelinkedStatusOld;
                    $fileDatabyIdOld->save();

                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }else{
                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }
            }

            if(empty($data['file_id']) && !empty($data['page_url2'])){
                $a = $data['page_url2'];
                $b = explode(',',$a);
                $pageUrl = $b[0];
                $fileid = $b[1];

                //Fetching old file data
                $fileDatabyIdOld = file_data::find($subMenu['file_id']);

                //Fetching file data
                $fileDatabyId = file_data::find($fileid);

                if($id != '' && $subMenu['file_id'] != $fileid){

                    $filelinkedStatusOld = $fileDatabyIdOld['linked_status'];
                    $filelinkedStatusOld--;
                    $fileDatabyIdOld->linked_status = $filelinkedStatusOld;
                    $fileDatabyIdOld->save();

                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }else{
                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }
            }

            $subMenu->type = $data['customRadio'];
            $subMenu->category_id = $data['category_id'];
            $subMenu->subCategoryName = $data['subCategoryName'];
            $subMenu->page_url = $pageUrl;
            $subMenu->file_id = $fileid;
            if($subMenu->save()){
                activity($title)
                ->performedOn($subMenu)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Header & Footer','submodule' => 'Sub Menu'])
                ->log('');

                return redirect('admin/tech2globe-layout/header')->with('success_message',$message);
            }
        }

        return view('admin.tech2globeCmsLayout.add-edit-subMenu')->with(compact('title','subMenu','mainMenu','fileData','allpageurl'));
    }

    public function addEditNewPage(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add New Page";
            $allPage = new tech2globe_all_pages;
            $message = "New Page added Successfully";
        }else{
            $title = "Edit Existing Page";
            $allPage = tech2globe_all_pages::find($id);
            $message = "Page updated Successfully";
        }

        $mainMenu = tech2globe_header_category::get()->toArray();
        $subMenu = tech2globe_header_sub_category::get()->toArray();
        $pageCat = tech2globe_pages_category::get()->toArray();
        $fileData = file_data::get()->toArray();
        $allpageurl = DB::table('tech2globe_header_category')
            ->select('page_url', 'file_id')
            ->distinct()
            ->union(DB::table('tech2globe_header_sub_category')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_pages_category')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_all_pages')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_footer_sub_category')->select('page_url', 'file_id'))
            ->get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'category_id' => 'required',
                'sub_category_id' => 'required',
                'page_category_id' => 'required',
                'page_name' => 'required|max:60',
            ];

            $customMessages = [
                'category_id.required' => 'Main Menu is required',
                'sub_category_id.required' => 'Sub Menu is required',
                'page_category_id.required' => 'Page Category is required',
                'page_name.required' => 'Page Name is required',
                'page_name.max' => 'Page Name characters should not be greater than 60.',
            ];

            $this->validate($request,$rules,$customMessages);

            $pageUrl = '';
            $fileid = null;
            
            if(!empty($data['file_id'])){

                if($id==""){
                    $rules = [
                        'file_id' => 'required',
                        'page_url' => 'required|unique:tech2globe_all_pages,page_url|unique:tech2globe_header_category,page_url|unique:tech2globe_header_sub_category,page_url|unique:tech2globe_pages_category,page_url',
                    ];
        
                    $customMessages = [
                        'file_id.required' => 'File Linked is required',
                        'page_url.required' => 'Page url is required',
                        'page_url.unique' => 'This Page url is already exist! Try a different one',
                    ]; 
    
                    $this->validate($request,$rules,$customMessages);    
                }else{
                    $rules = [
                        'file_id' => 'required',
                        'page_url' => 'required',
                    ];
        
                    $customMessages = [
                        'file_id.required' => 'File Linked is required',
                        'page_url.required' => 'Page url is required',
                    ]; 
    
                    $this->validate($request,$rules,$customMessages);    
                }
                
                $pageUrl = Str::slug($data['page_url']);
                $fileid = $data['file_id'];

                //Fetching old file data
                $fileDatabyIdOld = file_data::find($allPage['file_id']);

                //Fetching file data
                $fileDatabyId = file_data::find($fileid);

                if($id==""){
                    $pageId = $allPage->select('id')->latest('id')->first();
                    $pageId = $pageId['id'];
                    $pageId++;
                }else{
                    $pageId = $allPage['id'];
                }

                // Managing a route dynamically
                $oldRouteContent='';
                if($id != ''){
                $oldRouteContent = '
                Route::get("/'.$allPage['page_url'].'", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",'.$pageId.')->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",'.$pageId.')->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",'.$pageId.')->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",'.$pageId.')->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",'.$pageId.')->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "'.$allPage['page_name'].'","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("'.$fileDatabyIdOld['file_slug'].'", $data);

                });';
                }

                $newRouteContent = '
                Route::get("/'.$pageUrl.'", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",'.$pageId.')->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",'.$pageId.')->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",'.$pageId.')->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",'.$pageId.')->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",'.$pageId.')->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "'.$data['page_name'].'","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("'.$fileDatabyId['file_slug'].'", $data);

                });';

                $routePath = base_path('routes/web.php');

                // Read the entire file
                $currentContent = file_get_contents($routePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldRouteContent, $newRouteContent, $currentContent);

                if($id != '' && $newContent !== $currentContent){
                    file_put_contents($routePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($routePath, $newRouteContent,FILE_APPEND | LOCK_EX);
                }

                if($id != '' && $allPage['file_id'] != $data['file_id']){

                    $filelinkedStatusOld = $fileDatabyIdOld['linked_status'];
                    $filelinkedStatusOld--;
                    $fileDatabyIdOld->linked_status = $filelinkedStatusOld;
                    $fileDatabyIdOld->save();

                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }else{
                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }
            }

            if(empty($data['file_id']) && !empty($data['page_url2'])){
                $a = $data['page_url2'];
                $b = explode(',',$a);
                $pageUrl = $b[0];
                $fileid = $b[1];

                //Fetching old file data
                $fileDatabyIdOld = file_data::find($allPage['file_id']);

                //Fetching file data
                $fileDatabyId = file_data::find($fileid);

                if($id != '' && $allPage['file_id'] != $fileid){

                    $filelinkedStatusOld = $fileDatabyIdOld['linked_status'];
                    $filelinkedStatusOld--;
                    $fileDatabyIdOld->linked_status = $filelinkedStatusOld;
                    $fileDatabyIdOld->save();

                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }else{
                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }
            }


            $allPage->type = $data['customRadio'];
            $allPage->category_id = $data['category_id'];
            $allPage->sub_category_id = $data['sub_category_id'];
            $allPage->page_category_id = $data['page_category_id'];
            $allPage->file_id = $fileid;
            $allPage->page_name = $data['page_name'];
            $allPage->page_url = $pageUrl;
            if($allPage->save()){
                activity($title)
                ->performedOn($allPage)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Header & Footer','submodule' => 'All Pages'])
                ->log('');

                return redirect('admin/tech2globe-layout/header')->with('success_message',$message);
            }
        }

        return view('admin.tech2globeCmsLayout.add-edit-newPage')->with(compact('title','subMenu','mainMenu','allPage','fileData','allpageurl','pageCat'));
    }

    public function addEditNewPageCategory(Request $request, $id=null)
    {
        if($id==""){
            $title = "Add Page Category";
            $category = new tech2globe_pages_category;
            $message = "New Page Category added Successfully";
        }else{
            $title = "Edit Existing Page Category";
            $category = tech2globe_pages_category::find($id);
            $message = "Page Category updated Successfully";
        }

        $mainMenu = tech2globe_header_category::get()->toArray();
        $subMenu = tech2globe_header_sub_category::get()->toArray();
        $fileData = file_data::get()->toArray();
        $allpageurl = DB::table('tech2globe_header_category')
            ->select('page_url', 'file_id')
            ->distinct()
            ->union(DB::table('tech2globe_header_sub_category')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_pages_category')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_all_pages')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_footer_sub_category')->select('page_url', 'file_id'))
            ->get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'category_id' => 'required',
                'sub_category_id' => 'required',
                'name' => 'required|max:30',
            ];

            $customMessages = [
                'category_id.required' => 'Main Menu is required',
                'sub_category_id.required' => 'Sub Menu is required',
                'name.required' => 'Page Name is required',
                'name.max' => 'Page Name characters should not be greater than 30.',
            ];

            $this->validate($request,$rules,$customMessages);

            $pageUrl = '';
            $fileid = null;

            if(!empty($data['file_id'])){

                if($id==""){
                    $rules = [
                        'file_id' => 'required',
                        'page_url' => 'required|max:35|unique:tech2globe_all_pages,page_url|unique:tech2globe_header_category,page_url|unique:tech2globe_header_sub_category,page_url|unique:tech2globe_pages_category,page_url',
                    ];
        
                    $customMessages = [
                        'file_id.required' => 'File Linked is required',
                        'page_url.required' => 'Page url is required',
                        'page_url.max' => 'Page Url characters should not be greater than 35',
                        'page_url.unique' => 'This Page url is already exist! Try a different one',
                    ]; 
    
                    $this->validate($request,$rules,$customMessages);    
                }else{
                    $rules = [
                        'file_id' => 'required',
                        'page_url' => 'required',
                    ];
        
                    $customMessages = [
                        'file_id.required' => 'File Linked is required',
                        'page_url.required' => 'Page url is required',
                    ]; 
    
                    $this->validate($request,$rules,$customMessages);    
                }
                
                $pageUrl = Str::slug($data['page_url']);
                $fileid = $data['file_id'];

                //Fetching old file data
                $fileDatabyIdOld = file_data::find($category['file_id']);

                //Fetching file data
                $fileDatabyId = file_data::find($fileid);

                // Managing a route dynamically
                $oldRouteContent='';
                if($id != ''){
                $oldRouteContent = '
                Route::get("/'.$category['page_url'].'", function () {

                    $data = ["pageName" => "'.$category['name'].'"];
                    return view("'.$fileDatabyIdOld['file_slug'].'", $data);

                });';
                }

                $newRouteContent = '
                Route::get("/'.$pageUrl.'", function () {

                    $data = ["pageName" => "'.$data['name'].'"];
                    return view("'.$fileDatabyId['file_slug'].'", $data);

                });';

                $routePath = base_path('routes/web.php');

                // Read the entire file
                $currentContent = file_get_contents($routePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldRouteContent, $newRouteContent, $currentContent);

                if($id != '' && $newContent !== $currentContent){
                    file_put_contents($routePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($routePath, $newRouteContent,FILE_APPEND | LOCK_EX);
                }

                if($id != '' && $category['file_id'] != $data['file_id']){

                    $filelinkedStatusOld = $fileDatabyIdOld['linked_status'];
                    $filelinkedStatusOld--;
                    $fileDatabyIdOld->linked_status = $filelinkedStatusOld;
                    $fileDatabyIdOld->save();

                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }else{
                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }
            }

            if(empty($data['file_id']) && !empty($data['page_url2'])){
                $a = $data['page_url2'];
                $b = explode(',',$a);
                $pageUrl = $b[0];
                $fileid = $b[1];

                //Fetching old file data
                $fileDatabyIdOld = file_data::find($category['file_id']);

                //Fetching file data
                $fileDatabyId = file_data::find($fileid);

                if($id != '' && $category['file_id'] != $fileid){

                    $filelinkedStatusOld = $fileDatabyIdOld['linked_status'];
                    $filelinkedStatusOld--;
                    $fileDatabyIdOld->linked_status = $filelinkedStatusOld;
                    $fileDatabyIdOld->save();

                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }else{
                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }
            }

            $category->type = $data['customRadio'];
            $category->category_id = $data['category_id'];
            $category->sub_category_id = $data['sub_category_id'];
            $category->file_id = $fileid;
            $category->name = $data['name'];
            $category->page_url = $pageUrl;
            if($category->save()){
                activity($title)
                ->performedOn($category)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Header & Footer','submodule' => 'Page Category'])
                ->log('');
            
                return redirect('admin/tech2globe-layout/header')->with('success_message',$message);
            }
        }

        return view('admin.tech2globeCmsLayout.add-edit-page-category')->with(compact('title','subMenu','mainMenu','category','fileData','allpageurl'));
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

            if(tech2globe_header_category::where('id',$data['mainMenu_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(tech2globe_header_category::find($data['mainMenu_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Header & Footer','submodule' => 'Main Menu'])
                ->log('Status');

                return response()->json(['status'=>$status, 'mainMenu_id'=>$data['mainMenu_id']]);
            }  
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

            if(tech2globe_header_sub_category::where('id',$data['subMenu_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(tech2globe_header_sub_category::find($data['subMenu_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Header & Footer','submodule' => 'Sub Menu'])
                ->log('Status');
            }

            return response()->json(['status'=>$status, 'subMenu_id'=>$data['subMenu_id']]);
        }
    }

    public function updatePageCategory(Request $request){
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(tech2globe_pages_category::where('id',$data['pageCate_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(tech2globe_pages_category::find($data['pageCate_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Header & Footer','submodule' => 'Page Category'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'pageCate_id'=>$data['pageCate_id']]);
        }
    }

    public function updateAllPages(Request $request){
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(tech2globe_all_pages::where('id',$data['allPages_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(tech2globe_all_pages::find($data['allPages_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Header & Footer','submodule' => 'All Pages'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'allPages_id'=>$data['allPages_id']]);
        }
    }

    public function checkPageUrl(Request $request){
        $data = $request->all();
        
        if(tech2globe_all_pages::where('page_url', $data['pageUrl'])->exists() || tech2globe_header_category::where('page_url', $data['pageUrl'])->exists() || tech2globe_header_sub_category::where('page_url', $data['pageUrl'])->exists() || tech2globe_pages_category::where('page_url', $data['pageUrl'])->exists() || tech2globe_footer_sub_category::where('page_url', $data['pageUrl'])->exists() || layout::where('page_url', $data['pageUrl'])->exists()){
            return false;
        }else{
            return true;
        }
    }

    public function addEditFooterPages(Request $request, $id=null)
    {
        $footerCategory = tech2globe_footer_category::get()->toArray();

        $fileData = file_data::get()->toArray();

        $allpageurl = DB::table('tech2globe_header_category')
            ->select('page_url', 'file_id')
            ->distinct()
            ->union(DB::table('tech2globe_header_sub_category')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_pages_category')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_all_pages')->select('page_url', 'file_id'))
            ->union(DB::table('tech2globe_footer_sub_category')->select('page_url', 'file_id'))
            ->get()->toArray();

        // $allPagesData = DB::table('tech2globe_header_category')
        //     ->leftJoin('tech2globe_header_sub_category', 'tech2globe_header_category.id', '=', 'tech2globe_header_sub_category.category_id')
        //     ->leftJoin('tech2globe_all_pages', 'tech2globe_header_sub_category.id', '=', 'tech2globe_all_pages.sub_category_id')
        //     ->select('tech2globe_header_category.categoryName as categoryName1', 'tech2globe_header_category.page_url as pageUrl1', 'tech2globe_header_sub_category.subCategoryName as categoryName2', 'tech2globe_header_sub_category.page_url as pageUrl2', 'tech2globe_all_pages.page_name as pageName', 'tech2globe_all_pages.page_url as pageUrl')
        //     ->get();

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

            $rules = [
                'category_id' => 'required',
                'pageName' => 'required|max:20',
                'customRadio' => 'required',
            ];

            $customMessages = [
                'category_id.required' => 'Category is required',
                'pageName.required' => 'Page Name is required',
                'pageName.max' => 'Page Name not be greater than 20 Letters',
                'customRadio.required' => 'Linking of any url is required',
            ];

            $this->validate($request,$rules,$customMessages);

            $pageUrl = '';
            $fileid = null;

            // if(!empty($data['file_id'])){
            //     $rules = [
            //         'file_id' => 'required',
            //         'page_url' => 'required|max:35|unique:tech2globe_all_pages,page_url|unique:tech2globe_header_category,page_url|unique:tech2globe_header_sub_category,page_url',
            //     ];
    
            //     $customMessages = [
            //         'file_id.required' => 'File Linked is required',
            //         'page_url.required' => 'Page url is required',
            //         'page_url.max' => 'Page Url characters should not be greater than 35',
            //         'page_url.unique' => 'This Page url is already exist! Try a different one',
            //     ]; 

            //     $this->validate($request,$rules,$customMessages);

            //     $pageUrl = Str::slug($data['page_url']);
            //     $fileid = $data['file_id'];

            //     //Fetching file data
            //     $fileDatabyId = file_data::find($fileid);

            //     // Adding a route dynamically
            //     $routeContent = '
            //     Route::get("/'.$pageUrl.'", function () {

            //         $data = ["pageName" => "'.$data['pageName'].'"];
            //         return view("'.$fileDatabyId['file_slug'].'", $data);

            //     });';

            //     $routePath = base_path('routes/web.php');
            //     file_put_contents($routePath, $routeContent,FILE_APPEND | LOCK_EX);

            //     $filelinkedStatus = $fileDatabyId['linked_status'];
            //     $filelinkedStatus++;
            //     $fileDatabyId->linked_status = $filelinkedStatus;
            //     $fileDatabyId->save();
            // }

            // if(empty($data['file_id']) && !empty($data['page_url2'])){
            //     $a = $data['page_url2'];
            //     $b = explode(',',$a);
            //     $pageUrl = $b[0];
            //     $fileid = $b[1];

            //     //Fetching file data
            //     $fileDatabyId = file_data::find($fileid);

            //     $filelinkedStatus = $fileDatabyId['linked_status'];
            //     $filelinkedStatus++;
            //     $fileDatabyId->linked_status = $filelinkedStatus;
            //     $fileDatabyId->save();
            // }

            if(!empty($data['file_id'])){

                if($id==""){
                    $rules = [
                        'file_id' => 'required',
                        'page_url' => 'required|max:35|unique:tech2globe_all_pages,page_url|unique:tech2globe_header_category,page_url|unique:tech2globe_header_sub_category,page_url|unique:tech2globe_pages_category,page_url',
                    ];
        
                    $customMessages = [
                        'file_id.required' => 'File Linked is required',
                        'page_url.required' => 'Page url is required',
                        'page_url.max' => 'Page Url characters should not be greater than 35',
                        'page_url.unique' => 'This Page url is already exist! Try a different one',
                    ]; 
    
                    $this->validate($request,$rules,$customMessages);    
                }else{
                    $rules = [
                        'file_id' => 'required',
                        'page_url' => 'required',
                    ];
        
                    $customMessages = [
                        'file_id.required' => 'File Linked is required',
                        'page_url.required' => 'Page url is required',
                    ]; 
    
                    $this->validate($request,$rules,$customMessages);    
                }
                
                $pageUrl = Str::slug($data['page_url']);
                $fileid = $data['file_id'];

                //Fetching old file data
                $fileDatabyIdOld = file_data::find($footerPages['file_id']);

                //Fetching file data
                $fileDatabyId = file_data::find($fileid);

                // Managing a route dynamically
                $oldRouteContent='';
                if($id != ''){
                $oldRouteContent = '
                Route::get("/'.$footerPages['page_url'].'", function () {

                    $data = ["pageName" => "'.$footerPages['sub_category_name'].'"];
                    return view("'.$fileDatabyIdOld['file_slug'].'", $data);

                });';
                }

                $newRouteContent = '
                Route::get("/'.$pageUrl.'", function () {

                    $data = ["pageName" => "'.$data['pageName'].'"];
                    return view("'.$fileDatabyId['file_slug'].'", $data);

                });';

                $routePath = base_path('routes/web.php');

                // Read the entire file
                $currentContent = file_get_contents($routePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldRouteContent, $newRouteContent, $currentContent);

                if($id != '' && $newContent !== $currentContent){
                    file_put_contents($routePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($routePath, $newRouteContent,FILE_APPEND | LOCK_EX);
                }

                if($id != '' && $footerPages['file_id'] != $data['file_id']){

                    $filelinkedStatusOld = $fileDatabyIdOld['linked_status'];
                    $filelinkedStatusOld--;
                    $fileDatabyIdOld->linked_status = $filelinkedStatusOld;
                    $fileDatabyIdOld->save();

                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }else{
                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }
            }

            if(empty($data['file_id']) && !empty($data['page_url2'])){
                $a = $data['page_url2'];
                $b = explode(',',$a);
                $pageUrl = $b[0];
                $fileid = $b[1];

                //Fetching old file data
                $fileDatabyIdOld = file_data::find($footerPages['file_id']);

                //Fetching file data
                $fileDatabyId = file_data::find($fileid);

                if($id != '' && $footerPages['file_id'] != $fileid){

                    $filelinkedStatusOld = $fileDatabyIdOld['linked_status'];
                    $filelinkedStatusOld--;
                    $fileDatabyIdOld->linked_status = $filelinkedStatusOld;
                    $fileDatabyIdOld->save();

                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }else{
                    $filelinkedStatusNew = $fileDatabyId['linked_status'];
                    $filelinkedStatusNew++;
                    $fileDatabyId->linked_status = $filelinkedStatusNew;
                    $fileDatabyId->save();
                }
            }

            $footerPages->type = $data['customRadio'];
            $footerPages->category_id = $data['category_id'];
            $footerPages->sub_category_name = $data['pageName'];
            $footerPages->page_url = $pageUrl;
            $footerPages->file_id = $fileid;
            if($footerPages->save()){
                activity($title)
                ->performedOn($footerPages)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Header & Footer','submodule' => 'Footer'])
                ->log('');

                return redirect('admin/tech2globe-layout/footer')->with('success_message',$message);
            }
        }

        return view('admin.tech2globeCmsLayout.add-edit-footerPages')->with(compact('title','footerPages','footerCategory','allpageurl','fileData'));
    }

    public function updateFooterPages(Request $request){
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            if(tech2globe_footer_sub_category::where('id',$data['footerPages_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(tech2globe_footer_sub_category::find($data['footerPages_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'Header & Footer','submodule' => 'Footer'])
                ->log('Status');
            }
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
