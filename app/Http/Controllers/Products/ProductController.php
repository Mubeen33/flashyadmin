<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function get_pending_products(){
        $data = Product::where([
        			'approved'=>0,
        			'disable'=>0
        		])
        		->orderBy('id', 'DESC')
                ->paginate(5);

        return view('product.pending-products', compact('data'));
    }

    //show details
    public function get_product_details($id){
    	$data = Product::where('id' , decrypt($id))
    			->first();
    	if (!$data) {
    		return abort(404);
    	}
        return view('product.products-details', compact('data'));
    }

    //approve product
    public function approve_or_disable($type, $id){
    	$field = NULL;
    	$value = NULL;
    	$msg = NULL;
    	if ($type === "approve") {
    		$field = "approved";
    		$value = 1;
    		$msg = "Product Approved";
    	}elseif ($type === "disable") {
    		$field = "disable";
    		$value = 1;
    		$msg = "Product Disabled";
    	}elseif ($type === "enable") {
    		$field = "disable";
    		$value = 0;
    		$msg = "Product Enabled";
    	}else{
    		return redirect()->back()->with('error', 'SORRY - Invalid Request');
    	}

    	$data = Product::where('id' , decrypt($id))
    			->update([
    				$field=>$value,
    				'updated_at'=>Carbon::now()
    			]);
    	if ($data == true) {
    		return redirect()->back()->with('success', $msg);
    	}else{
    		return redirect()->back()->with('error', 'SORRY - Something wrong.');
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

            if ($request->search_key != "") {
                $data = Product::where([
        			'approved'=>$status,
        			'disable'=>0,//not disable
        		])
        		->where("title", "LIKE", "%$searchKey%")
                ->orWhere("product_type", "LIKE", "%$searchKey%")
                ->orWhere("created_at", "LIKE", "%$searchKey%")
        		->orderBy($sort_by, $sorting_order )
                ->paginate($row_per_page );
                return view('product.partials.pending-product-list', compact('data'))->render();
            }

            $data = Product::where([
	        			'approved'=>$status,
	        			'disable'=>0,//not disable
	        		])
	            	->orderBy($sort_by, $sorting_order)
	            	->paginate($row_per_page );
            return view('product.partials.pending-product-list', compact('data'))->render();
        }
        return abort(404);
    }
}
