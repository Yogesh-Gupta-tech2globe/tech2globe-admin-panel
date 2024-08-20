<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminsRole;
use App\Models\seo_dynamic;
use App\Models\tech2globe_header_category;
use App\Models\tech2globe_header_sub_category;
use App\Models\tech2globe_pages_category;
use App\Models\tech2globe_all_pages;
use App\Models\tech2globe_footer_sub_category;
use App\Models\seo_static;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;

class SeoController extends Controller
{
    public function index(){
        Session::put('page','seo');

        //Set Admin/Subadmins Permissions for SEO Module
        $ModuleCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'seo'])->count();
        $pagesModule = array();

        if(Auth::guard('admin')->user()->type=="admin"){
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        }else if($ModuleCount==0){
            $message = "This Module is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        }else{
            $pagesModule = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'seo'])->first()->toArray();
        }

        $pagename = "SEO";
        $seo = seo_dynamic::latest()->get();
        $seoStatic = seo_static::where('id',1)->first();
        return view('admin.seo.seo')->with(compact('pagesModule','pagename','seo','seoStatic'));
    }

    public function addEditSeo(Request $request, $id=null)
    {
        Session::put('page','seo');

        if($id==""){
            $title = "Add Page SEO";
            $seo = new seo_dynamic();
            $message = "Page SEO Details added Successfully";
        }else{
            $title = "Edit Page SEO";
            $seo = seo_dynamic::find($id);
            $message = "Page SEO Details updated Successfully";
        }

        $pageUrl = seo_dynamic::pluck('page_url');

        $allpageurl = tech2globe_header_category::select('page_url')
            ->whereNotIn('page_url',$pageUrl)
            ->union(
                tech2globe_header_sub_category::select('page_url')
                ->whereNotIn('page_url',$pageUrl)
            )
            ->union(
                tech2globe_pages_category::select('page_url')
                ->whereNotIn('page_url',$pageUrl)
            )
            ->union(
                tech2globe_all_pages::select('page_url')
                ->whereNotIn('page_url',$pageUrl)
            )
            ->union(
                tech2globe_footer_sub_category::select('page_url')
                ->whereNotIn('page_url',$pageUrl)
            )
            ->get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();
        
            $rules = [
                'page_url' => 'required',
                'pageTitle' => 'required|min:50|max:60',
                'description' => 'nullable|min:150|max:160',
            ];

            $customMessages = [
                'page_url.required' => 'Please select Page Url',
                'pageTitle.required' => 'Page Title is required',
                'pageTitle.min' => 'Page Title should have minimum 50 characters are allowed.',
                'pageTitle.max' => 'Page Title should have maximum 60 characters are allowed.',
                'description.min' => 'Description should have minimum 150 characters are allowed.',
                'description.max' => 'Description should have maximum 160 characters are allowed.',
            ];

            $this->validate($request,$rules,$customMessages);

            $seo->page_url = $data['page_url'];
            $seo->pageTitle = $data['pageTitle'];
            $seo->description = $data['description'];
            $seo->keywords = $data['keywords'];
            $seo->canonicalUrl = $data['canonicalUrl'];
            $seo->ogTitle = $data['ogTitle'];
            $seo->ogSitename = $data['ogSitename'];
            $seo->ogLocale = $data['ogLocale'];
            $seo->ogUrl = $data['ogUrl'];
            $seo->ogDescription = $data['ogDescription'];
            $seo->ogType = $data['ogType'];
            $seo->ogImage = $data['ogImage'];
            $seo->twitterCard = $data['twitterCard'];
            $seo->twitterTitle = $data['twitterTitle'];
            $seo->twitterDescription = $data['twitterDescription'];
            $seo->twitterImage = $data['twitterImage'];
            $seo->organization = $data['organization'];
            $seo->schema_page = $data['schema'];
            if($seo->save()){
                activity($title)
                ->performedOn($seo)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'SEO','submodule' => 'SEO'])
                ->log('');

                // return redirect('admin/seo')->with('success_message',$message);
            }
        }


        return view('admin.seo.add-edit-seo')->with(compact('title','seo','allpageurl'));
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

            if(seo_dynamic::where('id',$data['seoPage_id'])->update(['status'=>$status])){
                activity('Update')
                ->performedOn(seo_dynamic::find($data['seoPage_id']))
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'SEO','submodule' => 'SEO'])
                ->log('Status');
            }
            return response()->json(['status'=>$status, 'seoPage_id'=>$data['seoPage_id']]);
        }
    }

    public function seoUpdateStatic(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $seo = seo_static::find(1);

            $seo->msvalidate = $data['msvalidate'];
            $seo->google_site_verification = $data['google-site-verification'];
            $seo->google_tracking_code = $data['google-tracking-code'];
            $seo->geo_region = $data['geo_region'];
            $seo->geo_placename = $data['geo_placename'];
            $seo->geo_position = $data['geo_position'];
            $seo->icbm = $data['icbm'];
            if($seo->save()){
                activity('Update')
                ->performedOn($seo)
                ->causedBy(Auth::guard('admin')->user())
                ->withProperties(['module' => 'SEO','submodule' => 'Static Data'])
                ->log('Google Tags');

                return redirect('admin/seo')->with('success_message','Data Updated Successfully');
            }
        }
    }
}
