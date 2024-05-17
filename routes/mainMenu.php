<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
                Route::get("/about-us", function () {

                    $data = ["pageName" => "About"];
                    return view("demo-file", $data);

                });
                Route::get("/yitgftygyt7-hj", function () {

                    $data = ["pageName" => "fast"];
                    return view("demo-file", $data);

                });