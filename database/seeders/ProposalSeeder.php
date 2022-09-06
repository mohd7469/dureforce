<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('proposals')->truncate();
        
        \DB::table('proposals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'delivery_mode_id' => 1,
                'module_id' => 1,
                'module_type' => 'App\Model',
                'hourly_bid_rate' => 0.2,
                'amount_receive' => 1.3,
                'start_hour_limit' => 12,
                'end_hour_limit' => 22,
                'cover_letter' => 'Dollar néo-zélandais',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' =>  2,
                'delivery_mode_id' => 1,
                'module_id' => 1,
                'module_type' => 'App\Model',
                'hourly_bid_rate' => 0.2,
                'amount_receive' => 1.3,
                'start_hour_limit' => 12,
                'end_hour_limit' => 22,
                'cover_letter' => "Dollar néo-zélandais",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
        ));
        
    }
}
