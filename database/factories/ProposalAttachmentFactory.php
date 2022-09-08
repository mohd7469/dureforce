<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProposalAttachmentFactory extends Factory
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
            'name' => $this->faker->name,
            'uploaded_name' => $this->faker->sentence,
            'url' => $file = \Illuminate\Http\UploadedFile::fake()->create('test.pdf')->store('pdfs'),
            'type' => 100,
            'is_published' => 0,
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
