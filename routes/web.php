<?php

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('add-customfields', function () {
//     return view('customfields.add-customfields');
// });

Auth::routes();
Route::get('/', 'HomeController@checkLogin');
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/add-product', 'HomeController@addProduct');

// General Route

Route::post('/get_subcategories/{id}','HomeController@getSubcategories');
Route::post('/get_categories_commission/{id}','HomeController@getCategoriesCommission');

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
// Route::get('variation-disable/{id}','variation\VariationController@disableAVariation');
// Route::get('variation-active/{id}','variation\VariationController@activeVariation');

// End Variation Routes

// Add Custom Fields

Route::get('add-customfields','customfields\customfieldController@addCustomFieldsView');

Route::get('add-category','category\CategoryController@index');
Route::get('category-list','category\CategoryController@categoryList')->name('category.categorylist');
Route::get('disable-categories-list','category\CategoryController@disablecategoryList')->name('category.disablecategoryList');
Route::post('add-category','category\CategoryController@createcategory');
Route::get('category-edit/{id}','category\CategoryController@editcategory');
Route::post('update-category','category\CategoryController@updatecategory');
Route::get('category-active/{id}','category\CategoryController@activecategory');
Route::get('category-disable/{id}','category\CategoryController@disableAcategory');
Route::Post('get_child','category\CategoryController@getChild')->name('get_child');
Route::Post('getparent','category\CategoryController@getparent')->name('getparent');



// End Categories


Route::group(['as'=>'admin.', 'middleware' => ['auth']], function(){
	//vendors controller
	Route::resource('vendors', 'Vendors\VendorController');
	Route::get('new-vendors/requests','Vendors\VendorController@get_vendors_requests')->name("vendors.requests.get");
  Route::post('new-vendor/approve-account','Vendors\VendorController@vendor_account_approve')->name("vendor.approve_account.post");
  //ajax requests
  Route::get('ajax-pagination/fetch', 'Vendors\VendorController@fetch_paginate_data');


  //vendor activity
  Route::get('vendors-activity','Vendors\VendorController@vendors_activitities')->name("vendor.activities.get");
  Route::get('vendor/activity/{vendorID}','Vendors\VendorController@vendor_actitvity')->name('vendor.activity.get');
  Route::post('vendor/activity','Vendors\VendorController@delete_vendor_activity')->name('vendor.activityDelete.post');
    
  //vendor bank details updates
  Route::get('vendor/bank-updates','Vendors\VendorController@get_bank_updates')->name('vendor.bankUpdates.get');
  Route::post('vendor/bank-updates','Vendors\VendorController@approve_bank_updates')->name('vendor.bankUpdatesApprove.post');

  //slider routes
	Route::resource('sliders', 'Slider\SliderController');
	Route::get('slider/delete/{id}', 'Slider\SliderController@delete_slider')->name('slider.delete');

  //Banner routes
  Route::resource('banners', 'Banner\BannerController');
  Route::get('ads-banners/create', 'Banner\BannerController@create_ads_banner')->name('ads-banner.create');
  Route::get('ads-banners', 'Banner\BannerController@ads_banner_index')->name('ads-banner.index');
  Route::get('banner/delete/{id}', 'Banner\BannerController@delete_banner')->name('banner.delete');

   //customers
   Route::resource('customers', 'Customers\CustomerController');

   //signup contents
   Route::resource('signup-contents', 'Auth\SignupContentsController');

   //coupons routes
   Route::resource('coupons', 'Coupons\CouponController');
   Route::get('coupon-delete/{id}', 'Coupons\CouponController@delete')->name('coupon.delete');
   Route::post('coupon-action', 'Coupons\CouponController@active_inactive')->name('coupon.activeInactive.post');
});

Route::get('add-variation','variation\VariationController@addVariation')->name('variations.addvariation');
Route::post('/get_subcategories/{id}','HomeController@getSubcategories');





