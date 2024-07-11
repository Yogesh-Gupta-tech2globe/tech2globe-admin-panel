<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminsRole;
use Spatie\Activitylog\Models\Activity;
use Session;
use Auth;

class logsController extends Controller
{
    public function index(){

        Session::put('page','logs');

        if(Auth::guard('admin')->user()->type!="admin"){
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }

        $pagename = "Logs";
        $logs = Activity::with('admins')->orderBy('id','desc')->get();
        return view('admin.log.log')->with(compact('pagename','logs'));
    }
}
