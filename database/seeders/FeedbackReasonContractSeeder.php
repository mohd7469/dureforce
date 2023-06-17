<?php

namespace Database\Seeders;

use App\Models\FeedbackReason;
use App\Models\ReasonEndContract;
use App\Models\Role;
use Illuminate\Database\Seeder;

class FeedbackReasonContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reason_end_contract = [
            ['name' => 'Project Completed', 'role_id' => Role::$Freelancer,'is_active'=>true],
            ['name' => 'Job Abandoned', 'role_id' => Role::$Freelancer,'is_active'=>true],
            ['name' => 'Mutual Agreement', 'role_id' => Role::$Freelancer,'is_active'=>true],
            ['name' => 'Freelancer Unresponsive', 'role_id' => Role::$Freelancer,'is_active'=>true],
            ['name' => 'Client Unresponsive', 'role_id' => Role::$Freelancer,'is_active'=>true],
            ['name' => 'Dissatisfied with Work Quality', 'role_id' => Role::$Client,'is_active'=>true],
            ['name' => 'Change in Project Scope', 'role_id' => Role::$Client,'is_active'=>true],
            ['name' => 'Payment Disputes', 'role_id' => Role::$Client,'is_active'=>true],
            ['name' => 'Incompatibility', 'role_id' => Role::$Client,'is_active'=>true],
            ['name' => 'Contract Violation', 'role_id' => Role::$Client,'is_active'=>true],
            ['name' => 'Other', 'role_id' => Role::$Client,'is_active'=>true],
        ];


        foreach ($reason_end_contract as $key => $value) {
            FeedbackReason::updateOrCreate(['name'=>$value['name'],'role_id'=>$value['role_id']],
                [
                    'slug'=>$value['name'].'-slug',
                    'is_active'=>$value['is_active'],
                ]
            );
        }
    }
}
