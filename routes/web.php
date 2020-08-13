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
Route::post('update-vendor','vendor\VendorController@updateVendor');
Route::get('vendor-list','vendor\VendorController@vendorList');
Route::get('add-new-vendor','vendor\VendorController@addVendor');
Route::post('add-vendor','vendor\VendorController@createVendor');

Route::post('/edit','CategoryController@edit_cal');

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
    // Category Routes
    Route::get('/create-category','CategoryController@create');
    Route::post('/create-category','CategoryController@create_category');
        // Slider Routes
    Route::get('/create-slider','CategoryController@slider_view');
    Route::post('/create-slider','CategoryController@create_slider');

    //Update Slider
    Route::post('/update-slider','CategoryController@update_slider');

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

// Delete Custom Field
Route::get('/{id}/delete/custom-fields','CustomFieldController@delete_custom_field')->name('delete');

//Delete Slider
Route::get('/{id}/delete/slider','CategoryController@delete_slider');

//Delete Category
Route::get('/{id}/delete/category','CategoryController@delete_category');

// Add product
Route::get('/{id}/edit/custom-fields','CustomFieldController@edit_custom_field')->name('edit');
Route::post('/push/custom-fields-data/','CustomFieldController@push_editable_data')->name('edit');
Route::post('/add-products','ProductController@create_product')->name('add-products');

//Create Roles Creation
Route::get('/roles','CategoryController@roles');
Route::post('/add-roles','CategoryController@create_role')->name('roles');
Route::post('/edit-roles','CategoryController@edit_role');
Route::post('/update-roles','CategoryController@update_role')->name('update');
Route::get('/{id}/delete/role','CategoryController@del_role');

//Menu
Route::get('/menus','MenuController@menus');
Route::get('/add-menus','MenuController@index');
Route::post('/add-menu','MenuController@create_menu')->name('menu');
Route::post('/update-menu','MenuController@update_menu')->name('updates');
Route::get('/{id}/delete/menu','MenuController@del_menu');


//User
Route::get('/users-list','UserController@users_list');
Route::get('/add-users','UserController@index');
Route::post('/add-user','UserController@create_user')->name('user');
Route::post('/update-user','UserController@update_user')->name('users');
Route::get('/{id}/delete/user','UserController@del_user');

Route::get('/srh','SearchController@index');
Route::get('/search','SearchController@search');

