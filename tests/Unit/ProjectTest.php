<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\Project;

use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Test case to Add a record
     *
     * @return void
     */
    public function test_add_project_record()
    {
        Project::create([
            'name' => 'Test project',
            'slug' => 'test_project',
            'description' => 'Test project',
            'bg_image' => "project/bg_image/wqE3qhcmjby171dC974ECMGXGPUCtwrsfvfoKx7S.jpg",
            'avatar_image' => "project/avatar_image/Qzk1lKBRqKXBIC9MMgfCRxIzktHfmWwtqAZZecar.jpg",
            'start_date' => "2023-05-15",
            'end_date' => "2023-05-16",
            'status' => "1",
            'user_id' => '1',
            'created_at' => '2023-05-15 12:50:41',
            'updated_at' => '2023-05-15 12:50:41'
        ]);

        $this->assertDatabaseHas("projects", [
            'slug' => 'test_project',
        ]); 
    }

    /**
     * Test case to Read a record
     *
     * @return void
     */
    public function test_read_project_record()
    {
        $this->assertDatabaseHas("projects", [
            'slug' => 'test_project'
        ]); 
    }

    /**
     * Test case to Update a record
     *
     * @return void
     */
    public function test_update_project_record()
    {
        Project::where('slug', 'test_project')
            ->update([
            'slug' => 'test_project_1'
        ]);

        $this->assertDatabaseHas("projects", [
            'slug' => 'test_project_1'
        ]); 
    }
    /**
     * Test case to Delete a record
     *
     * @return void
     */
    public function test_delete_project_record()
    {
        Project::where('slug', 'test_project_1')
            ->delete();

        $this->assertDatabaseMissing("projects", [
            'slug' => 'test_project_1',
        ]); 
    }
}
