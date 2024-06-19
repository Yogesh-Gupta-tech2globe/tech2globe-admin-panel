<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aplus_plugin_users;
use App\Mail\LicenceKeyMail;
use Mail;
use Str;

class aplusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('aplusplugin.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $aplus = new aplus_plugin_users();

        $rules = [
            'domain' => 'required|unique:aplus_plugin_users,domain|string',
            'name' => 'required',
            'email' => 'required|email|unique:aplus_plugin_users,email',
        ];

        $customMessages = [
            'domain.required' => 'Website Domain is required',
            'domain.string' => 'Please enter a valid domain',
            'domain.unique' => 'Domain is already registred',
            'name.required' => 'Username is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email',
            'email.unique' => 'Email is already registred, try a new one !!',
        ];

        $this->validate($request,$rules,$customMessages);

        function generateLicenseKey($prefix = 'APLK', $length = 16)
        {
            // Generate a random string of specified length
            $randomString = Str::upper(Str::random($length - strlen($prefix)));
            
            // Concatenate prefix with random string
            $licenseKey = $prefix . '-' . $randomString;
            
            // Optionally add more complex logic here (e.g., hash user data, add checksums, etc.)
            
            return $licenseKey;
        }

        function generateSecretKey($prefix = 'APSK', $length = 16)
        {
            // Generate a random string of specified length
            $randomString = Str::upper(Str::random($length - strlen($prefix)));
            
            // Concatenate prefix with random string
            $secretKey = $prefix . '-' . $randomString;
            
            // Optionally add more complex logic here (e.g., hash user data, add checksums, etc.)
            
            return $secretKey;
        }

        $licenseKey = generateLicenseKey();
        $secretKey = generateSecretKey();

        $aplus->domain = $data['domain'];
        $aplus->username = $data['name'];
        $aplus->email = $data['email'];
        $aplus->licence_key = $licenseKey;
        $aplus->secret_key = $secretKey;
        $aplus->save();

         // Send the licence key email
         Mail::to($request->email)->send(new LicenceKeyMail($licenseKey,$data['name']));

        return response()->json(['message'=>'Plugin Registration Succesfully.']);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
