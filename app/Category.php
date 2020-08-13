<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mysql';
    protected $table = 'categories';
	
    protected $guarded = [];

    protected $fillable = [
        'id', 'name', 'parent_id','image','slug', 'title_meta_tag', 'description', 'keyword', 'commission', 'visibility', 'show_on_homepage', 'display_order', 'created_at', 'updated_at'
    ];

    public function subcategories(){

        return $this->hasMany('App\Category', 'parent_id');

    }
}