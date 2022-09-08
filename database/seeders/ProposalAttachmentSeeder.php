<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProposalAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProposalAttachment::factory()->count(5)->create(); 

    }
}
