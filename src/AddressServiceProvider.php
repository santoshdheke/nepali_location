<?php

namespace Address;

use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
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
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/route.php');
        $this->loadMigrationsFrom(__DIR__.'/database/Migrations');
        $this->loadViewsFrom(__DIR__.'/view','address');
    }
}
