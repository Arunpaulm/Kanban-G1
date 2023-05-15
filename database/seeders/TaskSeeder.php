<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
    }
}
