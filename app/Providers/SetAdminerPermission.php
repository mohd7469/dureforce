<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
class SetAdminerPermission extends ServiceProvider
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
        if (env('APP_URL') != "https://dureforce.com"){
            Config::set('adminer.enabled', true);
        }
    }
}
