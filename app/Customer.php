<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
	use SoftDeletes;
	
    public function get_addresses(){
    	return $this->hasMany('App\CustomerAddress', 'customer_id', 'id');
    }
}
