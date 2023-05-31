<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
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


        try {
            $pusher_credentials = getPusherCredentials();
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

        } catch (\Exception $e) {
            errorLogMessage($e);
        }


    }
}
