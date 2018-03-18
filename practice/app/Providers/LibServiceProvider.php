<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LibServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'libDate',
            'App\Libs\Date'
        );

        $this->app->bind(
            'libDataStore',
            'App\Libs\DataStore'
        );
    }
}
