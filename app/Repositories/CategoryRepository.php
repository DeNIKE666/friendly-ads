<?php


namespace App\Repositories;


use App\Models\Category;

class CategoryRepository
{

    public function getAll()
    {
        return Category::withDepth()->defaultOrder()->get();
    }
}