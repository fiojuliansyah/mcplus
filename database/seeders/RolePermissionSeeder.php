<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user' => [
                'create user' => 'CREATE',
                'edit user' => 'UPDATE',
                'delete user' => 'DELETE',
                'view user' => 'VIEW',
            ],
        ];

        foreach ($permissions as $group => $actions) {
            foreach ($actions as $action => $mock) {
                Permission::create([
                    'name' => $action,
                    'group' => $group,
                    'mock' => $mock,      
                    'guard_name' => 'web', 
                ]);
            }
        }

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);

        // Assign permissions to roles
        $adminRole->givePermissionTo(Permission::all()); 
    }
}
