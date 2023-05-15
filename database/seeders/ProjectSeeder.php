<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\ProjectActivity;
use App\Models\ProjectContributor;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Sample project',
            'slug' => 'Sample_project',
            'description' => 'Sample project',
            'bg_image' => "project/bg_image/wqE3qhcmjby171dC974ECMGXGPUCtwrsfvfoKx7S.jpg",
            'avatar_image' => "project/avatar_image/Qzk1lKBRqKXBIC9MMgfCRxIzktHfmWwtqAZZecar.jpg",
            'start_date' => "2023-05-15",
            'end_date' => "2023-05-16",
            'status' => "1",
            'user_id' => '1',
            'created_at' => '2023-05-15 12:50:41',
            'updated_at' => '2023-05-15 12:50:41'
        ]);

        ProjectActivity::create([
            'project_id' => '1',
            'user_id' => '1',
            'description' => 'Project has been created.',
            'created_at' => '2023-05-15 12:50:41',
            'updated_at' => '2023-05-15 12:50:41'
        ]);

        ProjectContributor::create([
            'project_id' => '1',
            'user_id' => '1',
            'created_at' => '2023-05-15 12:50:41',
            'updated_at' => '2023-05-15 12:50:41'
        ]);
    }
}
