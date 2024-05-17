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