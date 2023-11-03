<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tech2globe_header_category;
use App\Models\tech2globe_header_sub_category;
use App\Models\tech2globe_all_pages;
use App\Models\layout;
use Illuminate\Http\Request;
use Str;

class Tech2globeServiceThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $newPage = new tech2globe_all_pages();
            $message = "Good! Your Page is Live Now. Please Create Remaining Sections.";

            $rules = [
                'category_id' => 'required',
                'subCategory_id' => 'required',
                'themeId' => 'required',
                'page_name' => 'required',
                'page_url' => 'required|unique:tech2globe_all_pages,page_url|unique:tech2globe_header_category,page_url|unique:tech2globe_header_sub_category,page_url|unique:layout,page_url',
            ];

            $customMessages = [
                'category_id.required' => 'Main Menu is required',
                'subCategory_id.required' => 'Sub Menu is required',
                'themeId.required' => 'Theme Id is required',
                'page_name.required' => 'Page Name is required',
                'page_url.required' => 'Page URL is required',
                'page_url.unique' => 'This Page url is already exist! Try a different one',
            ];

            $this->validate($request,$rules,$customMessages);

            $slug = Str::slug($data['page_url']);


            $fileContent = '
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "http://localhost:8000"; ?>
            
            @endsection';

            $filePath = resource_path('views/'.$slug.'.blade.php');

            //Creating the file
            file_put_contents($filePath, $fileContent);

            // Adding a route dynamically
            $routeContent = "Route::get('/".$slug."', function () {
                return view('".$slug."');
            });";

            $routePath = base_path('routes/web.php');
            file_put_contents($routePath, $routeContent,FILE_APPEND | LOCK_EX);

            $newPage->category_id = $data['category_id'];
            $newPage->sub_category_id = $data['subCategory_id'];
            $newPage->theme_id = $data['themeId'];
            $newPage->page_name = $data['page_name'];
            $newPage->page_url = $data['page_url'];
            $newPage->save();
            
            return redirect('admin/tech2globe-all-layout')->with('success_message',$message);
        }
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
