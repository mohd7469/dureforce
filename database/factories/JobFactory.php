<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;

class JobFactory extends Factory
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
            'uuid' => Str::uuid()->toString(),
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'category_id' => 1,
            'sub_category_id' => 1,
            'country_id' => 160,
            'rank_id' => 2,
            'project_stage_id' => 2,
            'status_id' => 1,
            'job_type_id' => 1,
            'budget_type_id' => 1,
            'project_stage_id' => 1,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'fixed_amount' => 50,
            'hourly_start_range' => 50,
            'hourly_start_range' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}
