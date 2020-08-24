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
        $Categories=Category::select ('id', 'name')->orderBy('id','desc')->where([['deleted', '=',0],['parent_id','=',0]])->get();
        return view('category.add-category')
        ->with('categories',$Categories);
	}
    //active Categorys list
    public function categoryList(){

         $Categories=Category::orderBy('id','desc')->where('deleted', '=',0)->get();
        return view('category.category-list')
        ->with('categories',$Categories);
      
    }


    public function createcategory(Request $request){
       
        $this->validate($request,
        ['name'=>'required',
        'slug'=>'required',
        'title'=>'required',
        'order'=>'required',
        'commission'=>'required'
        ]);
        
    	$Category = new Category();
        // parent id
        $data["parent_id"] = 0;
        $category_ids_array = $request->input('parent_id');
        if (!empty($category_ids_array)) {
            foreach ($category_ids_array as $key => $value) {
                if (!empty($value)) {
                    $data["parent_id"] = $value;
                }
            }
        }
        $Category->parent_id            = $data['parent_id'];

        // 
        $Category->name                 = $request->name;
        $Category->slug                 = $request->slug;
        $Category->title_meta_tag       = $request->title;
        $Category->description          = $request->desc;
        $Category->keywords             = $request->keyword;
        $Category->category_order       = $request->order;
        $Category->homepage_order       = $request->home_order;
        $Category->visibility           = $request->visiblity;
        $Category->show_on_homepage     = $request->home_visiblity;
        $Category->show_image_nav       = $request->image_visiblity;
        $Category->commission           = $request->commission;


        if ($request->hasFile('image')) {
	    
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload-images/category'), $imageName);

	    	$Category->image        = $imageName;
        }
        
        if ($Category->save()) {

        	return redirect("category-list")->with('msg','<div class="alert alert-success" id="msg">Category added Successfully!</div>');
        }
    }
    // edit Category
    public function editcategory($id){

        $id               = decrypt($id);
        $parentCategories = Category::where([['parent_id', '=',0],['deleted', '=',0]])->get();
    	$categories       = Category::where('id',$id)->first();

        // parent categories array with selected parent

        $array_categories = array();
        $category = Category::where('id',$id)->first();
        if (!empty($category)) {
            array_push($array_categories, $category);
            for ($i = 0; $i < 50; $i++) {
                    $parent = Category::where('id',$category->parent_id)->first();
                
                    if (!empty($parent)) {
                        array_push($array_categories, $parent);
                        $category = $parent;
                        if ($category->parent_id == 0) {
                            break;
                        }
                    }   
            }
        }
        $parent_categories_array = array_reverse($array_categories);

        // 
        
        return view('category.edit-catgeory',compact('parentCategories','categories','parent_categories_array'));
    }

    // update Category

    public function updatecategory(Request $request){

        $id                          = $request->id;
        $Category                  = Category::find($id);
        // parent id
        $data["parent_id"] = 0;
        $category_ids_array = $request->input('parent_id');
        if (!empty($category_ids_array)) {
            foreach ($category_ids_array as $key => $value) {
                if (!empty($value)) {
                    $data["parent_id"] = $value;
                }
            }
        }
        $Category->parent_id            = $data['parent_id'];
    	$Category->name                 = $request->name;
        $Category->slug                 = $request->slug;
        $Category->title_meta_tag       = $request->title;
        $Category->description          = $request->desc;
        $Category->keywords             = $request->keyword;
        $Category->category_order       = $request->order;
        $Category->homepage_order       = $request->home_order;
        $Category->visibility           = $request->visiblity;
        $Category->show_on_homepage     = $request->home_visiblity;
        $Category->show_image_nav       = $request->image_visiblity;
        $Category->commission           = $request->commission;
    	

    	if ($request->hasFile('image')) {
	    
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload-images/category'), $imageName);

	    	$Category->image        = $imageName;
        }
        else
        {
            $imageName=$request->image;
        }
        if ($Category->save()) {

        	return redirect("category-list")->with('msg','<div class="alert alert-success" id="msg">Category updated Successfully!</div>');
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

        	return redirect("disable-categories-list")->with('msg','<div class="alert alert-success" id="msg">Category Disable Successfully!</div>');
        }
    }
}

