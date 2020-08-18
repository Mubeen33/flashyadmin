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

    	$parentCategory = Category::where('parent_id',0)->get();
        
        return view('variation.add-variation',compact('parentCategory'));
    }
}
