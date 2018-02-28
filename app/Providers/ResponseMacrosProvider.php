<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResponseMacrosProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('App\Services\ResponseMacros');

        if ($this->app->runningInConsole()) {
            //
        }
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
}
