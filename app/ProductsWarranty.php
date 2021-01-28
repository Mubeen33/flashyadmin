<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsWarranty extends Model
{
    protected $table = 'products_warranties';
    public function get_category(){
    	return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    protected $fillable = [
    	'category_id',
    	'warranty'
    ];
}
