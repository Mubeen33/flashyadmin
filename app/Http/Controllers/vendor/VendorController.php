<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    
    public function vendorRequest(){

    	$vendorRequest = Vendor::where('active',0)->get();
    	return view('vendor.vendor-request',compact('vendorRequest'));
    }

    public function vendorData($id){

    	$id     = decrypt($id);
    	$vendor = Vendor::where('id',$id)->first();
    	return view('vendor.vendor-approved',compact('vendor'));
    }
}
