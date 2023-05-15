<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Project;
use App\Models\ProjectActivity;
use App\Models\ProjectContributor;
use App\Models\Task;
use App\Models\TaskComment;
use App\Models\User;


class RevertDatabaseTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Revert projects table to its factory settings
     *
     * @return void
     */
    public function test_revert_projects_table_to_its_factory_settings()
    {
    
        $this->assertDatabaseCount("projects", 0);
    }

    /**
     * Revert project_activities table to its factory settings
     *
     * @return void
     */
    public function test_revert_project_activities_table_to_its_factory_settings()
    {
        $this->assertDatabaseCount("project_activities", 0);
    }

    /**
     * Revert project_contributors table to its factory settings
     *
     * @return void
     */
    public function test_revert_project_contributors_table_to_its_factory_settings()
    {
        $this->assertDatabaseCount("project_contributors", 0);
    }

    /**
     * Revert permissions table to its factory settings
     *
     * @return void
     */
    public function test_revert_permissions_table_to_its_factory_settings()
    {
        $this->assertDatabaseCount("permissions", 0);
    }

    /**
     * Revert roles table to its factory settings
     *
     * @return void
     */
    public function test_revert_roles_table_to_its_factory_settings()
    {
        $this->assertDatabaseCount("roles", 0);
    }

    /**
     * Revert tasks table to its factory settings
     *
     * @return void
     */
    public function test_revert_tasks_table_to_its_factory_settings()
    {
        $this->assertDatabaseCount("tasks", 0);
    }

    /**
     * Revert task_comments table to its factory settings
     *
     * @return void
     */
    public function test_revert_task_comments_table_to_its_factory_settings()
    {
        $this->assertDatabaseCount("task_comments", 0);
    }
    
    /**
     * Revert users table to its factory settings
     *
     * @return void
     */
    public function test_revert_users_table_to_its_factory_settings()
    {
        $this->assertDatabaseCount("users", 0);
    }
}
