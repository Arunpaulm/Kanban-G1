<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
            0 =>
                array(
                    'created_at' => '2015-12-20 12:11:56',
                    'id' => 1,
                    'name' => 'Admin',
                    'guard_name' => 'web',
                    'updated_at' => '2015-12-20 12:11:56',
                ),
            1 =>
                array(
                    'created_at' => '2016-04-16 21:57:30',
                    'id' => 2,
                    'name' => 'Customer',
                    'guard_name' => 'web',
                    'updated_at' => '2018-12-16 06:41:52',
                ),
            2 =>
                array(
                    'created_at' => '2016-04-16 22:00:04',
                    'id' => 3,
                    'name' => 'Project Manager',
                    'guard_name' => 'web',
                    'updated_at' => '2018-12-17 09:47:02',
                ),
            3 =>
                array(
                    'created_at' => '2016-04-21 08:39:15',
                    'id' => 4,
                    'name' => 'Developer',
                    'guard_name' => 'web',
                    'updated_at' => '2018-12-16 06:42:02',
                )
        ));

        $role = Role::where('name', 'Admin')->first()->givePermissionTo(Permission::all());
        $user = \App\Models\User::where('id', 1)->first();
        $user->assignRole($role);
    }
}
