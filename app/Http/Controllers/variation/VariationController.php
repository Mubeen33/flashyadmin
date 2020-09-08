<?php

namespace App\Http\Controllers\variation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Variation;
use App\VariationOption;
use App\VariantOptionOptions;
use Illuminate\Support\Facades\Validator;

class VariationController extends Controller
{
    //add variation view

    public function addVariation(){

    	$categories = Category::where([['parent_id',0],['deleted','=',0]])->get();
        
        return view('variation.add-variation',compact('categories'));
    }

    //save new variation

    public function createVariation(Request $request){

        $this->validate($request,[
            'variation_name'=>'required|string|max:60',
            'image_approval'=>'required'
        ]);

        $variation  =  new Variation();
        $data["parent_id"] = 0;
        $category_ids_array = $request->input('parent_id');
        if (!empty($category_ids_array)) {
            foreach ($category_ids_array as $key => $value) {
                if (!empty($value)) {
                    $data["parent_id"] = $value;
                }
            }
        }
        $variation->category_id              = $data['parent_id'];
        $variation->variation_name           = $request->variation_name;
        $variation->image_approval           = $request->image_approval;
        $variation->sku_approval             = $request->sku_approval;
        $variation->is_text                  = $request->is_text;
        $variation->is_select                = $request->is_select;
        $variation->save();
        $Id = $variation->id;
       
        if (!empty($request->has('option_name'))) {
            
        
            foreach ($request->option_name as $key => $value) {
                
                $variantOption = new VariationOption();
                $variantOption->variation_id = $Id;
                $variantOption->option_name  = $request->option_name[$key];
                $variantOption->save();
            
            }
        }
        else{

            return redirect()->back()->with('success', "Variation added Successfully!");
        }    
      	return redirect()->back()->with('success', "Variation added Successfully!"); 
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
        $category_id      = Variation::where('id',$id)->value('category_id');
        $parentCategories = Category::where([['parent_id', '=',0],['deleted', '=',0]])->get();

        // parent categories array with selected parent

        $array_categories = array();
        $category = Category::where('id',$category_id)->first();
        if (!empty($category)) {
            array_push($array_categories, $category);
            for ($i = 0; $i < 50; $i++) {
                    $parent = Category::where('id',$category->parent_id)->first();
                
                    if (!empty($parent)) {
                        array_push($array_categories, $parent);
                        $category = $parent;
                        if ($category->parent_id == 0) {
                            break;
                        }
                    }   
            }
        }
        $parent_categories_array = array_reverse($array_categories);

    	return view('variation.edit-variation',compact('variant','image_approval','parentCategories','parent_categories_array'));
    }

    // update variations

    public function updateVariation(Request $request){

    	$id = $request->id;
    	$variation = Variation::find($id);
         $data["parent_id"] = 0;
        $category_ids_array = $request->input('parent_id');
        if (!empty($category_ids_array)) {
            foreach ($category_ids_array as $key => $value) {
                if (!empty($value)) {
                    $data["parent_id"] = $value;
                }
            }
        }
        $variation->category_id              = $data['parent_id']; 
    	$variation->variation_name           = $request->variation_name;
        $variation->image_approval           = $request->image_approval;
        $variation->sku_approval             = $request->sku_approval;
        $variation->is_text                  = $request->is_text;
        $variation->is_select                = $request->is_select;

        if ($variation->save()) {
          	
        	return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Variation update Successfully!</div>');
       
        } 
    }

    // disable A Variation

    public function disableAVariation($id){

    	$id = decrypt($id);
    	$variation = Variation::find($id);
    	$variation->active = 0;

    	if ($variation->save()) {
          	
        	return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Variation Disable Successfully!</div>');
       
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
          	
        	return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Variation Active Successfully!</div>');
       
        }
    }

    // add options in variations

    public function addvariationsoption(){

        $variations = Variation::where('active', 1)->get();

        return view('variation.add-variation-option',compact('variations'));

    }
    // 
    public function createOption(Request $request){

        
        
        foreach ($request->option_name as $key => $value) {
            
            $variantOption = new VariationOption();
            $variantOption->variation_id = $request->variation_id;
            $variantOption->option_name  = $request->option_name[$key];
            $variantOption->save();
        
        }

        return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Option added Successfully!</div>');
    }

    // variationsOptionsList

    public function variationsOptionsList($id){


        $variation_id      = decrypt($id);
        $variationsOptions = VariationOption::where('active', 1)->where('variation_id',$variation_id)->get();

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
            
            return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Option updated Successfully!</div>');
       
        }
    } 
    // 

    // Delete Option 
    public function deleteOption($id){

        $id            = decrypt($id);
        $variantOption = VariationOption::find($id);
        if ($variantOption->delete()) {
            
            return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Option removed Successfully!</div>');
       
        }

    }
    // addOption

    public function addOption($id){

        return view('variation.add-options',compact('id'));

    }
    //

    // createOptionOptions

    public function createOptionOptions(Request $request){

        
        
        foreach ($request->option_name as $key => $value) {
            
            $variantOption = new VariantOptionOptions();
            $variantOption->option_id = decrypt($request->option_id);
            $variantOption->option_name  = $request->option_name[$key];
            $variantOption->save();
        
        }
        return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Option added Successfully!</div>');

    }

    // OptionsList

    public function OptionsList($id){

        $id      = decrypt($id);
        $Options = VariantOptionOptions::where('active', 1)->where('option_id',$id)->get();

        return view('variation.options-list',compact('Options'));

    }

    // Optionsoptions edit

    public function editOptionOptions($id){

        $id = decrypt($id);
        $variantOption        = VariantOptionOptions::where('id',$id)->first();
        $variationsOptions    = VariationOption::where('active', 1)->get();
        return view('variation.edit-option',compact('variantOption','variationsOptions'));
    }
    // 

    // updateOptionOptions

    public function updateOptionOptions(Request $request){

        $id                           = $request->id;
        $variantOption                = VariantOptionOptions::find($id);
        $variantOption->option_id  = $request->option_id;
        $variantOption->option_name   = $request->option_name;

        if ($variantOption->save()) {
            
            return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Option updated Successfully!</div>');
       
        }
    }
    //

    //deleteOptionOptions

    public function deleteOptionOptions($id){

        $id            = decrypt($id);
        $variantOption = VariantOptionOptions::find($id);
        if ($variantOption->delete()) {
            
            return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Option removed Successfully!</div>');
       
        }

    }

    // 
    // Paginations on Variations.......

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
