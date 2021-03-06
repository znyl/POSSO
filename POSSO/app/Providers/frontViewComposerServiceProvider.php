<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class frontViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->composeNavbarCategory();
        $this->composeCart();
        $this->composeBanner();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeNavbarCategory()
    {
        view()->composer(['front.layoutNavbar','front.frontHome'], function($view) {
            $category = \App\category::all();
            
            $view->with(compact('category'));
        });
    }
    private function composeCart()
    {
        view()->composer(['front.layoutNavbar','front.cartIndex','front.formCheckOutOrder','App\Http\Controllers\checkOutController@orderCheckOut'], 'App\Http\Composers\CartComposer');
    }
    private function composeBanner()
    {
        view()->composer(['front.layoutFront'], function($view){
            $banner = \App\s_slider_image::where('status','=',1)->get();
            $view->with(compact('banner'));
        });
    }
}
