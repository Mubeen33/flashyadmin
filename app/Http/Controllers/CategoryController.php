<?php

namespace App\Http\Controllers;

use App\Category;
use App\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::leftjoin('categories as cat', 'categories.parent_id', '=', 'cat.id')
        ->select('categories.*', 'cat.name as parent_name')            
        ->paginate(5);

        //$users = DB::table('users')
            //->join('contacts', 'users.id', '=', 'contacts.user_id')
            //->join('orders', 'users.id', '=', 'orders.user_id')
            //->select('users.*', 'contacts.phone', 'orders.price')
          //  ->get();

        return view('categories',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
  
        Category::create($request->all());
        return redirect()->route('categories.index')->with('success','Category created successfully.');        
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
        return view('edit-category',compact('category'));
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
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
  
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success','Category updated successfully.');        
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
