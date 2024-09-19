<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\aplus_plugin_users;
use App\Mail\LicenceKeyMail;
use App\Models\aplus_plugin_module1;
use App\Models\aplus_plugin_module10;
use App\Models\aplus_plugin_module2;
use App\Models\aplus_plugin_module3;
use App\Models\aplus_plugin_module4;
use App\Models\aplus_plugin_module5;
use App\Models\aplus_plugin_module6;
use App\Models\aplus_plugin_module7;
use App\Models\aplus_plugin_module8;
use App\Models\aplus_plugin_module9;
use App\Models\aplus_plugin_payment;
use App\Models\aplus_plugin_products;
use Mail;
use Str;
use Razorpay\Api\Utility;


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
            $allowProducts = aplus_plugin_users::select('allow_product_num')->where('public_key',$data['public_key'])->first();
            $products = aplus_plugin_products::where('public_key',$data['public_key'])->where('delete_status',1)->get();
            $productNum = count($products);
            
            if($productNum == $allowProducts->allow_product_num){
                return response()->json(['message'=>'You have reached the maximum number of products.']);
            }else if(aplus_plugin_products::where('public_key',$data['public_key'])->where('product_id',$data['product_id'])->where('delete_status',1)->exists()){
                return response()->json(['message'=>'This Product have already A+ content please go on Dashboard for edit.']);
            }else{

                $rules = [
                    'product_id' => 'required',
                    'module_id' => 'required',
                ];
    
                $customMessages = [
                    'product_id.required' => 'Product is required',
                    'module_id.required' => 'Please add at least one module',
                ];
    
                $this->validate($request,$rules,$customMessages);

                if(aplus_plugin_products::where('public_key',$data['public_key'])->where('product_id',$data['product_id'])->exists()){
                    $content_id = aplus_plugin_products::select('id')->where('public_key',$data['public_key'])->where('product_id',$data['product_id'])->first();
                    $content_id = $content_id->id;

                    $module1Deleted = aplus_plugin_module1::where('content_id', $content_id)->delete();
                    $module2Deleted = aplus_plugin_module2::where('content_id', $content_id)->delete();
                    $module3Deleted = aplus_plugin_module3::where('content_id', $content_id)->delete();
                    $module4Deleted = aplus_plugin_module4::where('content_id', $content_id)->delete();
                    $module5Deleted = aplus_plugin_module5::where('content_id', $content_id)->delete();
                    $module6Deleted = aplus_plugin_module6::where('content_id', $content_id)->delete();
                    $module7Deleted = aplus_plugin_module7::where('content_id', $content_id)->delete();
                    $module8Deleted = aplus_plugin_module8::where('content_id', $content_id)->delete();
                    $module9Deleted = aplus_plugin_module9::where('content_id', $content_id)->delete();
                    $module10Deleted = aplus_plugin_module10::where('content_id', $content_id)->delete();

                    $deleteContent = aplus_plugin_products::where('public_key',$data['public_key'])->where('product_id',$data['product_id'])->where('delete_status',0)->delete();
                }
                  
                $product = new aplus_plugin_products();

                $product->public_key = $data['public_key'];
                $product->product_id = $data['product_id'];
                $product->module_ids = $data['module_id'];
                $product->status = $data['status']; 
                if($product->save()){
                    $content_id = $product->id;
                    $module_ids = explode(",", $data['module_id']);
                    $count1 = 0;
                    $count2 = 0;
                    $count3 = 0;
                    $count4 = 0;
                    $count5 = 0;
                    $count6 = 0;
                    $count7 = 0;
                    $count8 = 0;
                    $count9 = 0;
                    $count10 = 0;
        
                    foreach ($module_ids as $module_id) {
                        $u = explode('.', $module_id);
        
                        if ($u[0] == 1 && isset($data['module1Image'])) {
                            
                            $module1 = new aplus_plugin_module1();
                            $module1->content_id = $content_id;
                            $module1->image = $data['module1Image'][$count1];
                            $module1->save();
                            $count1++;
                        }else if($u[0] == 2 && isset($data['module2Image1']) && isset($data['module2heading1']) && isset($data['module2description1'])){

                            $module2 = new aplus_plugin_module2();
                            $module2->content_id = $content_id;
                            $module2->module2Image1 = $data['module2Image1'][$count2];
                            $module2->module2Image2 = $data['module2Image2'][$count2];
                            $module2->module2Image3 = $data['module2Image3'][$count2];
                            $module2->module2heading1 = $data['module2heading1'][$count2];
                            $module2->module2heading2 = $data['module2heading2'][$count2];
                            $module2->module2heading3 = $data['module2heading3'][$count2];
                            $module2->module2description1 = $data['module2description1'][$count2];
                            $module2->module2description2 = $data['module2description2'][$count2];
                            $module2->module2description3 = $data['module2description3'][$count2];
                            $module2->save();
                            $count2++;
                        }else if($u[0] == 3 && isset($data['module3Image']) && isset($data['module3heading']) && isset($data['module3description'])){

                            $module3 = new aplus_plugin_module3();
                            $module3->content_id = $content_id;
                            $module3->module3Image = $data['module3Image'][$count3];
                            $module3->module3heading = $data['module3heading'][$count3];
                            $module3->module3description = $data['module3description'][$count3];
                            $module3->save();
                            $count3++;
                        }else if($u[0] == 4 && isset($data['module4Image']) && isset($data['module4heading']) && isset($data['module4description'])){

                            $module4 = new aplus_plugin_module4();
                            $module4->content_id = $content_id;
                            $module4->module4Image = $data['module4Image'][$count4];
                            $module4->module4heading = $data['module4heading'][$count4];
                            $module4->module4description = $data['module4description'][$count4];
                            $module4->save();
                            $count4++;
                        }else if($u[0] == 5 && isset($data['module5Image1']) && isset($data['module5Image2']) && isset($data['module5Image3'])){

                            $module5 = new aplus_plugin_module5();
                            $module5->content_id = $content_id;
                            $module5->module5Image1 = $data['module5Image1'][$count5];
                            $module5->module5Image2 = $data['module5Image2'][$count5];
                            $module5->module5Image3 = $data['module5Image3'][$count5];
                            $module5->save();
                            $count5++;
                        }else if($u[0] == 6 && isset($data['module6Image']) && isset($data['module6ThumbImage']) && isset($data['module6video'])){

                            $module6 = new aplus_plugin_module6();
                            $module6->content_id = $content_id;
                            $module6->module6Image = $data['module6Image'][$count6];
                            $module6->module6ThumbImage = $data['module6ThumbImage'][$count6];
                            $module6->module6video = $data['module6video'][$count6];
                            $module6->save();
                            $count6++;
                        }else if($u[0] == 7 && isset($data['module7Image']) && isset($data['module7heading']) && isset($data['module7description'])){

                            $module7 = new aplus_plugin_module7();
                            $module7->content_id = $content_id;
                            $module7->module7Image = $data['module7Image'][$count7];
                            $module7->module7heading = $data['module7heading'][$count7];
                            $module7->module7description = $data['module7description'][$count7];
                            $module7->save();
                            $count7++;
                        }else if($u[0] == 8 && isset($data['module8logo'])){

                            $module8 = new aplus_plugin_module8();
                            $module8->content_id = $content_id;
                            $module8->module8logo = $data['module8logo'][$count8];
                            $module8->save();
                            $count8++;
                        }else if($u[0] == 9 && isset($data['module9Image1']) && isset($data['module9heading1']) && isset($data['module9description1'])){

                            $module9 = new aplus_plugin_module9();
                            $module9->content_id = $content_id;
                            $module9->module9Image1 = $data['module9Image1'][$count9];
                            $module9->module9heading1 = $data['module9heading1'][$count9];
                            $module9->module9description1 = $data['module9description1'][$count9];
                            $module9->module9Image2 = $data['module9Image2'][$count9];
                            $module9->module9heading2 = $data['module9heading2'][$count9];
                            $module9->module9description2 = $data['module9description2'][$count9];
                            $module9->save();
                            $count9++;
                        }else if($u[0] == 10 && isset($data['module10product1id']) && isset($data['module10product1image']) && isset($data['module10product1name'])){

                            $module10 = new aplus_plugin_module10();
                            $module10->content_id = $content_id;

                            // Safely check if each key exists and set null if the key is not present
                            $module10->module10product1id = isset($data['module10product1id'][$count10]) ? $data['module10product1id'][$count10] : null;
                            $module10->module10product2id = isset($data['module10product2id'][$count10]) ? $data['module10product2id'][$count10] : null;
                            $module10->module10product3id = isset($data['module10product3id'][$count10]) ? $data['module10product3id'][$count10] : null;
                            $module10->module10product4id = isset($data['module10product4id'][$count10]) ? $data['module10product4id'][$count10] : null;

                            $module10->module10product1image = isset($data['module10product1image'][$count10]) ? $data['module10product1image'][$count10] : null;
                            $module10->module10product2image = isset($data['module10product2image'][$count10]) ? $data['module10product2image'][$count10] : null;
                            $module10->module10product3image = isset($data['module10product3image'][$count10]) ? $data['module10product3image'][$count10] : null;
                            $module10->module10product4image = isset($data['module10product4image'][$count10]) ? $data['module10product4image'][$count10] : null;

                            $module10->module10product1name = isset($data['module10product1name'][$count10]) ? $data['module10product1name'][$count10] : null;
                            $module10->module10product2name = isset($data['module10product2name'][$count10]) ? $data['module10product2name'][$count10] : null;
                            $module10->module10product3name = isset($data['module10product3name'][$count10]) ? $data['module10product3name'][$count10] : null;
                            $module10->module10product4name = isset($data['module10product4name'][$count10]) ? $data['module10product4name'][$count10] : null;

                            $module10->module10product1price = isset($data['module10product1price'][$count10]) ? $data['module10product1price'][$count10] : null;
                            $module10->module10product2price = isset($data['module10product2price'][$count10]) ? $data['module10product2price'][$count10] : null;
                            $module10->module10product3price = isset($data['module10product3price'][$count10]) ? $data['module10product3price'][$count10] : null;
                            $module10->module10product4price = isset($data['module10product4price'][$count10]) ? $data['module10product4price'][$count10] : null;

                            $module10->module10product1review = isset($data['module10product1review'][$count10]) ? $data['module10product1review'][$count10] : null;
                            $module10->module10product2review = isset($data['module10product2review'][$count10]) ? $data['module10product2review'][$count10] : null;
                            $module10->module10product3review = isset($data['module10product3review'][$count10]) ? $data['module10product3review'][$count10] : null;
                            $module10->module10product4review = isset($data['module10product4review'][$count10]) ? $data['module10product4review'][$count10] : null;

                            $module10->module10heading1 = isset($data['module10heading1'][$count10]) ? $data['module10heading1'][$count10] : null;
                            $module10->module10product1content1 = isset($data['module10product1content1'][$count10]) ? $data['module10product1content1'][$count10] : null;
                            $module10->module10product2content1 = isset($data['module10product2content1'][$count10]) ? $data['module10product2content1'][$count10] : null;
                            $module10->module10product3content1 = isset($data['module10product3content1'][$count10]) ? $data['module10product3content1'][$count10] : null;
                            $module10->module10product4content1 = isset($data['module10product4content1'][$count10]) ? $data['module10product4content1'][$count10] : null;

                            $module10->module10heading2 = isset($data['module10heading2'][$count10]) ? $data['module10heading2'][$count10] : null;
                            $module10->module10product1content2 = isset($data['module10product1content2'][$count10]) ? $data['module10product1content2'][$count10] : null;
                            $module10->module10product2content2 = isset($data['module10product2content2'][$count10]) ? $data['module10product2content2'][$count10] : null;
                            $module10->module10product3content2 = isset($data['module10product3content2'][$count10]) ? $data['module10product3content2'][$count10] : null;
                            $module10->module10product4content2 = isset($data['module10product4content2'][$count10]) ? $data['module10product4content2'][$count10] : null;

                            $module10->module10heading3 = isset($data['module10heading3'][$count10]) ? $data['module10heading3'][$count10] : null;
                            $module10->module10product1content3 = isset($data['module10product1content3'][$count10]) ? $data['module10product1content3'][$count10] : null;
                            $module10->module10product2content3 = isset($data['module10product2content3'][$count10]) ? $data['module10product2content3'][$count10] : null;
                            $module10->module10product3content3 = isset($data['module10product3content3'][$count10]) ? $data['module10product3content3'][$count10] : null;
                            $module10->module10product4content3 = isset($data['module10product4content3'][$count10]) ? $data['module10product4content3'][$count10] : null;

                            $module10->module10heading4 = isset($data['module10heading4'][$count10]) ? $data['module10heading4'][$count10] : null;
                            $module10->module10product1content4 = isset($data['module10product1content4'][$count10]) ? $data['module10product1content4'][$count10] : null;
                            $module10->module10product2content4 = isset($data['module10product2content4'][$count10]) ? $data['module10product2content4'][$count10] : null;
                            $module10->module10product3content4 = isset($data['module10product3content4'][$count10]) ? $data['module10product3content4'][$count10] : null;
                            $module10->module10product4content4 = isset($data['module10product4content4'][$count10]) ? $data['module10product4content4'][$count10] : null;

                            $module10->module10heading5 = isset($data['module10heading5'][$count10]) ? $data['module10heading5'][$count10] : null;
                            $module10->module10product1content5 = isset($data['module10product1content5'][$count10]) ? $data['module10product1content5'][$count10] : null;
                            $module10->module10product2content5 = isset($data['module10product2content5'][$count10]) ? $data['module10product2content5'][$count10] : null;
                            $module10->module10product3content5 = isset($data['module10product3content5'][$count10]) ? $data['module10product3content5'][$count10] : null;
                            $module10->module10product4content5 = isset($data['module10product4content5'][$count10]) ? $data['module10product4content5'][$count10] : null;

                            $module10->save();
                            $count10++;

                        }
                    }

                    return response()->json(['message'=>'Content Saved Succesfully.']);
                }
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

    public function getProducts(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $allowProducts = aplus_plugin_users::select('allow_product_num')->where('public_key',$data['public_key'])->first();
            $products = aplus_plugin_products::where('public_key',$data['public_key'])->where('delete_status',1)->get();
            $jsonProduct = json_encode($products);

            return response()->json(['data'=>$jsonProduct,'allowProducts'=>$allowProducts]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function getDelProducts(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $delProducts = aplus_plugin_products::where('public_key',$data['public_key'])->where('delete_status',0)->get();
            $jsonDelProduct = json_encode($delProducts);

            return response()->json(['data'=>$jsonDelProduct]);
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

    public function getModule2ById(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $content2 = aplus_plugin_module2::where('content_id',$data['content_id'])->where('status',1)->get();
            $jContent2 = json_encode($content2);

            return response()->json(['data'=>$jContent2]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function getModule3ById(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $content3 = aplus_plugin_module3::where('content_id',$data['content_id'])->where('status',1)->get();
            $jContent3 = json_encode($content3);

            return response()->json(['data'=>$jContent3]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function getModule4ById(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $content4 = aplus_plugin_module4::where('content_id',$data['content_id'])->where('status',1)->get();
            $jContent4 = json_encode($content4);

            return response()->json(['data'=>$jContent4]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function getModule5ById(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $content5 = aplus_plugin_module5::where('content_id',$data['content_id'])->where('status',1)->get();
            $jContent5 = json_encode($content5);

            return response()->json(['data'=>$jContent5]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function getModule6ById(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $content6 = aplus_plugin_module6::where('content_id',$data['content_id'])->where('status',1)->get();
            $jContent6 = json_encode($content6);

            return response()->json(['data'=>$jContent6]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function getModule7ById(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $content7 = aplus_plugin_module7::where('content_id',$data['content_id'])->where('status',1)->get();
            $jContent7 = json_encode($content7);

            return response()->json(['data'=>$jContent7]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function getModule8ById(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $content8 = aplus_plugin_module8::where('content_id',$data['content_id'])->where('status',1)->get();
            $jContent8 = json_encode($content8);

            return response()->json(['data'=>$jContent8]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function getModule9ById(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $content9 = aplus_plugin_module9::where('content_id',$data['content_id'])->where('status',1)->get();
            $jContent9 = json_encode($content9);

            return response()->json(['data'=>$jContent9]);
        }else{
            return response()->json(['message'=>'User Not Found']);
        }
    }

    public function getModule10ById(Request $request){
        $data = $request->all();

        $usercheck = aplus_plugin_users::where('public_key',$data['public_key'])->exists();

        if($usercheck){
            $content10 = aplus_plugin_module10::where('content_id',$data['content_id'])->where('status',1)->get();
            $jContent10 = json_encode($content10);

            return response()->json(['data'=>$jContent10]);
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
            if(aplus_plugin_products::where('public_key',$data['public_key'])->where('id',$data['content_id'])->update(['status'=>0,'delete_status'=>0])){
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
            $module1Deleted = aplus_plugin_module1::where('content_id', $data['content_id'])->delete();
            $module2Deleted = aplus_plugin_module2::where('content_id', $data['content_id'])->delete();
            $module3Deleted = aplus_plugin_module3::where('content_id', $data['content_id'])->delete();
            $module4Deleted = aplus_plugin_module4::where('content_id', $data['content_id'])->delete();
            $module5Deleted = aplus_plugin_module5::where('content_id', $data['content_id'])->delete();
            $module6Deleted = aplus_plugin_module6::where('content_id', $data['content_id'])->delete();
            $module7Deleted = aplus_plugin_module7::where('content_id', $data['content_id'])->delete();
            $module8Deleted = aplus_plugin_module8::where('content_id', $data['content_id'])->delete();
            $module9Deleted = aplus_plugin_module9::where('content_id', $data['content_id'])->delete();
            $module10Deleted = aplus_plugin_module10::where('content_id', $data['content_id'])->delete();
    
            if ($productUpdated) {
                $module_ids = explode(",", $data['module_id']);
                $count1 = 0;
                $count2 = 0;
                $count3 = 0;
                $count4 = 0;
                $count5 = 0;
                $count6 = 0;
                $count7 = 0;
                $count8 = 0;
                $count9 = 0;
                $count10 = 0;
    
                foreach ($module_ids as $module_id) {
                    $u = explode('.', $module_id);
    
                    if ($u[0] == 1 && isset($data['module1Image'])) {
                        
                        $module1 = new aplus_plugin_module1();
                        $module1->content_id = $data['content_id'];
                        $module1->image = $data['module1Image'][$count1];
                        $module1->save();
                        $count1++;
                    }else if($u[0] == 2 && isset($data['module2Image1']) && isset($data['module2heading1']) && isset($data['module2description1'])){

                        $module2 = new aplus_plugin_module2();
                        $module2->content_id = $data['content_id'];
                        $module2->module2Image1 = $data['module2Image1'][$count2];
                        $module2->module2Image2 = $data['module2Image2'][$count2];
                        $module2->module2Image3 = $data['module2Image3'][$count2];
                        $module2->module2heading1 = $data['module2heading1'][$count2];
                        $module2->module2heading2 = $data['module2heading2'][$count2];
                        $module2->module2heading3 = $data['module2heading3'][$count2];
                        $module2->module2description1 = $data['module2description1'][$count2];
                        $module2->module2description2 = $data['module2description2'][$count2];
                        $module2->module2description3 = $data['module2description3'][$count2];
                        $module2->save();
                        $count2++;
                    }else if($u[0] == 3 && isset($data['module3Image']) && isset($data['module3heading']) && isset($data['module3description'])){

                        $module3 = new aplus_plugin_module3();
                        $module3->content_id = $data['content_id'];
                        $module3->module3Image = $data['module3Image'][$count3];
                        $module3->module3heading = $data['module3heading'][$count3];
                        $module3->module3description = $data['module3description'][$count3];
                        $module3->save();
                        $count3++;
                    }else if($u[0] == 4 && isset($data['module4Image']) && isset($data['module4heading']) && isset($data['module4description'])){

                        $module4 = new aplus_plugin_module4();
                        $module4->content_id = $data['content_id'];
                        $module4->module4Image = $data['module4Image'][$count4];
                        $module4->module4heading = $data['module4heading'][$count4];
                        $module4->module4description = $data['module4description'][$count4];
                        $module4->save();
                        $count4++;
                    }else if($u[0] == 5 && isset($data['module5Image1']) && isset($data['module5Image2']) && isset($data['module5Image3'])){

                        $module5 = new aplus_plugin_module5();
                        $module5->content_id = $data['content_id'];
                        $module5->module5Image1 = $data['module5Image1'][$count5];
                        $module5->module5Image2 = $data['module5Image2'][$count5];
                        $module5->module5Image3 = $data['module5Image3'][$count5];
                        $module5->save();
                        $count5++;
                    }else if($u[0] == 6 && isset($data['module6Image']) && isset($data['module6ThumbImage']) && isset($data['module6video'])){

                        $module6 = new aplus_plugin_module6();
                        $module6->content_id = $data['content_id'];
                        $module6->module6Image = $data['module6Image'][$count6];
                        $module6->module6ThumbImage = $data['module6ThumbImage'][$count6];
                        $module6->module6video = $data['module6video'][$count6];
                        $module6->save();
                        $count6++;
                    }else if($u[0] == 7 && isset($data['module7Image']) && isset($data['module7heading']) && isset($data['module7description'])){

                        $module7 = new aplus_plugin_module7();
                        $module7->content_id = $data['content_id'];
                        $module7->module7Image = $data['module7Image'][$count7];
                        $module7->module7heading = $data['module7heading'][$count7];
                        $module7->module7description = $data['module7description'][$count7];
                        $module7->save();
                        $count7++;
                    }else if($u[0] == 8 && isset($data['module8logo'])){

                        $module8 = new aplus_plugin_module8();
                        $module8->content_id = $data['content_id'];
                        $module8->module8logo = $data['module8logo'][$count8];
                        $module8->save();
                        $count8++;
                    }else if($u[0] == 9 && isset($data['module9Image1']) && isset($data['module9heading1']) && isset($data['module9description1'])){

                        $module9 = new aplus_plugin_module9();
                        $module9->content_id = $data['content_id'];
                        $module9->module9Image1 = $data['module9Image1'][$count9];
                        $module9->module9heading1 = $data['module9heading1'][$count9];
                        $module9->module9description1 = $data['module9description1'][$count9];
                        $module9->module9Image2 = $data['module9Image2'][$count9];
                        $module9->module9heading2 = $data['module9heading2'][$count9];
                        $module9->module9description2 = $data['module9description2'][$count9];
                        $module9->save();
                        $count9++;
                    }else if($u[0] == 10 && isset($data['module10product1id']) && isset($data['module10product1image']) && isset($data['module10product1name'])){

                        $module10 = new aplus_plugin_module10();
                        $module10->content_id = $data['content_id'];

                        // Safely check if each key exists and set null if the key is not present
                        $module10->module10product1id = isset($data['module10product1id'][$count10]) ? $data['module10product1id'][$count10] : null;
                        $module10->module10product2id = isset($data['module10product2id'][$count10]) ? $data['module10product2id'][$count10] : null;
                        $module10->module10product3id = isset($data['module10product3id'][$count10]) ? $data['module10product3id'][$count10] : null;
                        $module10->module10product4id = isset($data['module10product4id'][$count10]) ? $data['module10product4id'][$count10] : null;

                        $module10->module10product1image = isset($data['module10product1image'][$count10]) ? $data['module10product1image'][$count10] : null;
                        $module10->module10product2image = isset($data['module10product2image'][$count10]) ? $data['module10product2image'][$count10] : null;
                        $module10->module10product3image = isset($data['module10product3image'][$count10]) ? $data['module10product3image'][$count10] : null;
                        $module10->module10product4image = isset($data['module10product4image'][$count10]) ? $data['module10product4image'][$count10] : null;

                        $module10->module10product1name = isset($data['module10product1name'][$count10]) ? $data['module10product1name'][$count10] : null;
                        $module10->module10product2name = isset($data['module10product2name'][$count10]) ? $data['module10product2name'][$count10] : null;
                        $module10->module10product3name = isset($data['module10product3name'][$count10]) ? $data['module10product3name'][$count10] : null;
                        $module10->module10product4name = isset($data['module10product4name'][$count10]) ? $data['module10product4name'][$count10] : null;

                        $module10->module10product1price = isset($data['module10product1price'][$count10]) ? $data['module10product1price'][$count10] : null;
                        $module10->module10product2price = isset($data['module10product2price'][$count10]) ? $data['module10product2price'][$count10] : null;
                        $module10->module10product3price = isset($data['module10product3price'][$count10]) ? $data['module10product3price'][$count10] : null;
                        $module10->module10product4price = isset($data['module10product4price'][$count10]) ? $data['module10product4price'][$count10] : null;

                        $module10->module10product1review = isset($data['module10product1review'][$count10]) ? $data['module10product1review'][$count10] : null;
                        $module10->module10product2review = isset($data['module10product2review'][$count10]) ? $data['module10product2review'][$count10] : null;
                        $module10->module10product3review = isset($data['module10product3review'][$count10]) ? $data['module10product3review'][$count10] : null;
                        $module10->module10product4review = isset($data['module10product4review'][$count10]) ? $data['module10product4review'][$count10] : null;

                        $module10->module10heading1 = isset($data['module10heading1'][$count10]) ? $data['module10heading1'][$count10] : null;
                        $module10->module10product1content1 = isset($data['module10product1content1'][$count10]) ? $data['module10product1content1'][$count10] : null;
                        $module10->module10product2content1 = isset($data['module10product2content1'][$count10]) ? $data['module10product2content1'][$count10] : null;
                        $module10->module10product3content1 = isset($data['module10product3content1'][$count10]) ? $data['module10product3content1'][$count10] : null;
                        $module10->module10product4content1 = isset($data['module10product4content1'][$count10]) ? $data['module10product4content1'][$count10] : null;

                        $module10->module10heading2 = isset($data['module10heading2'][$count10]) ? $data['module10heading2'][$count10] : null;
                        $module10->module10product1content2 = isset($data['module10product1content2'][$count10]) ? $data['module10product1content2'][$count10] : null;
                        $module10->module10product2content2 = isset($data['module10product2content2'][$count10]) ? $data['module10product2content2'][$count10] : null;
                        $module10->module10product3content2 = isset($data['module10product3content2'][$count10]) ? $data['module10product3content2'][$count10] : null;
                        $module10->module10product4content2 = isset($data['module10product4content2'][$count10]) ? $data['module10product4content2'][$count10] : null;

                        $module10->module10heading3 = isset($data['module10heading3'][$count10]) ? $data['module10heading3'][$count10] : null;
                        $module10->module10product1content3 = isset($data['module10product1content3'][$count10]) ? $data['module10product1content3'][$count10] : null;
                        $module10->module10product2content3 = isset($data['module10product2content3'][$count10]) ? $data['module10product2content3'][$count10] : null;
                        $module10->module10product3content3 = isset($data['module10product3content3'][$count10]) ? $data['module10product3content3'][$count10] : null;
                        $module10->module10product4content3 = isset($data['module10product4content3'][$count10]) ? $data['module10product4content3'][$count10] : null;

                        $module10->module10heading4 = isset($data['module10heading4'][$count10]) ? $data['module10heading4'][$count10] : null;
                        $module10->module10product1content4 = isset($data['module10product1content4'][$count10]) ? $data['module10product1content4'][$count10] : null;
                        $module10->module10product2content4 = isset($data['module10product2content4'][$count10]) ? $data['module10product2content4'][$count10] : null;
                        $module10->module10product3content4 = isset($data['module10product3content4'][$count10]) ? $data['module10product3content4'][$count10] : null;
                        $module10->module10product4content4 = isset($data['module10product4content4'][$count10]) ? $data['module10product4content4'][$count10] : null;

                        $module10->module10heading5 = isset($data['module10heading5'][$count10]) ? $data['module10heading5'][$count10] : null;
                        $module10->module10product1content5 = isset($data['module10product1content5'][$count10]) ? $data['module10product1content5'][$count10] : null;
                        $module10->module10product2content5 = isset($data['module10product2content5'][$count10]) ? $data['module10product2content5'][$count10] : null;
                        $module10->module10product3content5 = isset($data['module10product3content5'][$count10]) ? $data['module10product3content5'][$count10] : null;
                        $module10->module10product4content5 = isset($data['module10product4content5'][$count10]) ? $data['module10product4content5'][$count10] : null;

                        $module10->save();
                        $count10++;
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
    
    public function submitPayment(Request $request)
    {
        $data = $request->all();

        // Check if the user exists based on the public_key
        $usercheck = aplus_plugin_users::where('public_key', $data['public_key'])->exists();

        if ($usercheck && isset($data['action']) && $data['action'] === 'payOrder') {
            $razorpay_mode = 'test';
            
            $razorpay_test_key = 'rzp_test_gmjLVXPzPXHRFH'; // Your Test Key
            $razorpay_test_secret_key = 'uoD284RzxuHw1gUI5GXSMSoC'; // Your Test Secret Key
            
            $razorpay_live_key = '';
            $razorpay_live_secret_key = '';

            if ($razorpay_mode === 'test') {
                $razorpay_key = $razorpay_test_key;
                $authAPIkey = "Basic " . base64_encode($razorpay_test_key . ":" . $razorpay_test_secret_key);
            } else {
                $authAPIkey = "Basic " . base64_encode($razorpay_live_key . ":" . $razorpay_live_secret_key);
                $razorpay_key = $razorpay_live_key;
            }

            // Set transaction details
            $order_id = uniqid(); 
            
            $public_key = $data['public_key'];
            $plan = $data['plan'];
            $userName = $data['userName'];
            $userEmail = $data['userEmail'];
            $payAmount = $data['payAmount'];

            $validPlans = [
                'basic' => 20,
                'premium' => 40,
                'pro' => 99,
                'proPlus' => 499,
            ];

            $validator = Validator::make($data, [
                'public_key' => 'required',
                'plan' => 'required|string',
                'userName' => 'required|string',
                'userEmail' => 'required|email',
                'payAmount' => 'required|numeric',
            ]);
        
            $validator->after(function ($validator) use ($validPlans, $plan, $payAmount) {
                if (!isset($validPlans[$plan]) || $validPlans[$plan] != $payAmount) {
                    $validator->errors()->add('plan', 'Invalid plan or price.');
                }
            });
        
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 422);
            }

            $makePayment = new aplus_plugin_payment();
            $makePayment->public_key = $public_key;
            $makePayment->order_id = $order_id;
            $makePayment->plan = $plan;
            $makePayment->userName = $userName;
            $makePayment->userEmail = $userEmail;
            $makePayment->payAmount = $payAmount;
            $makePayment->save();

            
            $note1 = "Payment of amount Rs. " . $payAmount;
            $note2 = $public_key;
            $note3 = $order_id;

            $postdata = [
                "amount" => $payAmount * 100,
                "currency" => "INR",
                "receipt" => $note1,
                "notes" => [
                    "notes_key_1" => $note1,
                    "notes_key_2" => $note2,
                    "notes_key_3" => $note3,
                ]
            ];

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.razorpay.com/v1/orders',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($postdata),
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Authorization: ' . $authAPIkey
                ],
            ]);

            $response = curl_exec($curl);

            curl_close($curl);
            $orderRes = json_decode($response);
            
            if (isset($orderRes->id)) {
                $rpay_order_id = $orderRes->id;
                
                $dataArr = [
                    'amount' => $payAmount,
                    'description' => "Pay bill of Rs. " . $payAmount,
                    'rpay_order_id' => $rpay_order_id,
                    'name' => $userName,
                    'email' => $userEmail,
                ];
                
                return response()->json([
                    'res' => 'success',
                    'order_number' => $order_id,
                    'userData' => $dataArr,
                    'razorpay_key' => $razorpay_key
                ]);
            } else {
                return response()->json([
                    'res' => 'error',
                    'order_id' => $order_id,
                    'info' => 'Error with payment'
                ]);
            }
        } else {
            return response()->json(['message' => 'User Not Found']);
        }
    }

    public function paymentStatus(Request $request)
    {
        $data = $request->all();
    
        // Check if the user exists
        $usercheck = aplus_plugin_users::where('public_key', $data['public_key'])->exists();
    
        if ($usercheck) {
            // Check if the reason is provided and update it if necessary
            $reason = isset($data['reason']) ? $data['reason'] : null;
            if (!empty($reason)) {
                aplus_plugin_payment::where('public_key', $data['public_key'])
                                    ->where('order_id', $data['oid'])
                                    ->update(['reason' => $reason]);
            }
    
            // Retrieve the plan and payment status
            $result = aplus_plugin_payment::select('plan', 'payment_status')
                                          ->where('public_key', $data['public_key'])
                                          ->where('order_id', $data['oid'])
                                          ->where('payment_id', $data['rp_payment_id'])
                                          ->first();
    
            if (!empty($result)) {
                return response()->json([
                    'plan' => $result['plan'],
                    'payment_status' => $result['payment_status']
                ], 200);
            } else {
                return response()->json(['message' => 'Order ID and Payment ID not found for this user.'], 404);
            }
        } else {
            return response()->json(['message' => 'User Not Found'], 404);
        }
    }
    
    public function handleWebhook(Request $request)
    {
        $data = $request->all();
        \Log::info('Razorpay Webhook Received', $data);
    
        // Extract relevant data from the webhook response
        $paymentEntity = $data['payload']['payment']['entity'];
        $publicKey = $paymentEntity['notes']['notes_key_2'];
        $orderId = $paymentEntity['notes']['notes_key_3'];
        $paymentId = $paymentEntity['id'];
        $paymentStatus = $paymentEntity['status'];
        $signature = $request->header('X-Razorpay-Signature');
        $payload = $request->getContent();
    
        // Razorpay webhook signature verification
        $webhookSecret = 'bQKP@tUX9auDH8T';
    
        try {
            // Instantiate the Utility class
            $utility = new Utility();
            
            // Use the instance to call the verifyWebhookSignature method
            $utility->verifyWebhookSignature($payload, $signature, $webhookSecret);
        } catch (\Exception $e) {
            \Log::error("Razorpay signature verification failed: " . $e->getMessage());
            return response()->json(['message' => 'Invalid signature'], 400);
        }
    
        // Check if the user exists
        $usercheck = aplus_plugin_users::where('public_key', $publicKey)->exists();
        if (!$usercheck) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
    
        // Handle different payment statuses (interested in 'captured' status for successful payments)
        if ($paymentStatus == "captured") {
            $payment_status = 1;  // Success
        } elseif ($paymentStatus == "failed") {
            $payment_status = 2;  // Failed
        } else {
            $payment_status = 3;  // Other status (e.g., authorized)
        }
    
        // Update the payment information
        $updated = aplus_plugin_payment::where('public_key', $publicKey)
                                        ->where('order_id', $orderId)
                                        ->update([
                                            'payment_id' => $paymentId,
                                            'signature' => $signature,
                                            'payment_status' => $payment_status
                                        ]);
    
        if ($updated) {
            // Process only if the payment was successful
            if ($payment_status == 1) {
                $plan = aplus_plugin_payment::select('plan')
                                            ->where('public_key', $publicKey)
                                            ->where('order_id', $orderId)
                                            ->first();
    
                // Determine the allowed product number based on the plan
                $allowedProduct = match ($plan['plan']) {
                    "basic" => 10,
                    "premium" => 50,
                    "pro" => 200,
                    "proPlus" => 1000000,
                    default => 1
                };
    
                // Update the allowed product number for the user
                aplus_plugin_users::where('public_key', $publicKey)->update(['allow_product_num' => $allowedProduct]);
            }
            return response()->json(['message' => 'Payment Status Updated Successfully'], 200);
        } else {
            return response()->json(['message' => 'Payment Status Not Updated'], 500);
        }
    }

}
