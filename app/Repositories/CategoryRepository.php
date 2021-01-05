<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{

    public function all(){

        //fetch all categories
        return Category::all();

    }
}