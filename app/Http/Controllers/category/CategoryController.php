<?php

namespace App\Http\Controllers\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Category;
use Freshbitsweb\Laratables\Laratables;

class CategoryController extends Controller
{
    
	//add Category view

	public function index(){
        $Categories=Category::select ('id', 'name')->orderBy('id','desc')->where('deleted', '=',0)->get();
        return view('category.add-category')
        ->with('categories',$Categories);
	}
    //active Categorys list
    public function categoryList(){


         $Categories=Category::orderBy('id','desc')->where('deleted', '=',0)->get();
        return view('category.category-list')
        ->with('categories',$Categories);
      
    }
//getting childs
    public function getchild(Request $request){

      $parent_id=$request->parent_id;
        $Categories=Category::select('name','id','parent_id')->where('deleted', '=',0)->where('parent_id', '=',$parent_id)->get();
        return response()->JSON($Categories);
     
   }

   //getting parents
   public function getparent(Request $request){

      $child_id=$request->child_id;
      $Categories=Category::select('name','id','parent_id')->where('deleted', '=',0)->where('id', '=',$child_id)->get();
      return response()->JSON($Categories);
   
 }
    // Categorys
    public function categories(){

        return Laratables::recordsOf(Category::class);
    }
    //createCategory

    public function createcategory(Request $request){
       
        $this->validate($request,
        ['name'=>'required',
        'slug'=>'required',
        'title'=>'required',
        'order'=>'required'
        ]);
        if(empty($request->cat_id) || $request->cat_id == "null")
        {
            $parent_id= 0;
        }
        else
        {
        if(empty($request->subcat) || $request->subcat == "null" )
        {
            $parent_id=$request->cat_id;
        }
        else
        {
        if(empty($request->childcat) || $request->childcat == "null")
        {
            $parent_id=$request->subcat;
        }
        else
        {
            $parent_id=$request->childcat;
        }
        }
        }

    	$Categories = new Category();
        $Categories->name        = $request->name;
        $Categories->slug        = $request->slug;
        $Categories->parent_id    = $parent_id;
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
            $imageName='none.png';
        }

        if ($Categories->save()) {

        	return redirect("category-list")->with('msg','<div class="alert alert-success" id="msg">Category added Successfully!</div>');
        }
    }
    // edit Category
    public function editcategory($id){

        $id     = $id;
        $allCategories=Category::select ('id', 'name','parent_id')->orderBy('id','desc')->where('deleted', '=',0)->where('parent_id', '!=',0)->get();
    	$Categories  = Category::where('id',$id)->first();
        return view('category.edit-catgeory')
        ->with('categories',$Categories)
        ->with('allcategories',$allCategories);
    }

    // update Category

    public function updatecategory(Request $request){

        if(empty($request->childcat) || $request->childcat == "null")
        {
            $parent_id=$request->subcat;
        }
        else
        {
        if(empty($request->subcat) || $request->subcat == "null" )
        {
            $parent_id=$request->parentcat;
        }
        else
        {
        if(empty($request->parentcat) || $request->parentcat == "null")
        {
            $parent_id=0;
        }
        else
        {
            $parent_id=$request->parentcat;
        }
       
        }

          $parent_id=$request->childcat;
        }
        
        
        $id                 = $request->id;
        $Categories              = Category::find($id);
    	$Categories->name        = $request->name;
        $Categories->slug        = $request->slug;
        $Categories->parent_id    = $parent_id;
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

        $Categories=Category::orderBy('id','desc')->where('deleted', '=',1)->get();
        return view('category.disable-categoy-list')
        ->with('categories',$Categories);
    }

    //active a Category

    public function activecategory($id){

    	$id                 = $id;
    	$Categories              = Category::find($id);
    	$Categories->deleted      = '0';
    	if ($Categories->save()) {

        	return redirect("category-list")->with('msg','<div class="alert alert-success" id="msg">Category Active Successfully!</div>');
        }
    }

    //disable a Category 

    public function disableAcategory($id){

    	$id   = $id;
    	$Categories   = Category::find($id);
    	$Categories->deleted  = '1';
    	if ($Categories->save()) {

        	return redirect("categories")->with('msg','<div class="alert alert-success" id="msg">Category Disable Successfully!</div>');
        }
    }
}

