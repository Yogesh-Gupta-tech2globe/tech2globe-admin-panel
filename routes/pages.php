<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;

Route::get('/admin/page/1', function () {
                return view('new-test-file');
            });Route::get('/admin/page/2', function () {
                return view('about-us');
            });Route::get('/admin/page/9', function () {
                    return view('home');
                });
                Route::get("/admin/page/17", function () {

                    $data = ["pageName" => "Eight"];
                    return view("eight", $data);

                });
                Route::get("/admin/page/18", function () {

                    $data = ["pageName" => "Demo File"];
                    return view("demo-file", $data);

                });
                Route::get("/admin/page/19", function () {

                    $data = ["pageName" => "Accounting Services"];
                    return view("accounting-services", $data);

                });
                Route::get("/admin/page/20", function () {

                    $data = ["pageName" => "hi"];
                    return view("hi", $data);

                });
                Route::get("/admin/page/21", function () {

                    $data = ["pageName" => "first site"];
                    return view("first-site", $data);

                });
                Route::get("/admin/page/22", function () {

                    $data = ["pageName" => "Life at tech2globe"];
                    return view("life-at-tech2globe", $data);

                });
                Route::get("/admin/page/23", function () {

                    $data = ["pageName" => "Contact Us"];
                    return view("contact-us", $data);

                });