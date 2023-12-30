<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\tech2globe_header_category;
use App\Models\tech2globe_header_sub_category;
use App\Models\tech2globe_all_pages;
use App\Models\tech2globe_middle_header;
use App\Models\tech2globe_top_header;
use App\Models\tech2globe_footer_category;
use App\Models\tech2globe_footer_sub_category;


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
            $mainMenu = tech2globe_header_category::all();
            $subMenu = tech2globe_header_sub_category::all();
            $allPages = tech2globe_all_pages::all();
            $view->with(['mainMenu' => $mainMenu, 'subMenu' => $subMenu,'allPages' => $allPages]);
        });

        View::composer('layout.footer', function ($view) {
            $middleNavbar = tech2globe_middle_header::all();
            $footerCategory = tech2globe_footer_category::all();
            $footerPages = tech2globe_footer_sub_category::all();
            $view->with(['middleNavbar' => $middleNavbar,'footerCategory' => $footerCategory, 'footerPages' => $footerPages]);
        });
    }
}
