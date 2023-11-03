<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\tech2globe_header_category;
use App\Models\tech2globe_header_sub_category;
use App\Models\tech2globe_all_pages;

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
    }
}
