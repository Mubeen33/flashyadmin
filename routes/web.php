<?php

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-product', 'ProductController@index');

// Vendor Routes
Route::get('vendor-requests','vendor\VendorController@vendorRequest');
Route::get('vendor-approve/{id}','vendor\VendorController@vendorData');

Route::get('/addcat', function () {

    $categoris = Category::where('parent_id',0)->get();
    
    return view('addcat',["categoris" => $categoris]);

});


Route::get('/categories', function () {

    $categoris = Category::where('parent_id',0)->get();
    
    return view('categories',["categoris" => $categoris]);

});

Route::post('/subcat', function (Request $request) {

    $parent_id = $request->cat_id;
    
    $subcategories = Category::where('id',$parent_id)
                          ->with('subcategories')
                          ->get();

    return response()->json([
        'subcategories' => $subcategories
    ]);
   
})->name('subcat');
