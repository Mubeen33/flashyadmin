<?php

namespace App\Http\Controllers\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Categories;
use Freshbitsweb\Laratables\Laratables;

class CategoryController extends Controller
{
    
	//add Category view

	public function index(){
        $Categories=Categories::select ('id', 'name')->orderBy('id','desc')->where('deleted', '=',0)->get();
        return view('category.add-category')
        ->with('categories',$Categories);
	}
    //active Categorys list
    public function categoryList(){


         $Categories=Categories::orderBy('id','desc')->where('deleted', '=',0)->get();
        return view('category.category-list')
        ->with('categories',$Categories);
      
    }
    // Categorys
    public function categories(){

        return Laratables::recordsOf(Categories::class);
    }
    //createCategory

    public function createcategory(Request $request){
       
        $this->validate($request,
        ['name'=>'required',
        'slug'=>'required',
        'title'=>'required',
        'order'=>'required'
        ]);


    	$Categories = new Categories();
        $Categories->name        = $request->name;
        $Categories->slug        = $request->slug;
        $Categories->parent_id       = $request->parent_id;
        $Categories->title        = $request->title;
        $Categories->desc        = $request->desc;
        $Categories->keyword        = $request->keyword;
        $Categories->order        = $request->order;
        $Categories->home_order        = $request->home_order;
        $Categories->visiblity        = $request->visiblity;
        $Categories->home_visiblity = $request->home_visiblity;
        $Categories->image_visiblity = $request->image_visiblity;
    	$imageName = time().'.'.request()->image->getClientOriginalExtension();
    	request()->image->move(public_path('upload-images/category'), $imageName);
    	$Categories->photo = $imageName;

        if ($Categories->save()) {

        	return redirect("category-list")->with('msg','<div class="alert alert-success" id="msg">Category added Successfully!</div>');
        }
    }
    // edit Category
    public function editcategory($id){

    	$id     = $id;
    	$Categories  = Categories::where('id',$id)->first();
        return view('category.edit-catgeory')
        ->with('categories',$Categories);
    }

    // update Category

    public function updatecategory(Request $request){

        $id                 = $request->id;
        $Categories              = Categories::find($id);
    	$Categories->name        = $request->name;
        $Categories->slug        = $request->slug;
        $Categories->parent_id        = '0';
        $Categories->title        = $request->title;
        $Categories->desc        = $request->desc;
        $Categories->keyword        = $request->keyword;
        $Categories->order        = $request->order;
        $Categories->home_order        = $request->home_order;
        $Categories->visiblity        = $request->visiblity;
        $Categories->home_visiblity = $request->home_visiblity;
        $Categories->image_visiblity = $request->image_visiblity;
    	

    	if ($request->hasFile('image')) {
	    
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload-images/category'), $imageName);

	    	$Categories->image        = $imageName;
        }
        else
        {
            $imageName=$request->image;
        }
        $Categories->photo = $imageName;
        if ($Categories->save()) {

        	return redirect("categories")->with('msg','<div class="alert alert-success" id="msg">Category updated Successfully!</div>');
        }
    }

    // Disable Categorys list

    public function disablecategoryList(){

        $Categories=Categories::orderBy('id','desc')->where('deleted', '=',1)->get();
        return view('category.disable-categoy-list')
        ->with('categories',$Categories);
    }

    //active a Category

    public function activecategory($id){

    	$id                 = $id;
    	$Categories              = Categories::find($id);
    	$Categories->deleted      = '0';
    	if ($Categories->save()) {

        	return redirect("category-list")->with('msg','<div class="alert alert-success" id="msg">Category Active Successfully!</div>');
        }
    }

    //disable a Category 

    public function disableAcategory($id){

    	$id   = $id;
    	$Categories   = Categories::find($id);
    	$Categories->deleted  = '1';
    	if ($Categories->save()) {

        	return redirect("category.disablecategoryList")->with('msg','<div class="alert alert-success" id="msg">Category Disable Successfully!</div>');
        }
    }
}

