<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorBankDetailsTempData extends Model
{
	protected $fillable = ['status'];
	
    public function get_vendor(){
    	return $this->belongsTo('App\Vendor', 'vendor_id', 'id');
    }
}
