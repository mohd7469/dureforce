<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
class RedisCacheConfiguration extends ServiceProvider
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

         $pusher_credentials = getRedisCacheCredentials();
         if ($pusher_credentials) {
             $config = array(
                 'driver' => 'pusher',
                 'app_id'       => $pusher_credentials->name,
                 'key'       => $pusher_credentials->host,
                 'secret'   => $pusher_credentials->password,
             );
             Config::set('broadcasting.connections.pusher', $config);
             Config::set('broadcasting.default', 'pusher');
             Config::set('broadcasting.connections.pusher.options.cluster', $pusher_credentials->port);

         }

    }
}
