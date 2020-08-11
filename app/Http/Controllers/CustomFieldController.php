<?php

namespace App\Http\Controllers;

use App\CustomField;
use App\Category;
use App\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;
use Redirect;

class CustomFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categories = DB::table('custom_fields as cf')
					->select('cf.*', 'c.name')
					->orderBy('cf.id', 'DESC')
					->leftjoin('categories as c', 'c.id', 'cf.category_id')
					->get();
        return view('custom-fields-list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = DB::table('categories')
					->select('*')
					->orderBy('id', 'DESC')
					->where('parent_id', 0)
					->get();
        return view('custom-fields', compact('categories'));
    }


     public function edit_custom_field(Request $request)
    {   
       
       $id = $request->segment(1);
       $custome_field_data = DB::table('custom_fields')
					->select('*')
					->where('id', $id)
                    ->get();
        $categories = DB::table('categories')
                    
                    ->whereIn('id',[$custome_field_data[0]->category_id,$custome_field_data[0]->sub_category_1,$custome_field_data[0]->sub_category_2,$custome_field_data[0]->sub_category_3])
                    ->select('*')
                    ->get();
        //  dd($categories[0]->id);
       
      
        return view('custom-fields', compact('categories','custome_field_data'));
    }


    // Updating Custom Field


    public function push_editable_data(Request $request)
    {   
       
       $id = $request->custom_id;
    
        $insert = CustomField::where('id', $id)
        ->update([
            'category_id' => $request->category, 
            'sub_category_1' => $request->child_1, 
            'sub_category_2' => $request->child_2, 
            'sub_category_3' => $request->child_3, 
            'name_eng' => $request->name_eng, 
            'name_dus' => $request->name_deu, 
            'field_width' => $request->row_width, 
            'required' => $request->is_required, 
            'field_order' => $request->field_order, 
            'field_type' => $request->field_type,  
            'status' => $request->status, 
            'user_id' => 1
            ]);
        
         
        if($insert == true){
           dd('Custom Field Updated Successfully');
        }else{
            print_r($id);
        }
         return view('custom-fields', compact('categories','custome_field_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
			'category_id' => $request->category, 
			'sub_category_1' => $request->child_1, 
			'sub_category_2' => $request->child_2, 
			'sub_category_3' => $request->child_3, 
			'name_eng' => $request->name_eng, 
			'name_dus' => $request->name_deu, 
			'field_width' => $request->row_width, 
			'required' => $request->is_required, 
			'field_order' => $request->field_order, 
			'field_type' => $request->field_type,  
			'status' => $request->status, 
			'user_id' => 1
		);  
        $insert = CustomField::create($data);
		if($insert){
			echo 'Custom Field Created Successfully';
		}else{
			print_r($insert);
		}
//        return redirect()->route('categories.index')->with('success','Category created successfully.');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //return view('edit-category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
//        $request->validate([
//            'name' => 'required',
//            'slug' => 'required',
//        ]);
//  
//        $category->update($request->all());
//        return redirect()->route('categories.index')->with('success','Category updated successfully.');        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
