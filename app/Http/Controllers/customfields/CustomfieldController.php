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
    public function createCustomFields(Request $request){

    	$customfield = new CustomField();

    	$form = array();
        $select_types = ['select', 'multi_select', 'radio'];
        $j = 0;
        for ($i=0; $i < count($request->type); $i++) {
            $item['type'] = $request->type[$i];
            $item['label'] = $request->label[$i];
            if(in_array($request->type[$i], $select_types)){
                $item['options'] = json_encode($request['options_'.$request->option[$j]]);
                $j++;
            }
            array_push($form, $item);
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

        $customfield->category_id  = $data["parent_id"];
        $customfield->options      = json_encode($form);

        if ($customfield->save()) {

        	return redirect("customfield-list")->with('msg','<div class="alert alert-success" id="msg">Custom Fields added Successfully!</div>');
        }
        
    }


    // customFieldList

    public function customFieldList(){

    	$customfields = CustomField::where('active',1)->get();
    	return view('customfields.customfields-list',compact('customfields'));
    }
}
