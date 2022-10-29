<?php

namespace Database\Seeders;

use App\Models\SystemCredential;
use App\Models\SystemMailConfiguration;
use Illuminate\Database\Seeder;

class SystemCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $redis_credentials =
            [
                'host' => 'dpapi.redis.cache.windows.net',
                'password' => 'haiUTPDY6A6NVDqKB7oe4EdAA8ybPea0ExiOMUqSOSg',
                'port' => '6380',
                'client' => 'predis',
                'type' => SystemCredential::Type_Redis,
                'is_active' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ];


        SystemCredential::insert($redis_credentials);
    }
}
