<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        Schema::enableForeignKeyConstraints();

        $technologies = ['HTML', 'CSS', 'JS', 'PHP', 'Laravel'];

        foreach( $technologies as $technology ) {
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->slug = Str::slug($new_technology->name);
            $new_technology->save();
        }
    }
}
