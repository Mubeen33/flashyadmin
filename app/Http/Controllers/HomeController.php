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
        $array = array();
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $item = array(
                    'id' => $category->id,
                    'parent_id' => $category->parent_id,
                    'name' => $category->name,
                );
                array_push($array, $item);
            }
        }
       return json_encode($array);
    }

}
