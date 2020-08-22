<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorActivity extends Model
{
    //
    protected $fillable = ['vendor_id', 'activityName', 'activity'];

    protected $casts = [
        'activity' => 'array'
    ];


    //get single vendor details
    public function get_vendor(){
    	return $this->belongsTo('App\Vendor', 'vendor_id', 'id');
    }
}
