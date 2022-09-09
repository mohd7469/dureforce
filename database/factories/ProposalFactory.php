<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\User;
use App\Models\DeliveryMode;
use App\Models\Job;


class ProposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'user_id' => function () {
                    return User::factory()->create()->id;
                },

                'delivery_mode_id' => function () {
                    return DeliveryMode::factory()->create()->id;
                },
                'module_id' => function () {
                    return Job::factory()->create()->id;
                },
                'module_type' =>'App\Models\Job',
                'hourly_bid_rate' => 0.2,
                'amount_receive' => 1.3,
                'start_hour_limit' => 12,
                'end_hour_limit' => 22,
                'cover_letter' => 'Dollar néo-zélandais',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}
