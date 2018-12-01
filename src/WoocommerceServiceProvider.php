<?php

namespace WmDeveloper\Woocommerce;

use Illuminate\Support\ServiceProvider;

class WoocommerceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // dd("sds");
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('WmDeveloper\Woocommerce\WoocommerceApi');
    }
}
