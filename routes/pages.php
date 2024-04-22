<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;

Route::get('/admin/page/1', function () {
                return view('new-test-file');
            });Route::get('/admin/page/2', function () {
                return view('about-us');
            });