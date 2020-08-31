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
Route::get('brands-ajax-pagination/fetch', 'brand\BrandController@fetch_paginate_data');
// 

// Variation routes
Route::get('add-variation','variation\VariationController@addVariation')->name('variations.addvariation');
Route::post('submit-variation','variation\VariationController@createVariation');
Route::get('variations-list','variation\VariationController@variationsList')->name('variations.variationslist');
Route::get('disable-variations-list','variation\VariationController@disableVariationsList')->name('variations.disablevariationslist');
Route::get('variation-edit/{id}','variation\VariationController@editVariation');
Route::post('update-variation','variation\VariationController@updateVariation');
Route::get('variations-ajax-pagination/fetch','variation\VariationController@fetch_paginate_data');
Route::get('variation-disable/{id}','variation\VariationController@disableAVariation');
Route::get('variation-active/{id}','variation\VariationController@activeVariation');

// variant options
Route::get('add-variations-options','variation\VariationController@addvariationsoption')->name('variations.addvariationsoption');
Route::get('variations-options-list','variation\VariationController@variationsOptionsList')->name('variations.variationsoptionslist');
Route::post('submit-variation-option','variation\VariationController@createOption');
Route::get('variation-option-edit/{id}','variation\VariationController@editOption');
Route::post('update-variation-option','variation\VariationController@updateOption');
Route::get('variation-option-delete/{id}','variation\VariationController@deleteOption');

// End Variation Routes

// Add Custom Fields

Route::get('add-customfields','customfields\CustomfieldController@addCustomFieldsView');
Route::post('submit-customfield','customfields\CustomfieldController@createCustomFields');
Route::get('customfield-list','customfields\CustomfieldController@customFieldList');
// categories
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
Route::get('categories-ajax-pagination/fetch','category\CategoryController@fetch_paginate_data');



// End Categories


Route::group(['as'=>'admin.', 'middleware' => ['auth']], function(){
	//vendors controller
	Route::resource('vendors', 'Vendors\VendorController');
	Route::get('new-vendors/requests','Vendors\VendorController@get_vendors_requests')->name("vendors.requests.get");
  Route::post('new-vendor/approve-account','Vendors\VendorController@vendor_account_approve')->name("vendor.approve_account.post");
  //ajax requests
  Route::get('vendors-ajax-pagination/fetch', 'Vendors\VendorController@fetch_paginate_data');


  //vendor activity
  Route::get('vendors-activity','Vendors\VendorController@vendors_activitities')->name("vendor.activities.get");
  Route::get('ajax/vendors-activity-list/fetch','Vendors\VendorController@vendors_activitities_ajax');
  Route::get('vendor/activity/{vendorID}','Vendors\VendorController@vendor_actitvity')->name('vendor.activity.get');
  Route::post('vendor/activity','Vendors\VendorController@delete_vendor_activity')->name('vendor.activityDelete.post');
  Route::get('signle-vendor-activity-ajax/fetch','Vendors\VendorController@ajax_single_vendor_actitvity');
    
  //vendor bank details updates
  Route::get('vendor/bank-updates','Vendors\VendorController@get_bank_updates')->name('vendor.bankUpdates.get');
  Route::post('vendor/bank-updates','Vendors\VendorController@approve_bank_updates')->name('vendor.bankUpdatesApprove.post');
  Route::get('vendors-bankupdates-request-ajax/fetch','Vendors\VendorController@ajax__vendors_bank_updates_requet');

  //slider routes
	Route::resource('sliders', 'Slider\SliderController');
	Route::get('slider/delete/{id}', 'Slider\SliderController@delete_slider')->name('slider.delete');
  Route::get('sliders-ajax-pagination/fetch', 'Slider\SliderController@fetch_paginate_data');

  //Banner routes
  Route::resource('banners', 'Banner\BannerController');
  Route::get('ads-banners/create', 'Banner\BannerController@create_ads_banner')->name('ads-banner.create');
  Route::get('ads-banners', 'Banner\BannerController@ads_banner_index')->name('ads-banner.index');
  Route::get('banner/delete/{id}', 'Banner\BannerController@delete_banner')->name('banner.delete');

   //customers
   Route::resource('customers', 'Customers\CustomerController');
   Route::get('customers-ajax-pagination/fetch', 'Customers\CustomerController@fetch_paginate_data');

   //signup contents
   Route::resource('signup-contents', 'Auth\SignupContentsController');

   //coupons routes
   Route::resource('coupons', 'Coupons\CouponController');
   Route::get('coupon-delete/{id}', 'Coupons\CouponController@delete')->name('coupon.delete');
   Route::post('coupon-action', 'Coupons\CouponController@active_inactive')->name('coupon.activeInactive.post');

   //email templates
   Route::resource('email-templates', 'emailTemplates\EmailTemplateController');
   Route::get('get-email-template', 'emailTemplates\EmailTemplateController@get_template');

   //deals routes
   Route::resource('vendor-deals', "Deals\DealController");
   Route::get('pending-deals', "Deals\DealController@get_pending_deals")->name('vendorDeals.pending.get');
   Route::get('pending-deals-approve/{id}', "Deals\DealController@approve_deal")->name('vendor.deal.approve');
});




Route::get('add-variation','variation\VariationController@addVariation')->name('variations.addvariation');
Route::post('/get_subcategories/{id}','HomeController@getSubcategories');
// files added by asad ..
Route::get("/test/page",function(){
    return view("vendors");
});
// order page ..
Route::get("/test/order",function(){
  return view("order");
});
// order view page ..
Route::get("/test/order/view",function(){
  return view("orderview");
});



