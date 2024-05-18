<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use App\Models\casestudy;

                Route::get('/casestudy/yash', function () {
                    return view('casestudy/yash');
                });
                Route::get("/casestudy/naved", function () {

                    $casestudy = casestudy::where("name","Naved")->first();
                    return view("casestudy/naved", $casestudy);

                });
                Route::get("/casestudy/restaurant-menu-data-entry-for-delivery-hero", function () {

                    $casestudy = casestudy::where("name","Restaurant Menu Data Entry for Delivery Hero")->first();
                    return view("casestudy/restaurant-menu-data-entry-for-delivery-hero", $casestudy);

                });
                Route::get("/casestudy/navneet", function () {

                    $casestudy = casestudy::where("name","Navneet")->first();
                    return view("casestudy/navneet", $casestudy);

                });
                Route::get("/casestudy/ecommere-management", function () {

                    $casestudy = casestudy::where("name","Ecommere management")->first();
                    return view("casestudy/ecommere-management", $casestudy);

                });
                Route::get("/casestudy/amazon-services-case-study", function () {

                    $casestudy = casestudy::where("name","Amazon Services Case Study")->first();
                    return view("casestudy/amazon-services-case-study", $casestudy);

                });
                Route::get("/casestudy/bhavya", function () {

                    $casestudy = casestudy::where("name","Bhavya")->first();
                    return view("casestudy/bhavya", $casestudy);

                });