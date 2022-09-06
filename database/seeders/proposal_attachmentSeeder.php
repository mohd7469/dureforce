<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class proposal_attachmentSeeder extends Seeder
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
                'name' => 'abc',
                'uploaded_name' => 'sss',
                'url' => 'www.google.com',
                'type' => 'App\Model',
                'is_published' => 0,
                'user_id' => 11,
                'module_id' => 11,
                'module_type' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'abc',
                'uploaded_name' => 'sss',
                'url' => 'www.google.com',
                'type' => 'App\Model',
                'is_published' => 0.2,
                'user_id' => 22,
                'module_id' => 22,
                'module_type' => 22,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ),
        ));
    }
}
