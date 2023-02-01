<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Project::truncate();

        for($i = 0; $i < 20; $i++) {
            $new_project = new Project;

            $new_project->title = $faker->text(50);
            $new_project->description = $faker->text(500);
            $new_project->slug = Str::slug($new_project->title);
            $new_project->type_id = rand(1, 4);
            
            $new_project->save();
        }
    }
}
