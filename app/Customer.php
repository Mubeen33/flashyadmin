<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function get_addresses(){
    	return $this->hasMany('App\CustomerAddress', 'customer_id', 'id');
    }
}
