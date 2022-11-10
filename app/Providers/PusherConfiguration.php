<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
class PusherConfiguration extends ServiceProvider
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
        $pusher_credentials = getPusherCredentials();
        if ($pusher_credentials) {
            $config = array(
                'app_id'       => $pusher_credentials->name,
                'key'       => $pusher_credentials->host,
                'secret'   => $pusher_credentials->password,
                'options.cluster'   => $pusher_credentials->port,
            );
            Config::set('broadcasting.connections.pusher', $config);
        }
    }
}
