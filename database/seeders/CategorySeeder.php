<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            ['name' => 'IT' , 'slug' => 'it' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Информационные ресурсы' , 'slug' => 'informacionnye-resursy' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Игры' , 'slug' => 'igry' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Красота' , 'slug' => 'krasota' , 'created_at' => now(), 'updated_at' => now()],
        ]);

        Category::fixTree();

    }
}
