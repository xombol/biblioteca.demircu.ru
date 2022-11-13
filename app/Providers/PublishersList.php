<?php

namespace App\Providers;

use App\Models\Publisher;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PublishersList extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        // Using closure based composers...
        View::composer('admin.layouts.components.sidebar', function ($view) {

            $menu_list_publisher = Publisher::all();

            $view->with('menu_list_publisher', $menu_list_publisher);
        });
    }
}
