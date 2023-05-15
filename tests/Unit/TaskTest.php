<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\Task;

use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Test case to Add a record
     *
     * @return void
     */
    public function test_add_task_record()
    {
        Task::create([
            'project_id' => '1',
            'name' => 'Planning',
            'description' => 'Need to plan for the project',
            'user_id' => "1",
            'priority' => "2",
            'status' => "0",
            'created_at' => '2023-05-15 12:50:41',
            'updated_at' => '2023-05-15 12:50:41'
        ]);


        $this->assertDatabaseHas("tasks", [
            'name' => 'Planning'
        ]); 
    }

    /**
     * Test case to Read a record
     *
     * @return void
     */
    public function test_read_task_record()
    {
        $this->assertDatabaseHas("tasks", [
            'name' => 'Planning'
        ]); 
    }

    /**
     * Test case to Update a record
     *
     * @return void
     */
    public function test_update_task_record()
    {
        Task::where('name', 'Planning')
            ->update([
            'name' => 'Planning phase'
        ]);


        $this->assertDatabaseHas("tasks", [
            'name' => 'Planning phase'
        ]); 
    }
    /**
     * Test case to Delete a record
     *
     * @return void
     */
    public function test_delete_task_record()
    {
        Task::where('name', 'Planning phase')
            ->delete();


        $this->assertDatabaseMissing("tasks", [
            'name' => 'Planning phase',
        ]); 
    }
}
