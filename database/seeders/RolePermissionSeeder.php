<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $roles = [
            [
                'name'=> 'admin',
                'permissions' => [
                    'create users',
                    'update users',
                    'activate users',
                    'deactivate users',
                    'terminate users'
                ]
            ],
            [
                'name' => 'user',
                'permissions' => [

                ],
            ]
        ];

        foreach($roles as $role) {
            $createdRole = Role::create(['name' => $role['name']]);

            foreach($role['permissions'] as $permission) {
                $createdPermission = Permission::create(['name' => $permission]);
                $createdPermission->assignRole($createdRole);
            }
        }
    }
}
