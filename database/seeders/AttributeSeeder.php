<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          /**
         * Development
         * 
         */
        $developments = [
            [
                'type' => Attribute::BACKEND,
                'title' => 'Development',
                'name' => 'Aws'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Development',
                'name' => 'Azure'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Development',
                'name' => 'Google Cloud Platform (GCP)'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Development',
                'name' => "On premises (client's server)"
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Development',
                'name' => 'Android'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Development',
                'name' => 'IOS'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Development',
                'name' => 'Tablet'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Development',
                'name' => 'Laptop'
            ],

        ];

        foreach($developments as $key => $value)
        {
           Attribute::create([
               'type' => $value['type'],
               'title' => $value['title'],
               'name' => $value['name']
           ]);
        }

        /**
         * Programming
         * 
         */
        $programming = [
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => 'Java'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => '.Net'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => 'Php'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => "Python"
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => 'Node'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => 'JS'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => 'ASP.net'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => 'Ruby / Ruby on rails'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => 'C#'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => 'Go'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => 'Kotlin'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Programming',
                'name' => 'Scala'
            ],

            [
                'type' => Attribute::FRONTEND,
                'title' => 'Programming',
                'name' => 'HTML'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Programming',
                'name' => 'CSS'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Programming',
                'name' => 'React'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Programming',
                'name' => 'Vue'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Programming',
                'name' => 'TypeScript'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Programming',
                'name' => 'Elm'
            ],     
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Programming',
                'name' => 'jQuery'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Programming',
                'name' => 'Angular'
            ],
        ];


        foreach($programming as $key => $value)
        {
           Attribute::create([
               'type' => $value['type'],
               'title' => $value['title'],
               'name' => $value['name']
           ]);
        }

        /**
         * Coding Competence
         * 
         */
        $coding = [
            [
                'type' => Attribute::BACKEND,
                'title' => 'Coding Competence',
                'name' => 'Test Driven Development'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Coding Competence',
                'name' => 'Domain Driven Development '
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Coding Competence',
                'name' => 'Security'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Coding Competence',
                'name' => "Clean Code Architecture "
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Coding Competence',
                'name' => 'Solid Applications.'
            ],
           
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Coding Competence',
                'name' => 'Cross Browser / Device Compatibility '
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Coding Competence',
                'name' => 'PSD to HTML '
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Coding Competence',
                'name' => 'Localization'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Coding Competence',
                'name' => 'Performance '
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Coding Competence',
                'name' => 'Security '
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Coding Competence',
                'name' => 'W3CValidation Design'
            ]     
        ];

        
        foreach($coding as $key => $value)
        {
            Attribute::create([
               'type' => $value['type'],
               'title' => $value['title'],
               'name' => $value['name']
           ]);
        }

        /**
         * Database Competence
         * 
         */
        $database = [
            [
                'type' => Attribute::BACKEND,
                'title' => 'Database',
                'name' => 'MS SQL server '
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Database',
                'name' => 'Postgress'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Database',
                'name' => 'Oracle'
            ],
            [
                'type' => Attribute::BACKEND,
                'title' => 'Database',
                'name' => "MySQL"
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Database',
                'name' => 'Elasticsearch'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Database',
                'name' => 'Mongo'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Database',
                'name' => 'Dynamo Db'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Database',
                'name' => 'Raveb Db'
            ],
            [
                'type' => Attribute::FRONTEND,
                'title' => 'Database',
                'name' => 'Cosmos Db'
            ]
        ];

        foreach($database as $key => $value)
        {
            Attribute::create([
                'type' => $value['type'],
                'title' => $value['title'],
                'name' => $value['name']
            ]);
        }
    }
}
