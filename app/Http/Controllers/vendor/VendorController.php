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

    public function vendorList(){

    	$vendorRequest = Vendor::where('active',1)->get();
    	return view('vendor.vendor-list',compact('vendorRequest'));
    }
    public function vendorData($id){

    	$id     = decrypt($id);
    	$vendor = Vendor::where('id',$id)->first();
    	return view('vendor.vendor-approved',compact('vendor'));
    }
    public function updateVendor(Request $request){

    	$id = $request->id;
    	$vendor = Vendor::find($id);
    	$vendor->first_name            = $request->first_name;
    	$vendor->last_name             = $request->last_name;
    	$vendor->email                 = $request->email;
    	$vendor->phone                 = $request->phone;
    	$vendor->mobile                = $request->mobile;
    	$vendor->business_info         = $request->business_info;
    	$vendor->vat_register          = $request->vat_register;
    	$vendor->company_name          = $request->company_name;
    	$vendor->website_url           = $request->website_url;
    	$vendor->director_first_name   = $request->director_first_name;
    	$vendor->director_last_name    = $request->director_last_name;
    	$vendor->director_email        = $request->director_email;
    	$vendor->additional_info       = $request->additional_info;
    	$vendor->active                = $request->active;
    	$vendor->bank_name             = $request->bank_name;
    	$vendor->account_holder        = $request->account_holder;
    	$vendor->bank_account          = $request->bank_account;
    	$vendor->branch_name           = $request->branch_name;
    	$vendor->branch_code           = $request->branch_code;
    	$vendor->address               = $request->address;
    	$vendor->street                = $request->street;
    	$vendor->city                  = $request->city;
    	$vendor->state                 = $request->state;
    	$vendor->subrub                = $request->subrub;
    	$vendor->zip_code              = $request->zip_code;
    	$vendor->country               = $request->country;
    	$vendor->waddress              = $request->waddress;
    	$vendor->wstreet               = $request->wstreet;
    	$vendor->wcity                 = $request->wcity;
    	$vendor->wstate                = $request->wstate;
    	$vendor->wsubrub               = $request->wsubrub;
    	$vendor->wzip_code             = $request->wzip_code;
    	$vendor->wcountry              = $request->wcountry;

    	if ($vendor->save()) {
    		
    		return redirect("vendor-list")->with('msg','<div class="alert alert-success" id="msg">Vendor added Successfully!</div>');
    	}
    }

    public function addVendor(){

    	return view('vendor.add-vendor');
    }
    public function createVendor(Request $request){

    	$vendor = new Vendor();
    	$vendor->first_name            = $request->first_name;
    	$vendor->last_name             = $request->last_name;
    	$vendor->email                 = $request->email;
    	$vendor->phone                 = $request->phone;
    	$vendor->mobile                = $request->mobile;
    	$vendor->business_info         = $request->business_info;
    	$vendor->vat_register          = $request->vat_register;
    	$vendor->company_name          = $request->company_name;
    	$vendor->website_url           = $request->website_url;
    	$vendor->director_first_name   = $request->director_first_name;
    	$vendor->director_last_name    = $request->director_last_name;
    	$vendor->director_email        = $request->director_email;
    	$vendor->additional_info       = $request->additional_info;
    	$vendor->active                = $request->active;
    	$vendor->bank_name             = $request->bank_name;
    	$vendor->account_holder        = $request->account_holder;
    	$vendor->bank_account          = $request->bank_account;
    	$vendor->branch_name           = $request->branch_name;
    	$vendor->branch_code           = $request->branch_code;
    	$vendor->address               = $request->address;
    	$vendor->street                = $request->street;
    	$vendor->city                  = $request->city;
    	$vendor->state                 = $request->state;
    	$vendor->subrub                = $request->subrub;
    	$vendor->zip_code              = $request->zip_code;
    	$vendor->country               = $request->country;
    	$vendor->waddress              = $request->waddress;
    	$vendor->wstreet               = $request->wstreet;
    	$vendor->wcity                 = $request->wcity;
    	$vendor->wstate                = $request->wstate;
    	$vendor->wsubrub               = $request->wsubrub;
    	$vendor->wzip_code             = $request->wzip_code;
    	$vendor->wcountry              = $request->wcountry;

    	if ($vendor->save()) {
    		
    		return redirect("vendor-list")->with('msg','<div class="alert alert-success" id="msg">Vendor added Successfully!</div>');
    	}
    }
}
