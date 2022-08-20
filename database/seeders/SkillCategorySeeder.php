<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ModuleSkill;
use App\Models\SkillCategory;
use App\Models\Skills;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class SkillCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try 
        {
            $categories = [
                [
                    'id' => 1,
                    'name' => 'Web Development',
                    'sub_categories' => [
                       [
                            'id' => 1,
                            'name'=> 'Frontend', 
                            'skills' =>[
                                [
                                    'name' =>'Amgular'
                                ],
                                [
                                    'name' =>'Vue Js'
                                ],
                                [
                                    'name' =>'React Js'
                                ],
                                [
                                    'name' =>'Jquery'
                                ],
                                [
                                    'name' =>'Javascript'
                                ],
                                [
                                    'name' =>'Css'
                                ],
                                [
                                    'name' =>'Bootstrap'
                                ]

                            ]
                       ],
                       [
                        'id' => 2,
                        'name'=> 'Backend', 
                        'skills' =>[

                                [
                                    'name' =>'PHP'
                                ],
                                [
                                    'name' =>'.Net'
                                ],
                                [
                                    'name' =>'Python'
                                ],
                                [
                                    'name' =>'Laravel'
                                ],
                                [
                                    'name' =>'Node JS'
                                ],
                                [
                                    'name' =>'Java'
                                ],
                                [
                                    'name' =>'Go'
                                ]

                            ]
                        ]
                    ]
                    
                ],
                [
                    'id' => 2,
                    'name' => 'Programming Language',
                    'sub_categories' =>[
                       [
                            'id' => 3,
                            'name'=> 'Frontend', 
                            'skills' =>[
                                [
                                    'name' =>'Amgular'
                                ],
                                [
                                    'name' =>'Vue Js'
                                ],
                                [
                                    'name' =>'React Js'
                                ],
                                [
                                    'name' =>'Jquery'
                                ],
                                [
                                    'name' =>'Javascript'
                                ],
                                [
                                    'name' =>'Css'
                                ],
                                [
                                    'name' =>'Bootstrap'
                                ]

                            ]
                       ],
                       [
                        'id' => 4,
                        'name'=> 'Backend', 
                        'skills' =>[

                                [
                                    'name' =>'PHP'
                                ],
                                [
                                    'name' =>'.Net'
                                ],
                                [
                                    'name' =>'Python'
                                ],
                                [
                                    'name' =>'Laravel'
                                ],
                                [
                                    'name' =>'Node JS'
                                ],
                                [
                                    'name' =>'Java'
                                ],
                                [
                                    'name' =>'Go'
                                ]

                            ]
                        ]
                    ]
                    
                ],
                [
                    'id' => 3,
                    'name' => 'Mobile Application Developemt',
                    'sub_categories' =>[
                        [
                            'id' => 5,
                            'name'=> 'Android Application Developemt',
                            'skills' =>[
                                [
                                    'name' =>'Android'
                                ],
                                [
                                    'name' =>'Flutter'
                                ]
                            ] 
                        ],
                        [
                            'id' => 6,
                            'name'=> 'IOS Application Developemt', 
                            'skills' =>[
                                [
                                    'name' =>'Android'
                                ],
                                [
                                    'name' =>'Flutter'
                                ]
                            ] 
                       ]
                    ]
                    
                ], 
                [
                    'id' => 4,
                    'name' => 'Database',
                    'sub_categories' =>[
                        [
                            'id' => 7,
                            'name'=> 'Relational Database', 
                            'skills' =>[
                                [
                                    'name' =>'Mysql'
                                ],
                                [
                                    'name' =>'Oracle'
                                ],
                                [
                                    'name' =>'Sqlite'
                                ],
                                [
                                    'name' =>'MS-SQL'
                                ]
                            ] 
                        ],
                        [
                            'id' => 8,
                            'name'=> 'Non Relational Database', 
                            'skills' =>[
                                [
                                    'name' =>'MongoDB'
                                ],
                                [
                                    'name' =>'Apache Cassandra'
                                ],
                                [
                                    'name' =>'Redis'
                                ],
                                [
                                    'name' =>'Couchbase'
                                ],
                                [
                                    'name' =>'Apache HBase'
                                ],
                                [
                                    'name' =>'BigTable'
                                ]
                            ] 
                       ]
                    ]
                    
                ],
            ];
    
            foreach ($categories as $category) {
                
                $skill_category=SkillCategory::updateOrCreate([

                    'id'=> $category['id'],
                    'name'=>$category['name']

                ],[]);

                foreach ($category['sub_categories'] as $sub_category) {
                    
                    $skill_sub_category=$skill_category->skill_sub_category()->updateOrCreate([

                        'id'=> $sub_category['id'],
                        'name'=>$sub_category['name']
    
                    ],[]);
                    
                    foreach ($category['sub_categories'] as $sub_category) {
                    
                        $skill=Skills::firstOrCreate(
                            ['name'=>$sub_category['name']],[]
                        );
                        ModuleSkill::updateOrCreate([
                            'skill_id' => $skill->id,
                            'skill_category_id' => $skill_category->id,
                            'skill_sub_category_id' =>$skill_sub_category->id,
                            'module_id' =>1 
                        ],[]);
                    }
                }

            }

        } 
        catch (\Exception $e) {
            Log::info($e->getMessage());
        }   
    }
}
