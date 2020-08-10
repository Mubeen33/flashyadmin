<?php

namespace App\Http\Controllers;

use App\CustomField;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CustomFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categories = DB::table('categories')
					->select('*')
					->orderBy('id', 'DESC')
					->where('parent_id',Null)
					->get();
        return view('custom-fields', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'name' => 'required',
//            'slug' => 'required',
//        ]);
//  
//        Category::create($request->all());
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

    //Add custom
    public function add_custom(Request $request){
        // dd($request->all());

        $c = new CustomField;

      $c->parent_id = $request->parent;
      $c->child2_id = $request->child_2;
      $c->child3_id = $request->child_3;
      $c->name1 = $request->name_lang_1;
      $c->name2 = $request->name_lang_2;
      $c->row_width = $request->row_width;
      $c->is_required = $request->is_required;
      $c->status = $request->status;
      $c->field_order = $request->field_order;
      $c->field_type = $request->field_type;

    //   $c->save();

      if($c->save()){
        return redirect()->back()->withErrors(['success', 'Added Successfully']);
      }else{
        return redirect()->back()->withErrors(['error', 'Something Wrong,Try again Later']);
      }
      

    }
    public function list()
    {
        $data = DB::table('custom_fields')
                ->where('status',1)
                ->get();

                return view('custom-fields-list',compact('data'));
    }
}
