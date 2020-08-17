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


// brands
Route::get('add-brand','brand\BrandController@index');
Route::get('brands-list','brand\BrandController@brandsList')->name('brands.brandslist');
Route::get('disable-brands-list','brand\BrandController@disableBrandsList')->name('brands.disablebrandslist');
Route::post('add-brand','brand\BrandController@createBrand');
Route::get('brand-edit/{id}','brand\BrandController@editBrand');
Route::post('update-brand','brand\BrandController@updateBrand');
Route::get('brand-active/{id}','brand\BrandController@activeBrand');
//


Route::group(['as'=>'admin.', 'namespace'=>'Admin', 'middleware' => ['auth']], function(){
	//vendors controller
	Route::resource('vendors', 'VendorController');

	//icon pages
	Route::get('pages/{PageName}', 'PagesController@get_page')->name('page.get');
});




