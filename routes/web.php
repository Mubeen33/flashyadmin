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



Route::group(['as'=>'admin.', 'prefix'=>'admin', 'middleware' => ['auth']], function(){

	//vendors controller
	Route::resource('vendors', 'Vendors\VendorController');
	Route::get('new-vendors/requests','Vendors\VendorController@get_vendors_requests')->name("vendors.requests.get");
  Route::post('new-vendor/approve-account','Vendors\VendorController@vendor_account_approve')->name("vendor.approve_account.post");
  Route::post('new-vendor/update-pass','Vendors\VendorController@update_vendor_pass')->name("vendor.passUpdate.post");
  //ajax requests
  Route::get('vendors-ajax-pagination/fetch', 'Vendors\VendorController@fetch_paginate_data')->name('vendors.ajaxPgination');
  
  //add vendor
  Route::get('vendor-add', 'Vendors\VendorController@add_vendor_form')->name('vendor.addvendor.get');
  Route::post('vendor-add', 'Vendors\VendorController@add_vendor_post')->name('vendor.addvendor.post');


  //vendor activity
  Route::get('vendors-activity','Vendors\VendorController@vendors_activitities')->name("vendor.activities.get");
  Route::get('ajax/vendors-activity-list/fetch','Vendors\VendorController@vendors_activitities_ajax')->name('vendorsActityList.ajaxPgination');
  Route::get('vendor/activity/{vendorID}','Vendors\VendorController@vendor_actitvity')->name('vendor.activity.get');
  Route::post('vendor/activity','Vendors\VendorController@delete_vendor_activity')->name('vendor.activityDelete.post');
  Route::get('signle-vendor-activity-ajax/fetch','Vendors\VendorController@ajax_single_vendor_actitvity')->name('signleVendorActivity.ajaxPgination');
    
  //vendor bank details updates
  Route::get('vendor/bank-updates','Vendors\VendorController@get_bank_updates')->name('vendor.bankUpdates.get');
  Route::post('vendor/bank-updates','Vendors\VendorController@approve_bank_updates')->name('vendor.bankUpdatesApprove.post');
  Route::get('vendors-bankupdates-request-ajax/fetch','Vendors\VendorController@ajax__vendors_bank_updates_requet')->name('vendorsBankupdates.ajaxPgination');

  //slider routes
	Route::resource('sliders', 'Slider\SliderController');
	Route::get('slider/delete/{id}', 'Slider\SliderController@delete_slider')->name('slider.delete');
  Route::get('sliders-ajax-pagination/fetch', 'Slider\SliderController@fetch_paginate_data')->name('sliders.ajaxPgination');

  //Banner routes
  Route::resource('banners', 'Banner\BannerController');
  Route::get('ads-banners/create', 'Banner\BannerController@create_ads_banner')->name('ads-banner.create');
  Route::get('ads-banners', 'Banner\BannerController@ads_banner_index')->name('ads-banner.index');
  Route::get('banner/delete/{id}', 'Banner\BannerController@delete_banner')->name('banner.delete');

   //customers
   Route::resource('customers', 'Customers\CustomerController');
   Route::get('block-customers', 'Customers\CustomerController@block_customers_list')->name('blockedCustomers.get');
   Route::get('block-customer/{id}', 'Customers\CustomerController@block_customer')->name('blockCustomer');
   Route::get('show-block-customer/{id}', 'Customers\CustomerController@show_block_customer')->name('showBlockCustomer.get');
   Route::get('unblock-customer/{id}', 'Customers\CustomerController@unblock_customer')->name('unblockCustomer');
   Route::get('customers-ajax-pagination/fetch', 'Customers\CustomerController@fetch_paginate_data')->name('customers.ajaxPgination');

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

   //popup routes
   Route::resource('popup', 'Popup\PopupController');


   //products
   Route::get('products/pending-products', 'Products\ProductController@get_pending_products')->name('pendingProducts.get');
   // Route::get('product/approval','Products\ProductController@getProductApproval')->name('product.approval');
   Route::get('product/details/{id}', 'Products\ProductController@get_product_details')->name('productDetails.get');
   Route::get('product/approval/{id}', 'Products\ProductController@getProductApproval')->name('productControl.post');
   Route::get('product-approved/{id}', 'Products\ProductController@reject_product')->name('rejectProduct.post');
   Route::get('product-rejected/{id}', 'Products\ProductController@approve_product')->name('approveProduct.post');
   Route::get('ajax-get-category/fetch','Products\ProductController@getCategories');
   Route::get('ajax-get-category-customfields/fetch','Products\ProductController@getCustomFields');
<<<<<<< HEAD
   Route::get('products/ajax-pagination/fetch', 'Products\ProductController@fetch_paginate_pending_data')->name('products.ajaxPgination');
=======
   Route::post('add-product-images/{product_image_id}','Products\ProductController@addProductImages');
   Route::post('delete-product-image','Products\ProductController@removeProductImage');
   Route::get('products/ajax-pagination/fetch', 'Products\ProductController@fetch_paginate_data')->name('products.ajaxPgination');
>>>>>>> 26f8efad5c1a57ccbe04bc2590905596cb7891ff

  



  // General Route
  Route::post('get_subcategories/{id}','HomeController@getSubcategories')->name('subCategories.get');
  Route::post('get_categories_commission/{id}','HomeController@getCategoriesCommission')->name('subCategories.post');


  // brands Route
  Route::get('add-brand','HomeController@addBrands')->name('brands.addbrand');
  Route::get('brands-list','brand\BrandController@brandsList')->name('brands.brandslist');
  Route::get('brands','brand\BrandController@brandsList')->name('brands.brands');
  Route::get('disable-brands-list','brand\BrandController@disableBrandsList')->name('brands.disablebrandslist');
  Route::post('add-brand','brand\BrandController@createBrand')->name('addBrand.post');
  Route::get('brand-edit/{id}','brand\BrandController@editBrand')->name('brandEdit.get');
  Route::get('brand-disable/{id}','brand\BrandController@disableABrand')->name('disabledBrand.single');
  Route::post('update-brand','brand\BrandController@updateBrand')->name('updateBrand.post');
  Route::get('brand-active/{id}','brand\BrandController@activeBrand')->name('activeBrand.post');
  Route::get('brands-ajax-pagination/fetch', 'brand\BrandController@fetch_paginate_data')->name('brands.ajaxPgination');
  // 

  // Variation routes
  Route::get('add-variation','variation\VariationController@addVariation')->name('variations.addvariation');
  Route::post('submit-variation','variation\VariationController@createVariation')->name('addVariaton.post');
  Route::get('variations-list','variation\VariationController@variationsList')->name('variations.variationslist');
  Route::get('disable-variations-list','variation\VariationController@disableVariationsList')->name('variations.disablevariationslist');
  Route::get('variation-edit/{id}','variation\VariationController@editVariation')->name('variationEdit.get');
  Route::post('update-variation','variation\VariationController@updateVariation')->name('updateVariation.post');
  Route::get('variations-ajax-pagination/fetch','variation\VariationController@fetch_paginate_data')->name('variations.ajaxPagination');
  Route::get('variation-disable/{id}','variation\VariationController@disableAVariation')->name('variationDisable.post');
  Route::get('variation-active/{id}','variation\VariationController@activeVariation')->name('variationActive.post');

  // variant options
  Route::get('add-variations-options','variation\VariationController@addvariationsoption')->name('variations.addvariationsoption');
  Route::get('variations-options-list{id}','variation\VariationController@variationsOptionsList')->name('variations.variationsoptionslist');
  Route::post('submit-variation-option','variation\VariationController@createOption')->name('addVaritaionOption.post');
  Route::get('variation-option-edit/{id}','variation\VariationController@editOption')->name('variationOptionEdit.get');
  Route::post('update-variation-option','variation\VariationController@updateOption')->name('updateVariationOption.post');
  Route::get('variation-option-delete/{id}','variation\VariationController@deleteOption')->name('variationOptionDelete.post');
  Route::get('options-list/{id}','variation\VariationController@OptionsList');
  Route::get('option-edit/{id}','variation\VariationController@editOptionOptions')->name('optionEdit.get');
  Route::post('update-option','variation\VariationController@updateOptionOptions')->name('updateOption.post');
  Route::get('option-delete/{id}','variation\VariationController@deleteOptionOptions')->name('optionDelete.post');
  Route::get('add-options/{id}','variation\VariationController@addOption');
  Route::post('submit-option','variation\VariationController@createOptionOptions')->name('addOption.post');
  // End Variation Routes

  // Add Custom Fields

  Route::get('add-customfields','customfields\CustomfieldController@addCustomFieldsView')->name('addCustomField.get');
  Route::post('submit-customfield','customfields\CustomfieldController@createCustomFields')->name('addCustomField.post');
  Route::get('customfield-list','customfields\CustomfieldController@customFieldList')->name('customFieldList.get');
  
  // categories
  Route::get('add-category','category\CategoryController@index')->name('addCategory.get');
  Route::get('category-list','category\CategoryController@categoryList')->name('category.categorylist');
  Route::get('disable-categories-list','category\CategoryController@disablecategoryList')->name('category.disablecategoryList');
  Route::post('add-category','category\CategoryController@createcategory')->name('addCategory.post');
  Route::get('category-edit/{id}','category\CategoryController@editcategory')->name('categoryEdit.get');
  Route::post('update-category','category\CategoryController@updatecategory')->name('updateCategory.post');
  Route::get('category-active/{id}','category\CategoryController@activecategory')->name('categoryActive.post');
  Route::get('category-disable/{id}','category\CategoryController@disableAcategory')->name('categoryDisable.post');
  Route::Post('get_child','category\CategoryController@getChild')->name('get_child');
  Route::Post('getparent','category\CategoryController@getparent')->name('getparent');
  Route::get('categories-ajax-pagination/fetch','category\CategoryController@fetch_paginate_data')->name('categories.ajaxPgination');
  // End Categories


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


  // Route::get('/add-product', 'HomeController@addProduct');
});








