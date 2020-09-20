<?php

namespace App\Http\Controllers\warranty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;
use App\ProductsWarranty;

class WarrantyController extends Controller
{
    //Product warranties

    public function index(){

        $productWarranty = ProductsWarranty::all();
        return view('warranty.warranty-list',compact('productWarranty'));
    }
    public function addProductsWarranty(){

        $parentCategory = Category::where('parent_id',0)->get();
        return view('warranty.add-productwarranty',compact('parentCategory'));
    }
    public function addNew(Request $request){

        $productWarranty = new ProductsWarranty();

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


    public function edit_warranty_get($id){
        $data = ProductsWarranty::findOrFail(decrypt($id))->with('get_category')->first();
        $parentCategory = Category::where('parent_id',0)->get();
        return view('warranty.edit', compact('data', 'parentCategory'));
    }

    public function update_warranty_post(Request $request, $id){
        $oldData = ProductsWarranty::where('id', $id)->first();
        if (!$oldData) {
            return redirect()->back()->with('msg','<div class="alert alert-error" id="msg">Warranty Record Not Found!</div>');
        }

        $data["parent_id"] = 0;
        $category_ids_array = $request->input('parent_id');
        if (!empty($category_ids_array)) {
            foreach ($category_ids_array as $key => $value) {
                if (!empty($value)) {
                    $data["parent_id"] = $value;
                }
            }
        }

        $updated = $oldData->update([
            'category_id'=>$data["parent_id"],
            'warranty'=>$request->warranty,
            'updated_at'=>Carbon::now()
        ]);

        if ($updated == true) {
            return redirect("admin/get-products-warranties")->with('msg','<div class="alert alert-success" id="msg">Warranty Updated Successfully!</div>');
        }
        return redirect()->back()->with('msg','<div class="alert alert-error" id="msg">Internal Error, Please try again later!</div>');
    }
}
