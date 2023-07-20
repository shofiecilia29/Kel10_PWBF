<?php

namespace App\Providers;

use App\Models\Tag;

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
        Paginator::useBootstrap();
        View::composer('*', function($view) {
            
            $view->with('menu_tags', Tag::get());
        }); 
    }
}
