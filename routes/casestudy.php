<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use App\Models\casestudy;

                Route::get("/case-studies/kim", function () {

                    $casestudy = casestudy::where("name","kim")->first();
                    return view("casestudy/kim", $casestudy);

                });
                Route::get("/case-studies/yogesh", function () {

                    $casestudy = casestudy::where("name","Yogesh")->first();
                    return view("casestudy/yogesh", $casestudy);

                });
            Route::get("/case-studies/internal-testing", function () {

                $casestudy = casestudy::where("name","Internal Testing")->first();
                return view("casestudy/internal-testing", $casestudy);

            });
            Route::get("/case-studies/internal-testing", function () {

                $casestudy = casestudy::where("name","Internal Testing")->first();
                return view("casestudy/internal-testing", $casestudy);

            });
            Route::get("/case-studies/bug-fixing", function () {

                $casestudy = casestudy::where("name","Bug Fixing")->first();
                $allCasestudy = casestudy::select('name','bannerImage','projectDescription')->where('id','!=',$casestudy['id'])->where('r_status',1)->latest()->take(4)->get();

                return view("casestudy/bug-fixing", ["casestudy" => $casestudy, "allCasestudy" => $allCasestudy]);

            });
            Route::get("/case-studies/coding", function () {

                $casestudy = casestudy::where("name","Coding")->first();
                $allCasestudy = casestudy::select("name","bannerImage","projectDescription")->where("id","!=",$casestudy["id"])->where("r_status",1)->latest()->take(4)->get();

                return view("casestudy/coding", ["casestudy" => $casestudy, "allCasestudy" => $allCasestudy]);

            });
            Route::get("/case-studies/case-study-on-ishan-negi", function () {

                $casestudy = casestudy::where("name","Case study on Ishan Negi")->first();
                $allCasestudy = casestudy::select("name","bannerImage","projectDescription")->where("id","!=",$casestudy["id"])->where("r_status",1)->latest()->take(4)->get();

                return view("casestudy/case-study-on-ishan-negi", ["casestudy" => $casestudy, "allCasestudy" => $allCasestudy]);

            });
            Route::get("/case-studies/case-study-on-bhavya-khanna", function () {

                $casestudy = casestudy::where("name","Case study on Bhavya Khanna")->first();
                $allCasestudy = casestudy::select("name","bannerImage","projectDescription")->where("id","!=",$casestudy["id"])->where("r_status",1)->latest()->take(4)->get();

                return view("casestudy/case-study-on-bhavya-khanna", ["casestudy" => $casestudy, "allCasestudy" => $allCasestudy]);

            });