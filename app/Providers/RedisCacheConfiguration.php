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

        $redis_credentials = getRedisCacheCredentials();
        if ($redis_credentials) {

            Config::set('database.redis.cache.host', $redis_credentials->host);
            Config::set('database.redis.cache.password', $redis_credentials->password);
            Config::set('database.redis.cache.port', $redis_credentials->port);

            Config::set('database.redis.default.host', $redis_credentials->host);
            Config::set('database.redis.default.password', $redis_credentials->password);
            Config::set('database.redis.default.port', $redis_credentials->port);
            Config::set('database.redis.default.client', 'predis');
            Config::set('database.redis.default.scheme', $redis_credentials->prefix);
        }
    }
}
