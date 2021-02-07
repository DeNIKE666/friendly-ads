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
        Category::create([
            'name'        => 'test',
            'slug'        => 'test-slug',
            'description' => 'test...',
        ]);

        Category::create([
            'name'        => 'IT',
            'slug'        => 'it-service',
            'description' => 'test...',
        ]);

        Category::create([
            'name'        => 'Красота',
            'slug'        => 'beautiful',
            'description' => 'test...',
        ]);

        Category::create([
            'name'        => 'Продукция',
            'slug'        => 'products',
            'description' => 'test...',
        ]);

        Category::create([
            'name'        => 'Реклама',
            'slug'        => 'ads',
            'description' => 'test...',
        ]);

        Category::create([
            'name'        => 'Здоровье',
            'slug'        => 'heal',
            'description' => 'test...',
        ]);

        Category::create([
            'name'        => 'Игры',
            'slug'        => 'games',
            'description' => 'test...',
        ]);


    }
}
