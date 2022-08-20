<?php

namespace Database\Seeders;

use App\Models\JobType;
use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'id' => 1,
                'name' => 'Job',
                'description' => 'A buyer will create a job',
                'job_types'    => [
                    [
                        'id' => 1,
                        'title' => 'One Time',
                       
                    ],
                    [
                        'id' => 2,
                        'title' => 'On Going',
                        
                    ]
                ]
            ],
            [
                'id' => 2,
                'name' => 'Service',
                'description' => 'A buyer will purchase a service',
                'job_types'    => [
                    
                ]

            ],
            [
                'id' => 3,
                'name' => 'Software',
                'description' => 'A Buyer will purchase a software',
                'job_types'    => [
                    
                ]
            ],
        ];

        foreach ($modules as $module) {
                
            $module_added=Module::updateOrCreate([
                'id'=> $module['id'],
                'name'=>$module['name']

            ],[
                'description' =>$module['description']
            ]);
            foreach ($module['job_types'] as  $job_type) {
                $module_added->jobType()->updateOrCreate([
                    'id'=> $job_type['id'],
                    'title'=>$job_type['title']
    
                ],[]);
            }
        }
    }
}
