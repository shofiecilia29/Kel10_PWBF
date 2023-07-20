<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        View::composer('*', function($view) {
            $view->with('menu_categories', Category::with('children')->whereNull('category_id')->get());
        });
        Paginator::useBootstrap();
        View::composer('*', function($view) {
            
            $view->with('menu_tags', Tag::get());
        }); 
    }
}
