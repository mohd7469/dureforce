<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeliveryModesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('delivery_modes')->truncate();
        
        \DB::table('delivery_modes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'abc',
                'slug' => 'sss',
                'module_id' => 11,
                'module_type' => 'App\Model',
                'is_active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'abc',
                'slug' => 'sss',
                'module_id' => 22,
                'module_type' => 'App\Model',
                'is_active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
        ));
    }
}
