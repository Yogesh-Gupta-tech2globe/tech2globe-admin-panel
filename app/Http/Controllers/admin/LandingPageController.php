<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\landing_pages;
use App\Models\AdminsRole;
use Illuminate\Http\Request;
use Session;
use Auth;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('page','landing_pages');

        //Set Admin/Subadmins Permissions for Layout Module
        $layoutModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($layoutModuleCount==0){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'layout'])->first()->toArray();
        }

        return view('admin.landing-pages.landing-pages')->with(compact('pagesModule'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Session::put('page','landing_pages');

        return view('admin.landing-pages.create-landing-pages');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(landing_pages $landing_pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(landing_pages $landing_pages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, landing_pages $landing_pages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(landing_pages $landing_pages)
    {
        //
    }
}
