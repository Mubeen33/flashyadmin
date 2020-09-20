<?php

namespace App\Http\Controllers\warranty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\ProductWarranty;

class WarrantyController extends Controller
{
    //Product warranties

    public function index(){

    	$productWarranty = ProductWarranty::all();
    	return view('warranty.warranty-list',compact('productWarranty'));
    }
    public function addProductsWarranty(){

    	$parentCategory = Category::where('parent_id',0)->get();
    	return view('warranty.add-productwarranty',compact('parentCategory'));
    }
    public function addNew(Request $request){

    	$productWarranty = new ProductWarranty();

    	$data["parent_id"] = 0;
        $category_ids_array = $request->input('parent_id');
        if (!empty($category_ids_array)) {
            foreach ($category_ids_array as $key => $value) {
                if (!empty($value)) {
                    $data["parent_id"] = $value;
                }
            }
        }
        $productWarranty->category_id  = $data["parent_id"];
        $productWarranty->warranty     = $request->warranty;

        if ($productWarranty->save()) {

        	return redirect("admin/get-products-warranties")->with('msg','<div class="alert alert-success" id="msg">Warranty added Successfully!</div>');
        }

    }
}
