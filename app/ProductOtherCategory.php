<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOtherCategory extends Model
{
    protected $fillable = [
    	'product_id',
    	'other_categories',
    ];
}
