<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\tech2globe_header_category;
use App\Models\tech2globe_header_sub_category;
use App\Models\tech2globe_pages_category;
use App\Models\tech2globe_all_pages;
use App\Models\tech2globe_footer_category;
use App\Models\tech2globe_footer_sub_category;
use App\Models\company_branch;
use App\Models\contact_social;
use App\Models\achievements;
use App\Models\sitelogo;
use App\Models\recaptcha;
use App\Models\events;
use App\Models\event_category;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layout.header', function ($view) {
            $mainMenu = tech2globe_header_category::where('status',1)->get()->toArray();
            $subMenu = tech2globe_header_sub_category::where('status',1)->get()->toArray();
            $pageCategory = tech2globe_pages_category::where('status',1)->whereHas('subMenu', function ($query) {
                $query->where('status', 1);
            })->get()->toArray(); 
            $allPages = tech2globe_all_pages::where('status',1)->whereHas('subCategory', function ($query) {
                $query->where('status', 1);
            })->whereHas('pageCategory', function ($query) {
                $query->where('status', 1);
            })->get()->toArray();
            $companyBranch = company_branch::where('status',1)->get()->toArray();

            $skypeId = contact_social::select('link')->where('name','Skype ID')->first();
            $mailId = contact_social::select('link')->where('name','Mail ID')->first();

            $sitelogo = sitelogo::where('id',1)->first();

            $view->with(['mainMenu' => $mainMenu, 'subMenu' => $subMenu,'pageCategory' => $pageCategory,'allPages' => $allPages,'companyBranch' => $companyBranch, 'skypeId' => $skypeId, 'mailId' => $mailId, 'sitelogo' => $sitelogo]);
        });

        View::composer('layout.footer', function ($view) {
            
            $footerCategory = tech2globe_footer_category::all();
            $footerPages = tech2globe_footer_sub_category::where('status',1)->get()->toArray();

            $companyBranch = company_branch::where('status',1)->get()->toArray();
            $social = contact_social::where('cat_status',1)->where('status',1)->get()->toArray();
            $achievements = achievements::where('status',1)->get()->toArray();

            $view->with(['footerCategory' => $footerCategory, 'footerPages' => $footerPages, 'companyBranch' => $companyBranch, 'social' => $social, 'achievements' => $achievements]);
        });

        // View::composer('include.portfolio', function ($view) {

        //     $portfolio = portfolio::where('status',1)->get()->toArray();

        //     $view->with(['portfolio' => $portfolio]);
        // });

        // View::composer('include.casestudy', function ($view) {

        //     $casestudy = casestudy::where('status',1)->get()->toArray();

        //     $view->with(['casestudy' => $casestudy]);
        // });

        // View::composer('include.testimonials', function ($view) {

        //     $testimonials = testimonial::where('status',1)->where('type','text')->get()->toArray();

        //     $view->with(['testimonials' => $testimonials]);
        // });
        
        // View::composer('include.blog', function ($view) {

        //     // Endpoint URL
        //     $endpoint = 'https://blog.tech2globe.com/wp-json/wp/v2/posts?per_page=5';

        //     // Fetch posts
        //     $response = file_get_contents($endpoint);

        //     // Check if request was successful
        //     if ($response === false) {
        //         echo "Error fetching posts";
        //     } else {
        //         // Convert JSON response to array
        //         $posts = json_decode($response, true);
        //     }

        //     $view->with(['posts' => $posts]);
        // });

        // View::composer('include.faq', function ($view) {

        //     $faq = faq::where('status',1)->get()->toArray();

        //     $view->with(['faq' => $faq]);
        // });

        View::composer('include.cta-form', function ($view) {

            $recaptcha = recaptcha::select('site_key')->find(1);

            $view->with(['site_key' => $recaptcha]);
        });

        View::composer('include.query-form', function ($view) {

            $recaptcha = recaptcha::select('site_key')->find(1);

            $view->with(['site_key' => $recaptcha]);
        });

        View::composer('include.contact-form', function ($view) {

            $recaptcha = recaptcha::select('site_key')->find(1);

            $view->with(['site_key' => $recaptcha]);
        });

        View::composer('include.life-at-tech2globe', function ($view) {

            $category = event_category::where('status',1)->get()->toArray();

            $view->with(['category' => $category]);
        });

        View::composer('include.company-branch', function ($view) {

            $companyBranch = company_branch::where('status',1)->get()->toArray();

            $view->with(['companyBranch' => $companyBranch]);
        });
    }
}
