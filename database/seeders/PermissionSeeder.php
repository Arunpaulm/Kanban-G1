<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
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

        foreach ($permissions as $key => $permission) {
            if (is_array($permission)) {
                foreach ($permission as $item) {
                    if (!$this->isPermissionExist($item)) {
                        Permission::create([
                            'name' => $item,
                            'group_name' => $key
                        ]);
                    }
                }
            } else {
                if (!$this->isPermissionExist($permission)) {
                    Permission::create([
                        'name' => $permission
                    ]);
                }
            }
        }
    }

    public function isPermissionExist($permission_name)
    {
        return Permission::where('name', $permission_name)->first();
    }
}
