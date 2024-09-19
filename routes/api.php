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
    // Route::post('/addModule1',[aplusController::class,'addModule1']);
    Route::post('/getProducts',[aplusController::class,'getProducts']);
    Route::post('/getDelProducts',[aplusController::class,'getDelProducts']);
    Route::post('/getProductsById',[aplusController::class,'getProductsById']);
    Route::post('/getModule1ById',[aplusController::class,'getModule1ById']);
    Route::post('/getModule2ById',[aplusController::class,'getModule2ById']);
    Route::post('/getModule3ById',[aplusController::class,'getModule3ById']);
    Route::post('/getModule4ById',[aplusController::class,'getModule4ById']);
    Route::post('/getModule5ById',[aplusController::class,'getModule5ById']);
    Route::post('/getModule6ById',[aplusController::class,'getModule6ById']);
    Route::post('/getModule7ById',[aplusController::class,'getModule7ById']);
    Route::post('/getModule8ById',[aplusController::class,'getModule8ById']);
    Route::post('/getModule9ById',[aplusController::class,'getModule9ById']);
    Route::post('/getModule10ById',[aplusController::class,'getModule10ById']);
    Route::post('/updateProductStatus',[aplusController::class,'updateProductStatus']);
    Route::post('/deleteProduct',[aplusController::class,'deleteProduct']);
    Route::post('/updateProduct',[aplusController::class,'updateProduct']);
    Route::post('/submitPayment',[aplusController::class,'submitPayment']);
    Route::post('/paymentStatus',[aplusController::class,'paymentStatus']);
});

Route::post('/razorpay/webhook', [aplusController::class, 'handleWebhook']);



