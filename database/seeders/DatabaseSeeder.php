<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PermissionSeeder::class,
            RolesSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class
        ]);

        $permissions = [
            'role-management' => [
                'role-list',
                'role-create',
                'role-edit',
                'assign-role-permission',
                'update-role-permission'
            ],

            'user-management' => [
                'user-list',
                'user-create',
                'user-edit',
                'users-password-reset',
                'user-status-update',
            ],

            'project-management' => [
                'project-list',
                'project-create',
                'view-project',
                'add-contributor',
                'remove-contributor'
            ],

            'board-management' => [
                'view-board',
                'view-task',
                'add-task',
                'edit-task',
                'add-comment',
                'delete-comment',
            ]
        ];

        $adminRole = Role::where('name', 'Admin')->first()->givePermissionTo(Permission::all());
        $admin = \App\Models\User::where('id', 1)->first();
        $admin->assignRole($adminRole);

        $projectManagerRole = Role::where('name', 'Project Manager')->first()->givePermissionTo($permissions['project-management'])->givePermissionTo($permissions['board-management']);
        $projectManager = \App\Models\User::where('id', 2)->first();
        $projectManager->assignRole($projectManagerRole);

        $developerRole = Role::where('name', 'Developer')->first()->givePermissionTo(['project-list', 'view-project', 'view-board', 'view-task', 'add-comment', 'delete-comment']);
        $developer = \App\Models\User::where('id', 3)->first();
        $developer->assignRole($developerRole);

        $customerRole = Role::where('name', 'Customer')->first()->givePermissionTo(['project-list', 'view-project', 'view-board', 'view-task']);
        $customer = \App\Models\User::where('id', 4)->first();
        $customer->assignRole($customerRole);
    }
}
