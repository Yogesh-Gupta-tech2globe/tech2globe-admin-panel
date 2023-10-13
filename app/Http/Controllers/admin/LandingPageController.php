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
                                            <a class="navbar-brand w-25" href="#"><img class="w-75" src="{{ url("images/logo/'.$logoName.'") }}" alt=""></a>
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
            file_put_contents($routePath, $routeContent, FILE_APPEND | LOCK_EX);


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
    public function create($id)
    {
        Session::put('page','all_layout');

        $layout = layout::find($id);

        return view('admin.landing-pages.create-landing-pages')->with(compact('layout'));
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
