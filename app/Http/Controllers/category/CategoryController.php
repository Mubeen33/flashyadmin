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
        $Categories=Categories::select ('id', 'name')
        ->orderBy('id','desc')
        ->where('deleted', '=',0)
        ->where('parent_id', '=',0)
        ->get();
        return view('category.add-category')
        ->with('categories',$Categories);
	}
    //active Categorys list
    public function categoryList(){


         $Categories=Categories::orderBy('id','desc')->where('deleted', '=',0)->get();
        return view('category.category-list')
        ->with('categories',$Categories);
      
    }

    public function getChild(Request $request){

        $id=$request->parent_id;
        $Categories=Categories::where('parent_id','=',$id)
        ->where('deleted','=',0)->get();
        return response()->JSON($Categories);
       // return Response::json($Categories);
     
   }
   public function getparent(Request $request){

    $id=$request->child_id;
    $Categories=Categories::where('id','=',$id)
    ->where('deleted','=',0)->get();
    return response()->JSON($Categories);
   // return Response::json($Categories);
 
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

if(empty($request->cat_id) || $request->cat_id == 'null')
{
 
    $parent_id=0;

}
else
{

    $parent_id=$request->cat_id;

}

if(empty($request->subcat) || $request->subcat == 'null')
{
 
    $parent_id=$request->cat_id;
}
else
{

    $parent_id=$request->subcat;

}
      

if(empty($request->childcat) || $request->childcat == 'null')
{
 
    $parent_id=$request->subcat;
}
else
{

    $parent_id=$request->childcat;

}

    	$Categories = new Categories();
        $Categories->name        = $request->name;
        $Categories->slug        = $request->slug;
        $Categories->parent_id       = $parent_id;
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
            $imageName='NO.png';
        }

        if ($Categories->save()) {

        	return redirect("category-list")->with('msg','<div class="alert alert-success" id="msg">Category added Successfully!</div>');
        }
    }
    // edit Category
    public function editcategory($id){
        $allcategories=Categories::where('deleted','=',0)->where('parent_id','!=',0)->get();

    	$id     = $id;
    	$Categories  = Categories::where('id',$id)->first();
        return view('category.edit-catgeory')
        ->with('categories',$Categories)
        ->with('allcategories',$allcategories);
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

