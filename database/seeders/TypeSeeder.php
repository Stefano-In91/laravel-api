<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        $types = ['Frontend', 'Backend', 'Devops', 'AI'];

        foreach( $types as $type ) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Str::slug($new_type->name);
            $new_type->save();
        }
    }
}

