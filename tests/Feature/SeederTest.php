<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Database\Seeders\DatabaseSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\UserSeeder;

class SeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A seed users to database.
     *
     * @return void
     */
    public function test_seeding_users_to_database()
    {
       
        $this->seed(UserSeeder::class);
        $this->assertDatabaseCount('users', 4);
    }

    /**
     * A seed permissions to database.
     *
     * @return void
     */
    public function test_seeding_permissions_to_database()
    {
        $this->seed(PermissionSeeder::class);
        $this->assertDatabaseCount('permissions', 21);
    }

     /**
     * A seed roles to database.
     *
     * @return void
     */
    public function test_seeding_roles_to_database()
    {
        $this->seed([RolesSeeder::class]);
        $this->assertDatabaseCount('roles', 4);
    }
}
