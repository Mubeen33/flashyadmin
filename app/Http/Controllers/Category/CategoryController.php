<?php

namespace App\Http\Controllers\category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Category;
use Auth;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    
	//add Category view

	public function index(){
        $Categories=Category::where([
            ['deleted', '=', 0],
            ['parent_id','=', 0]
        ])->orderBy('id','desc')
        ->paginate(5);

        return view('category.add-category')
        ->with('categories',$Categories);
	}
    //active Categorys list
    public function categoryList(){
         $Categories=Category::orderBy('id','desc')
         ->where('deleted', '=', 0)->paginate(5);
        return view('category.category-list')
        ->with('categories',$Categories);
      
    }


    public function createcategory(Request $request){

        $this->validate($request,[
            'name'=>'required|string|max:100',
            'slug'=>'required|string',
            'title'=>'required|string',
            'order'=>'required|numeric',
            'commission'=>'required',
            'image'=>'nullable|image|mimes:png,jpg,jpeg,gif|dimensions:width=170,height=170|max:1000',
            'icon' =>'nullable|image|mimes:png,jpg,jpeg,gif|dimensions:width=16,height=16|max:1000'
        ]);
        
        $image = NULL;
        $location = "upload-images/category/";
        if($request->hasFile('image')){
            $obj_fu = new FileUploader();
            $fileName ='category-'.uniqid().mt_rand(10, 9999).Auth::user()->id;
            $fileName__ = $obj_fu->fileUploader($request->file('image'), $fileName, $location);
            $image = $fileName__;
        }
        $icon = NULL;
        $location = "upload-images/category/";
        if($request->hasFile('icon')){
            $obj_fu = new FileUploader();
            $fileName ='category-'.uniqid().mt_rand(10, 9999).Auth::user()->id;
            $fileName__ = $obj_fu->fileUploader($request->file('icon'), $fileName, $location);
            $icon = $fileName__;
        }

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

        if (intval($data['parent_id']) === 0) {
            //check image has been upload or not
            if ($image === NULL) {
                return redirect()->back()->withInput()->with('error', 'Image is required for parent category.');
            }
        }
        if ($request->home_visiblity == 1) {
            //check image has been upload or not
            if ($image === NULL) {
                return redirect()->back()->withInput()->with('error', 'Image is required for category show on home page');
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
        $Category->image                = ($image === NULL ? NULL : url('/')."/".$location.$image);
        $Category->icon                 = ($icon === NULL ? NULL : url('/')."/".$location.$icon);

        
        
        if ($Category->save()) {
            return redirect()->route('admin.category.categorylist')->with('success', 'Category added Successfully');
        }
    }
    // edit Category
    public function editcategory($id){

        $id               = decrypt($id);
        $parentCategories = Category::where([['parent_id', '=',0],['deleted', '=',0]])->get();
    	$categories       = Category::where('id',$id)->first();
        if (!$categories ) {
            return abort(404);
        }
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
        $this->validate($request,[
            'name'=>'required|string|max:100',
            'slug'=>'required|string',
            'title'=>'required|string',
            'order'=>'required|numeric',
            'commission'=>'required',
            'visiblity'=>'required|numeric|in:1,0',
            'image'=>'nullable|image|mimes:png,jpg,jpeg,gif|dimensions:width=170,height=170|max:1000'
        ]);


        $id              = $request->id;
        $Category        = Category::find($id);
        $oldData        = Category::where('id', $id)->first();

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


        $url = url('/');
        $location = "upload-images/category/";
        $image = NULL;
        if ($request->hasFile('image')) {
            $obj_fu = new FileUploader();
            //delete
            if ($Category->image != NULL) {
                $file_name = str_replace($url."/".$location, "", $Category->image);
                $obj_fu->deleteFile($file_name, $location);
            }
           //upload new one
            $fileName ='category-'.uniqid().mt_rand(10, 9999).Auth::user()->id;
            $fileName__ = $obj_fu->fileUploader($request->file('image'), $fileName, $location);
            $image = $fileName__;
        }

        if (intval($data['parent_id']) === 0) {
            //check image has been upload or not
            if ($image === NULL) {
                //check has image already or not
                if ($oldData->image == NULL) {
                    return redirect()->back()->withInput()->with('error', 'Image is required for parent category.');
                }
            }
        }
        if ($request->home_visiblity == 1) {
            //check image has been upload or not
            if ($image === NULL) {
                //check has image already or not
                if ($oldData->image == NULL) {
                    return redirect()->back()->withInput()->with('error', 'Image is required for category show on home page');
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
    	$Category->image                = ($image === NULL ? $Category->image : $url."/".$location.$image);


        if ($Category->save()) {

        	return redirect()->route('admin.category.categorylist')->with('success', 'Category updated Successfully');
        }
    }

    // Disable Categorys list

    public function disablecategoryList(){

        $categories=Category::where('deleted', '=', 1)
            ->orderBy('id','desc')
            ->paginate(5);
        return view('category.disable-categoy-list', compact('categories'));
    }

    //active a Category

    public function activecategory($id){

    	$id                  = $id;
    	$Categories          = Category::find($id);
    	$Categories->deleted = 0;
    	if ($Categories->save()) {
        	return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Category Active Successfully!</div>');
        }
    }

    //disable a Category 

    public function disableAcategory($id){

    	$id   = $id;
    	$Categories   = Category::find($id);
    	$Categories->deleted  = 1;
    	if ($Categories->save()) {

        	return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Category Disable Successfully!</div>');
        }
    }


    //ajax
    public function fetch_paginate_data(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            $viewName = NULL;
            if ($status == 0) {
                $viewName =  "Category.partials.category-list";
            }else{
                $viewName =  "Category.partials.disabled-category-list";
            }

            if ($request->search_key != "") {
                $categories = Category::where([
                                ["name", "LIKE", "%".$searchKey."%"],
                                ["deleted", "=", $status]
                            ])
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);

                return view($viewName, compact('categories'))->render();
            }

            $categories = Category::where("deleted", "=", $status)
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);
            return view($viewName, compact('categories'))->render();
        }
        return abort(404);
    }
}

