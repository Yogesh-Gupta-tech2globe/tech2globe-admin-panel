<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\landing_pages;
use App\Models\AdminsRole;
use App\Models\layout;
use Illuminate\Http\Request;
use Session;
use Auth;
use Image;
use Str;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Handling New Landing Page data

        if($request->isMethod('post')){
            $data = $request->all();
            $layout = new layout;
            $landingPage = new landing_pages;
            $message = "Good! Your Page is Live Now. Please Create Remaining Sections.";

            $rules = [
                'page_name' => 'required',
                'page_url' => 'required|unique:layout,page_url',
                'favicon_icon' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
            ];

            $customMessages = [
                'page_name.required' => 'Page Name is required',
                'page_url.required' => 'Page URL is required',
                'page_url.unique' => 'This Page url is already exist! Try a different one',
                'favicon_icon.required' => 'Favicon Icon is required',
                'favicon_icon.image' => 'Valid Favicon Icon is required',
                'favicon_icon.mimes' => 'Favicon Icon should be in jpg,jpeg,gif,svg,png format',
                'favicon_icon.max' => 'Favicon Icon size should not be greater than 1 MB',
                'logo.required' => 'Logo Icon is required',
                'logo.image' => 'Valid Logo is required',
                'logo.mimes' => 'Logo should be in jpg,jpeg,gif,svg,png format',
                'logo.max' => 'Logo size should not be greater than 1 MB',
            ];

            $this->validate($request,$rules,$customMessages);

            $slug = Str::slug($data['page_url']);

            if($request->hasFile('favicon_icon')){
                $image_tmp = $request->file('favicon_icon');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $faviconName = rand(111,98999).'.'.$extension;
                    $image_path = 'images/favicon-icon/'.$faviconName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else{
                $faviconName = "";
            }

            if($request->hasFile('logo')){
                $image_tmp = $request->file('logo');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $logoName = rand(111,98999).'.'.$extension;
                    $image_path = 'images/logo/'.$logoName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else{
                $logoName = "";
            }

            $fileContent = '<!DOCTYPE html>
                            <html lang="en">
                            
                            <head>
                                <meta charset="UTF-8">
                                <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
                            
                                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                <meta property="title" content="'.$data['meta_title'].'">
                                <meta name="description" content="'.$data['meta_description'].'" />
                                <meta name="keywords" content="'.$data['meta_keywords'].'">
                                <meta name="author" content="tech2globe">
                                <link rel="icon" type="image/png" sizes="32x32" href="{{ url("images/favicon-icon/'.$faviconName.'") }}">
                                <title>'.$data['page_name'].'</title>
                                <link rel="stylesheet" href="{{ url("landing_page/css/style.css") }}">
                                <!-- bootstrap5 cdn -->
                                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                            
                            
                                <!-- slick cdn css -->
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                            
                                <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
                            
                                
                            </head>
                            
                            <body>

                <header class="main-header bg-white position-fixed w-100 start-0 top-0">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container">
                            <a class="navbar-brand w-25" href="#"><img width="auto" height="50px" src="{{ url("images/logo/'.$logoName.'") }}" alt=""></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#our-services">What We Do</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#why-choose">Why Choose Tech2Globe</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#our-customers">Our Customers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#our-contact">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>';

            $filePath = resource_path('views/landing-page/'.$slug.'.blade.php');

            //Creating the file
            file_put_contents($filePath, $fileContent);

            // Adding a route dynamically
            $routeContent = "Route::get('/".$slug."', function () {
                return view('landing-page/".$slug."');
            });";

            $routePath = base_path('routes/web.php');
            file_put_contents($routePath, $routeContent,FILE_APPEND | LOCK_EX);


            $layout->page_name = $data['page_name'];
            $layout->page_url = $slug;
            $layout->meta_title = $data['meta_title'];
            $layout->meta_description = $data['meta_description'];
            $layout->meta_keywords = $data['meta_keywords'];
            $layout->favicon_icon = $faviconName;
            $layout->logo = $logoName;
            $layout->save();

            $landingPage->layout_id = layout::latest()->first()->id;
            $landingPage->section1_id = 1;
            $landingPage->menu1 = "What We Do";
            $landingPage->menu1_link = "our-services";
            $landingPage->menu2 = "Why Choose Tech2Globe";
            $landingPage->menu2_link = "why-choose";
            $landingPage->menu3 = "Our Customers";
            $landingPage->menu3_link = "our-customers";
            $landingPage->menu4 = "Contact Us";
            $landingPage->menu4_link = "our-contact";
            $landingPage->save();
            return redirect('admin/all-layout')->with('success_message',$message);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id,Request $request)
    {
        Session::put('page','all_layout');

        $layout = layout::find($id);

        if(landing_pages::where('layout_id', $id)->exists()){
            $landingPage = landing_pages::where('layout_id',$id)->first();
        }


        if($request->isMethod('post')){
            $data = $request->all();

            if(array_key_exists('section1', $data) && $landingPage['status1']==1){

                $message = "Section 1 updated Successfully!";

                //Updating Logo Image
                if(!empty($layout['logo']) && !empty($data['logo'])){

                       
                    $logoimagePath = public_path('images/logo/'.$layout['logo']);
    
                    if(file_exists($logoimagePath)){
                        if(unlink($logoimagePath)){

                            if($request->hasFile('logo')){
                                $image_tmp = $request->file('logo');
                                if($image_tmp->isValid()){
                                    //Get Image Extension
                                    $extension = $image_tmp->getClientOriginalExtension();
                                    //Generate New Image Name
                                    $logoName = rand(111,98999).'.'.$extension;
                                    $image_path = 'images/logo/'.$logoName;
                                    Image::make($image_tmp)->save($image_path);
                                }
                            } 
                        }else{
                            return redirect()->back()->with('error_message','There is some error on deleting Logo Image!');
                        }
                    }else{
                        return redirect()->back()->with('error_message','Logo Image not found! Please contact Admin');
                    }
                }else{
                    $logoName = $layout['logo'];
                }

                //Updating Favicon Icon Image
                // if(!empty($layout['favicon_icon']) && !empty($data['favicon_icon'])){

                       
                //     $faviconimagePath = public_path('images/favicon-icon/'.$layout['favicon_icon']);
    
                //     if(file_exists($faviconimagePath)){
                //         if(unlink($faviconimagePath)){

                //             if($request->hasFile('favicon_icon')){
                //                 $image_tmp = $request->file('favicon_icon');
                //                 if($image_tmp->isValid()){
                //                     //Get Image Extension
                //                     $extension = $image_tmp->getClientOriginalExtension();
                //                     //Generate New Image Name
                //                     $faviconName = rand(111,98999).'.'.$extension;
                //                     $image_path = 'images/favicon-icon/'.$faviconName;
                //                     Image::make($image_tmp)->save($image_path);
                //                 }

                //                 $layout->favicon_icon = $faviconName;
                //                 $layout->save();
                //             } 
                //         }else{
                //             return redirect()->back()->with('error_message','There is some error on deleting Logo Image!');
                //         }
                //     }else{
                //         return redirect()->back()->with('error_message','Logo Image not found! Please contact Admin');
                //     }
                // }

                //File old section Content
               
                $oldSectionContent =
                '<header class="main-header bg-white position-fixed w-100 start-0 top-0">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container">
                            <a class="navbar-brand w-25" href="#"><img width="auto" height="50px" src="{{ url("images/logo/' . $layout['logo'] . '") }}" alt=""></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#' . $landingPage['menu1_link'] . '">' . $landingPage['menu1'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu2_link'] . '">' . $landingPage['menu2'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu3_link'] . '">' . $landingPage['menu3'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu4_link'] . '">' . $landingPage['menu4'] . '</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>';

                //File new section Content
                $newSectionContent =
                '<header class="main-header bg-white position-fixed w-100 start-0 top-0">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container">
                            <a class="navbar-brand w-25" href="#"><img width="auto" height="50px" src="{{ url("images/logo/' . $logoName . '") }}" alt=""></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#' . Str::slug($data['menu1']) . '">' . $data['menu1'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . Str::slug($data['menu2']) . '">' . $data['menu2'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . Str::slug($data['menu3']) . '">' . $data['menu3'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . Str::slug($data['menu4']) . '">' . $data['menu4'] . '</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>';

                // echo $oldSectionContent;
                //echo $newSectionContent; die;

                $filePath = resource_path('views/landing-page/' . $layout['page_url'] . '.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
                    
                //Write the updated content back to the file
                if (!empty($landingPage['section1_id'])) {
                    file_put_contents($filePath, $newContent, LOCK_EX);
                } 
                
                $layout->logo = $logoName;
                $layout->save();

                $landingPage->layout_id = $id;
                $landingPage->section1_id = 1;
                $landingPage->menu1 = $data['menu1'];
                $landingPage->menu1_link = Str::slug($data['menu1']);
                $landingPage->menu2 = $data['menu2'];
                $landingPage->menu2_link = Str::slug($data['menu2']);
                $landingPage->menu3 = $data['menu3'];
                $landingPage->menu3_link = Str::slug($data['menu3']);
                $landingPage->menu4 = $data['menu4'];
                $landingPage->menu4_link = Str::slug($data['menu4']);
                $landingPage->save();
                return redirect('admin/create-landing-pages/'.$id.'')->with('success_message',$message);
            }

            if(array_key_exists('section2', $data) && $landingPage['status2']==1){

                $message = "Section 2 updated Successfully!";

                //Updating Banner Background Image
                if(!empty($data['background_image2'])){

                    //Removing Previous Banner Background Image
                    if(!empty($landingPage['background_image2'])){
                        $backgroundimagePath = public_path('images/background/'.$landingPage['background_image2']);
    
                        if(file_exists($backgroundimagePath)){
                            if(unlink($backgroundimagePath)){

                            }else{
                                return redirect()->back()->with('error_message','There is some error on deleting Banner Background Image!');
                            }
                        }else{
                            return redirect()->back()->with('error_message','Banner Background Image not found! Please contact Admin');
                        }
                    }

                    if($request->hasFile('background_image2')){
                        $image_tmp = $request->file('background_image2');
                        if($image_tmp->isValid()){
                            //Get Image Extension
                            $extension = $image_tmp->getClientOriginalExtension();
                            //Generate New Image Name
                            $backgroundImage = rand(111,98999).'.'.$extension;
                            $image_path = 'images/background/'.$backgroundImage;
                            Image::make($image_tmp)->save($image_path);
                        }
                    } 
                }else{
                    $backgroundImage = $landingPage['background_image2'];
                }

                //Updating Banner Upper Image
                if(!empty($data['banner_image2'])){

                    // Removing Previous Banner Upper Image   
                    if(!empty($landingPage['banner_image2'])){
                        $bannerimagePath = public_path('images/banner/'.$landingPage['banner_image2']);
    
                        if(file_exists($bannerimagePath)){
                            if(unlink($bannerimagePath)){

                            }else{
                                return redirect()->back()->with('error_message','There is some error on deleting Banner Upper Image!');
                            }
                        }else{
                            return redirect()->back()->with('error_message','Banner Upper Image not found! Please contact Admin');
                        }
                    }

                    if($request->hasFile('banner_image2')){
                        $image_tmp = $request->file('banner_image2');
                        if($image_tmp->isValid()){
                            //Get Image Extension
                            $extension = $image_tmp->getClientOriginalExtension();
                            //Generate New Image Name
                            $bannerImage = rand(111,98999).'.'.$extension;
                            $image_path = 'images/banner/'.$bannerImage;
                            Image::make($image_tmp)->save($image_path);
                        }
                    } 
                }else{
                    $bannerImage = $landingPage['banner_image2'];
                }

                
                //File old section Content
                $oldSectionContent = '
                <!-- hero section start -->
                <style>
                    .section-a {
                        background: url("images/background/'.$landingPage['background_image2'].'");
                        background-size: cover;
                        width: 100%;
                    }
                </style>
                <section class="section-a">
                        <div class="container">
                            <div class="row sub-section-a d-flex justify-content-between align-items-center">
                                <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-xs-12">
                                    <h1 class="text-dark main-heading">'.$landingPage['title2'].'</h1>
                                    <p class="" style="color: #f26e4f;">'.$landingPage['sub_title2'].'</p>
                                    <div class="button-container">
                                        <a href="#'.$landingPage['menu4_link'].'" class="main-button">'.$landingPage['button1'].'</a>
                                        <a href="tel:+1-250-206-8787" class="main-button call-us-btn">'.$landingPage['button2'].'</a>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-xs-12">
                                    <figure class="w-100">
                                        <img class="w-100" style="border-radius: 20px; height: 300px;" src="{{ url("images/banner/'.$landingPage['banner_image2'].'") }}" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                </section>
                <!-- hero section end -->';

                //File new section Content
                $newSectionContent = '
                <!-- hero section start -->
                <style>
                    .section-a {
                        background: url("images/background/'.$backgroundImage.'");
                        background-size: cover;
                        width: 100%;
                    }
                </style>
                <section class="section-a">
                        <div class="container">
                            <div class="row sub-section-a d-flex justify-content-between align-items-center">
                                <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-xs-12">
                                    <h1 class="text-dark main-heading">'.$data['title2'].'</h1>
                                    <p class="" style="color: #f26e4f;">'.$data['sub_title2'].'</p>
                                    <div class="button-container">
                                        <a href="#'.$landingPage['menu4_link'].'" class="main-button">'.$data['button1'].'</a>
                                        <a href="tel:+1-250-206-8787" class="main-button call-us-btn">'.$data['button2'].'</a>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-xs-12">
                                    <figure class="w-100">
                                        <img class="w-100" style="border-radius: 20px; height: 300px;" src="{{ url("images/banner/'.$bannerImage.'") }}" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                </section>
                <!-- hero section end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);

                // echo $newContent; die;
            
                // Write the updated content back to the file
                if(!empty($landingPage['section2_id'])){
                    file_put_contents($filePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($filePath, $newSectionContent,FILE_APPEND | LOCK_EX);
                }        

                $landingPage->layout_id = $id;
                $landingPage->section2_id = 2;
                $landingPage->title2 = $data['title2'];
                $landingPage->sub_title2 = $data['sub_title2'];
                $landingPage->button1 = $data['button1'];
                $landingPage->button1_link = Str::slug($data['button1']);
                $landingPage->button2 = $data['button2'];
                $landingPage->button2_link = Str::slug($data['button2']);
                $landingPage->background_image2 = $backgroundImage;
                $landingPage->banner_image2 = $bannerImage;
                $landingPage->save();
                return redirect('admin/create-landing-pages/'.$id.'')->with('success_message',$message);
            }

            if(array_key_exists('section3', $data) && $landingPage['status3']==1){

                $message = "Section 3 updated Successfully!";

                // echo "<pre>"; print_r($data);

                $serviceName = [];
                $serviceDescription = [];
                if(!empty(explode(",",$landingPage['service_icon3']))){
                    $serviceIcon = explode(",",$landingPage['service_icon3']);
                }else{
                    $serviceIcon = [];
                }

                foreach($data as $content => $value){

                    if(str_contains($content,'serviceName')){
                        array_push($serviceName,$value);
                    }else if(str_contains($content,'serviceDescription')){
                        array_push($serviceDescription,$value);
                    }else if(str_contains($content,'serviceIcon')){
                        
                        if($request->hasFile($content)){
                            $image_tmp = $request->file($content);
                            if($image_tmp->isValid()){
                                //Get Image Extension
                                $extension = $image_tmp->getClientOriginalExtension();
                                //Generate New Image Name
                                $serviceImage = rand(111,98999).'.'.$extension;
                                $image_path = 'images/icons/'.$serviceImage;
                                Image::make($image_tmp)->save($image_path);
                            }
                        }
                        array_push($serviceIcon,$serviceImage);
                    }
                }

                            
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

                $previousServiceIcon = explode(",",$landingPage['service_icon3']);

                if(!empty($previousServiceIcon) && empty($serviceIcon)){
                    // Sample arrays
                    $array1 = explode("+++",$landingPage['service_name3']);
                    $array2 = $serviceName;

                    // Find the missing values
                    $missingIndexes = findMissingValues($array1, $array2);
                    array_splice($previousServiceIcon,implode(', ', $missingIndexes),1);

                    $serviceIcon = $previousServiceIcon;
                }


                //  echo "<pre>"; print_r($previousServiceIcon); die;

                $implodeServiceName = implode("+++",$serviceName);
                $implodeServiceDescription = implode("+++",$serviceDescription);
                $implodeServiceIcon = implode(",",$serviceIcon);

                $explodeServiceName = explode("+++",$landingPage['service_name3']);
                $explodeServiceDescription = explode("+++",$landingPage['service_description3']);
                $explodeServiceIcon = explode(",",$landingPage['service_icon3']);

                //File old section Content
                $oldSectionContent = '
                <!-- service section start -->
                    <section class="section-b" id="our-services">
                        <div class="container padding-block-container">
                            <div class="row d-flex justify-content-center">
                                <h3 class="text-center heading-3">'.$landingPage['title3'].'</h3>
                                <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 20%;"></span>
                                <p class="text-center pt-2 pb-2">'.$landingPage['description3'].'</p>';
                               
                                for($i=0; $i<count($explodeServiceName); $i++){
                                $oldSectionContent .= '<div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                    <div class="card">
                                        <div class="heading-container">
                                            <figure class="icon w-25">
                                                <img class="w-100" src="{{ url("images/icons/'.$explodeServiceIcon[$i].'") }}" alt="">
                                            </figure>
                                            <div class="heading-4">
                                                <h4 class="text-dark text-center">'.$explodeServiceName[$i].'</h4>
                                            </div>
                                        </div>
                                        <div class="content-container text-center">
                                            <p class="text-dark">'.$explodeServiceDescription[$i].'</p>
                                            <a href="'.Str::slug($explodeServiceName[$i]).'" class="sub-button">Read More</a>
                                        </div>
                                    </div>
                                </div>';
                                }
                               

                            $oldSectionContent .= '</div>
                        </div>
                    </section>
                <!-- service section end -->';


                //File new section Content
                $newSectionContent = '
                <!-- service section start -->
                    <section class="section-b" id="our-services">
                        <div class="container padding-block-container">
                            <div class="row d-flex justify-content-center">
                                <h3 class="text-center heading-3">'.$data['title3'].'</h3>
                                <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 20%;"></span>
                                <p class="text-center pt-2 pb-2">'.$data['description3'].'</p>';
                               
                                for($i=0; $i<count($serviceName); $i++){
                                $newSectionContent .= '<div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                    <div class="card">
                                        <div class="heading-container">
                                            <figure class="icon w-25">
                                                <img class="w-100" src="{{ url("images/icons/'.$serviceIcon[$i].'") }}" alt="">
                                            </figure>
                                            <div class="heading-4">
                                                <h4 class="text-dark text-center">'.$serviceName[$i].'</h4>
                                            </div>
                                        </div>
                                        <div class="content-container text-center">
                                            <p class="text-dark">'.$serviceDescription[$i].'</p>
                                            <a href="'.Str::slug($serviceName[$i]).'" class="sub-button">Read More</a>
                                        </div>
                                    </div>
                                </div>';
                                }
                               

                            $newSectionContent .= '</div>
                        </div>
                    </section>
                <!-- service section end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                if(!empty($landingPage['section3_id'])){
                    file_put_contents($filePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($filePath, $newSectionContent,FILE_APPEND | LOCK_EX);
                }

                
                $landingPage->layout_id = $id;
                $landingPage->section3_id = 3;
                $landingPage->title3 = $data['title3'];
                $landingPage->description3 = $data['description3'];
                $landingPage->service_name3 = $implodeServiceName;
                $landingPage->service_description3 = $implodeServiceDescription;
                $landingPage->service_icon3 = $implodeServiceIcon;
                $landingPage->save();
                return redirect('admin/create-landing-pages/'.$id.'')->with('success_message',$message);
            }

            if(array_key_exists('section4', $data) && $landingPage['status4']==1){

                $message = "Section 4 updated Successfully!";

                //File old section Content
                $oldSectionContent = '
                <!-- why should you hire start -->
                    <section class="section-c padding-block-container" id="why-choose">
                        <h3 class="text-center heading-3">'.$landingPage['title4'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px" style="width: 40%;"></span>

                        <div class="container">
                            <div id="counter" class="row">
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box1heading'].'</span>
                                        <p class="text">'.$landingPage['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box2heading'].'</span>
                                        <p class="text">'.$landingPage['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box3heading'].'</span>
                                        <p class="text">'.$landingPage['box3content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box4heading'].'</span>
                                        <p class="text">'.$landingPage['box4content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box5heading'].'</span>
                                        <p class="text">'.$landingPage['box5content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box6heading'].'</span>
                                        <p class="text">'.$landingPage['box6content'].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- <script>
                    let count = document.querySelectorAll(".count")
                    let arr = Array.from(count)
                    arr.map(function(item) {
                        let startnumber = 0
            
                        function counterup() {
                            startnumber++
                            item.innerHTML = startnumber
            
                            if (startnumber == item.dataset.number) {
                                clearInterval(stop)
                            }
                        }
            
                        let stop = setInterval(function() {
                            counterup()
                        }, 50)
            
                    })
                </script> -->
                    <!-- why should you hire end -->';

                //File new section Content
                $newSectionContent = '
                <!-- why should you hire start -->
                    <section class="section-c padding-block-container" id="why-choose">
                        <h3 class="text-center heading-3">'.$data['title4'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px" style="width: 40%;"></span>

                        <div class="container">
                            <div id="counter" class="row">
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$data['box1heading'].'</span>
                                        <p class="text">'.$data['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$data['box2heading'].'</span>
                                        <p class="text">'.$data['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$data['box3heading'].'</span>
                                        <p class="text">'.$data['box3content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$data['box4heading'].'</span>
                                        <p class="text">'.$data['box4content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$data['box5heading'].'</span>
                                        <p class="text">'.$data['box5content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$data['box6heading'].'</span>
                                        <p class="text">'.$data['box6content'].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- <script>
                    let count = document.querySelectorAll(".count")
                    let arr = Array.from(count)
                    arr.map(function(item) {
                        let startnumber = 0
            
                        function counterup() {
                            startnumber++
                            item.innerHTML = startnumber
            
                            if (startnumber == item.dataset.number) {
                                clearInterval(stop)
                            }
                        }
            
                        let stop = setInterval(function() {
                            counterup()
                        }, 50)
            
                    })
                </script> -->
                    <!-- why should you hire end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // // Write the updated content back to the file
                if(!empty($landingPage['section4_id'])){
                    file_put_contents($filePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($filePath, $newSectionContent,FILE_APPEND | LOCK_EX);
                }


                $landingPage->layout_id = $id;
                $landingPage->section4_id = 4;
                $landingPage->title4 = $data['title4'];
                $landingPage->box1heading = $data['box1heading'];
                $landingPage->box1content = $data['box1content'];
                $landingPage->box2heading = $data['box2heading'];
                $landingPage->box2content = $data['box2content'];
                $landingPage->box3heading = $data['box3heading'];
                $landingPage->box3content = $data['box3content'];
                $landingPage->box4heading = $data['box4heading'];
                $landingPage->box4content = $data['box4content'];
                $landingPage->box5heading = $data['box5heading'];
                $landingPage->box5content = $data['box5content'];
                $landingPage->box6heading = $data['box6heading'];
                $landingPage->box6content = $data['box6content'];
                $landingPage->save();
                return redirect('admin/create-landing-pages/'.$id.'')->with('success_message',$message);
            }

            if(array_key_exists('section5', $data) && $landingPage['status5']==1){

                $message = "Section 5 updated Successfully!";

                

                $customerImages = [];

                foreach($data as $content => $value){

                    if(str_contains($content,'image')){
                        
                        if($request->hasFile($content)){
                            $image_tmp = $request->file($content);
                            if($image_tmp->isValid()){
                                //Get Image Extension
                                $extension = $image_tmp->getClientOriginalExtension();
                                //Generate New Image Name
                                $customerImage = rand(111,98999).'.'.$extension;
                                $image_path = 'images/customers/'.$customerImage;
                                Image::make($image_tmp)->save($image_path);
                            }
                        }
                        array_push($customerImages,$customerImage);
                    }
                }

                $implodeCustomerImages = implode(",",$customerImages);

                $explodeCustomerImages = explode(",",$landingPage['customers_images5']);

                //File old section Content
                $oldSectionContent = '
                <!-- valued customer start -->
                    <section class="section-d padding-block-container" id="our-customers">
                        <h3 class="text-center heading-3">' . $landingPage['title5'] . '</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="container mt-2">
                            <div class="row my-5 text-center d-flex justify-content-between align-items-center our-valued-customer gap-4">';
                                foreach ($explodeCustomerImages as $row) {
                                    $oldSectionContent .= '<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                        <figure>
                                            <img src="{{ url("images/customers/' . $row . '") }}" alt="" height="80" width="auto">
                                        </figure>
                                    </div>';
                                }
                                $oldSectionContent .= '
                            </div>
                        </div>
                    </section>
                <!-- valued customer end -->';


                //File new section Content
                $newSectionContent = '
                <!-- valued customer start -->
                    <section class="section-d padding-block-container" id="our-customers">
                        <h3 class="text-center heading-3">' . $data['title5'] . '</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="container mt-2">
                            <div class="row my-5 text-center d-flex justify-content-between align-items-center our-valued-customer gap-4">';
                                foreach ($customerImages as $row) {
                                    $newSectionContent .= '<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                        <figure>
                                            <img src="{{ url("images/customers/' . $row . '") }}" alt="" height="80" width="auto">
                                        </figure>
                                    </div>';
                                }
                                $newSectionContent .= '
                            </div>
                        </div>
                    </section>
                <!-- valued customer end -->';

                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php'); 

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                if(!empty($landingPage['section5_id'])){
                    file_put_contents($filePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($filePath, $newSectionContent,FILE_APPEND | LOCK_EX);
                }


                $landingPage->layout_id = $id;
                $landingPage->section5_id = 5;
                $landingPage->title5 = $data['title5'];
                $landingPage->customers_images5 = $implodeCustomerImages;
                $landingPage->save();
                return redirect('admin/create-landing-pages/'.$id.'')->with('success_message',$message);
            }

            if(array_key_exists('section6', $data) && $landingPage['status6']==1){

                $message = "Section 6 updated Successfully!";

                // echo "<pre>"; print_r($data); die;

                $clientMessage = [];
                $clientName = [];
                $clientPost = [];

                foreach($data as $content => $value){

                    if(str_contains($content,'clientMessage')){
                        array_push($clientMessage,$value);
                    }else if(str_contains($content,'clientName')){
                        array_push($clientName,$value);
                    }else if(str_contains($content,'clientPost')){
                        array_push($clientPost,$value);
                    }
                }

                $implodeClientMessage = implode("+++",$clientMessage);
                $implodeClientName = implode("+++",$clientName);
                $implodeClientPost = implode("+++",$clientPost);

                $explodeClientMessage = explode("+++",$landingPage['clientMessage6']);
                $explodeClientName = explode("+++",$landingPage['clientName6']);
                $explodeClientPost = explode("+++",$landingPage['clientPost6']);

                //File old section Content
                $oldSectionContent = '
                <!-- testimonial start -->

                <section class="section-e">
            
                    <div class="container padding-block-container">
                        <h3 class="text-center heading-3">'.$landingPage['title6'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="row responsive">';

                            for($i=0; $i<count($explodeClientMessage); $i++){
                                $oldSectionContent .= '<div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="details h-auto">
                                        <p>'.$explodeClientMessage[$i].'
                                        </p>
                                    </div>
                                    <div class="description">
                                        <div class="name">
                                            <strong>'.$explodeClientName[$i].'</strong>
                                        </div>
                                        <div class="designation my-2">
                                            <p>'.$explodeClientPost[$i].'</p>
                                        </div>
                                    </div>
                                </div>';
                            }
                        $oldSectionContent .= '</div>
                    </div>
                </section>
                <!-- slick min -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


                <script>
                    $(".responsive").slick({
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            // You can unslick at a given breakpoint now by adding:
                            // settings: "unslick"
                            // instead of a settings object
                        ]
                    });
                </script>
                <!-- testimonial end -->';

                //File new section Content
                $newSectionContent = '
                <!-- testimonial start -->

                <section class="section-e">
            
                    <div class="container padding-block-container">
                        <h3 class="text-center heading-3">'.$data['title6'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="row responsive">';

                            for($i=0; $i<count($clientMessage); $i++){
                                $newSectionContent .= '<div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="details h-auto">
                                        <p>'.$clientMessage[$i].'
                                        </p>
                                    </div>
                                    <div class="description">
                                        <div class="name">
                                            <strong>'.$clientName[$i].'</strong>
                                        </div>
                                        <div class="designation my-2">
                                            <p>'.$clientPost[$i].'</p>
                                        </div>
                                    </div>
                                </div>';
                            }
                        $newSectionContent .= '</div>
                    </div>
                </section>
                <!-- slick min -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


                <script>
                    $(".responsive").slick({
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            // You can unslick at a given breakpoint now by adding:
                            // settings: "unslick"
                            // instead of a settings object
                        ]
                    });
                </script>
                <!-- testimonial end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');   

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                if(!empty($landingPage['section6_id'])){
                    file_put_contents($filePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($filePath, $newSectionContent,FILE_APPEND | LOCK_EX);
                }

                
                $landingPage->layout_id = $id;
                $landingPage->section6_id = 6;
                $landingPage->title6 = $data['title6'];
                $landingPage->clientMessage6 = $implodeClientMessage;
                $landingPage->clientName6 = $implodeClientName;
                $landingPage->clientPost6 = $implodeClientPost;
                $landingPage->save();
                return redirect('admin/create-landing-pages/'.$id.'')->with('success_message',$message);
            }

            if(array_key_exists('section7', $data) && $landingPage['status7']==1){

                $message = "Section 7 updated Successfully!";
    
                if (!empty($data['background_image7'])) {

                    //Removing Previous Banner Background Image
                    if(!empty($landingPage['background_image7'])){
                        
                        $backgroundimagePath = public_path('images/background/'.$landingPage['background_image7']);
    
                        if(file_exists($backgroundimagePath)){
                            if(unlink($backgroundimagePath)){

                            }else{
                                return redirect()->back()->with('error_message','There is some error on deleting Banner Background Image!');
                            }
                        }else{
                            return redirect()->back()->with('error_message','Banner Background Image not found! Please contact Admin');
                        }
                    }


                    if ($request->hasFile('background_image7')) {
                        $image_tmp = $request->file('background_image7');
                        if ($image_tmp->isValid()) {
                            // Get Image Extension
                            $extension = $image_tmp->getClientOriginalExtension();
                            // Generate New Image Name
                            $backgroundImage7 = rand(111, 98999) . '.' . $extension;
                            $image_path = 'images/background/' . $backgroundImage7;
                            Image::make($image_tmp)->save($image_path);
                        }
                    }
                }else{
                    $backgroundImage7 = $landingPage['background_image7'];
                }


                //File old section Content
                $oldSectionContent = '
                        <style>
                          #our-contact {
                              background-repeat: no-repeat;
                              background-size: cover;
                              background-position: center bottom;
                              background-color: rgba(0, 0, 0, 0.50) !important;
                              background-image: url("/images/background/'.$landingPage['background_image7'].'");
                              background-blend-mode: multiply;
                              width: 100%;
                              height: auto;
                              display: inline-block;
                          }
                        </style>
                <!-- contact us section-f start -->
                <section class="section-f padding-block-container" id="our-contact">
                    <div class="container">
                        <h3 class="text-center text-white heading-3">'.$landingPage['title7'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px"></span>
            
                        <div class="row">
                            <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12 m-auto">
                                <?php $actual_link = str_replace(".php", "", "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]); ?>
                                <form class="shadow-sm p-4 d-flex justify-content-center align-items-center flex-column bg-white form-a" action="" method="post">
                                    <input name="pagelinks" value="<?php echo $actual_link; ?>" type="hidden" />
                                    <div class="row w-100 mb-3">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield1'].'" name="fname" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield2'].'" name="lname">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="email" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield3'].'" name="email" required>
                                        </div>
                                        <div id="flag-container-hire-virtual-assistant" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 position-relative flag-ca">
                                            <div class="select-box">
                                                <div class="selected-option">
                                                    <div>
                                                        <span class="iconify" data-icon="flag:us-4x3"></span>
                                                        <strong>+1</strong>
                                                    </div>
                                                    <input type="tel" name="tel" placeholder="'.$landingPage['inputfield4'].'" minlength="10" required id="phoneInput">
                                                </div>
                                                <div class="options">
                                                    <input type="text" class="search-box" placeholder="Search Country Name">
                                                    <ol>
            
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Website* -- Ex: http://www.example.com" name="website" required>
                                        </div> -->
            
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" placeholder="'.$landingPage['inputfield5'].'" name="message" required></textarea>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" class="main-button rounded-0" name="contact_form_submit">'.$landingPage['inputfield6'].'</button>
                                        </div>
                                    </div>
            
            
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <script src="{{ url("landing_page/script.js") }}"></script>

                <script>
                    // Get a reference to the input field
                    const phoneInput = document.getElementById("phoneInput");
            
                    // Add an event listener to the input field
                    phoneInput.addEventListener("input", function() {
                        // Remove any non-numeric characters from the input
                        this.value = this.value.replace(/[^0-9+]/g, "");
            
                        // Optionally, you can set a maximum length for the phone number
                        const maxLength = 15; // Change this to your desired maximum length
                        if (this.value.length > maxLength) {
                            this.value = this.value.slice(0, maxLength);
                        }
                    });
                </script>
                <!-- contact us section-f end -->';
                


                //File new section Content
                $newSectionContent = '
                        <style>
                          #our-contact {
                              background-repeat: no-repeat;
                              background-size: cover;
                              background-position: center bottom;
                              background-color: rgba(0, 0, 0, 0.50) !important;
                              background-image: url("/images/background/'.$backgroundImage7.'");
                              background-blend-mode: multiply;
                              width: 100%;
                              height: auto;
                              display: inline-block;
                          }
                        </style>
                <!-- contact us section-f start -->
                <section class="section-f padding-block-container" id="our-contact">
                    <div class="container">
                        <h3 class="text-center text-white heading-3">'.$data['title7'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px"></span>
            
                        <div class="row">
                            <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12 m-auto">
                                <?php $actual_link = str_replace(".php", "", "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]); ?>
                                <form class="shadow-sm p-4 d-flex justify-content-center align-items-center flex-column bg-white form-a" action="" method="post">
                                    <input name="pagelinks" value="<?php echo $actual_link; ?>" type="hidden" />
                                    <div class="row w-100 mb-3">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$data['inputField1'].'" name="fname" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$data['inputField2'].'" name="lname">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="email" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$data['inputField3'].'" name="email" required>
                                        </div>
                                        <div id="flag-container-hire-virtual-assistant" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 position-relative flag-ca">
                                            <div class="select-box">
                                                <div class="selected-option">
                                                    <div>
                                                        <span class="iconify" data-icon="flag:us-4x3"></span>
                                                        <strong>+1</strong>
                                                    </div>
                                                    <input type="tel" name="tel" placeholder="'.$data['inputField4'].'" minlength="10" required id="phoneInput">
                                                </div>
                                                <div class="options">
                                                    <input type="text" class="search-box" placeholder="Search Country Name">
                                                    <ol>
            
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Website* -- Ex: http://www.example.com" name="website" required>
                                        </div> -->
            
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" placeholder="'.$data['inputField5'].'" name="message" required></textarea>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" class="main-button rounded-0" name="contact_form_submit">'.$data['inputField6'].'</button>
                                        </div>
                                    </div>
            
            
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <script src="{{ url("landing_page/script.js") }}"></script>

                <script>
                    // Get a reference to the input field
                    const phoneInput = document.getElementById("phoneInput");
            
                    // Add an event listener to the input field
                    phoneInput.addEventListener("input", function() {
                        // Remove any non-numeric characters from the input
                        this.value = this.value.replace(/[^0-9+]/g, "");
            
                        // Optionally, you can set a maximum length for the phone number
                        const maxLength = 15; // Change this to your desired maximum length
                        if (this.value.length > maxLength) {
                            this.value = this.value.slice(0, maxLength);
                        }
                    });
                </script>
                <!-- contact us section-f end -->';

                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // // Write the updated content back to the file
                if(!empty($landingPage['section7_id'])){
                    file_put_contents($filePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($filePath, $newSectionContent,FILE_APPEND | LOCK_EX);
                }


                $landingPage->layout_id = $id;
                $landingPage->section7_id = 7;
                $landingPage->title7 = $data['title7'];
                $landingPage->inputfield1 = $data['inputField1'];
                $landingPage->inputfield2 = $data['inputField2'];
                $landingPage->inputfield3 = $data['inputField3'];
                $landingPage->inputfield4 = $data['inputField4'];
                $landingPage->inputfield5 = $data['inputField5'];
                $landingPage->inputfield6 = $data['inputField6'];
                $landingPage->background_image7 = $backgroundImage7;
                $landingPage->save();
                return redirect('admin/create-landing-pages/'.$id.'')->with('success_message',$message);
            }

            if(array_key_exists('section8', $data) && $landingPage['status8']==1){

                $message = "Section 8 updated Successfully!";
    
                if (!empty($data['background_image8'])) {

                     //Removing Previous Banner Background Image
                     if(!empty($landingPage['background_image8'])){
                        
                        $backgroundimagePath = public_path('images/background/'.$landingPage['background_image8']);
    
                        if(file_exists($backgroundimagePath)){
                            if(unlink($backgroundimagePath)){

                            }else{
                                return redirect()->back()->with('error_message','There is some error on deleting Banner Background Image!');
                            }
                        }else{
                            return redirect()->back()->with('error_message','Banner Background Image not found! Please contact Admin');
                        }
                    }

                    if ($request->hasFile('background_image8')) {
                        $image_tmp = $request->file('background_image8');
                        if ($image_tmp->isValid()) {
                            // Get Image Extension
                            $extension = $image_tmp->getClientOriginalExtension();
                            // Generate New Image Name
                            $backgroundImage8 = rand(111, 98999) . '.' . $extension;
                            $image_path = 'images/background/' . $backgroundImage8;
                            Image::make($image_tmp)->save($image_path);
                        }
                    }
                }else{
                    $backgroundImage8 = $landingPage['background_image8'];
                }

                $previousImage = $landingPage['background_image8'];

                //File old section Content
                $oldSectionContent = '
                        <style>
                       .have-query-section {
                            width: 100%;
                            height: auto;
                            background-color: rgba(36, 106, 178, .75);
                            background-image: url("/images/background/'.$previousImage.'");
                            background-blend-mode: multiply;
                            background-position: center center;
                            background-size: cover;
                            background-repeat: no-repeat;
                            padding-block: 100px;
                        }
                        </style>
                        <!-- section-g start -->
                        <section class="section-g">
                          <div class="have-query-section">
                              <div class="container-fluid" id="have_queries">
                                  <div class="row">
                                      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                          <h3 class="text-extra-dark-gray mb-3 font-weight-700 md-w-100 d-block text-center text-white main-heading">'.$landingPage['title8'].'</h3>
                                          <small class="text-white text-center w-100 d-block pb-5">'.$landingPage['sub_title8'].'</small>

                                          <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
                                              <form action="">
                                                  <input type="text" placeholder="'.$landingPage['field1'].'" required>
                                                  <input type="tel" placeholder="'.$landingPage['field2'].'" required>
                                                  <input type="submit" value="'.$landingPage['field3'].'">
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </section>
                        <!-- section-g start -->';
                


                //File new section Content
                $newSectionContent = '
                        <style>
                       .have-query-section {
                            width: 100%;
                            height: auto;
                            background-color: rgba(36, 106, 178, .75);
                            background-image: url("/images/background/'.$backgroundImage8.'");
                            background-blend-mode: multiply;
                            background-position: center center;
                            background-size: cover;
                            background-repeat: no-repeat;
                            padding-block: 100px;
                        }
                        </style>
                        <!-- section-g start -->
                        <section class="section-g">
                          <div class="have-query-section">
                              <div class="container-fluid" id="have_queries">
                                  <div class="row">
                                      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                          <h3 class="text-extra-dark-gray mb-3 font-weight-700 md-w-100 d-block text-center text-white main-heading">'.$data['title8'].'</h3>
                                          <small class="text-white text-center w-100 d-block pb-5">'.$data['subtitle8'].'</small>

                                          <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
                                              <form action="">
                                                  <input type="text" placeholder="'.$data['field1'].'" required>
                                                  <input type="tel" placeholder="'.$data['field2'].'" required>
                                                  <input type="submit" value="'.$data['field3'].'">
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </section>
                        <!-- section-g start -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                if(!empty($landingPage['section8_id'])){
                    file_put_contents($filePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($filePath, $newSectionContent,FILE_APPEND | LOCK_EX);
                }


                $landingPage->layout_id = $id;
                $landingPage->section8_id = 8;
                $landingPage->title8 = $data['title8'];
                $landingPage->sub_title8 = $data['subtitle8'];
                $landingPage->field1 = $data['field1'];
                $landingPage->field2= $data['field2'];
                $landingPage->field3 = $data['field3'];
                $landingPage->background_image8 = $backgroundImage8;
                $landingPage->save();
                return redirect('admin/create-landing-pages/'.$id.'')->with('success_message',$message);
            }

            if(array_key_exists('section9', $data) && $landingPage['status9']==1){

                $message = "Section 9 updated Successfully!";

                //File old section Content
                $oldSectionContent = '
                <div class="copyright-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                <p>&copy; '.$landingPage['content9'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                
                
                </body>
                
                </html>';


                //File new section Content
                $newSectionContent = '
                <div class="copyright-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                <p>&copy; '.$data['content9'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                
                
                </body>
                
                </html>';

                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php'); 

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                //Write the updated content back to the file
                if(!empty($landingPage['section9_id'])){
                    file_put_contents($filePath, $newContent, LOCK_EX);
                }else{
                    file_put_contents($filePath, $newSectionContent,FILE_APPEND | LOCK_EX);
                }


                $landingPage->layout_id = $id;
                $landingPage->section9_id = 9;
                $landingPage->content9 = $data['content9'];
                $landingPage->save();
                return redirect('admin/create-landing-pages/'.$id.'')->with('success_message',$message);
            }

            return redirect()->back()->with('error_message','This Section is Inactive! Please Active the Section for Edit.');
        }

        return view('admin.landing-pages.create-landing-pages')->with(compact('layout','landingPage'));
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
    public function show(landing_pages $landing_pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(landing_pages $landing_pages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $layout = layout::find($data['layout_id']);
            $landingPage = landing_pages::where('layout_id',$data['layout_id'])->first();

            if($data['status']=="Active"){
                $status = 0;

            if($data['section_id']==1){

                //File old section Content
               
                $oldSectionContent =
                '<header class="main-header bg-white position-fixed w-100 start-0 top-0">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container">
                            <a class="navbar-brand w-25" href="#"><img width="auto" height="50px" src="{{ url("images/logo/' . $layout['logo'] . '") }}" alt=""></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#' . $landingPage['menu1_link'] . '">' . $landingPage['menu1'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu2_link'] . '">' . $landingPage['menu2'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu3_link'] . '">' . $landingPage['menu3'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu4_link'] . '">' . $landingPage['menu4'] . '</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>';

                //File new section Content
                $newSectionContent =
                '<!-- <header class="main-header bg-white position-fixed w-100 start-0 top-0">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container">
                            <a class="navbar-brand w-25" href="#"><img width="auto" height="50px" src="{{ url("images/logo/' . $layout['logo'] . '") }}" alt=""></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#' . $landingPage['menu1_link'] . '">' . $landingPage['menu1'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu2_link'] . '">' . $landingPage['menu2'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu3_link'] . '">' . $landingPage['menu3'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu4_link'] . '">' . $landingPage['menu4'] . '</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header> -->';

                $filePath = resource_path('views/landing-page/' . $layout['page_url'] . '.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
                    
                //Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==2){
                
                //File old section Content
                $oldSectionContent = '
                <!-- hero section start -->
                <style>
                    .section-a {
                        background: url("images/background/'.$landingPage['background_image2'].'");
                        background-size: cover;
                        width: 100%;
                    }
                </style>
                <section class="section-a">
                        <div class="container">
                            <div class="row sub-section-a d-flex justify-content-between align-items-center">
                                <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-xs-12">
                                    <h1 class="text-dark main-heading">'.$landingPage['title2'].'</h1>
                                    <p class="" style="color: #f26e4f;">'.$landingPage['sub_title2'].'</p>
                                    <div class="button-container">
                                        <a href="#'.$landingPage['menu4_link'].'" class="main-button">'.$landingPage['button1'].'</a>
                                        <a href="tel:+1-250-206-8787" class="main-button call-us-btn">'.$landingPage['button2'].'</a>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-xs-12">
                                    <figure class="w-100">
                                        <img class="w-100" style="border-radius: 20px; height: 300px;" src="{{ url("images/banner/'.$landingPage['banner_image2'].'") }}" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                </section>
                <!-- hero section end -->';

                //File new section Content
                $newSectionContent = '
                <!-- hero section start -->
                <!-- <style>
                    .section-a {
                        background: url("images/background/'.$landingPage['background_image2'].'");
                        background-size: cover;
                        width: 100%;
                    }
                </style>
                <section class="section-a">
                        <div class="container">
                            <div class="row sub-section-a d-flex justify-content-between align-items-center">
                                <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-xs-12">
                                    <h1 class="text-dark main-heading">'.$landingPage['title2'].'</h1>
                                    <p class="" style="color: #f26e4f;">'.$landingPage['sub_title2'].'</p>
                                    <div class="button-container">
                                        <a href="#'.$landingPage['menu4_link'].'" class="main-button">'.$landingPage['button1'].'</a>
                                        <a href="tel:+1-250-206-8787" class="main-button call-us-btn">'.$landingPage['button2'].'</a>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-xs-12">
                                    <figure class="w-100">
                                        <img class="w-100" style="border-radius: 20px; height: 300px;" src="{{ url("images/banner/'.$landingPage['banner_image2'].'") }}" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                </section> -->
                <!-- hero section end -->';
                    

                    $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                    // Read the entire file
                    $currentContent = file_get_contents($filePath);

                    // Construct the new content with the updated section
                    $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
                
                    // Write the updated content back to the file
                    file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==3){

                $explodeServiceName = explode("+++",$landingPage['service_name3']);
                $explodeServiceDescription = explode("+++",$landingPage['service_description3']);
                $explodeServiceIcon = explode(",",$landingPage['service_icon3']);

                //File old section Content
                $oldSectionContent = '
                <!-- service section start -->
                    <section class="section-b" id="our-services">
                        <div class="container padding-block-container">
                            <div class="row d-flex justify-content-center">
                                <h3 class="text-center heading-3">'.$landingPage['title3'].'</h3>
                                <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 20%;"></span>
                                <p class="text-center pt-2 pb-2">'.$landingPage['description3'].'</p>';
                               
                                for($i=0; $i<count($explodeServiceName); $i++){
                                $oldSectionContent .= '<div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                    <div class="card">
                                        <div class="heading-container">
                                            <figure class="icon w-25">
                                                <img class="w-100" src="{{ url("images/icons/'.$explodeServiceIcon[$i].'") }}" alt="">
                                            </figure>
                                            <div class="heading-4">
                                                <h4 class="text-dark text-center">'.$explodeServiceName[$i].'</h4>
                                            </div>
                                        </div>
                                        <div class="content-container text-center">
                                            <p class="text-dark">'.$explodeServiceDescription[$i].'</p>
                                            <a href="'.Str::slug($explodeServiceName[$i]).'" class="sub-button">Read More</a>
                                        </div>
                                    </div>
                                </div>';
                                }
                               

                            $oldSectionContent .= '</div>
                        </div>
                    </section>
                <!-- service section end -->';


                //File new section Content
                $newSectionContent = '
                <!-- service section start -->
                    <!-- <section class="section-b" id="our-services">
                        <div class="container padding-block-container">
                            <div class="row d-flex justify-content-center">
                                <h3 class="text-center heading-3">'.$landingPage['title3'].'</h3>
                                <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 20%;"></span>
                                <p class="text-center pt-2 pb-2">'.$landingPage['description3'].'</p>';
                               
                                for($i=0; $i<count($explodeServiceName); $i++){
                                $newSectionContent .= '<div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                    <div class="card">
                                        <div class="heading-container">
                                            <figure class="icon w-25">
                                                <img class="w-100" src="{{ url("images/icons/'.$explodeServiceIcon[$i].'") }}" alt="">
                                            </figure>
                                            <div class="heading-4">
                                                <h4 class="text-dark text-center">'.$explodeServiceName[$i].'</h4>
                                            </div>
                                        </div>
                                        <div class="content-container text-center">
                                            <p class="text-dark">'.$explodeServiceDescription[$i].'</p>
                                            <a href="'.Str::slug($explodeServiceName[$i]).'" class="sub-button">Read More</a>
                                        </div>
                                    </div>
                                </div>';
                                }
                               

                            $newSectionContent .= '</div>
                        </div>
                    </section> -->
                <!-- service section end -->';
                
                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==4){

                //File old section Content
                $oldSectionContent = '
                <!-- why should you hire start -->
                    <section class="section-c padding-block-container" id="why-choose">
                        <h3 class="text-center heading-3">'.$landingPage['title4'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px" style="width: 40%;"></span>

                        <div class="container">
                            <div id="counter" class="row">
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box1heading'].'</span>
                                        <p class="text">'.$landingPage['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box2heading'].'</span>
                                        <p class="text">'.$landingPage['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box3heading'].'</span>
                                        <p class="text">'.$landingPage['box3content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box4heading'].'</span>
                                        <p class="text">'.$landingPage['box4content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box5heading'].'</span>
                                        <p class="text">'.$landingPage['box5content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box6heading'].'</span>
                                        <p class="text">'.$landingPage['box6content'].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- <script>
                    let count = document.querySelectorAll(".count")
                    let arr = Array.from(count)
                    arr.map(function(item) {
                        let startnumber = 0
            
                        function counterup() {
                            startnumber++
                            item.innerHTML = startnumber
            
                            if (startnumber == item.dataset.number) {
                                clearInterval(stop)
                            }
                        }
            
                        let stop = setInterval(function() {
                            counterup()
                        }, 50)
            
                    })
                </script> -->
                    <!-- why should you hire end -->';

                //File new section Content
                $newSectionContent = '
                <!-- why should you hire start -->
                    <!-- <section class="section-c padding-block-container" id="why-choose">
                        <h3 class="text-center heading-3">'.$landingPage['title4'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px" style="width: 40%;"></span>

                        <div class="container">
                            <div id="counter" class="row">
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box1heading'].'</span>
                                        <p class="text">'.$landingPage['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box2heading'].'</span>
                                        <p class="text">'.$landingPage['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box3heading'].'</span>
                                        <p class="text">'.$landingPage['box3content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box4heading'].'</span>
                                        <p class="text">'.$landingPage['box4content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box5heading'].'</span>
                                        <p class="text">'.$landingPage['box5content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box6heading'].'</span>
                                        <p class="text">'.$landingPage['box6content'].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> -->
                    <!-- <script>
                    let count = document.querySelectorAll(".count")
                    let arr = Array.from(count)
                    arr.map(function(item) {
                        let startnumber = 0
            
                        function counterup() {
                            startnumber++
                            item.innerHTML = startnumber
            
                            if (startnumber == item.dataset.number) {
                                clearInterval(stop)
                            }
                        }
            
                        let stop = setInterval(function() {
                            counterup()
                        }, 50)
            
                    })
                </script> -->
                    <!-- why should you hire end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==5){
                $explodeCustomerImages = explode(",",$landingPage['customers_images5']);

                //File old section Content
                $oldSectionContent = '
                <!-- valued customer start -->
                    <section class="section-d padding-block-container" id="our-customers">
                        <h3 class="text-center heading-3">' . $landingPage['title5'] . '</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="container mt-2">
                            <div class="row my-5 text-center d-flex justify-content-between align-items-center our-valued-customer gap-4">';
                                foreach ($explodeCustomerImages as $row) {
                                    $oldSectionContent .= '<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                        <figure>
                                            <img src="{{ url("images/customers/' . $row . '") }}" alt="" height="80" width="auto">
                                        </figure>
                                    </div>';
                                }
                                $oldSectionContent .= '
                            </div>
                        </div>
                    </section>
                <!-- valued customer end -->';


                //File new section Content
                $newSectionContent = '
                <!-- valued customer start -->
                    <!-- <section class="section-d padding-block-container" id="our-customers">
                        <h3 class="text-center heading-3">' . $landingPage['title5'] . '</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="container mt-2">
                            <div class="row my-5 text-center d-flex justify-content-between align-items-center our-valued-customer gap-4">';
                                foreach ($explodeCustomerImages as $row) {
                                    $newSectionContent .= '<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                        <figure>
                                            <img src="{{ url("images/customers/' . $row . '") }}" alt="" height="80" width="auto">
                                        </figure>
                                    </div>';
                                }
                                $newSectionContent .= '
                            </div>
                        </div>
                    </section> -->
                <!-- valued customer end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php'); 

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==6){

                $explodeClientMessage = explode("+++",$landingPage['clientMessage6']);
                $explodeClientName = explode("+++",$landingPage['clientName6']);
                $explodeClientPost = explode("+++",$landingPage['clientPost6']);

                //File old section Content
                $oldSectionContent = '
                <!-- testimonial start -->

                <section class="section-e">
            
                    <div class="container padding-block-container">
                        <h3 class="text-center heading-3">'.$landingPage['title6'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="row responsive">';

                            for($i=0; $i<count($explodeClientMessage); $i++){
                                $oldSectionContent .= '<div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="details h-auto">
                                        <p>'.$explodeClientMessage[$i].'
                                        </p>
                                    </div>
                                    <div class="description">
                                        <div class="name">
                                            <strong>'.$explodeClientName[$i].'</strong>
                                        </div>
                                        <div class="designation my-2">
                                            <p>'.$explodeClientPost[$i].'</p>
                                        </div>
                                    </div>
                                </div>';
                            }
                        $oldSectionContent .= '</div>
                    </div>
                </section>
                <!-- slick min -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


                <script>
                    $(".responsive").slick({
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            // You can unslick at a given breakpoint now by adding:
                            // settings: "unslick"
                            // instead of a settings object
                        ]
                    });
                </script>
                <!-- testimonial end -->';

                //File new section Content
                $newSectionContent = '
                <!-- testimonial start -->

                <!-- <section class="section-e">
            
                    <div class="container padding-block-container">
                        <h3 class="text-center heading-3">'.$landingPage['title6'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="row responsive">';

                            for($i=0; $i<count($explodeClientMessage); $i++){
                                $newSectionContent .= '<div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="details h-auto">
                                        <p>'.$explodeClientMessage[$i].'
                                        </p>
                                    </div>
                                    <div class="description">
                                        <div class="name">
                                            <strong>'.$explodeClientName[$i].'</strong>
                                        </div>
                                        <div class="designation my-2">
                                            <p>'.$explodeClientPost[$i].'</p>
                                        </div>
                                    </div>
                                </div>';
                            }
                        $newSectionContent .= '</div>
                    </div>
                </section>
                <!-- slick min -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


                <script>
                    $(".responsive").slick({
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            // You can unslick at a given breakpoint now by adding:
                            // settings: "unslick"
                            // instead of a settings object
                        ]
                    });
                </script> -->
                <!-- testimonial end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');   

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==7){

                //File old section Content
                $oldSectionContent = '
                        <style>
                          #our-contact {
                              background-repeat: no-repeat;
                              background-size: cover;
                              background-position: center bottom;
                              background-color: rgba(0, 0, 0, 0.50) !important;
                              background-image: url("/images/background/'.$landingPage['background_image7'].'");
                              background-blend-mode: multiply;
                              width: 100%;
                              height: auto;
                              display: inline-block;
                          }
                        </style>
                <!-- contact us section-f start -->
                <section class="section-f padding-block-container" id="our-contact">
                    <div class="container">
                        <h3 class="text-center text-white heading-3">'.$landingPage['title7'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px"></span>
            
                        <div class="row">
                            <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12 m-auto">
                                <?php $actual_link = str_replace(".php", "", "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]); ?>
                                <form class="shadow-sm p-4 d-flex justify-content-center align-items-center flex-column bg-white form-a" action="" method="post">
                                    <input name="pagelinks" value="<?php echo $actual_link; ?>" type="hidden" />
                                    <div class="row w-100 mb-3">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield1'].'" name="fname" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield2'].'" name="lname">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="email" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield3'].'" name="email" required>
                                        </div>
                                        <div id="flag-container-hire-virtual-assistant" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 position-relative flag-ca">
                                            <div class="select-box">
                                                <div class="selected-option">
                                                    <div>
                                                        <span class="iconify" data-icon="flag:us-4x3"></span>
                                                        <strong>+1</strong>
                                                    </div>
                                                    <input type="tel" name="tel" placeholder="'.$landingPage['inputfield4'].'" minlength="10" required id="phoneInput">
                                                </div>
                                                <div class="options">
                                                    <input type="text" class="search-box" placeholder="Search Country Name">
                                                    <ol>
            
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Website* -- Ex: http://www.example.com" name="website" required>
                                        </div> -->
            
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" placeholder="'.$landingPage['inputfield5'].'" name="message" required></textarea>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" class="main-button rounded-0" name="contact_form_submit">'.$landingPage['inputfield6'].'</button>
                                        </div>
                                    </div>
            
            
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <script src="{{ url("landing_page/script.js") }}"></script>

                <script>
                    // Get a reference to the input field
                    const phoneInput = document.getElementById("phoneInput");
            
                    // Add an event listener to the input field
                    phoneInput.addEventListener("input", function() {
                        // Remove any non-numeric characters from the input
                        this.value = this.value.replace(/[^0-9+]/g, "");
            
                        // Optionally, you can set a maximum length for the phone number
                        const maxLength = 15; // Change this to your desired maximum length
                        if (this.value.length > maxLength) {
                            this.value = this.value.slice(0, maxLength);
                        }
                    });
                </script>
                <!-- contact us section-f end -->';
                


                //File new section Content
                $newSectionContent = '
                        <!-- <style>
                          #our-contact {
                              background-repeat: no-repeat;
                              background-size: cover;
                              background-position: center bottom;
                              background-color: rgba(0, 0, 0, 0.50) !important;
                              background-image: url("/images/background/'.$landingPage['background_image7'].'");
                              background-blend-mode: multiply;
                              width: 100%;
                              height: auto;
                              display: inline-block;
                          }
                        </style> -->
                <!-- contact us section-f start -->
                <!-- <section class="section-f padding-block-container" id="our-contact">
                    <div class="container">
                        <h3 class="text-center text-white heading-3">'.$landingPage['title7'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px"></span>
            
                        <div class="row">
                            <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12 m-auto">
                                <?php $actual_link = str_replace(".php", "", "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]); ?>
                                <form class="shadow-sm p-4 d-flex justify-content-center align-items-center flex-column bg-white form-a" action="" method="post">
                                    <input name="pagelinks" value="<?php echo $actual_link; ?>" type="hidden" />
                                    <div class="row w-100 mb-3">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield1'].'" name="fname" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield2'].'" name="lname">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="email" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield3'].'" name="email" required>
                                        </div>
                                        <div id="flag-container-hire-virtual-assistant" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 position-relative flag-ca">
                                            <div class="select-box">
                                                <div class="selected-option">
                                                    <div>
                                                        <span class="iconify" data-icon="flag:us-4x3"></span>
                                                        <strong>+1</strong>
                                                    </div>
                                                    <input type="tel" name="tel" placeholder="'.$landingPage['inputfield4'].'" minlength="10" required id="phoneInput">
                                                </div>
                                                <div class="options">
                                                    <input type="text" class="search-box" placeholder="Search Country Name">
                                                    <ol>
            
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Website* -- Ex: http://www.example.com" name="website" required>
                                        </div> -->
            
                                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" placeholder="'.$landingPage['inputfield5'].'" name="message" required></textarea>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" class="main-button rounded-0" name="contact_form_submit">'.$landingPage['inputfield6'].'</button>
                                        </div>
                                    </div>
            
            
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <script src="{{ url("landing_page/script.js") }}"></script>

                <script>
                    // Get a reference to the input field
                    const phoneInput = document.getElementById("phoneInput");
            
                    // Add an event listener to the input field
                    phoneInput.addEventListener("input", function() {
                        // Remove any non-numeric characters from the input
                        this.value = this.value.replace(/[^0-9+]/g, "");
            
                        // Optionally, you can set a maximum length for the phone number
                        const maxLength = 15; // Change this to your desired maximum length
                        if (this.value.length > maxLength) {
                            this.value = this.value.slice(0, maxLength);
                        }
                    });
                </script> -->
                <!-- contact us section-f end -->';
   

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==8){

                $previousImage = $landingPage['background_image8'];

                //File old section Content
                $oldSectionContent = '
                        <style>
                       .have-query-section {
                            width: 100%;
                            height: auto;
                            background-color: rgba(36, 106, 178, .75);
                            background-image: url("/images/background/'.$previousImage.'");
                            background-blend-mode: multiply;
                            background-position: center center;
                            background-size: cover;
                            background-repeat: no-repeat;
                            padding-block: 100px;
                        }
                        </style>
                        <!-- section-g start -->
                        <section class="section-g">
                          <div class="have-query-section">
                              <div class="container-fluid" id="have_queries">
                                  <div class="row">
                                      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                          <h3 class="text-extra-dark-gray mb-3 font-weight-700 md-w-100 d-block text-center text-white main-heading">'.$landingPage['title8'].'</h3>
                                          <small class="text-white text-center w-100 d-block pb-5">'.$landingPage['sub_title8'].'</small>

                                          <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
                                              <form action="">
                                                  <input type="text" placeholder="'.$landingPage['field1'].'" required>
                                                  <input type="tel" placeholder="'.$landingPage['field2'].'" required>
                                                  <input type="submit" value="'.$landingPage['field3'].'">
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </section>
                        <!-- section-g start -->';
                


                //File new section Content
                $newSectionContent = '
                        <!-- <style>
                        .have-query-section {
                            width: 100%;
                            height: auto;
                            background-color: rgba(36, 106, 178, .75);
                            background-image: url("/images/background/'.$previousImage.'");
                            background-blend-mode: multiply;
                            background-position: center center;
                            background-size: cover;
                            background-repeat: no-repeat;
                            padding-block: 100px;
                        }
                        </style> -->
                        <!-- section-g start -->
                        <!-- <section class="section-g">
                        <div class="have-query-section">
                            <div class="container-fluid" id="have_queries">
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                        <h3 class="text-extra-dark-gray mb-3 font-weight-700 md-w-100 d-block text-center text-white main-heading">'.$landingPage['title8'].'</h3>
                                        <small class="text-white text-center w-100 d-block pb-5">'.$landingPage['sub_title8'].'</small>

                                        <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
                                            <form action="">
                                                <input type="text" placeholder="'.$landingPage['field1'].'" required>
                                                <input type="tel" placeholder="'.$landingPage['field2'].'" required>
                                                <input type="submit" value="'.$landingPage['field3'].'">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section> -->
                        <!-- section-g start -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==9){

                //File old section Content
                $oldSectionContent = '
                <div class="copyright-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                <p>&copy; '.$landingPage['content9'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                
                
                </body>
                
                </html>';


                //File new section Content
                $newSectionContent = '
                <!-- <div class="copyright-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                <p>&copy; '.$landingPage['content9'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
                
                
                </body>
                
                </html>';

                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php'); 

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                //Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            }else{
                $status = 1;

            if($data['section_id']==1){

                //File new section Content
                
                $newSectionContent =
                '<header class="main-header bg-white position-fixed w-100 start-0 top-0">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container">
                            <a class="navbar-brand w-25" href="#"><img width="auto" height="50px" src="{{ url("images/logo/' . $layout['logo'] . '") }}" alt=""></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#' . $landingPage['menu1_link'] . '">' . $landingPage['menu1'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu2_link'] . '">' . $landingPage['menu2'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu3_link'] . '">' . $landingPage['menu3'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu4_link'] . '">' . $landingPage['menu4'] . '</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>';

                //File old section Content
                $oldSectionContent =
                '<!-- <header class="main-header bg-white position-fixed w-100 start-0 top-0">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container">
                            <a class="navbar-brand w-25" href="#"><img width="auto" height="50px" src="{{ url("images/logo/' . $layout['logo'] . '") }}" alt=""></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#' . $landingPage['menu1_link'] . '">' . $landingPage['menu1'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu2_link'] . '">' . $landingPage['menu2'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu3_link'] . '">' . $landingPage['menu3'] . '</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#' . $landingPage['menu4_link'] . '">' . $landingPage['menu4'] . '</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header> -->';

                $filePath = resource_path('views/landing-page/' . $layout['page_url'] . '.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
                    
                //Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==2){

                //File new section Content
                $newSectionContent = '
                <!-- hero section start -->
                <style>
                    .section-a {
                        background: url("images/background/'.$landingPage['background_image2'].'");
                        background-size: cover;
                        width: 100%;
                    }
                </style>
                <section class="section-a">
                        <div class="container">
                            <div class="row sub-section-a d-flex justify-content-between align-items-center">
                                <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-xs-12">
                                    <h1 class="text-dark main-heading">'.$landingPage['title2'].'</h1>
                                    <p class="" style="color: #f26e4f;">'.$landingPage['sub_title2'].'</p>
                                    <div class="button-container">
                                        <a href="#'.$landingPage['menu4_link'].'" class="main-button">'.$landingPage['button1'].'</a>
                                        <a href="tel:+1-250-206-8787" class="main-button call-us-btn">'.$landingPage['button2'].'</a>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-xs-12">
                                    <figure class="w-100">
                                        <img class="w-100" style="border-radius: 20px; height: 300px;" src="{{ url("images/banner/'.$landingPage['banner_image2'].'") }}" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                </section>
                <!-- hero section end -->';

                //File old section Content
                $oldSectionContent = '
                <!-- hero section start -->
                <!-- <style>
                    .section-a {
                        background: url("images/background/'.$landingPage['background_image2'].'");
                        background-size: cover;
                        width: 100%;
                    }
                </style>
                <section class="section-a">
                        <div class="container">
                            <div class="row sub-section-a d-flex justify-content-between align-items-center">
                                <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-xs-12">
                                    <h1 class="text-dark main-heading">'.$landingPage['title2'].'</h1>
                                    <p class="" style="color: #f26e4f;">'.$landingPage['sub_title2'].'</p>
                                    <div class="button-container">
                                        <a href="#'.$landingPage['menu4_link'].'" class="main-button">'.$landingPage['button1'].'</a>
                                        <a href="tel:+1-250-206-8787" class="main-button call-us-btn">'.$landingPage['button2'].'</a>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-xs-12">
                                    <figure class="w-100">
                                        <img class="w-100" style="border-radius: 20px; height: 300px;" src="{{ url("images/banner/'.$landingPage['banner_image2'].'") }}" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                </section> -->
                <!-- hero section end -->';
                    

                    $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                    // Read the entire file
                    $currentContent = file_get_contents($filePath);

                    // Construct the new content with the updated section
                    $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
                
                    // Write the updated content back to the file
                    file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==3){

                $explodeServiceName = explode("+++",$landingPage['service_name3']);
                $explodeServiceDescription = explode("+++",$landingPage['service_description3']);
                $explodeServiceIcon = explode(",",$landingPage['service_icon3']);

                //File new section Content
                $newSectionContent = '
                <!-- service section start -->
                    <section class="section-b" id="our-services">
                        <div class="container padding-block-container">
                            <div class="row d-flex justify-content-center">
                                <h3 class="text-center heading-3">'.$landingPage['title3'].'</h3>
                                <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 20%;"></span>
                                <p class="text-center pt-2 pb-2">'.$landingPage['description3'].'</p>';
                               
                                for($i=0; $i<count($explodeServiceName); $i++){
                                $newSectionContent .= '<div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                    <div class="card">
                                        <div class="heading-container">
                                            <figure class="icon w-25">
                                                <img class="w-100" src="{{ url("images/icons/'.$explodeServiceIcon[$i].'") }}" alt="">
                                            </figure>
                                            <div class="heading-4">
                                                <h4 class="text-dark text-center">'.$explodeServiceName[$i].'</h4>
                                            </div>
                                        </div>
                                        <div class="content-container text-center">
                                            <p class="text-dark">'.$explodeServiceDescription[$i].'</p>
                                            <a href="'.Str::slug($explodeServiceName[$i]).'" class="sub-button">Read More</a>
                                        </div>
                                    </div>
                                </div>';
                                }
                               

                            $newSectionContent .= '</div>
                        </div>
                    </section>
                <!-- service section end -->';


                //File old section Content
                $oldSectionContent = '
                <!-- service section start -->
                    <!-- <section class="section-b" id="our-services">
                        <div class="container padding-block-container">
                            <div class="row d-flex justify-content-center">
                                <h3 class="text-center heading-3">'.$landingPage['title3'].'</h3>
                                <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 20%;"></span>
                                <p class="text-center pt-2 pb-2">'.$landingPage['description3'].'</p>';
                               
                                for($i=0; $i<count($explodeServiceName); $i++){
                                $oldSectionContent .= '<div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                    <div class="card">
                                        <div class="heading-container">
                                            <figure class="icon w-25">
                                                <img class="w-100" src="{{ url("images/icons/'.$explodeServiceIcon[$i].'") }}" alt="">
                                            </figure>
                                            <div class="heading-4">
                                                <h4 class="text-dark text-center">'.$explodeServiceName[$i].'</h4>
                                            </div>
                                        </div>
                                        <div class="content-container text-center">
                                            <p class="text-dark">'.$explodeServiceDescription[$i].'</p>
                                            <a href="'.Str::slug($explodeServiceName[$i]).'" class="sub-button">Read More</a>
                                        </div>
                                    </div>
                                </div>';
                                }
                               

                            $oldSectionContent .= '</div>
                        </div>
                    </section> -->
                <!-- service section end -->';
                
                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==4){

                //File new section Content
                $newSectionContent = '
                <!-- why should you hire start -->
                    <section class="section-c padding-block-container" id="why-choose">
                        <h3 class="text-center heading-3">'.$landingPage['title4'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px" style="width: 40%;"></span>

                        <div class="container">
                            <div id="counter" class="row">
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box1heading'].'</span>
                                        <p class="text">'.$landingPage['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box2heading'].'</span>
                                        <p class="text">'.$landingPage['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box3heading'].'</span>
                                        <p class="text">'.$landingPage['box3content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box4heading'].'</span>
                                        <p class="text">'.$landingPage['box4content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box5heading'].'</span>
                                        <p class="text">'.$landingPage['box5content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box6heading'].'</span>
                                        <p class="text">'.$landingPage['box6content'].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- <script>
                    let count = document.querySelectorAll(".count")
                    let arr = Array.from(count)
                    arr.map(function(item) {
                        let startnumber = 0
            
                        function counterup() {
                            startnumber++
                            item.innerHTML = startnumber
            
                            if (startnumber == item.dataset.number) {
                                clearInterval(stop)
                            }
                        }
            
                        let stop = setInterval(function() {
                            counterup()
                        }, 50)
            
                    })
                </script> -->
                    <!-- why should you hire end -->';

                //File old section Content
                $oldSectionContent = '
                <!-- why should you hire start -->
                    <!-- <section class="section-c padding-block-container" id="why-choose">
                        <h3 class="text-center heading-3">'.$landingPage['title4'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px" style="width: 40%;"></span>

                        <div class="container">
                            <div id="counter" class="row">
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box1heading'].'</span>
                                        <p class="text">'.$landingPage['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box2heading'].'</span>
                                        <p class="text">'.$landingPage['box1content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box3heading'].'</span>
                                        <p class="text">'.$landingPage['box3content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box4heading'].'</span>
                                        <p class="text">'.$landingPage['box4content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box5heading'].'</span>
                                        <p class="text">'.$landingPage['box5content'].'</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                    <div class="item">
                                        <span class="count">'.$landingPage['box6heading'].'</span>
                                        <p class="text">'.$landingPage['box6content'].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> -->
                    <!-- <script>
                    let count = document.querySelectorAll(".count")
                    let arr = Array.from(count)
                    arr.map(function(item) {
                        let startnumber = 0
            
                        function counterup() {
                            startnumber++
                            item.innerHTML = startnumber
            
                            if (startnumber == item.dataset.number) {
                                clearInterval(stop)
                            }
                        }
            
                        let stop = setInterval(function() {
                            counterup()
                        }, 50)
            
                    })
                </script> -->
                    <!-- why should you hire end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==5){
                $explodeCustomerImages = explode(",",$landingPage['customers_images5']);

                //File new section Content
                $newSectionContent = '
                <!-- valued customer start -->
                    <section class="section-d padding-block-container" id="our-customers">
                        <h3 class="text-center heading-3">' . $landingPage['title5'] . '</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="container mt-2">
                            <div class="row my-5 text-center d-flex justify-content-between align-items-center our-valued-customer gap-4">';
                                foreach ($explodeCustomerImages as $row) {
                                    $newSectionContent .= '<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                        <figure>
                                            <img src="{{ url("images/customers/' . $row . '") }}" alt="" height="80" width="auto">
                                        </figure>
                                    </div>';
                                }
                                $newSectionContent .= '
                            </div>
                        </div>
                    </section>
                <!-- valued customer end -->';


                //File old section Content
                $oldSectionContent = '
                <!-- valued customer start -->
                    <!-- <section class="section-d padding-block-container" id="our-customers">
                        <h3 class="text-center heading-3">' . $landingPage['title5'] . '</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="container mt-2">
                            <div class="row my-5 text-center d-flex justify-content-between align-items-center our-valued-customer gap-4">';
                                foreach ($explodeCustomerImages as $row) {
                                    $oldSectionContent .= '<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                        <figure>
                                            <img src="{{ url("images/customers/' . $row . '") }}" alt="" height="80" width="auto">
                                        </figure>
                                    </div>';
                                }
                                $oldSectionContent .= '
                            </div>
                        </div>
                    </section> -->
                <!-- valued customer end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php'); 

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==6){

                $explodeClientMessage = explode("+++",$landingPage['clientMessage6']);
                $explodeClientName = explode("+++",$landingPage['clientName6']);
                $explodeClientPost = explode("+++",$landingPage['clientPost6']);

                //File new section Content
                $newSectionContent = '
                <!-- testimonial start -->

                <section class="section-e">
            
                    <div class="container padding-block-container">
                        <h3 class="text-center heading-3">'.$landingPage['title6'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="row responsive">';

                            for($i=0; $i<count($explodeClientMessage); $i++){
                                $newSectionContent .= '<div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="details h-auto">
                                        <p>'.$explodeClientMessage[$i].'
                                        </p>
                                    </div>
                                    <div class="description">
                                        <div class="name">
                                            <strong>'.$explodeClientName[$i].'</strong>
                                        </div>
                                        <div class="designation my-2">
                                            <p>'.$explodeClientPost[$i].'</p>
                                        </div>
                                    </div>
                                </div>';
                            }
                        $newSectionContent .= '</div>
                    </div>
                </section>
                <!-- slick min -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


                <script>
                    $(".responsive").slick({
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            // You can unslick at a given breakpoint now by adding:
                            // settings: "unslick"
                            // instead of a settings object
                        ]
                    });
                </script>
                <!-- testimonial end -->';

                //File old section Content
                $oldSectionContent = '
                <!-- testimonial start -->

                <!-- <section class="section-e">
            
                    <div class="container padding-block-container">
                        <h3 class="text-center heading-3">'.$landingPage['title6'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                        <div class="row responsive">';

                            for($i=0; $i<count($explodeClientMessage); $i++){
                                $oldSectionContent .= '<div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="details h-auto">
                                        <p>'.$explodeClientMessage[$i].'
                                        </p>
                                    </div>
                                    <div class="description">
                                        <div class="name">
                                            <strong>'.$explodeClientName[$i].'</strong>
                                        </div>
                                        <div class="designation my-2">
                                            <p>'.$explodeClientPost[$i].'</p>
                                        </div>
                                    </div>
                                </div>';
                            }
                        $oldSectionContent .= '</div>
                    </div>
                </section>
                <!-- slick min -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


                <script>
                    $(".responsive").slick({
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            // You can unslick at a given breakpoint now by adding:
                            // settings: "unslick"
                            // instead of a settings object
                        ]
                    });
                </script> -->
                <!-- testimonial end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');   

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==7){

                //File new section Content
                $newSectionContent = '
                        <style>
                          #our-contact {
                              background-repeat: no-repeat;
                              background-size: cover;
                              background-position: center bottom;
                              background-color: rgba(0, 0, 0, 0.50) !important;
                              background-image: url("/images/background/'.$landingPage['background_image7'].'");
                              background-blend-mode: multiply;
                              width: 100%;
                              height: auto;
                              display: inline-block;
                          }
                        </style>
                <!-- contact us section-f start -->
                <section class="section-f padding-block-container" id="our-contact">
                    <div class="container">
                        <h3 class="text-center text-white heading-3">'.$landingPage['title7'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px"></span>
            
                        <div class="row">
                            <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12 m-auto">
                                <?php $actual_link = str_replace(".php", "", "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]); ?>
                                <form class="shadow-sm p-4 d-flex justify-content-center align-items-center flex-column bg-white form-a" action="" method="post">
                                    <input name="pagelinks" value="<?php echo $actual_link; ?>" type="hidden" />
                                    <div class="row w-100 mb-3">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield1'].'" name="fname" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield2'].'" name="lname">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="email" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield3'].'" name="email" required>
                                        </div>
                                        <div id="flag-container-hire-virtual-assistant" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 position-relative flag-ca">
                                            <div class="select-box">
                                                <div class="selected-option">
                                                    <div>
                                                        <span class="iconify" data-icon="flag:us-4x3"></span>
                                                        <strong>+1</strong>
                                                    </div>
                                                    <input type="tel" name="tel" placeholder="'.$landingPage['inputfield4'].'" minlength="10" required id="phoneInput">
                                                </div>
                                                <div class="options">
                                                    <input type="text" class="search-box" placeholder="Search Country Name">
                                                    <ol>
            
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Website* -- Ex: http://www.example.com" name="website" required>
                                        </div> -->
            
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" placeholder="'.$landingPage['inputfield5'].'" name="message" required></textarea>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" class="main-button rounded-0" name="contact_form_submit">'.$landingPage['inputfield6'].'</button>
                                        </div>
                                    </div>
            
            
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <script src="{{ url("landing_page/script.js") }}"></script>

                <script>
                    // Get a reference to the input field
                    const phoneInput = document.getElementById("phoneInput");
            
                    // Add an event listener to the input field
                    phoneInput.addEventListener("input", function() {
                        // Remove any non-numeric characters from the input
                        this.value = this.value.replace(/[^0-9+]/g, "");
            
                        // Optionally, you can set a maximum length for the phone number
                        const maxLength = 15; // Change this to your desired maximum length
                        if (this.value.length > maxLength) {
                            this.value = this.value.slice(0, maxLength);
                        }
                    });
                </script>
                <!-- contact us section-f end -->';
                


                //File old section Content
                $oldSectionContent = '
                        <!-- <style>
                          #our-contact {
                              background-repeat: no-repeat;
                              background-size: cover;
                              background-position: center bottom;
                              background-color: rgba(0, 0, 0, 0.50) !important;
                              background-image: url("/images/background/'.$landingPage['background_image7'].'");
                              background-blend-mode: multiply;
                              width: 100%;
                              height: auto;
                              display: inline-block;
                          }
                        </style> -->
                <!-- contact us section-f start -->
                <!-- <section class="section-f padding-block-container" id="our-contact">
                    <div class="container">
                        <h3 class="text-center text-white heading-3">'.$landingPage['title7'].'</h3>
                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px"></span>
            
                        <div class="row">
                            <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12 m-auto">
                                <?php $actual_link = str_replace(".php", "", "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]); ?>
                                <form class="shadow-sm p-4 d-flex justify-content-center align-items-center flex-column bg-white form-a" action="" method="post">
                                    <input name="pagelinks" value="<?php echo $actual_link; ?>" type="hidden" />
                                    <div class="row w-100 mb-3">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield1'].'" name="fname" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield2'].'" name="lname">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <input type="email" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$landingPage['inputfield3'].'" name="email" required>
                                        </div>
                                        <div id="flag-container-hire-virtual-assistant" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 position-relative flag-ca">
                                            <div class="select-box">
                                                <div class="selected-option">
                                                    <div>
                                                        <span class="iconify" data-icon="flag:us-4x3"></span>
                                                        <strong>+1</strong>
                                                    </div>
                                                    <input type="tel" name="tel" placeholder="'.$landingPage['inputfield4'].'" minlength="10" required id="phoneInput">
                                                </div>
                                                <div class="options">
                                                    <input type="text" class="search-box" placeholder="Search Country Name">
                                                    <ol>
            
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Website* -- Ex: http://www.example.com" name="website" required>
                                        </div> -->
            
                                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" placeholder="'.$landingPage['inputfield5'].'" name="message" required></textarea>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" class="main-button rounded-0" name="contact_form_submit">'.$landingPage['inputfield6'].'</button>
                                        </div>
                                    </div>
            
            
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <script src="{{ url("landing_page/script.js") }}"></script>

                <script>
                    // Get a reference to the input field
                    const phoneInput = document.getElementById("phoneInput");
            
                    // Add an event listener to the input field
                    phoneInput.addEventListener("input", function() {
                        // Remove any non-numeric characters from the input
                        this.value = this.value.replace(/[^0-9+]/g, "");
            
                        // Optionally, you can set a maximum length for the phone number
                        const maxLength = 15; // Change this to your desired maximum length
                        if (this.value.length > maxLength) {
                            this.value = this.value.slice(0, maxLength);
                        }
                    });
                </script> -->
                <!-- contact us section-f end -->';
   

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==8){

                $previousImage = $landingPage['background_image8'];

                //File new section Content
                $newSectionContent = '
                        <style>
                       .have-query-section {
                            width: 100%;
                            height: auto;
                            background-color: rgba(36, 106, 178, .75);
                            background-image: url("/images/background/'.$previousImage.'");
                            background-blend-mode: multiply;
                            background-position: center center;
                            background-size: cover;
                            background-repeat: no-repeat;
                            padding-block: 100px;
                        }
                        </style>
                        <!-- section-g start -->
                        <section class="section-g">
                          <div class="have-query-section">
                              <div class="container-fluid" id="have_queries">
                                  <div class="row">
                                      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                          <h3 class="text-extra-dark-gray mb-3 font-weight-700 md-w-100 d-block text-center text-white main-heading">'.$landingPage['title8'].'</h3>
                                          <small class="text-white text-center w-100 d-block pb-5">'.$landingPage['sub_title8'].'</small>

                                          <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
                                              <form action="">
                                                  <input type="text" placeholder="'.$landingPage['field1'].'" required>
                                                  <input type="tel" placeholder="'.$landingPage['field2'].'" required>
                                                  <input type="submit" value="'.$landingPage['field3'].'">
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </section>
                        <!-- section-g start -->';
                


                //File old section Content
                $oldSectionContent = '
                        <!-- <style>
                        .have-query-section {
                            width: 100%;
                            height: auto;
                            background-color: rgba(36, 106, 178, .75);
                            background-image: url("/images/background/'.$previousImage.'");
                            background-blend-mode: multiply;
                            background-position: center center;
                            background-size: cover;
                            background-repeat: no-repeat;
                            padding-block: 100px;
                        }
                        </style> -->
                        <!-- section-g start -->
                        <!-- <section class="section-g">
                        <div class="have-query-section">
                            <div class="container-fluid" id="have_queries">
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                        <h3 class="text-extra-dark-gray mb-3 font-weight-700 md-w-100 d-block text-center text-white main-heading">'.$landingPage['title8'].'</h3>
                                        <small class="text-white text-center w-100 d-block pb-5">'.$landingPage['sub_title8'].'</small>

                                        <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
                                            <form action="">
                                                <input type="text" placeholder="'.$landingPage['field1'].'" required>
                                                <input type="tel" placeholder="'.$landingPage['field2'].'" required>
                                                <input type="submit" value="'.$landingPage['field3'].'">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section> -->
                        <!-- section-g start -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                // Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }

            if($data['section_id']==9){

                //File new section Content
                $newSectionContent = '
                <div class="copyright-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                <p>&copy; '.$landingPage['content9'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                
                
                </body>
                
                </html>';


                //File old section Content
                $oldSectionContent = '
                <!-- <div class="copyright-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                <p>&copy; '.$landingPage['content9'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
                
                
                </body>
                
                </html>';

                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php'); 

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);
            
                //Write the updated content back to the file
                file_put_contents($filePath, $newContent, LOCK_EX);
            }
            }

            landing_pages::where('layout_id',$data['layout_id'])->update(['status'.$data['section_id'] => $status]);
            return response()->json(['status'=>$status, 'section_id'=>$data['section_id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // if($request->ajax()){
        //     $data = $request->all();
        //     $landingPage = landing_pages::where('layout_id',$data['layout_id'])->first();
        //     $serviceId = $data['serviceId'] - 1;

        //     $explodeServiceName = explode("+++",$landingPage['service_name3']);
        //     $explodeServiceDescription = explode("+++",$landingPage['service_description3']);
        //     $explodeServiceIcon = explode(",",$landingPage['service_icon3']);

        //     $explodeServiceName[$serviceId] = NULL;
        //     $explodeServiceDescription[$serviceId] = NULL;
        //     $explodeServiceIcon[$serviceId] = NULL;

        //     $implodeServiceName = implode("+++",$explodeServiceName);
        //     $implodeServiceDescription = implode("+++",$explodeServiceDescription);
        //     $implodeServiceIcon = implode(",",$explodeServiceIcon);

        //     landing_pages::where('layout_id',$data['layout_id'])->update(['service_name3' => $implodeServiceName,'service_description3' => $implodeServiceDescription,'service_icon3' => $implodeServiceIcon]);
        //     return response()->json(['status'=>1]);
            
        // }
    }

    public function checkPageUrl(Request $request){
        $data = $request->all();
        
        if(layout::where('page_url', $data['pageUrl'])->exists()){
            return false;
        }else{
            return true;
        }
        
    }
}
