<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aplus_plugin_users;
use App\Mail\LicenceKeyMail;
use App\Models\aplus_plugin_module1;
use App\Models\aplus_plugin_products;
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
    // public function create(Request $request)
    // {
    //     $data = $request->all();
    //     $aplus = new aplus_plugin_users();

    //     $rules = [
    //         'domain' => 'required|unique:aplus_plugin_users,domain|string',
    //         'name' => 'required',
    //         'email' => 'required|email|unique:aplus_plugin_users,email',
    //     ];

    //     $customMessages = [
    //         'domain.required' => 'Website Domain is required',
    //         'domain.string' => 'Please enter a valid domain',
    //         'domain.unique' => 'Domain is already registred',
    //         'name.required' => 'Username is required',
    //         'email.required' => 'Email is required',
    //         'email.email' => 'Please enter a valid email',
    //         'email.unique' => 'Email is already registred, try a new one !!',
    //     ];

    //     $this->validate($request,$rules,$customMessages);

    //     function generateLicenseKey($prefix = 'APLK', $length = 16)
    //     {
    //         // Generate a random string of specified length
    //         $randomString = Str::upper(Str::random($length - strlen($prefix)));
            
    //         // Concatenate prefix with random string
    //         $licenseKey = $prefix . '-' . $randomString;
            
    //         // Optionally add more complex logic here (e.g., hash user data, add checksums, etc.)
            
    //         return $licenseKey;
    //     }

    //     function generateSecretKey($prefix = 'APSK', $length = 16)
    //     {
    //         // Generate a random string of specified length
    //         $randomString = Str::upper(Str::random($length - strlen($prefix)));
            
    //         // Concatenate prefix with random string
    //         $secretKey = $prefix . '-' . $randomString;
            
    //         // Optionally add more complex logic here (e.g., hash user data, add checksums, etc.)
            
    //         return $secretKey;
    //     }

    //     $licenseKey = generateLicenseKey();
    //     $secretKey = generateSecretKey();

    //     $aplus->domain = $data['domain'];
    //     $aplus->username = $data['name'];
    //     $aplus->email = $data['email'];
    //     $aplus->licence_key = $licenseKey;
    //     $aplus->secret_key = $secretKey;
    //     $aplus->save();

    //      // Send the licence key email
    //      Mail::to($request->email)->send(new LicenceKeyMail($licenseKey,$data['name']));

    //     return response()->json(['message'=>'Plugin Registration Succesfully.']);
    // }
    public function create(Request $request)
    {
        $data = $request->all();
        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $product = new aplus_plugin_products();

            $product->public_key = $data['public_key'];
            $product->product_id = $data['product_id'];
            $product->module_ids = $data['module_id'];
            $product->status = $data['status']; 
            if($product->save()){
                $id = $product->id;
                return response()->json(['message'=>'Content Saved Succesfully.', 'id'=>$id]);
            }
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if(aplus_plugin_users::where('site_name',$data['site_name'])->where('site_url',$data['site_url'])->where('admin_email',$data['admin_email'])->where('public_key',$data['public_key'])->exists()){
            aplus_plugin_users::where('site_name',$data['site_name'])->where('site_url',$data['site_url'])->where('admin_email',$data['admin_email'])->where('public_key',$data['public_key'])->update(['status'=>1]);
            \Log::info('Activated Existing site info: ', $data);
        
        }else{
            $register = aplus_plugin_users::create($data);
            \Log::info('Received New site info: ', $data);
        }

        return response()->json([
            'message' => 'Site registred successfully!',
        ], 201);
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
    public function edit(Request $request)
    {
        $data = $request->all();
        aplus_plugin_users::where('site_name',$data['site_name'])->where('site_url',$data['site_url'])->where('admin_email',$data['admin_email'])->where('public_key',$data['public_key'])->update(['status'=>0]);
        
        \Log::info('Deactivated site info: ', $data);

        return response()->json([
            'message' => 'Site Deactivated successfully!',
        ], 201);
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

    public function addModule1(Request $request){
        $data = $request->all();

        for($i=0; $i < count($data['module1Image']); $i++){
            $module1 = new aplus_plugin_module1();

            $module1->content_id = $data['content_id'];
            $module1->image = $data['module1Image'][$i];
            $module1->save();
        }

        return response()->json(['message'=>'Content Saved Successfully']);
    }

    public function getProducts(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $products = aplus_plugin_products::where('public_key',$data['public_key'])->get();
            $jsonProduct = json_encode($products);

            return response()->json(['data'=>$jsonProduct]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function getProductsById(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $product = aplus_plugin_products::where('public_key',$data['public_key'])->where('product_id',$data['product_id'])->get();
            $jsonProduct = json_encode($product);

            return response()->json(['data'=>$jsonProduct]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function getModule1ById(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $content1 = aplus_plugin_module1::where('content_id',$data['content_id'])->where('status',1)->get();
            $jContent1 = json_encode($content1);

            return response()->json(['data'=>$jContent1]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function updateProductStatus(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            if($data['status']==1){
                $status = 0;
            }else{
                $status = 1;
            }

            if(aplus_plugin_products::where('public_key',$data['public_key'])->where('id',$data['content_id'])->update(['status'=>$status])){
                return response()->json(['message'=>'Status Updated Successfully.']);
            }
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function deleteProduct(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            if(aplus_plugin_products::where('public_key',$data['public_key'])->where('id',$data['content_id'])->delete() && aplus_plugin_module1::where('content_id',$data['content_id'])->delete()){
                return response()->json(['message'=>'Deleted Successfully.']);
            }
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function updateProduct(Request $request){
        $data = $request->all();
    
        // Check if user exists
        $user = aplus_plugin_users::where('public_key',$data['public_key'])->exists();
        if ($user) {
            // Update product and delete existing modules if successful
            $productUpdated = aplus_plugin_products::where('id', $data['content_id'])
                                ->update(['module_ids' => $data['module_id']]);
            $modulesDeleted = aplus_plugin_module1::where('content_id', $data['content_id'])->delete();
    
            if ($productUpdated && $modulesDeleted) {
                $module_ids = explode(",", $data['module_id']);
                $count1 = 0;
    
                foreach ($module_ids as $module_id) {
                    $u = explode('.', $module_id);
    
                    if ($u[0] == 1 && isset($data['module1Image'])) {
                        
                        $module1 = new aplus_plugin_module1();
                        $module1->content_id = $data['content_id'];
                        $module1->image = $data['module1Image'][$count1];
                        $module1->save();
                        $count1++;
                    }
                }
    
                return response()->json(['message' => 'Content Updated Successfully.']);
            } else {
                return response()->json(['message' => 'Failed to update product or delete modules'], 500);
            }
        } else {
            return response()->json(['message' => 'User Not Found'], 404);
        }
    }    
}
