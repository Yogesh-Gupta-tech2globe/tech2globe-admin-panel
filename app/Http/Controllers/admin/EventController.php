<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminsRole;
use App\Models\event_category;
use App\Models\events;
use Auth;
use Session;
use Image;

class EventController extends Controller
{
    public function index(){
        Session::put('page','event');
        $pagename = "Event";
        $event = events::get()->toArray();
        $eventCategory = event_category::get()->toArray();

        //Set Admin/Subadmins Permissions for Our Event Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Event'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Event'])->first()->toArray();
        }

        return view('admin.event.event')->with(compact('pagesModule','pagename','event','eventCategory'));
    }

    public function eventCategory(){
        Session::put('page','event');
        $pagename = "Event Category";
        $category = event_category::orderBy('order_number','asc')->get();

        //Set Admin/Subadmins Permissions for Our Event Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Event'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'Event'])->first()->toArray();
        }

        return view('admin.event.category')->with(compact('pagesModule','pagename','category'));
    }

    public function addEditEventCategory(Request $request, $id=null)
    {

        if($id==""){
            $category = new event_category();
            $message = "New Event Category added Successfully";
        }else{
            $category = event_category::find($id);
            $message = "Existing Event Category updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            if($id=''){
                $rules = [
                    'name' => 'required|max:30',
                    'image' => 'required|image|max:100',
                ];
    
                $customMessages = [
                    'name.required' => 'Event Category Name is required',
                    'name.max' => 'Maximum 30 characters are allowed for Name',
                    'image.required' => 'Image is required',
                    'image.image' => 'Only Images are allowed',
                    'image.max' => 'Image should not be greater than 100 Kb',
                ];
    
                $this->validate($request,$rules,$customMessages);

                $orderNumber = event_category::max('order_number');
                $category->order_number = $orderNumber + 1;

            }else{
                $rules = [
                    'name' => 'required|max:30',
                    'image' => 'image|max:100',
                ];
    
                $customMessages = [
                    'name.required' => 'Event Category Name is required',
                    'name.max' => 'Maximum 30 characters are allowed for Name',
                    'image.image' => 'Only Images are allowed',
                    'image.max' => 'Image should not be greater than 100 Kb',
                ];
    
                $this->validate($request,$rules,$customMessages);

                $category->order_number = $category['order_number'];
    
            }

                        
            if(!empty($data['image']) && !empty($data['current_image'])){

                       
                $imagePath = public_path('images/event/category/'.$data['current_image']);

                if(file_exists($imagePath)){
                    if(unlink($imagePath)){
                        
                    }else{
                        return redirect()->back()->with('error_message','There is some error on deleting Image!');
                    }
                }else{
                    return redirect()->back()->with('error_message','Image not found! Please contact Admin');
                }
            }

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,98999).'.'.$extension;
                    $image_path = 'images/event/category/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }

            $category->name = $data['name'];
            $category->image = $imageName;
            $category->save();
            
            return redirect('admin/event-category')->with('success_message',$message);
        }
    }

    public function updateCat(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            event_category::where('id',$data['eventCat_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'eventCat_id'=>$data['eventCat_id']]);
        }
    }

    public function addEditEvent(Request $request, $id=null)
    {
        Session::put('page','event');

        $category = event_category::get();

        if($id==""){
            $title = "Add Event";
            $event = new events();
            $message = "New Event added Successfully";
        }else{
            $title = "Edit Event";
            $event = events::find($id);
            $message = "Existing Event updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            if($id==''){
                $rules = [
                    'cover_image' => 'required',
                    'image' => 'required',
                ];
    
                $customMessages = [
                    'cover_image.required' => 'Cover Image is required',
                    'image.required' => 'Images is required',
                ];
    
                $this->validate($request,$rules,$customMessages);
            }
        
            $rules = [
                'title' => 'required|max:30',
                'category_id' => 'required',
                'year' => 'required',
                'cover_image' => 'image|max:100',
                'image' => 'max:100',
            ];

            $customMessages = [
                'title.required' => 'Event Title is required',
                'title.max' => 'Maximum 30 characters are allowed for Event Title',
                'category_id.required' => 'Event category is required',
                'year.required' => 'Year is required',
                'cover_image.image' => 'Only Images are allowed in cover image field',
                'cover_image.max' => 'Cover Image should not be greater than 100 Kb',
                'image.image' => 'Only Images are allowed in images field',
                'image.max' => 'Each Image should not be greater than 100 Kb',
            ];

            $this->validate($request,$rules,$customMessages);

            // Handling Cover Image
            if(!empty($data['cover_image']) && !empty($data['old_cover_image'])){
  
                $imagePath = public_path('images/event/coverImage/'.$data['old_cover_image']);

                if(file_exists($imagePath)){
                    if(unlink($imagePath)){
                        
                    }else{
                        return redirect()->back()->with('error_message','There is some error on deleting Image!');
                    }
                }else{
                    return redirect()->back()->with('error_message','Image not found! Please contact Admin');
                }
            }

            if($request->hasFile('cover_image')){
                $image_tmp = $request->file('cover_image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $coverImage = rand(111,98999).'.'.$extension;
                    $image_path = 'images/event/coverImage/'.$coverImage;
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['old_cover_image'])){
                $coverImage = $data['old_cover_image'];
            }else{
                $coverImage = "";
            }

            //Handling All Images
            if(!empty($data['image']) && empty($data['current_image'])){
                $allImages = [];
                for ($i = 0; $i < count($data['image']); $i++) {
                    $imageName = ""; // Initialize the imageName variable

                    if ($request->hasFile('image') && $request->file('image')[$i]->isValid()) {
                        $image_tmp = $request->file('image')[$i];
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = rand(111, 98999) . '.' . $extension;
                        $image_path = 'images/event/allImage/' . $imageName;
                        Image::make($image_tmp)->save($image_path);
                    }

                    array_push($allImages, $imageName);
                }

                $implodeAllImage = implode(',',$allImages);
            }else if(!empty($data['image']) && !empty($data['current_image'])){
                $allImages = [];
                for ($i = 0; $i < count($data['image']); $i++) {
                    $imageName = ""; // Initialize the imageName variable

                    if ($request->hasFile('image') && $request->file('image')[$i]->isValid()) {
                        $image_tmp = $request->file('image')[$i];
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = rand(111, 98999) . '.' . $extension;
                        $image_path = 'images/event/allImage/' . $imageName;
                        Image::make($image_tmp)->save($image_path);
                    }

                    array_push($allImages, $imageName);
                }

                $implodeAllImage = implode(',',$allImages);
                $implodeAllImage = $data['current_image'].",".$implodeAllImage;
            }else{
                $implodeAllImage = $data['current_image'];
            }
            
            
            $event->title = $data['title'];
            $event->category_id = $data['category_id'];
            $event->year = $data['year'];
            $event->cover_image = $coverImage;
            $event->image = $implodeAllImage;
            $event->save();
            
            return response()->json(['message'=>$message]);
        }

        return view('admin.event.add-edit-event')->with(compact('title','event','category'));
    }

    public function deleteEventImage(Request $request){
        if($request->ajax()){
            $data = $request->all();

            $event = events::find($data['eventId']);
            $image = $event['image'];
            $newImage = explode(',',$image);

            $imagePath = public_path('images/event/allImage/'.$newImage[$data['imgNum']]);

            if(file_exists($imagePath)){
                if(unlink($imagePath)){
                    unset($newImage[$data['imgNum']]);
                    $updatedImage = implode(',',$newImage);

                    $event->image = $updatedImage;
                    $event->save();
                    echo "200";
                }else{
                    return response()->json(['error'=>'There is some error on deleting Image!']);
                }
            }else{
                return response()->json(['error'=>'Image not found! Please contact Admin']);
            }
        }
    }

    public function update(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }

            events::where('id',$data['event_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'event_id'=>$data['event_id']]);
        }
    }

    public function getevents(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            $categoryId = $data['catid'];
            $categoryNameId = $data['categoryNameId'];
            $categoryNameId = str_replace("#","",$categoryNameId);

            $query = event_category::find($categoryId);
            $query1 = events::select('year')->where('category_id',$categoryId)->distinct()->get();
            $c = 1;
            
            $output = '
                <div class="tab-pane fade show active" id="'.$categoryNameId.'" role="tabpanel" aria-labelledby="'.$categoryNameId.'-tab">

                    <div class="collection-data-container">
                        <h5 class="title mb-0">'.$query["name"].' Collection</h5>
                    </div>

                    <ul class="nav nav-pills my-3 festiv-year-collection" id="pills-tab" role="tablist">';

                    if(count($query1) > 0){
                    foreach($query1 as $item) {
                        $output .= '<li class="nav-item" role="presentation">
                            <button class="nav-link rounded-1 border-0 ' . ($c == 1 ? 'active' : '') . ' yearBtn" catid="'.$categoryId.'" yearid="'.$item['year'].'" id="'.$categoryNameId.'-'.$item['year'].'-tab" data-bs-toggle="pill" data-bs-target="#'.$categoryNameId.'-'.$item['year'].'" type="button" role="tab" aria-controls="'.$categoryNameId.'-'.$item['year'].'" aria-selected="true">
                                '.$item['year'].'
                            </button>
                        </li>';
                        $c++;
                    }
                    }else{
                        $output .= 'No Year';
                    }

            $output .= '</ul>

                    <div class="tab-content" id="pills-tabContent">
                    
                    </div>

                </div>';


            return $output;
        }
            
    }

    public function geteventsyear(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();

            $categoryId = $data['catid'];
            $year = $data['yearid'];
            $categoryNameId = $data['categoryNameId'];
            $categoryNameId = str_replace("#","",$categoryNameId);

            $query2 = events::where('category_id',$categoryId)->where('year',$year)->where('status',1)->get();

            $output = $output = '
            <div class="tab-pane fade show active" id="'.$categoryNameId.'" role="tabpanel" aria-labelledby="'.$categoryNameId.'-tab">
                <div class="f-carousel container myCarouselContainer-tab-parent" id="myCarousel">
                    <div class="f-carousel__viewport">
                        <div class="f-carousel__track row">';
        
                            if(count($query2) > 0) {
                                foreach ($query2 as $data) {
                                    $output .= '
                                                <div class="col-md-6 mb-0 p-0">
                                                    <div class="innercard">
                                                        <a type="button" class="innercardchild" href="/images/event/coverImage/'.$data['cover_image'].'" data-fancybox="gallery" data-caption="">
                                                            <img class="w-100 h-100" src="/images/event/coverImage/'.$data['cover_image'].'">
                                                            <div class="event-title">
                                                                <h4 class="abcd">'.$data['title'].'</h4>
                                                                <button type="button" class="sbmtbtn bg-danger">Explore More</button>
                                                            </div>
                                                        </a>
                                                        <div style="display:none">';
                                    
                                    $query3 = explode(',', $data['image']);
                                    for($i = 0; $i < count($query3); $i++) {
                                        $output .= '
                                                            <a href="/images/event/allImage/'.$query3[$i].'" data-fancybox="gallery" data-caption="">
                                                                <img src="/images/event/allImage/'.$query3[$i].'">
                                                            </a>';
                                    }
                                    
                                    $output .= '
                                                        </div>
                                                    </div>
                                                </div>';
                                }
                            } else {
                                $output = 'No Data';
                            }
                            
                            $output .= '
                                            </div>
                                        </div>
                                    </div>
                                </div>';
         
            return $output;
        }
    }

    public function eventOrderUpdate(Request $request){
        if($request->ajax()){
            $order = json_decode($request->order, true); // Decode JSON string to array
    
            if (is_array($order)) { // Check if $order is an array
                foreach ($order as $item) {
                    $id = $item['id'];
                    $order_number = $item['order_number'];
    
                    $eventCat = event_category::find($id);
    
                    if($eventCat) {
                        $eventCat->order_number = $order_number;
                        $eventCat->save();
                    }
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Invalid data format'], 400);
            }
        }
    }
    
}
