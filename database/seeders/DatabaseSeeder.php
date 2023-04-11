<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        $this->call(LanguageLevelSeeder::class);
//        $this->call(AttributeSeeder::class);
//        $this->call(ModuleSeeder::class);
//        $this->call(ModuleSeeder::class);
//        $this->call(SkillCategorySeeder::class);
//        $this->call(ProposalSeeder::class);
//        $this->call(ProposalAttachmentSeeder::class);
//        $this->call(ServiceFeeSeeder::class);
//        $this->call(DeliveryModesSeeder::class);
//        $this->call(milestoneSeeder::class);
//        $this->call(DegreeSeeder::class);
        $this->call(StatusSeeder::class);


    }
}
