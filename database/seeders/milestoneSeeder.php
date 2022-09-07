<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MilestoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('milestones')->truncate();

   
        
        \DB::table('milestones')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => 'abc',
                'start_date' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'amount' => 1,
                'completed' => 1,
                'user_id' => 35,
                'module_id' => 11,
                'module_type' => 'App\Models',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            1 => 
            array (
                'id' => 2,
                'description' => 'abc',
                'start_date' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'end_date' =>  Carbon::now()->format('Y-m-d H:i:s'),
                'amount' => 2,
                'user_id' => 35,
                'completed' => 0,
                'user_id' => 35,
                'module_id' => 22,
                'module_type' => 'App\Models',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
        ));
    }
}
