<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pipeline\Pipeline;

class ProductRepository
{

    /**
     *  Return all products in the database
     * 
     * @return Illuminate\Support\Collection
     */
    public function all()
    {

        // create a pipeline and send a query builder object through filters
        return app(Pipeline::class)

            ->send(Product::query())

            ->through([

                \App\QueryFilters\Category::class,

                \App\QueryFilters\Sort::class

            ])

            ->thenReturn()->with('category')->get();
    }
}
