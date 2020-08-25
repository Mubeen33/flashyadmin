<?php

namespace App\Http\Controllers\variation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Variation;

class VariationController extends Controller
{
    //add variation view

    public function addVariation(){

    	$parentCategory = Category::where([['parent_id',0],['deleted','=',0]])->get();
        
        return view('variation.add-variation',compact('parentCategory'));
    }

    //save new variation

    public function createVariation(Request $request){

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

        if ($variation->save()) {
          	
        	return redirect("variations-list")->with('msg','<div class="alert alert-success" id="msg">Variation added Successfully!</div>');
       
        }  
    }

    //variationsList

    public function variationsList(){

    	$variations = Variation::where('active',1)->orderBy('id', 'desc')->paginate('10');
    	return view('variation.variations-list',compact('variations'));
    }

    // edit variation

    public function editVariation($id){

    	$id = decrypt($id);

    	$variant          = Variation::where('id',$id)->first();
    	$image_approval   = Variation::where('id',$id)->value('image_approval');
        $category_id      = Variation::where('id',$id)->value('category_id');
        $parentCategories = Category::where([['parent_id', '=',0],['deleted', '=',0]])->get();
        // $categories       = Category::where('id',$id)->first();

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

        //

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

    	$variations = Variation::where('active',0)->orderBy('id', 'desc')->paginate('10');
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
}
