<?php

namespace App\Http\Controllers\customfields;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomField;
use App\Category;
use Carbon\Carbon;

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
        $customfield->created_at      = Carbon::now();

        if ($customfield->save()) {

        	return redirect()->route('admin.customFieldList.get')->with('msg','<div class="alert alert-success" id="msg">Custom Fields added Successfully!</div>');
        }
        
    }


    // customFieldList

    public function customFieldList(){
    	$customfields = CustomField::where('active',1)->get();
    	return view('customfields.customfields-list',compact('customfields'));
    }


    //edit
    public function edit_custom_field($id){
        $data = CustomField::where([
            'id'=>decrypt($id)
        ])
        ->with('get_category')
        ->first();
        if (!$data) {
            return abort(404);
        }
        $current_data = $this->buildHTMLView($data);

        $parentCategory = Category::where('parent_id',0)->get();
        return view('customfields.customfields-edit',compact('data', 'parentCategory', 'current_data'));
    }

    //update
    public function update_custom_field(Request $request, $id){
        $this->validate($request, [
            'type'=>'required',
            'status'=>'required|numeric|in:1,0',
            'parent_id'=>'required'
        ]);

        if (!CustomField::where('id', $id)->exists()) {
            return redirect()->back()->with('msg','<div class="alert alert-error" id="msg">Custom Fields Not Found!</div>');
        }

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

        
        $updated = CustomField::where('id', $id)->update([
            'category_id'=>$data["parent_id"],
            'options'=>json_encode($form),
            'active'=>$request->status,
            'updated_at'=>Carbon::now()
        ]);

        if ($updated == true) {
            return redirect()->route('admin.customFieldList.get')->with('msg','<div class="alert alert-success" id="msg">Custom Fields updated successfully!</div>');
        }
        return redirect()->back()->with('msg','<div class="alert alert-error" id="msg">SORRY - Someting wrong to update!</div>');
    }



    private function buildHTMLView($data){
        $html_content = "";
        $key = 0;

    if ($data->options !== NULL) {
        $data_array = json_decode($data->options, true);
        
        $html_content .= "<table>";
            foreach ($data_array as $key => $value) {
                //if type text
                if ($value['type'] === "text") {
                    $html_content .= "<div class='row form-group' style='background:rgba(0,0,0,0.1);padding:10px 0;'>
                        <input type='hidden' name='type[]' value='text'>
                        <div class='col-lg-3'>
                            <label class='control-label'>Text</label>
                        </div>
                        <div class='col-lg-7'>
                            <input class='form-control' type='text' name='label[]' value='".$value['label']."'>
                        </div>
                        <div class='col-lg-2'>
                            <span class='btn btn-icon btn-circle icon-lg fa fa-times' onclick='delete_choice_clearfix(this)'></span>'
                        </div>
                    </div>";
                }

                //if type select
                if ($value['type'] === "select") {
                    $key = $key+1;
                    $html_content .= "<div class='row form-group' style='background:rgba(0,0,0,0.1);padding:10px 0;'>
                                        <input type='hidden' name='type[]' value='select'>
                                            <input type='hidden' name='option[]' class='option' value='".($key+1)."'>
                                    <div class='col-lg-3'>
                                        <label class='control-label'>Select</label>
                                    </div>
                                    <div class='col-lg-7'>
                                        <input class='form-control' type='text' name='label[]' value='".$value['label']."' style='margin-bottom:10px'>
                                            <div class='customer_choice_options_types_wrap_child'>
                                                ";

                                            foreach (json_decode($value['options'], true) as $option_key => $option_value) {
                                                $html_content .= "<div class='row form-group'>
                                                    <div class='col-sm-6 col-sm-offset-4'>
                                                        <input class='form-control' type='text' name='options_".($key+1)."[]' value='".$option_value."' required>
                                                    </div>
                                                    <div class='col-sm-2'> <span class='btn btn-icon btn-circle icon-lg fa fa-times' onclick='delete_choice_clearfix(this)'></span></div>
                                                </div>";
                                            }

                                            $html_content .= "</div>
                                        <button class='btn btn-success pull-right' type='button' onclick='add_customer_choice_options(this)'><i class='glyphicon glyphicon-plus'></i> Add option</button>
                                    </div>
                                    <div class='col-lg-2'>
                                        <span class='btn btn-icon btn-circle icon-lg fa fa-times' onclick='delete_choice_clearfix(this)'></span>
                                    </div>
                                </div>";
                }


                //if type multi_select
                if ($value['type'] === "multi_select") {
                    $key = $key+1;
                    $html_content .= "<div class='row form-group' style='background:rgba(0,0,0,0.1);padding:10px 0;'>
                                        <input type='hidden' name='type[]' value='multi_select'>
                                            <input type='hidden' name='option[]' class='option' value='".($key+1)."'>
                                    <div class='col-lg-3'>
                                        <label class='control-label'>Multiple select</label>
                                    </div>
                                    <div class='col-lg-7'>
                                        <input class='form-control' type='text' name='label[]' value='".$value['label']."' style='margin-bottom:10px'>
                                            <div class='customer_choice_options_types_wrap_child'>
                                                ";

                                            foreach (json_decode($value['options'], true) as $option_key => $option_value) {
                                                $html_content .= "<div class='row form-group'>
                                                    <div class='col-sm-6 col-sm-offset-4'>
                                                        <input class='form-control' type='text' name='options_".($key+1)."[]' value='".$option_value."' required>
                                                    </div>
                                                    <div class='col-sm-2'> <span class='btn btn-icon btn-circle icon-lg fa fa-times' onclick='delete_choice_clearfix(this)'></span></div>
                                                </div>";
                                            }

                                            $html_content .= "</div>
                                        <button class='btn btn-success pull-right' type='button' onclick='add_customer_choice_options(this)'><i class='glyphicon glyphicon-plus'></i> Add option</button>
                                    </div>
                                    <div class='col-lg-2'>
                                        <span class='btn btn-icon btn-circle icon-lg fa fa-times' onclick='delete_choice_clearfix(this)'></span>
                                    </div>
                                </div>";
                }


                //if type radio
                if ($value['type'] === "radio") {
                    $key = $key+1;
                    $html_content .= "<div class='row form-group' style='background:rgba(0,0,0,0.1);padding:10px 0;'>
                                        <input type='hidden' name='type[]' value='radio'>
                                            <input type='hidden' name='option[]' class='option' value='".($key+1)."'>
                                    <div class='col-lg-3'>
                                        <label class='control-label'>Radio</label>
                                    </div>
                                    <div class='col-lg-7'>
                                        <input class='form-control' type='text' name='label[]' value='".$value['label']."' style='margin-bottom:10px'>
                                            <div class='customer_choice_options_types_wrap_child'>
                                                ";

                                            foreach (json_decode($value['options'], true) as $option_key => $option_value) {
                                                $html_content .= "<div class='row form-group'>
                                                    <div class='col-sm-6 col-sm-offset-4'>
                                                        <input class='form-control' type='text' name='options_".($key+1)."[]' value='".$option_value."' required>
                                                    </div>
                                                    <div class='col-sm-2'> <span class='btn btn-icon btn-circle icon-lg fa fa-times' onclick='delete_choice_clearfix(this)'></span></div>
                                                </div>";
                                            }

                                            $html_content .= "</div>
                                        <button class='btn btn-success pull-right' type='button' onclick='add_customer_choice_options(this)'><i class='glyphicon glyphicon-plus'></i> Add option</button>
                                    </div>
                                    <div class='col-lg-2'>
                                        <span class='btn btn-icon btn-circle icon-lg fa fa-times' onclick='delete_choice_clearfix(this)'></span>
                                    </div>
                                </div>";
                }

                //if type file
                if ($value['type'] === "file") {
                    $key = $key+1;
                    $html_content .= "<div class='row form-group' style='background:rgba(0,0,0,0.1);padding:10px 0;'>
                                        <input type='hidden' name='type[]' value='file'>
                                    <div class='col-lg-3'>
                                        <label class='control-label'>File</label>
                                    </div>
                                    <div class='col-lg-7'>
                                        <input class='form-control' type='text' name='label[]' value='".$value['label']."'>
                                    </div>
                                    <div class='col-lg-2'>
                                        <span class='btn btn-icon btn-circle icon-lg fa fa-times' onclick='delete_choice_clearfix(this)'></span>
                                    </div>
                                </div>";
                }
            }

            $html_content .= "</table>";
        }

        $result = [];
        $result = [$html_content, $key];
        return $result;
    }
}
