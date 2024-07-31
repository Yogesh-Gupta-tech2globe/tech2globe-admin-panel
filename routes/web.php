<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tech2globeController;
use Illuminate\Routing\RouteRegistrar;
use App\Models\portfolio;
use App\Models\casestudy;
use App\Models\testimonial;
use App\Models\faq;
use App\Models\blog;
use App\Http\Controllers\mailController;
use App\Http\Controllers\aplusController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\JobsController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\admin\CasestudyController;

require __DIR__.'/pages.php';
require __DIR__.'/mainMenu.php';
require __DIR__.'/subMenu.php';
require __DIR__.'/casestudy.php';


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
    return view('home');
});

Route::post('/mail', [mailController::class, 'mail']);
Route::get('/aplusplugin-register', [aplusController::class, 'index']);
Route::post('/aplusplugin-create', [aplusController::class, 'create']);
Route::get('/aplusplugin-thank', function () { 
    return view('aplusplugin.thankyou');
});

function fetch_post_by_id($base_url, $post_id) {
    $url = "$base_url/$post_id";
    $response = file_get_contents($url);
    if ($response === FALSE) {
        return null;
    }
    $post = json_decode($response, true);
    return $post;
}

Route::post('/getevents', [EventController::class, 'getevents']);
Route::post('/geteventsyear', [EventController::class, 'geteventsyear']);

Route::post('/getPortfolioSubcat', [PortfolioController::class, 'getPortfolioSubcat']);
Route::post('/getportfolio', [PortfolioController::class, 'getPortfolio']);

Route::post('/getCasestudy', [CasestudyController::class, 'getCasestudy']);

Route::match(['get','post'],'/career_form/{id}', [JobsController::class, 'create'])->whereNumber('id');

Route::get('/thank-you', function () { 
    return view('thank-you');
});

// Route::get('/about-us', function () {
    
//     return view('about-us');
// });




// Route::get('/','HomeController@home');

// Second Method

// Route::view('welcome','/welcome');

// Third Method

// Route::get('/post/{id?}', function(string $id = null){

//     if($id){
//         return "<h1>Post ID : ".$id."</h1>";
//     }else{
//         return "<h1>No ID Found</h1>";
//     }
// });

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){

    Route::match(['get','post'],'login','AdminController@login');
    Route::match(['get','post'],'register','AdminController@register');
    Route::match(['get','post'],'forgot-password','AdminController@forgot_password');

    Route::group(['middleware'=>['admin']],function(){
        
        Route::get('dashboard','AdminController@dashboard');
        Route::get('logout','AdminController@logout');    

        //Update Admin Details
        Route::match(['get','post'],'update-password','AdminController@update_password');
        Route::match(['get','post'],'update-details','AdminController@update_details');
        Route::post('check-current-password','AdminController@checkCurrentPassword');

        //Display Users
        Route::get('users','UsersController@index');
        Route::post('update-users-status','UsersController@update');
        Route::match(['get','post'],'add-edit-users/{id?}','UsersController@edit');
        Route::get('delete-users/{id?}','UsersController@destroy');
        Route::match(['get','post'],'update-role/{id?}','UsersController@updateRole');

        //Display Layout
        // Route::match(['get','post'],'layout','LayoutController@index');
        // Route::match(['get','post'],'all-layout','LayoutController@show');

        //Display Landing Pages
        // Route::match(['get','post'],'landing-pages','LandingPageController@index');
        // Route::match(['get','post'],'create-landing-pages/{id}','LandingPageController@create');
        // Route::match(['get','post'],'check-page-url','LandingPageController@checkPageUrl');
        // Route::match(['get','post'],'update-landingPage-section-status','LandingPageController@update');
        // Route::match(['get','post'],'remove-landingPage-services','LandingPageController@destroy');

        //Display Tec2globe Layout
        Route::match(['get','post'],'tech2globe-layout','Tech2globeLayoutController@index');
        // Route::match(['get','post'],'tech2globe-all-layout','Tech2globeLayoutController@show');
        Route::match(['get','post'],'tech2globe-layout/header','Tech2globeLayoutController@header');
        Route::match(['get','post'],'tech2globe-layout/footer','Tech2globeLayoutController@footer');
        Route::match(['get','post'],'tech2globe-layout/add-edit-main-menu/{id?}','Tech2globeLayoutController@addEditMainMenu');
        Route::match(['get','post'],'tech2globe-layout/add-edit-sub-menu/{id?}','Tech2globeLayoutController@addEditSubMenu');
        Route::match(['get','post'],'tech2globe-layout/add-edit-new-page/{id?}','Tech2globeLayoutController@addEditNewPage');
        Route::match(['get','post'],'tech2globe-layout/add-edit-new-page-category/{id?}','Tech2globeLayoutController@addEditNewPageCategory');
        Route::get('delete-mainMenu/{id?}','Tech2globeLayoutController@deleteMainMenu');
        Route::get('delete-subMenu/{id?}','Tech2globeLayoutController@deleteSubMenu');
        Route::post('update-mainMenu-status','Tech2globeLayoutController@updateMainMenu');
        Route::post('update-subMenu-status','Tech2globeLayoutController@updateSubMenu');
        Route::post('update-pageCate-status','Tech2globeLayoutController@updatePageCategory');
        Route::post('update-allPages-status','Tech2globeLayoutController@updateAllPages');
        Route::post('tech2globe-getPageCategory','Tech2globeLayoutController@getPageCategory');
        Route::post('check-all-pages-url','Tech2globeLayoutController@checkPageUrl');
        Route::match(['get','post'],'tech2globe-layout/add-edit-footer-pages/{id?}','Tech2globeLayoutController@addEditFooterPages');
        Route::post('update-footerPages-status','Tech2globeLayoutController@updateFooterPages');
        Route::get('delete-footerPages/{id?}','Tech2globeLayoutController@deleteFooterPages');
        Route::match(['get','post'],'tech2globe-layout/add-edit-footer-socialicons/{id?}','Tech2globeLayoutController@addEditFooterSocialIcons');

        //Mobile Header
        Route::match(['get','post'],'tech2globe-layout/mobile-header','Tech2globeLayoutController@mobileheader');

        //Tech2globe Service Theme
        // Route::post('create-service-theme','Tech2globeServiceThemeController@create');

        //File Management Module
        Route::get('all-files', 'FileManagementController@index');
        Route::get('linked-files', 'FileManagementController@linkedFiles');
        Route::get('unlinked-files', 'FileManagementController@unlinkedFiles');
        Route::match(['get','post'],'add-edit-file/{id?}', 'FileManagementController@create');
        Route::match(['get','post'], 'css-files', 'FileManagementController@cssFiles');
        Route::match(['get','post'], 'js-files', 'FileManagementController@jsFiles');
        Route::get('include-files', 'FileManagementController@includeFiles');
        Route::match(['get','post'],'add-edit-include-file/{id?}', 'FileManagementController@createInclude');

        //Extras Module
        //Contact and social
        Route::get('contact-social', 'ExtrasController@contactSocial');
        Route::match(['get','post'],'add-edit-social-media/{id?}', 'ExtrasController@addEditSocialMedia');
        Route::post('updateContactdetails','ExtrasController@updateContactdetails');
        Route::post('update-social-status', 'ExtrasController@updateSocial');
        //Company Branch 
        Route::get('company-branch', 'ExtrasController@companyBranch');
        Route::match(['get','post'],'add-edit-company-branch/{id?}', 'ExtrasController@addEditCompanyBranch');
        Route::post('update-branch-status', 'ExtrasController@updateBranch');
        //Achievements
        Route::get('achievements', 'ExtrasController@achievements');
        Route::match(['get','post'],'add-edit-achievements/{id?}', 'ExtrasController@addEditAchievements');
        Route::post('update-achievements-status', 'ExtrasController@updateAchievements');
        //Site Logo
        Route::get('site-logo', 'ExtrasController@sitelogo');
        Route::post('site-logo-update', 'ExtrasController@sitelogoupdate');
        //Recaptcha 
        Route::get('recaptcha', 'ExtrasController@recaptcha');
        Route::post('recaptcha-update', 'ExtrasController@recaptchaupdate');


        //Our Work Module
        //Portfolio
        Route::get('portfolio','PortfolioController@index');
        Route::post('update-portfolio-status','PortfolioController@update');
        Route::match(['get','post'],'add-edit-portfolio/{id?}','PortfolioController@edit');
        Route::post('getSubcategory', 'PortfolioController@getsubcategory');

        //Testimonial
        Route::get('testimonial','TestimonialController@index');
        Route::match(['get','post'],'add-edit-testimonial/{id?}','TestimonialController@addEditTestimonial');
        Route::post('update-testimonial-status','TestimonialController@update');

        //Faq
        Route::get('faq','FaqController@index');
        Route::match(['get','post'],'add-edit-faq/{id?}','FaqController@addEditFaq');
        Route::post('update-faq-status','FaqController@update');

        //Case Study
        Route::get('case-study','CasestudyController@index');
        Route::match(['get','post'],'add-edit-case-study/{id?}','CasestudyController@addEditCasestudy');
        Route::post('create-case-study-section', 'CasestudyController@createsections');
        Route::post('update-casestudy-status', 'CasestudyController@updateCasestudy');

        //Blog
        Route::get('blog','BlogController@index');
        Route::match(['get','post'],'add-edit-blog/{id?}','BlogController@addEditBlog');
        Route::post('update-blog-status','BlogController@update');

        //Event Module
        Route::get('event','EventController@index');
        Route::get('event-category','EventController@eventCategory');
        Route::post('add-edit-eventCategory/{id?}','EventController@addEditEventCategory')->whereNumber('id');
        Route::post('update-eventCat-status','EventController@updateCat');
        Route::match(['get','post'],'add-edit-event/{id?}','EventController@addEditEvent')->whereNumber('id');
        Route::post('delete-event-image','EventController@deleteEventImage');
        Route::post('update-event-status','EventController@update');
        Route::post('eventOrderUpdate','EventController@eventOrderUpdate');

        //Job Module
        Route::get('jobs','JobsController@index');
        Route::match(['get','post'],'add-edit-job/{id?}','JobsController@addEditJob')->whereNumber('id');
        Route::post('update-job-status','JobsController@update');
        Route::get('job-applications','JobsController@show');
        Route::post('update-jobRequest-status/{id}', 'JobsController@updateRequest');
        Route::post('jobRequestSendPendingMail', 'JobsController@jobRequestSendPendingMail');

        //Log Module
        Route::get('logs','logsController@index');

        //SEO Module
        Route::get('seo','SeoController@index');
        Route::match(['get','post'],'add-edit-seo/{id?}','SeoController@addEditSeo')->whereNumber('id');
        Route::post('update-seoPage-status', 'SeoController@update');
        Route::post('seo-update-static', 'SeoController@seoUpdateStatic');

        //Resource Module
        Route::prefix('resources')->group(function(){
             //Portfolio
            Route::get('portfolio','PortfolioController@index2');
            Route::post('update-portfolio-status','PortfolioController@update2');
            Route::match(['get','post'],'add-edit-portfolio/{id?}','PortfolioController@edit2');
            // Route::get('delete-portfolio/{id?}','PortfolioController@destroy');
            Route::get('portfolio-category','PortfolioController@portfolioCategory');
            Route::match(['get','post'],'add-edit-portfolio-category/{id?}','PortfolioController@addEditPortfolioCategory');
            Route::post('update-portfolio-cat-status', 'PortfolioController@updatePortfolioCat');
            Route::get('portfolio-subcategory','PortfolioController@portfolioSubCategory');
            Route::match(['get','post'],'add-edit-portfolio-subcategory/{id?}','PortfolioController@addEditPortfolioSubCategory');
            Route::post('update-portfolio-subcat-status', 'PortfolioController@updatePortfolioSubCat');
            Route::post('getSubcategory', 'PortfolioController@getsubcategory');

            //Testimonial
            Route::get('testimonial','TestimonialController@index2');
            Route::match(['get','post'],'add-edit-testimonial/{id?}','TestimonialController@addEditTestimonial2');
            Route::post('update-testimonial-status','TestimonialController@update2');

            //Case Study
            Route::get('case-study','CasestudyController@index2');
            Route::match(['get','post'],'add-case-study','CasestudyController@addCasestudy');
            Route::match(['get','post'],'edit-case-study/{id}','CasestudyController@editCasestudy')->whereNumber('id');
            // Route::post('create-case-study-section', 'CasestudyController@createsections');
            Route::post('update-casestudy-status', 'CasestudyController@update');
            Route::get('case-study-category','CasestudyController@casestudyCategory');
            Route::match(['get','post'],'add-edit-casestudy-category/{id?}','CasestudyController@addEditCasestudyCategory');
            Route::post('update-casestudycategory-status', 'CasestudyController@updateCasestudyCat');

            //Faq
            Route::get('faq','FaqController@index2');
            Route::match(['get','post'],'add-edit-faq/{id?}','FaqController@addEditFaq2');
            Route::post('update-faq-status','FaqController@update2');
        });

    });
});

            //Landing Pages Routes
            // Route::get('/amazon-services', function () {
            //     return view('landing-page/amazon-services');
            // });Route::get('/yogesh-website', function () {
            //     return view('landing-page/yogesh-website');
            // });Route::get('/testing-page', function () {
            //     return view('landing-page/testing-page');
            // });Route::get('/demo-page', function () {
            //     return view('landing-page/demo-page');
            // });Route::get('/update-section-complete', function () {
            //     return view('landing-page/update-section-complete');
            // });Route::get('/hello-world', function () {
            //     return view('landing-page/hello-world');
            // });Route::get('/naved-sir-ji', function () {
            //     return view('landing-page/naved-sir-ji');
            // });Route::get('/new-york', function () {
            //     return view('landing-page/new-york');
            // });Route::get('/bhavya', function () {
            //     return view('landing-page/bhavya');
            // });

            //Tech2globe Pages
            
                Route::get("/amazon-consulting", function () {

                    $data = ["pageName" => "Amazon Consulting"];
                    return view("demo-file", $data);

                });
                Route::get("/amazon-services", function () {

                    $portfolio = portfolio::where('status',1)->where('page_id',11)->get()->toArray();
                    $casestudy = casestudy::where('status',1)->where('page_id',11)->get()->toArray();
                    $testimonials = testimonial::where('status',1)->where('page_id',11)->get()->toArray();
                    $faq = faq::where('status',1)->where('page_id',11)->get()->toArray();
                    $blog = blog::select('blog_id')->where('status',1)->where('page_id',11)->get()->toArray();

                    // $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    // $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    // foreach ($post_ids as $post_id) {
                    //     $post = fetch_post_by_id($base_url, $post_id['blog_id']);
                    //     if ($post) {
                    //         $all_posts[] = $post;
                    //     } 
                    // }

                    $data = ["pageName" => "Amazon Services","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("demo-file", $data);

                });
                Route::get("/new-page", function () {

                    $data = ["pageName" => "New Page"];
                    return view("demo-file", $data);

                });
                Route::get("/accounting-services", function () {

                    $portfolio = portfolio::where('status',1)->where('page_id',12)->get()->toArray();
                    $casestudy = casestudy::where('status',1)->where('page_id',12)->get()->toArray();
                    $testimonials = testimonial::where('status',1)->where('page_id',12)->get()->toArray();
                    $faq = faq::where('status',1)->where('page_id',12)->get()->toArray();
                    $data = ["pageName" => "Accounting Services","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy];
                    return view("accounting-services", $data);

                });

         






                Route::get("/react-web-appliction", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",13)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",13)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",13)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",13)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",13)->get()->toArray();

                    // $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    // $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    // foreach ($post_ids as $post_id) {
                    //     $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                    //     if ($post) {
                    //         $all_posts[] = $post;
                    //     } 
                    // }

                    $data = ["pageName" => "Amazon Services","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("demo-file", $data);

                });
                Route::get("/internal-testing010", function () {

                    $data = ["pageName" => "Internal Testing"];
                    return view("demo-file", $data);

                });
                Route::get("/digital-marketing-thu", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",14)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",14)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",14)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",14)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",14)->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "Amazon Services","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("demo-file", $data);

                });
                
                Route::get("/contact-us", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",15)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",15)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",15)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",15)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",15)->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "Amazon Services","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("demo-file", $data);

                });
                Route::get("/contact-us", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",15)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",15)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",15)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",15)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",15)->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "Amazon Services","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("demo-file", $data);

                });
                Route::get("/contact-us", function () {

                    $data = ["pageName" => "Yash"];
                    return view("demo-file", $data);

                });
                Route::get("/contact-us", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",15)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",15)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",15)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",15)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",15)->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "Amazon Services","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("demo-file", $data);

                });
                Route::get("/contact-us", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",15)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",15)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",15)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",15)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",15)->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "Amazon Services","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("demo-file", $data);

                });
                Route::get("/contact-us", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",15)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",15)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",15)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",15)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",15)->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "Amazon Services","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("demo-file", $data);

                });
                Route::get("/contact-us", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",15)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",15)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",15)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",15)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",15)->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "Amazon Services","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("demo-file", $data);

                });
                Route::get("/new-era-new", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",16)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",16)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",16)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",16)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",16)->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "New era new","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("accounting-services", $data);

                });
                Route::get("/testimonial", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",17)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",17)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",17)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",17)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",17)->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "Testimonial","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("testimonial", $data);

                });
                Route::get("/new-test-page-23", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",91)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",91)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",91)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",91)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",91)->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "New Test Page","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("new-testing-page", $data);

                });
                Route::get("/seo-page", function () {

                    $portfolio = portfolio::where("status",1)->where("page_id",92)->get()->toArray();
                    $casestudy = casestudy::where("status",1)->where("page_id",92)->get()->toArray();
                    $testimonials = testimonial::where("status",1)->where("page_id",92)->get()->toArray();
                    $faq = faq::where("status",1)->where("page_id",92)->get()->toArray();
                    $blog = blog::select("blog_id")->where("status",1)->where("page_id",92)->get()->toArray();

                    $base_url = "https://blog.tech2globe.com/wp-json/wp/v2/posts";
                    $post_ids = $blog; // replace with your array of post IDs
                    $all_posts = [];

                    foreach ($post_ids as $post_id) {
                        $post = fetch_post_by_id($base_url, $post_id["blog_id"]);
                        if ($post) {
                            $all_posts[] = $post;
                        } 
                    }

                    $data = ["pageName" => "SEO Page","portfolio" => $portfolio,"testimonials" => $testimonials,"faq" => $faq,"casestudy" => $casestudy,"all_posts" => $all_posts];
                    return view("seo-page", $data);

                });