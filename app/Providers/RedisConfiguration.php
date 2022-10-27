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
            $config = array(
                'host' => 'dpapi.redis.cache.windows.net',
                'password' => 'haiUTPDY6A6NVDqKB7oe4EdAA8ybPea0ExiOMUqSOSg',
                'port' => '6380',
                'client' => 'predis',
            );

            Config::set('mail.mailers.smtp', $config);
        }
    }
}
