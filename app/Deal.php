<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
	protected $fillable = [
		'status'
	];
    public function get_vendor(){
    	return $this->belongsTo('App\Vendor', 'vendor_id', 'id');
    }

    public function get_product(){
    	return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
