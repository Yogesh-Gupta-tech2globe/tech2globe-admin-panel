<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aplusController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('aplusplugin-validation', aplusController::class);

Route::prefix('/aplus-content')->group(function(){
    Route::post('/register',[aplusController::class,'store']);
    Route::post('/deactivate',[aplusController::class,'edit']);
    Route::post('/addProduct',[aplusController::class,'create']);
    Route::post('/addModule1',[aplusController::class,'addModule1']);
    Route::post('/getProducts',[aplusController::class,'getProducts']);
    Route::post('/getProductsById',[aplusController::class,'getProductsById']);
    Route::post('/getModule1ById',[aplusController::class,'getModule1ById']);
    Route::post('/updateProductStatus',[aplusController::class,'updateProductStatus']);
    Route::post('/deleteProduct',[aplusController::class,'deleteProduct']);
    Route::post('/updateProduct',[aplusController::class,'updateProduct']);
});



