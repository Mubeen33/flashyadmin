<?php

namespace App\Http\Controllers\Appearances;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomeCategory;

class HomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Appearance.create_home_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new HomeCategory();

        $category->category_id = $request->category_id;
        $category->status = 1;

        $category->save();

        return redirect()->route('admin.home-settings')->with('message' , 'Home Category added Successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "ass";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Appearance.edit_home_category')->with('id' , $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $category = HomeCategory::where('category_id', $id)->first();
        $category->category_id = $request->category_id;
        $category->save();
        return redirect()->route('admin.home-settings')->with('message' , 'Home Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = HomeCategory::where('category_id', $id)->first();
        $category->delete();

        return redirect()->route('admin.home-settings')->with('message' , 'Home Category deleted Successfully');;
    }

    public function categories_update_status(Request $request){
        $home_category = HomeCategory::findOrFail($request->id);
        $home_category->status = $request->status;
        if($home_category->save()){
            return 1;
        }
        return 0;
    }
}
