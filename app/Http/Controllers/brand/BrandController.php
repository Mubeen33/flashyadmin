<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Brand;

class BrandController extends Controller
{
    
	//add brand view

	public function index(){

		return view('brand.add-brand');
	}
    //active brands list
    public function brandsList(){

    	$brands = Brand::where('active','Y')->orderBy('id', 'desc')->get();
    	return view('brand.brand-list',compact('brands'));
    }

    //createbrand

    public function createBrand(Request $request){

    	$brand = new Brand();
    	$brand->name        = $request->name;
    	$brand->description = $request->description;
    	$imageName = time().'.'.request()->image->getClientOriginalExtension();
    	request()->image->move(public_path('upload-images/brands'), $imageName);

    	$brand->image        = $imageName;

        if ($brand->save()) {

        	return redirect("brands-list")->with('msg','<div class="alert alert-success" id="msg">Brand added Successfully!</div>');
        }
    }
    // edit brand
    public function editBrand($id){

    	$id     = decrypt($id);
    	$brand  = Brand::where('id',$id)->first();
    	return view('brand.edit-brand',compact('brand'));
    }

    // update brand

    public function updateBrand(Request $request){

    	$id                 = $request->id;
    	$brand              = Brand::find($id);
    	$brand->name        = $request->name;
    	$brand->description = $request->description;

    	if ($request->hasFile('image')) {
	    
		    $imageName = time().'.'.request()->image->getClientOriginalExtension();
	    	request()->image->move(public_path('upload-images/brands'), $imageName);

	    	$brand->image        = $imageName;
		}
        if ($brand->save()) {

        	return redirect("brands-list")->with('msg','<div class="alert alert-success" id="msg">Brand updated Successfully!</div>');
        }
    }

    // Disable brands list

    public function disableBrandsList(){

    	$brands = Brand::where('active','N')->orderBy('id', 'desc')->get();
    	return view('brand.disable-brand-list',compact('brands'));
    }

    //active a brand

    public function activeBrand($id){

    	$id                 = decrypt($id);
    	$brand              = Brand::find($id);
    	$brand->active      = 'Y';
    	if ($brand->save()) {

        	return redirect("brands-list")->with('msg','<div class="alert alert-success" id="msg">Brand Active Successfully!</div>');
        }
    }

    //disable a brand 

    public function disableABrand($id){

    	$id                 = decrypt($id);
    	$brand              = Brand::find($id);
    	$brand->active      = 'N';
    	if ($brand->save()) {

        	return redirect("disable-brands-list")->with('msg','<div class="alert alert-success" id="msg">Brand Disable Successfully!</div>');
        }
    }
}

