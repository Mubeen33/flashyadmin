<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checklogin(){

        if (!Auth::user()) {

            return view('auth.login');
        }
        else{

            return redirect('home');
        }
    }

    public function index()
    {
        return view('index');
    }

    public function addProduct(){

        return view('product.add-product');
    }
    // 
    public function categories()
    {
        return view('categories');
    }

    //add brand view

    public function addBrands(){

        return view('brand.add-brand');
    }

    // get subcategories

    public function getSubcategories($id){

        $categories = Category::where('parent_id',$id)->get();
        // print_r($categories);

        if (count($categories) > 0) {
            
            $new_data_select_id = idate("U");
        
            $select = '<select class="form-control subcategory-select" name="parent_id[]" onchange="get_subcategories(this.value,'.$new_data_select_id.')" data-select-id="'.$new_data_select_id.'"><option value="">none</option>';

            foreach ($categories as $key => $value) {
                
                $select.= '<option value="'.$value->id.'">'.$value->name.'</option>';
            }
            $select .= '</select>';

            echo $select;
        }
        
    }

}
