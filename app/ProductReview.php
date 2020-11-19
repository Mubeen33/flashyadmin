<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
    	'product_id',
    	'customer_id',
    	'star',
    	'comment'
    ];

    public function get_product(){
    	return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function get_customer(){
    	return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
}
