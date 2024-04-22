<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;Route::get('/tech2globe-about-us', function () {
                    return view('about-us');
                });Route::get('/infrastructure', function () {
                    return view('new-test-file');
                });