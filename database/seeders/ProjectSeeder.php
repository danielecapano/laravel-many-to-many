<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */



    public function run(Faker $faker)
    {
        $types = Type::all();
        $ids = $types->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            $new_project = new Project();

            $new_project->preview = $faker->imageUrl(800, 600, 'project', true);
            $new_project->title = $faker->sentence(5);
            $new_project->slug = Str::slug($new_project->title, '-');
            $new_project->type_id = $faker->optional()->randomElement($ids);
            $new_project->description = $faker->text(300);
            $new_project->creation_date = $faker->dateTimeThisYear();
            $new_project->save();
        }
    }
}
