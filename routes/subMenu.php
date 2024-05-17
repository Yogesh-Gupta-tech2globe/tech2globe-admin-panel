<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
                Route::get("/tech2globe-about-us", function () {

                    $data = ["pageName" => "About Tech2globe"];
                    return view("about-us", $data);

                });
                Route::get("/infrastructure", function () {

                    $data = ["pageName" => "Infrastructure"];
                    return view("demo-file", $data);

                });