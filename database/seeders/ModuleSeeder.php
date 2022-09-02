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
                ],
                'budget_type' =>[
                        
                    [
                        'id' => 1,
                        'title' => 'Fixed',
                           
                    ],
                    [
                        'id' => 2,
                        'title' => 'Hourly',
                           
                    ]
                    
                ],
                'deliverables' => [
                    [
                        'id' => 1,
                        'title' => 'Initial design',
                           
                    ],
                    [
                        'id' => 2,
                        'title' => 'Time-tracking report',
                           
                    ],
                    [
                        'id' => 3,
                        'title' => 'Project budget report',
                           
                    ],
                    [
                        'id' => 4,
                        'title' => 'Progress report ',
                           
                    ],
                    [
                        'id' => 5,
                        'title' => 'Final Design ',
                           
                    ],
                    [
                        'id' => 6,
                        'title' => 'Final product',
                           
                    ],
                    [
                        'id' => 7,
                        'title' => 'Bug Report',
                           
                    ],
                    [
                        'id' => 8,
                        'title' => ' Gantt chart',
                           
                    ],
                    [
                        'id' => 9,
                        'title' => ' Fully-developed app',
                           
                    ],
                    [
                        'id' => 10,
                        'title' => ' Live website',
                           
                    ],
                    [
                        'id' => 11,
                        'title' => 'Complete user journey map',
                           
                    ]
                ],
                'project_stages' =>[
                    [
                        'id'    =>1,
                        'title' => 'unknown'
                    ],
                    [
                        'id'    =>2,
                        'title' => 'conceptual'
                    ],
                    [
                        'id'    =>3,
                        'title' => 'full specfications'
                    ]
                ]
            ],
            [
                'id' => 2,
                'name' => 'Service',
                'description' => 'A buyer will purchase a service',
                'job_types'    => [
                    
                ],
                'budget_type' =>[
                        
                    [
                        'id' => 3,
                        'title' => 'Fixed',
                           
                    ],
                    [
                        'id' => 4,
                        'title' => 'Hourly',
                           
                    ]
                    
                ],
                'deliverables' => [],
                'project_stages' =>[]


            ],
            [
                'id' => 3,
                'name' => 'Software',
                'description' => 'A Buyer will purchase a software',
                'job_types'    => [
                    
                ],
                'budget_type' =>[
                        
                    [
                        'id' => 5,
                        'title' => 'Fixed',
                           
                    ],
                    [
                        'id' => 6,
                        'title' => 'Hourly',
                           
                    ]
                    
                    ],
                'deliverables' => [],
                'project_stages' =>[]
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
            foreach ($module['budget_type'] as  $budget_type) {
                $module_added->budgetTypes()->updateOrCreate([
                    'id'=> $budget_type['id'],
                    'title'=>$budget_type['title']
    
                ],[]);
            }
            foreach ($module['deliverables'] as  $deliverable) {
                $module_added->deliverable()->updateOrCreate([
                    'id'=> $deliverable['id'],
                    'name'=>$deliverable['title']
    
                ],[]);
            }

            foreach ($module['project_stages'] as  $project_stage) {
                $module_added->projectStage()->updateOrCreate([
                    'id'=> $project_stage['id'],
                    'title'=>$project_stage['title']
    
                ],[]);
            }
        }
    }
}
