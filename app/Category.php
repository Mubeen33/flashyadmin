<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'name', 'slug'
    ];

    public function subcategories(){

        return $this->hasMany('App\Category', 'parent_id');

    }
}