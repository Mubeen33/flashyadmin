<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function get_vendor(){
    	$this->belongsTo('App\Vendor', 'vendor_id', 'id');
    }

    public function get_category(){
    	$this->belongsTo('App\Category', 'category_id', 'id');
    }
    // public function get_images(){
    // 	$this->hasMany('App\ProductMedia', 'image_id', 'image_id');
    // }
}
