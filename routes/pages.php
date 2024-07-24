<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use App\Models\include_files;

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
                Route::get("/admin/page/24", function () {

                    $data = ["pageName" => "career"];
                    return view("career", $data);

                });
                Route::get("/admin/page/25", function () {

                    $data = ["pageName" => "career_form"];
                    return view("career-form", $data);

                });
                Route::get("/admin/page/26", function () {

                    $data = ["pageName" => "thank-you"];
                    return view("thank-you", $data);

                });
                Route::get("/admin/page/27", function () {

                    $data = ["pageName" => "log file"];
                    return view("log-file", $data);

                });
                Route::get("/admin/page/28", function () {

                    $data = ["pageName" => "Portfolio"];
                    return view("portfolio", $data);

                });
                Route::get("/admin/page/29", function () {

                    $data = ["pageName" => "testimonial"];
                    return view("testimonial", $data);

                });
                Route::get("/admin/page/115", function () {

                    $data = ["pageName" => "Portfolio"];
                    return view("portfolio", $data);

                });
                Route::get("/admin/page/116", function () {

                    $data = ["pageName" => "testimonial"];
                    return view("testimonial", $data);

                });
                Route::get("/admin/page/117", function () {

                    $data = ["pageName" => "Case Studty"];
                    return view("case-studty", $data);

                });
                Route::get("/admin/page/118", function () {

                    $data = ["pageName" => "new Testing page"];
                    return view("new-testing-page", $data);

                });
                Route::get("/admin/page/119", function () {

                    $data = ["pageName" => "FAQ"];
                    return view("faq", $data);

                });
                Route::get("/admin/page/120", function () {

                    $data = ["pageName" => "this new file"];
                    return view("this-new-file", $data);

                });
                Route::get("/admin/include/{id}", function ($id) {

                    $data = include_files::where('id',$id)->get()->first();
                    return view("include.preview")->with(compact('data'));

                });