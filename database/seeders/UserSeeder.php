<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Peter (Admin)',
            'email' => 'adm@kanban.com',
            'phone' => '07300000000',
            'is_active' => 1,
            'password' => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'name' => 'Alan (product manager)',
            'email' => 'pro@kanban.com',
            'phone' => '07400000000',
            'is_active' => 1,
            'password' => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'name' => 'John (Developer)',
            'email' => 'dev@kanban.com',
            'phone' => '07500000000',
            'is_active' => 1,
            'password' => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'name' => 'Robert (customer)',
            'email' => 'cus@kanban.com',
            'phone' => '07600000000',
            'is_active' => 1,
            'password' => bcrypt('123456789'),
        ]);
    }
}