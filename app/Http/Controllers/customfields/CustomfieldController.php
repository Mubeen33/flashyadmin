<?php

namespace App\Http\Controllers\customfields;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomField;
use App\Category;

class CustomfieldController extends Controller
{
    //addCustomFieldsView

    public function addCustomFieldsView(){

    	$parentCategory = Category::where('parent_id',0)->get();
    	return view('customfields.add-customfields',compact('parentCategory'));
    }
}
