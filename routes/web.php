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
