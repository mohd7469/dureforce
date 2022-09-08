<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Proposal;
use App\Models\User;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Proposal::factory()->count(10)->create(); 


        // factory(App\ProposalFactory::class, 10)->create();
    //     $users = User::with(['jobs', 'jobs.deliverable'])->get();

    //     foreach($users as $user) {
            
    //             Proposal::create([
    //                 'user_id' => $user->id,
    //                 'delivery_mode_id' => $user->jobs()->deliverable()->pluck('id') ? $user->jobs()->deliverable()->pluck('id') : '',
    //                 'module_id' => $user->jobs()->pluck('uuid') ? $user->jobs()->pluck('uuid') : '',
    //                 'module_type' =>'App\Models\Job',
    //                 'hourly_bid_rate' => 0.2,
    //                 'amount_receive' => 1.3,
    //                 'start_hour_limit' => 12,
    //                 'end_hour_limit' => 22,
    //                 'cover_letter' => 'Dollar néo-zélandais',
    //                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    //                 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    //             ]);
            

    //     }
    // }
    }
}
