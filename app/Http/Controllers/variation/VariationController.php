<?php

namespace App\Http\Controllers\variation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Variation;
use App\VariationOption;

class VariationController extends Controller
{
    //add variation view

    public function addVariation(){

    	// $parentCategory = Category::where([['parent_id',0],['deleted','=',0]])->get();
        
        return view('variation.add-variation');
    }

    //save new variation

    public function createVariation(Request $request){

    	$variation  =  new Variation();

    	// $data["parent_id"] = 0;
     //    $category_ids_array = $request->input('parent_id');
     //    if (!empty($category_ids_array)) {
     //        foreach ($category_ids_array as $key => $value) {
     //            if (!empty($value)) {
     //                $data["parent_id"] = $value;
     //            }
     //        }
     //    }
        // $variation->category_id              = $data['parent_id'];
        $this->validate($request,
        [
            'name'=>'required|string|max:60',
            'image_approval'=>'required'
        ]);
        $variation->variation_name           = $request->variation_name;
        $variation->image_approval           = $request->image_approval;

        if ($variation->save()) {
          	
        	return redirect("variations-list")->with('msg','<div class="alert alert-success" id="msg">Variation added Successfully!</div>');
       
        }  
    }

    //variationsList

    public function variationsList(){

    	$variations = Variation::where('active', 1)
                        ->orderBy('id', 'desc')
                        ->paginate(5);
    	return view('variation.variations-list',compact('variations'));
    }

    // edit variation

    public function editVariation($id){

    	$id = decrypt($id);

    	$variant          = Variation::where('id',$id)->first();
    	$image_approval   = Variation::where('id',$id)->value('image_approval');

    	return view('variation.edit-variation',compact('variant','image_approval'));
    }

    // update variations

    public function updateVariation(Request $request){

    	$id = $request->id;
    	$variation = Variation::find($id); 
    	$variation->variation_name           = $request->variation_name;
        $variation->image_approval           = $request->image_approval;

        if ($variation->save()) {
          	
        	return redirect("variations-list")->with('msg','<div class="alert alert-success" id="msg">Variation update Successfully!</div>');
       
        } 
    }

    // disable A Variation

    public function disableAVariation($id){

    	$id = decrypt($id);
    	$variation = Variation::find($id);
    	$variation->active = 0;

    	if ($variation->save()) {
          	
        	return redirect("disable-variations-list")->with('msg','<div class="alert alert-success" id="msg">Variation Disable Successfully!</div>');
       
        }
    }

    // disableVariationsList

    public function disableVariationsList(){

    	$variations = Variation::where('active',0)->orderBy('id', 'desc')->paginate(5);
    	return view('variation.disable-variations-list',compact('variations'));
    }

    // activeVariation

    public function activeVariation($id){

    	$id = decrypt($id);
    	$variation = Variation::find($id);
    	$variation->active = 1;

    	if ($variation->save()) {
          	
        	return redirect("variations-list")->with('msg','<div class="alert alert-success" id="msg">Variation Active Successfully!</div>');
       
        }
    }

    // add options in variations

    public function addvariationsoption(){

        $variations = Variation::where('active', 1)->get();

        return view('variation.add-variation-option',compact('variations'));

    }
    // 
    public function createOption(Request $request){

        $variantOption = new VariationOption();
        $variantOption->variation_id = $request->variation_id;
        $variantOption->option_name      = $request->option_name;

        if ($variantOption->save()) {
            
            return redirect("variations-options-list")->with('msg','<div class="alert alert-success" id="msg">Option added Successfully!</div>');
       
        }
    }

    // variationsOptionsList

    public function variationsOptionsList(){

        $variationsOptions = VariationOption::where('active', 1)->get();

        return view('variation.variations-options-list',compact('variationsOptions'));

    }

    // Edit Option
    public function editOption($id){

        $id = decrypt($id);
        $variantOption = VariationOption::where('id',$id)->first();
        $variations    = Variation::where('active', 1)->get();
        return view('variation.edit-variation-option',compact('variantOption','variations'));
    }
    //

    // update Option 

    public function updateOption(Request $request){

        $id                           = $request->id;
        $variantOption                = VariationOption::find($id);
        $variantOption->variation_id  = $request->variation_id;
        $variantOption->option_name   = $request->option_name;

        if ($variantOption->save()) {
            
            return redirect("variations-options-list")->with('msg','<div class="alert alert-success" id="msg">Option updated Successfully!</div>');
       
        }
    } 
    // 

    // Delete Option 
    public function deleteOption($id){

        $id            = decrypt($id);
        $variantOption = VariationOption::find($id);
        if ($variantOption->delete()) {
            
            return redirect("variations-options-list")->with('msg','<div class="alert alert-success" id="msg">Option removed Successfully!</div>');
       
        }

    }
    public function fetch_paginate_data(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }
            $viewName = "";
            if ($status == 1) {
                $viewName = "variation.partials.variations-list";
            }else{
                $viewName = "variation.partials.disabled-variations-list";
            }
            if ($request->search_key != "") {
                $variations = Variation::where("variation_name", "LIKE", "%".$searchKey."%")
                            ->where("active", "=", $status)
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);
                return view($viewName, compact('variations'))->render();
            }

            $variations = Variation::where("active", "=", $status)
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);
            return view($viewName, compact('variations'))->render();
        }
        return abort(404);
    }

    // 
}
