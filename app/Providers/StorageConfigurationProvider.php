<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
class StorageConfigurationProvider extends ServiceProvider
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
        $storage_credentials = getStorageCredentials();

        if ($storage_credentials) {
            config([
                'filesystems.disks.azure' => [
                    'driver'    => 'azure',
                    'name'      => $storage_credentials->name,
                    'key'       => $storage_credentials->password,
                    'container' => env('AZURE_STORAGE_CONTAINER'),
                    'url'       => $storage_credentials->prefix,
                    'sas_url'   => $storage_credentials->host,
                    'prefix'    => null,
                ]
            ]);
//            Log::info(["successfully assigned storage credentials"=>$storage_credentials]);
        }
    }
}
