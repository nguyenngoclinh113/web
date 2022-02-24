<?php

namespace App\Providers;
use App\Slide;
use App\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Schema::defaultStringLength(191);
        // $slideModal = new Slide();
        if (Schema::hasTable('slides')) {
            // $slides = $slideModal->all();
            $slides = Slide::all();
            View::share('slides', $slides);
        }

        if (Schema::hasTable('categories')) {
            $categories = Category::all();
            View::share('categories', $categories);
        }

    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
