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

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();
Route::get('/', 'HomeController@checkLogin');
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/add-product', 'HomeController@addProduct');

// General Route

Route::post('/get_subcategories/{id}','HomeController@getSubcategories');

// 

// brands Route
Route::get('add-brand','HomeController@addBrands')->name('brands.addbrand');
Route::get('brands-list','brand\BrandController@brandsList')->name('brands.brandslist');
Route::get('brands','brand\BrandController@brandsList')->name('brands.brands');
Route::get('disable-brands-list','brand\BrandController@disableBrandsList')->name('brands.disablebrandslist');
Route::post('add-brand','brand\BrandController@createBrand');
Route::get('brand-edit/{id}','brand\BrandController@editBrand');
Route::get('brand-disable/{id}','brand\BrandController@disableABrand');
Route::post('update-brand','brand\BrandController@updateBrand');
Route::get('brand-active/{id}','brand\BrandController@activeBrand');
// 

// Variation routes
Route::get('add-variation','variation\VariationController@addVariation')->name('variations.addvariation');
Route::post('submit-variation','variation\VariationController@createVariation');
Route::get('variations-list','variation\VariationController@variationsList')->name('variations.variationslist');
Route::get('disable-variations-list','variation\VariationController@disableVariationsList')->name('variations.disablevariationslist');
Route::get('variation-edit/{id}','variation\VariationController@editVariation');
Route::post('update-variation','variation\VariationController@updateVariation');
Route::get('variation-disable/{id}','variation\VariationController@disableAVariation');
Route::get('variation-active/{id}','variation\VariationController@activeVariation');

// 

Route::get('add-category','category\CategoryController@index');
Route::get('category-list','category\CategoryController@categoryList')->name('category.categorylist');
Route::get('categories','category\CategoryController@categoryList')->name('category.categories');
Route::get('disable-categories-list','category\CategoryController@disablecategoryList')->name('category.disablecategoryList');
Route::post('add-category','category\CategoryController@createcategory');
Route::get('category-edit/{id}','category\CategoryController@editcategory');
Route::post('update-category','category\CategoryController@updatecategory');
Route::get('category-active/{id}','category\CategoryController@activecategory');
Route::get('category-disable/{id}','category\CategoryController@disableAcategory');

Route::get('/childs', function () {
	return('all is well');
	$main_id=input::get('par_id');
	$childs=Categories:: where('parent_id','=',$main_id);
  return Response::json($childs);
});

// End Categories
Route::group(['as'=>'admin.', 'namespace'=>'Admin', 'middleware' => ['auth']], function(){
	//vendors controller
	Route::resource('vendors', 'VendorController');
	Route::get('new-vendors/requests','VendorController@get_vendors_requests')->name("vendors.requests.get");
    Route::post('new-vendor/approve-account','VendorController@vendor_account_approve')->name("vendor.approve_account.post");

});



Route::group(['as'=>'admin.', 'middleware' => ['auth']], function(){
	//vendors routes
	Route::resource('vendors', 'Vendors\VendorController');
	Route::get('new-vendors/requests','Vendors\VendorController@get_vendors_requests')->name("vendors.requests.get");
    Route::post('new-vendor/approve-account','Vendors\VendorController@vendor_account_approve')->name("vendor.approve_account.post");
    Route::post('vendor-password','Vendors\VendorController@update_vendor_pass')->name("vendor.passUpdate.post");

	//icon pages
	Route::get('pages/{PageName}', 'Pages\PagesController@get_page')->name('page.get');

	//slider routes
	Route::resource('sliders', 'Slider\SliderController');
	Route::get('slider/delete/{id}', 'Slider\SliderController@delete_slider')->name('slider.delete');

	//slider routes
	Route::resource('category', 'Category\CategoryController');
	//Route::get('slider/delete/{id}', 'Slider\SliderController@delete_slider')->name('slider.delete');
});




