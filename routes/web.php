<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tech2globeController;
use Illuminate\Routing\RouteRegistrar;

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

Route::get('/about-us', function () {
    
    return view('about-us');
});

Route::get('/react-web-application', function () {
    
    return view('react-web-appliction');
});


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

        //Display Portfolio
        Route::get('portfolio','PortfolioController@index');
        Route::post('update-portfolio-status','PortfolioController@update');
        Route::match(['get','post'],'add-edit-portfolio/{id?}','PortfolioController@edit');
        Route::get('delete-portfolio/{id?}','PortfolioController@destroy');

        //Display Layout
        Route::match(['get','post'],'layout','LayoutController@index');
        Route::match(['get','post'],'all-layout','LayoutController@show');

        //Display Landing Pages
        Route::match(['get','post'],'landing-pages','LandingPageController@index');
        Route::match(['get','post'],'create-landing-pages/{id}','LandingPageController@create');
        Route::match(['get','post'],'check-page-url','LandingPageController@checkPageUrl');
        Route::match(['get','post'],'update-landingPage-section-status','LandingPageController@update');
        Route::match(['get','post'],'remove-landingPage-services','LandingPageController@destroy');

        //Display Tec2globe Layout
        Route::match(['get','post'],'tech2globe-layout','Tech2globeLayoutController@index');
        Route::match(['get','post'],'tech2globe-all-layout','Tech2globeLayoutController@show');
        Route::match(['get','post'],'tech2globe-layout/header','Tech2globeLayoutController@header');
        Route::match(['get','post'],'tech2globe-layout/footer','Tech2globeLayoutController@footer');
        Route::match(['get','post'],'tech2globe-layout/add-edit-main-menu/{id?}','Tech2globeLayoutController@addEditMainMenu');
        Route::match(['get','post'],'tech2globe-layout/add-edit-sub-menu/{id?}','Tech2globeLayoutController@addEditSubMenu');
        Route::get('delete-mainMenu/{id?}','Tech2globeLayoutController@deleteMainMenu');
        Route::get('delete-subMenu/{id?}','Tech2globeLayoutController@deleteSubMenu');
        Route::post('update-mainMenu-status','Tech2globeLayoutController@updateMainMenu');
        Route::post('update-subMenu-status','Tech2globeLayoutController@updateSubMenu');
        Route::post('check-all-pages-url','Tech2globeLayoutController@checkPageUrl');
        Route::match(['get','post'],'tech2globe-layout/add-edit-footer-pages/{id?}','Tech2globeLayoutController@addEditFooterPages');
        Route::post('update-footerPages-status','Tech2globeLayoutController@updateFooterPages');
        Route::get('delete-footerPages/{id?}','Tech2globeLayoutController@deleteFooterPages');
        Route::match(['get','post'],'tech2globe-layout/add-edit-footer-socialicons/{id?}','Tech2globeLayoutController@addEditFooterSocialIcons');


        //Tech2globe Service Theme
        Route::post('create-service-theme','Tech2globeServiceThemeController@create');

    });
});

            //Landing Pages Routes
            Route::get('/amazon-services', function () {
                return view('landing-page/amazon-services');
            });Route::get('/yogesh-website', function () {
                return view('landing-page/yogesh-website');
            });Route::get('/testing-page', function () {
                return view('landing-page/testing-page');
            });Route::get('/demo-page', function () {
                return view('landing-page/demo-page');
            });Route::get('/update-section-complete', function () {
                return view('landing-page/update-section-complete');
            });Route::get('/hello-world', function () {
                return view('landing-page/hello-world');
            });Route::get('/naved-sir-ji', function () {
                return view('landing-page/naved-sir-ji');
            });Route::get('/new-york', function () {
                return view('landing-page/new-york');
            });Route::get('/bhavya', function () {
                return view('landing-page/bhavya');
            });

            //Tech2globe Pages
            Route::get('/data-management', function () {
                return view('data-management');
            });Route::get('/laravel-file', function () {
                return view('laravel-file');
            });