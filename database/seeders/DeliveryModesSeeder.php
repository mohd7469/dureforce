<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DeliveryModesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('delivery_modes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Hourly',
                'slug' => 'Hourly-slug',
                'module_id' => 1,
                'module_type' => 'App\Models\Job',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Weekly',
                'slug' => 'Weekly-slug',
                'module_id' => 1,
                'module_type' => 'App\Models\Job',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array (
                'id' => 3,
                'title' => 'Monthly',
                'slug' => 'Monthly-slug',
                'module_id' => 1,
                'module_type' => 'App\Models\Job',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
        ));
    }
}
