<?php

use Illuminate\Support\Facades\Route;

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

        //Display Landing Pages
        Route::match(['get','post'],'landing-pages','LandingPageController@index');
        Route::match(['get','post'],'create-landing-pages','LandingPageController@create');

    });
});
