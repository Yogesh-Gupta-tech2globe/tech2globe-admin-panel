<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tech2globe_header_category;
use App\Models\tech2globe_header_sub_category;


class Tech2globeController extends Controller
{
    public function header(){

        $mainMenu = tech2globe_header_category::get()->toArray();
        $subMenu = tech2globe_header_sub_category::get()->toArray();

        return view('layout.header')->with(compact('mainMenu','subMenu'));

    }
}
