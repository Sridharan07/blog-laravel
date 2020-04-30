<?php

namespace App\Providers;

use App\Http\View\Composers\BlogComposer;
use App\Http\View\Composers\AdminComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Setting;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(View $view)
    {
        //Manggil class BlogComposer dalam folder app/http/composers/blogcomposer.php
        View::composer('blog.*', BlogComposer::class);
        View::composer(['admin.*','home'], AdminComposer::class);
      
    }
}
