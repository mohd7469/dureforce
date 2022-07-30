<?php

namespace Database\Seeders;

use App\Models\LanguageLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        LanguageLevel::create([
            'name' => 'B1 (Pre-Intermediate)'
        ]);

        LanguageLevel::create([
            'name' => 'B2 (Intermediate)'
        ]);

        LanguageLevel::create([
            'name' => 'C1 (Upper-Intermediate)'
        ]);

        LanguageLevel::create([
            'name' => 'C2 (Advanced)'
        ]);

    }
}
