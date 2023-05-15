<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Test case to Add a record
     *
     * @return void
     */
    public function test_add_user_record()
    {
        User::create([
            'name' => 'Customer',
            'email' => 'testUser@kanban.com',
            'phone' => '07123456789',
            'is_active' => 1,
            'password' => bcrypt('123456789')
        ]);


        $this->assertDatabaseHas("users", [
            'email' => 'testUser@kanban.com',
        ]); 
    }

    /**
     * Test case to Read a record
     *
     * @return void
     */
    public function test_read_user_record()
    {
        $this->assertDatabaseHas("users", [
            'email' => 'testUser@kanban.com',
        ]); 
    }

    /**
     * Test case to Update a record
     *
     * @return void
     */
    public function test_update_user_record()
    {
        User::where('email', 'testUser@kanban.com')
            ->update([
            'email' => 'customerUser@kanban.com'
        ]);


        $this->assertDatabaseHas("users", [
            'email' => 'customerUser@kanban.com',
        ]); 
    }
    /**
     * Test case to Delete a record
     *
     * @return void
     */
    public function test_delete_user_record()
    {
        User::where('email', 'customerUser@kanban.com')
            ->delete();


        $this->assertDatabaseMissing("users", [
            'email' => 'customerUser@kanban.com',
        ]); 
    }
}
