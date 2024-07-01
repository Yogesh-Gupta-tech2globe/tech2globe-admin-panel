<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
                Route::get("/tech2globe-about-us-to", function () {

                    $data = ["pageName" => "About Tech2globe"];
                    return view("demo-file", $data);

                });
                Route::get("/infrastructure", function () {

                    $data = ["pageName" => "Infrastructure"];
                    return view("demo-file", $data);

                });
                Route::get("/ecoom", function () {

                    $data = ["pageName" => "Ecommerce"];
                    return view("about-us", $data);

                });
                Route::get("/physics", function () {

                    $data = ["pageName" => "Physics"];
                    return view("about-us", $data);

                });
                Route::get("/physics2", function () {

                    $data = ["pageName" => "Physics"];
                    return view("demo-file", $data);

                });
                Route::get("/contact-us", function () {

                    $data = ["pageName" => "Physics"];
                    return view("demo-file", $data);

                });
                Route::get("/life-at-tech2globe", function () {

                    $data = ["pageName" => "Life at Tech2globe"];
                    return view("life-at-tech2globe", $data);

                });
                Route::get("/life-at-tech2globe", function () {

                    $data = ["pageName" => "Life at Tech2globe"];
                    return view("life-at-tech2globe", $data);

                });