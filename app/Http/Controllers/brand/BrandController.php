<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Brand;
use Freshbitsweb\Laratables\Laratables;

class BrandController extends Controller
{
    
	
    //active brands list
    public function brandsList(){
        $brands = Brand::where('active','Y')->orderBy('id', 'desc')->paginate(3);
    	return view('brand.brand-list',compact('brands'));
    }
    
    //createbrand

    public function createBrand(Request $request){

        $this->validate($request,
        [
            'name'=>'required|string|max:60',
            'image'=>'required|image|mimes:png,jpeg,jpg,gif'
        ]);
        

        $image = "";
        $location = "upload-images/brands/";
        if($request->hasFile('image')){
            $obj_fu = new FileUploader();
            $fileName ='brands-'.uniqid().mt_rand(10, 9999);
            $fileName__ = $obj_fu->fileUploader($request->file('image'), $fileName, $location);
            $image = $fileName__;
        }else{
            return redirect()->back()->with('msg','<div class="alert alert-danger" id="msg">Image is required</div>');
        }

    	$brand = new Brand();
    	$brand->name        = $request->name;
    	$brand->description = $request->description;
    	$brand->image        = url('/')."/".$location.$image;

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
        $this->validate($request,
        [
            'name'=>'required|string|max:60',
            'image'=>'nullable|image|mimes:png,jpeg,jpg,gif'
        ]);

    	$brand = Brand::find($request->id);

        $url = url('/');
        $location = "upload-images/brands/";
        $image = NULL;
    	if ($request->hasFile('image')) {
            $obj_fu = new FileUploader();
            //delete
            if ($brand->image != NULL) {
                $file_name = str_replace($url."/".$location, "", $brand->image);
                $obj_fu->deleteFile($file_name, $location);
            }
	       //upload new one
		    $fileName ='brands-'.uniqid().mt_rand(10, 9999);
            $fileName__ = $obj_fu->fileUploader($request->file('image'), $fileName, $location);
            $image = $fileName__;
		}

        $brand->name        = $request->name;
        $brand->description = $request->description;
        $brand->image = ($image === NULL ? $brand->image : $url."/".$location.$image);

        if ($brand->save()) {
        	return redirect("brands-list")->with('msg','<div class="alert alert-success" id="msg">Brand updated Successfully!</div>');
        }
    }

    // Disable brands list

    public function disableBrandsList(){
    	$brands = Brand::where('active','N')->orderBy('id', 'desc')->paginate(2);
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



    public function fetch_paginate_data(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            if ($request->search_key != "") {
                $brands = Brand::where('active', $status)
                            ->where("name", "LIKE", "%$searchKey%")
                            ->orWhere("description", "LIKE", "%$searchKey%")
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate(3);
                return view('brand.partials.brand-list', compact('brands'))->render();
            }

            $brands = Brand::where('active', $status)->orderBy($sort_by, $sorting_order)->paginate(3);
            return view('brand.partials.brand-list', compact('brands'))->render();
        }
        return abort(404);
    }
}

