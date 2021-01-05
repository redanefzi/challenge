<?php

namespace App\QueryFilters;

use \Closure;

class Category
{
    public function handle($request, \Closure $next)
    {
        if (!request()->has('cat')) {
            return $next($request);
        }

        $builder = $next($request);

        return $builder->where('category_id', request()->cat);
    }
}
