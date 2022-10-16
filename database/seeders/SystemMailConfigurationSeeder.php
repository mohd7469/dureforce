<?php

namespace Database\Seeders;

use App\Models\SystemMailConfiguration;
use Illuminate\Database\Seeder;

class SystemMailConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $degrees =
            [
                'mail_driver' => 'smtp',
                'mail_host' => 'smtpout.secureserver.net',
                'mail_port' => '465',
                'mail_username' => 'dureforce@dure-sameen.com',
                'mail_password' => 'b+Pretr?0aTrast=!lc3',
                'mail_encryption' => 'ssl',
                'mail_from_address' => 'dureforce@dure-sameen.com',
                'mail_from_name' => 'DureForce team',
                'is_active' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ];

        SystemMailConfiguration::insert($degrees);
    }
}
