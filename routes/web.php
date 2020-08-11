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
Route::post('/subcat', 'CategoryController@get_category')->name('subcat');


Route::prefix('admin')->group(function (){    
    Route::get('/profile','VendorController@profile_setup');
    Route::post('/profile_setup','VendorController@post_profile');
    Route::post('/profile_setup_address','VendorController@post_addresses');
    Route::post('/profile_setup_business','VendorController@post_business');
    Route::post('/bank_details','VendorController@post_bank');
    Route::post('/login','VendorController@vendor_login');
    Route::post('/logout','VendorController@logout');
    Route::get('/registration','VendorController@register');
    Route::post('/registration','VendorController@vendor_register');
    // Category Routes
    Route::get('/create-category','CategoryController@create');
    Route::post('/create-category','CategoryController@create_category');
        // Slider Routes
    Route::get('/create-slider','CategoryController@slider_view');
    Route::post('/create-slider','CategoryController@create_slider');

});
//Route::resource('categories','Category');
Route::resource('categories','CategoryController');
Route::get('/add-category','CategoryController@create');
Route::get('/edit/{id}','CategoryController@edit')->name('edit');


Route::resource('custom-fields','CustomFieldController');
Route::get('add-custom-fields','CustomFieldController@create')->name('create');
// Edit Custom Field  
Route::get('/{id}/edit/custom-fields','CustomFieldController@edit_custom_field')->name('edit');
Route::post('/push/custom-fields-data/','CustomFieldController@push_editable_data')->name('edit');
Route::post('/create-custom-fields','CustomFieldController@store')->name('create-custom-fields');