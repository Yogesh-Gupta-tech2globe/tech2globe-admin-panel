<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;Route::get('/about-us', function () {
                    return view('about-us');
                });Route::get('/contact-us', function () {
                    return view('about-us');
                });