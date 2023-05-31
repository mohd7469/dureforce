<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Job;
use Carbon\Carbon;

class MilestoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'description' => $this->faker->paragraph,
            'start_date' => Carbon::yesterday()->format('Y-m-d H:i:s'),
            'end_date' => Carbon::tomorrow()->format('Y-m-d H:i:s'),
            'amount' => 100,
            'completed' => 0,
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'module_id' => function () {
                return Job::factory()->create()->id;
            },
            'module_type' =>'App\Models\Job',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}
