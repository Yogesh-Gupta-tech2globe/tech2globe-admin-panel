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
                                </header>
                            
                            
                            </body>
                            
                            </html>';
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
        }else{
            $landingPage = new landing_pages;
        }


        if($request->isMethod('post')){
            $data = $request->all();

            if(array_key_exists('section1', $data)){

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

                                $layout->logo = $logoName;
                                $layout->save();
                            } 
                        }else{
                            return redirect()->back()->with('error_message','There is some error on deleting Logo Image!');
                        }
                    }else{
                        return redirect()->back()->with('error_message','Logo Image not found! Please contact Admin');
                    }
                }

                //Updating Favicon Icon Image
                if(!empty($layout['favicon_icon']) && !empty($data['favicon_icon'])){

                       
                    $faviconimagePath = public_path('images/favicon-icon/'.$layout['favicon_icon']);
    
                    if(file_exists($faviconimagePath)){
                        if(unlink($faviconimagePath)){

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

                                $layout->favicon_icon = $faviconName;
                                $layout->save();
                            } 
                        }else{
                            return redirect()->back()->with('error_message','There is some error on deleting Logo Image!');
                        }
                    }else{
                        return redirect()->back()->with('error_message','Logo Image not found! Please contact Admin');
                    }
                }

                //File Content
                $fileContent = '<!DOCTYPE html>
                                <html lang="en">
                                
                                <head>
                                    <meta charset="UTF-8">
                                    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
                                
                                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                    <meta property="title" content="'.$layout['meta_title'].'">
                                    <meta name="description" content="'.$layout['meta_description'].'" />
                                    <meta name="keywords" content="'.$layout['meta_keywords'].'">
                                    <meta name="author" content="tech2globe">
                                    <link rel="icon" type="image/png" sizes="32x32" href="{{ url("images/favicon-icon/'.$layout['favicon_icon'].'") }}">
                                    <title>'.$layout['page_name'].'</title>
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
                                                <a class="navbar-brand w-25" href="#"><img width="auto" height="50px" src="{{ url("images/logo/'.$layout['logo'].'") }}" alt=""></a>
                                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                                    <span class="navbar-toggler-icon"></span>
                                                </button>
                                                <div class="collapse navbar-collapse" id="navbarNav">
                                                    <ul class="navbar-nav ms-auto">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" aria-current="page" href="#'.Str::slug($data['menu1']).'">'.$data['menu1'].'</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#'.Str::slug($data['menu2']).'">'.$data['menu2'].'</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#'.Str::slug($data['menu3']).'">'.$data['menu3'].'</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#'.Str::slug($data['menu4']).'">'.$data['menu4'].'</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </nav>
                                    </header>
                                
                                
                                </body>
                                
                                </html>';
                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                //Creating the file
                file_put_contents($filePath, $fileContent);   
                

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

            if(array_key_exists('section2', $data)){

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
                                        <a href="#our-contact" class="main-button">'.$landingPage['button1'].'</a>
                                        <a href="tel:+1-250-206-8787" class="main-button call-us-btn">'.$landingPage['button2'].'</a>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-xs-12">
                                    <figure class="w-100">
                                        <img class="w-100" style="border-radius: 20px; height: 300px;" src="{{ url("images/banner/'.$landingPage["banner_image2"].'") }}" alt="">
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
                                        <a href="#our-contact" class="main-button">'.$data['button1'].'</a>
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

                //Creating the file
                // file_put_contents($filePath, $fileContent,FILE_APPEND | LOCK_EX);   

                // Read the entire file
                $currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                $newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);

                // echo $newContent; die;
            
                // // Write the updated content back to the file
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

            if(array_key_exists('section3', $data)){

                $message = "Section 3 updated Successfully!";

                
                //Updating Banner Upper Image
                // if(!empty($data['banner_image2'])){

                //     // Removing Previous Banner Upper Image   
                //     if(!empty($landingPage['banner_image2'])){
                //         $bannerimagePath = public_path('images/banner/'.$landingPage['banner_image2']);
    
                //         if(file_exists($bannerimagePath)){
                //             if(unlink($bannerimagePath)){

                //             }else{
                //                 return redirect()->back()->with('error_message','There is some error on deleting Banner Upper Image!');
                //             }
                //         }else{
                //             return redirect()->back()->with('error_message','Banner Upper Image not found! Please contact Admin');
                //         }
                //     }

                //     if($request->hasFile('banner_image2')){
                //         $image_tmp = $request->file('banner_image2');
                //         if($image_tmp->isValid()){
                //             //Get Image Extension
                //             $extension = $image_tmp->getClientOriginalExtension();
                //             //Generate New Image Name
                //             $bannerImage = rand(111,98999).'.'.$extension;
                //             $image_path = 'images/banner/'.$bannerImage;
                //             Image::make($image_tmp)->save($image_path);
                //         }
                //     } 
                // }else{
                //     $bannerImage = $landingPage['banner_image2'];
                // }

                
                //File old section Content
                // $oldSectionContent = '
                // <!-- hero section start -->
                // <style>
                //     .section-a {
                //         background: url("images/background/'.$landingPage['background_image2'].'");
                //         background-size: cover;
                //         width: 100%;
                //     }
                // </style>
                // <section class="section-a">
                //         <div class="container">
                //             <div class="row sub-section-a d-flex justify-content-between align-items-center">
                //                 <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-xs-12">
                //                     <h1 class="text-dark main-heading">'.$landingPage['title2'].'</h1>
                //                     <p class="" style="color: #f26e4f;">'.$landingPage['sub_title2'].'</p>
                //                     <div class="button-container">
                //                         <a href="#our-contact" class="main-button">'.$landingPage['button1'].'</a>
                //                         <a href="tel:+1-250-206-8787" class="main-button call-us-btn">'.$landingPage['button2'].'</a>
                //                     </div>
                //                 </div>
                //                 <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-xs-12">
                //                     <figure class="w-100">
                //                         <img class="w-100" style="border-radius: 20px; height: 300px;" src="{{ url("images/banner/'.$landingPage["banner_image2"].'") }}" alt="">
                //                     </figure>
                //                 </div>
                //             </div>
                //         </div>
                // </section>
                // <!-- hero section end -->';

                //File new section Content
                $newSectionContent = '
                <!-- service section start -->
                    <section class="section-b" id="our-services">
                        <div class="container padding-block-container">
                            <div class="row d-flex justify-content-center">
                                <h3 class="text-center heading-3">'.$data['title3'].'</h3>
                                <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 20%;"></span>
                                <p class="text-center pt-2 pb-2">'.$data['description3'].'</p>

                                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                    <div class="card">
                                        <div class="heading-container">
                                            <figure class="icon w-25">
                                                <img class="w-100" src="{{ url("landing_page/images/data-entry-service.png") }}" alt="">
                                            </figure>
                                            <div class="heading-4">
                                                <h4 class="text-dark text-center">Data Entry Services</h4>
                                            </div>
                                        </div>
                                        <div class="content-container text-center">
                                            <p class="text-dark">We have been in the data entry business for over 12 years, and our services are backed by this solid experience in handling diverse requirements.</p>
                                            <a href="" class="sub-button">Read More</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                <!-- service section end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                //Creating the file
                // file_put_contents($filePath, $fileContent,FILE_APPEND | LOCK_EX);   

                // Read the entire file
                //$currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                //$newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);

                // echo $newContent; die;
            
                // // Write the updated content back to the file
                if(!empty($landingPage['section3_id'])){
                    //file_put_contents($filePath, $newContent, LOCK_EX);
                    file_put_contents($filePath, $newSectionContent,FILE_APPEND | LOCK_EX);
                }else{
                    file_put_contents($filePath, $newSectionContent,FILE_APPEND | LOCK_EX);
                }

                $serviceName = [];
                $serviceDescription = [];

                foreach($data as $content => $value){

                    if(str_contains($content,'serviceName')){
                        array_push($serviceName,$value);
                    }else if(str_contains($content,'serviceDescription')){
                        array_push($serviceDescription,$value);
                    }
                }

                $implodeServiceName = implode("+++",$serviceName);
                $implodeServiceDescription = implode("+++",$serviceDescription);

                $landingPage->layout_id = $id;
                $landingPage->section3_id = 3;
                $landingPage->title3 = $data['title3'];
                $landingPage->description3 = $data['description3'];
                $landingPage->service_name3 = $implodeServiceName;
                $landingPage->service_description3 = $implodeServiceDescription;
                $landingPage->save();
                return redirect('admin/create-landing-pages/'.$id.'')->with('success_message',$message);
            }

            if(array_key_exists('section4', $data)){

                $message = "Section 4 updated Successfully!";

                
                //File old section Content
                // $oldSectionContent = '
                // <!-- hero section start -->
                // <style>
                //     .section-a {
                //         background: url("images/background/'.$landingPage['background_image2'].'");
                //         background-size: cover;
                //         width: 100%;
                //     }
                // </style>
                // <section class="section-a">
                //         <div class="container">
                //             <div class="row sub-section-a d-flex justify-content-between align-items-center">
                //                 <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-xs-12">
                //                     <h1 class="text-dark main-heading">'.$landingPage['title2'].'</h1>
                //                     <p class="" style="color: #f26e4f;">'.$landingPage['sub_title2'].'</p>
                //                     <div class="button-container">
                //                         <a href="#our-contact" class="main-button">'.$landingPage['button1'].'</a>
                //                         <a href="tel:+1-250-206-8787" class="main-button call-us-btn">'.$landingPage['button2'].'</a>
                //                     </div>
                //                 </div>
                //                 <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-xs-12">
                //                     <figure class="w-100">
                //                         <img class="w-100" style="border-radius: 20px; height: 300px;" src="{{ url("images/banner/'.$landingPage["banner_image2"].'") }}" alt="">
                //                     </figure>
                //                 </div>
                //             </div>
                //         </div>
                // </section>
                // <!-- hero section end -->';

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
                    <!-- why should you hire end -->';
                

                $filePath = resource_path('views/landing-page/'.$layout['page_url'].'.blade.php');

                //Creating the file
                // file_put_contents($filePath, $fileContent,FILE_APPEND | LOCK_EX);   

                // Read the entire file
                //$currentContent = file_get_contents($filePath);

                // Construct the new content with the updated section
                //$newContent = str_ireplace($oldSectionContent, $newSectionContent, $currentContent);

                // echo $newContent; die;
            
                // // Write the updated content back to the file
                if(!empty($landingPage['section4_id'])){
                    //file_put_contents($filePath, $newContent, LOCK_EX);
                    file_put_contents($filePath, $newSectionContent,FILE_APPEND | LOCK_EX);
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
    public function update(Request $request, landing_pages $landing_pages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(landing_pages $landing_pages)
    {
        //
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
