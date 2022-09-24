<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
class SystemMailConfiguration extends ServiceProvider
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
        // $emailServices = getMailCredentials();

        // if ($emailServices) {
        //     $config = array(
        //         'transport' => 'smtp',
        //         'host'       => $emailServices->mail_host,
        //         'port'       => $emailServices->mail_port,
        //         'username'   => $emailServices->mail_username,
        //         'password'   => $emailServices->mail_password,
        //         'encryption' => $emailServices->mail_encryption,
        //         'from'       => array('address' => $emailServices->mail_from_address, 'name' => $emailServices->mail_from_name),
        //         'sendmail'   => '/usr/sbin/sendmail -bs',
        //         'pretend'    => false,
        //     );

        //     Config::set('mail.mailers.smtp', $config);
        // }
    }
}
