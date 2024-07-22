<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use App\Models\casestudy;

                Route::get("/casestudy/kim", function () {

                    $casestudy = casestudy::where("name","kim")->first();
                    return view("casestudy/kim", $casestudy);

                });
                Route::get("/casestudy/yogesh", function () {

                    $casestudy = casestudy::where("name","Yogesh")->first();
                    return view("casestudy/yogesh", $casestudy);

                });
            Route::get("/casestudy/internal-testing", function () {

                $casestudy = casestudy::where("name","Internal Testing")->first();
                return view("casestudy/internal-testing", $casestudy);

            });
            Route::get("/casestudy/internal-testing", function () {

                $casestudy = casestudy::where("name","Internal Testing")->first();
                return view("casestudy/internal-testing", $casestudy);

            });