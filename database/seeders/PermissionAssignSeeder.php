<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionAssignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUsernames = ['arslan', 'admin'];

// Retrieve the admins with the specified usernames
        $admins = Admin::whereIn('username', $adminUsernames)->get();

// Retrieve all permissions from the Permission model
        $permissions = Permission::all();

        foreach ($admins as $admin) {
            // Attach the permissions to each admin
            $admin->admin_permissions()->sync($permissions);
        }


    }
}
