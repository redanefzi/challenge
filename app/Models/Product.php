<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // link to category
    public function category(){
        return $this->BelongsTo('App\Models\Category');
    }
}
