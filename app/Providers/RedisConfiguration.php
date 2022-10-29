<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
class RedisConfiguration extends ServiceProvider
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
        $redis_credentials = getRedisCredentials();

        if ($redis_credentials) {
            $default = array(
                'host' => $redis_credentials->host,
                'password' => $redis_credentials->password,
                'port' => $redis_credentials->port,
            );
            $client = $redis_credentials->client;

            Config::set('database.redis.default', $default);
            Config::set('database.redis.client', $client);
        }
    }
}
