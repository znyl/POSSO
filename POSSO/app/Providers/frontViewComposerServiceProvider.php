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
        view()->composer('front.layoutNavbar', function($view) {
            $category = \App\category::all();
            
            $view->with(compact('category'));
        });
    }
    private function composeCart()
    {
        view()->composer(['front.layoutNavbar','front.cartIndex'], 'App\Http\Composers\CartComposer');
    }
}
