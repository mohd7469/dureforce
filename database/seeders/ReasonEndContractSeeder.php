<?php

namespace Database\Seeders;

use App\Models\ReasonEndContract;
use App\Models\Role;
use Illuminate\Database\Seeder;

class ReasonEndContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $reason_end_contract = [
            ['name' => 'Job Completed Successfully', 'role_id' => Role::$Freelancer,'is_active'=>true],
            ['name' => 'Job Completed Successfully', 'role_id' => Role::$Client,'is_active'=>true],
        ];


        foreach ($reason_end_contract as $key => $value) {
            ReasonEndContract::updateOrCreate(['name'=>$value['name'],'role_id'=>$value['role_id']],
                [
                    'slug'=>$value['name'].'-slug',
                    'is_active'=>$value['is_active'],
                ]
            );
        }
    }
}
