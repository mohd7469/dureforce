<?php

namespace Database\Seeders;

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
        \DB::table('proposal_attachments')->truncate();
        
        \DB::table('proposal_attachments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'abc',
                'slug' => 'sss',
                'fee' => 10,
                'is_active' => 1,
                'module_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'abc',
                'slug' => 'sss',
                'fee' => 10,
                'is_active' => 1,
                'module_id' => 22,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
        ));
    }
}
