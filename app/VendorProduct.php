<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
	protected $fillable = [
		'ven_id',
		'prod_id',
		'variation_id',
		'quantity',
		'mk_price',
		'price',
		'dispatched_days',
		'active',
		'is_auto_approved',
		'comments'
	];

    public function get_product(){
    	return $this->belongsTo('App\Product', 'prod_id', 'id');
    }

    public function get_variation(){
    	return $this->belongsTo('App\ProductVariation', 'variation_id', 'id');
    }

    public function get_active_variation(){
    	return $this->belongsTo('App\ProductVariation', 'variation_id', 'id')->where('active', 1);
    }

    public function get_vendor(){
    	return $this->belongsTo('App\Vendor', 'ven_id', 'id');
    }


}
