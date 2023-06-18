<?php

namespace Database\Seeders;

use App\Models\ServiceFee;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SystemServiceFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ServiceFee::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('service_fees')->insert(array (
           
            0 => 
            array (
                'id' => 1,
                'title' => 'New User',
                'slug' => 'new-user',
                'module_id' => 1,
                'fee'       => 20,
                'is_active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'System Fee',
                'slug' => 'system-fee',
                'module_id' => 1,
                'fee'       => 30,
                'is_active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
           
        ));
    }
}
