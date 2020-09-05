<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function get_pending_products(){
        $data = Product::where('approved', 0)
                ->with(['get_vendor', 'get_category'])
                ->orderBy('id', 'DESC')
                ->paginate(5);

        return view('product.pending-products', compact('data'));
    }
}
