<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ServiceFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('service_fees')->truncate();
        
        \DB::table('service_fees')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'new-user',
                'slug' => 'new-user',
                'fee' => 10,
                'is_active' => 1,
                'module_id' => 35,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'top-rated-user',
                'slug' => 'sss',
                'fee' => 10,
                'is_active' => 1,
                'module_id' => 36,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
        ));
    }
}
