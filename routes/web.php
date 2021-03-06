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

Route::group(['domain' => 'http://mejensi.com/'], function(){
    Route::get('/other', function(){
      return "abc";
    })->name('others');
});

//feed
// Route::feeds();

Route::get('/{slug}', 'Pages\PagesController@show_custom_page')->name('custom-pages.show_custom_page');
Route::group(['as'=>'admin.', 'prefix'=>'admin', 'middleware' => ['auth']], function(){
Route::post('appearance_logo' , 'Appearances\AppearanceController@appearance_logo')->name('appearance_logo');

  //application
  Route::resource('site-maintenance', 'Application\SiteMaintenanceController');

    Route::resource('pages/quicklinks', 'Pages\QuickLinksController');
    Route::resource('pages/company', 'Pages\CompanyController');
    Route::resource('pages/business', 'Pages\BusinessController');

    Route::get('logo-settings' , 'Appearances\AppearanceController@index')->name('logo-settings');
Route::get('removelogo/{id}' , 'Appearances\AppearanceController@remove_logo')->name('removelogo');
    Route::get('cetegory-settings' , function(){

        return view('Appearance.categories_setting');
    })->name('cetegory-settings');

    Route::get('home-settings' , function(){
        return view('Appearance.home_settings');
    })->name('home-settings');

    Route::post('categories_update_status' , 'Appearances\HomeCategoryController@categories_update_status')->name('categories_update_status');

    Route::post('update_visibility' , 'Pages\QuickLinksController@update_visibility')->name('update_visibility');

    Route::post('update_positions' , 'Pages\QuickLinksController@update_positions')->name('update_positions');

    Route::post('preview-style' , 'Appearances\AppearanceController@change_preview')->name('preview-style');

    Route::resource('home-category', 'Appearances\HomeCategoryController');

	//vendors controller
	Route::resource('vendors', 'Vendors\VendorController');
	Route::get('vendors/pending/list', 'Vendors\VendorController@pending')->name('vendors.pending.list');
	Route::get('new-vendors/requests','Vendors\VendorController@get_vendors_requests')->name("vendors.requests.get");
  Route::post('new-vendor/approve-account','Vendors\VendorController@vendor_account_approve')->name("vendor.approve_account.post");
  Route::post('new-vendor/update-pass','Vendors\VendorController@update_vendor_pass')->name("vendor.passUpdate.post");
  Route::get('pending-vendors','Vendors\VendorController@get_pending_vendors')->name("pendingVendors.get");
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

  //Vendor Inventory Report
  Route::get('vendor/inventory/{vendorID}', 'Vendors\InventoryController@get_vendor_products')->name('vendorProducts.get');
  Route::get('ajax-vendor/inventory/fetch', 'Vendors\InventoryController@ajax_fetch_data')->name('vendorProducts.ajaxPgination');


  //Vendor Orders Report
  Route::get('vendor/orders/{vendorID}', 'Vendors\OrderReportController@get_vendor_orders')->name('vendorOrders.get');
  Route::get('ajax-vendor/orders/fetch', 'Vendors\OrderReportController@ajax_fetch_data')->name('vendorOrders.ajaxPgination');



  //auth pages
  Route::resource('auth-pages','Auth\PagesController');

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
  Route::get('banner-edit/{type}/{orderNo}', 'Banner\BannerController@edit_banner')->name('editBanner.get');
  Route::get('banner-edit/{id}', 'Banner\BannerController@edit_banner_with_id')->name('editBannerWithID.get');
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
   Route::get('products/pending-approval', 'Products\ProductController@pending_approval')->name('pendingApproval.get');
   Route::get('products/auto-approval', 'Products\ProductController@auto_approved')->name('autoApproved.get');

   Route::match(['get','post'],'products/view-product-details/{id}', 'Products\ProductController@viewProductDetails')->name('viewProductDetails');
   Route::match(['get','post'],'products/add-product','Products\ProductController@addProduct')->name('addProduct');
   Route::get('products/all', 'Products\ProductController@get_all_products')->name('allProducts.get');
   Route::get('product/vendors/{productID}/{product_variationID?}', 'Products\ProductController@get_product_all_vendors')->name('productVendors.get');
   Route::get('ajax-product-vendors', 'Products\ProductController@product_vendors_fetch')->name('searchProductVendorsURL.ajaxPgination');
   Route::get('ajax-product-vendor-assign', 'Products\ProductController@product_vendor_assign_fetch')->name('searchVendorsAssignURL.ajaxPgination');

   Route::get('product/show/{id}', 'Products\ProductController@product_details_show')->name('productDetails.get');
   Route::post('product/update/{id}', 'Products\ProductController@approve_product')->name('productUpdate.post');
   Route::get('product-approval/show/{id}', 'Products\ProductController@getProductApproval')->name('productControl.post');
   Route::get('product-edit/show/{id}', 'Products\ProductController@getProductEdit')->name('productEdit.post');
   Route::get('make-approved-product/{id}', 'Products\ProductController@approve_product')->name('approveProduct.post');
   Route::get('make-rejected-product/{id}', 'Products\ProductController@reject_product')->name('rejectProduct.post');
   Route::get('make-disable-product/{id}', 'Products\ProductController@disable_product')->name('disableProduct.post');
   Route::get('ajax-get-category/fetch','Products\ProductController@getCategories');
   Route::get('ajax-get-category-customfields/fetch','Products\ProductController@getCustomFields');
   Route::match(['get','post'],'ajax-category-find', 'Products\ProductController@ajax_category_find')->name("ajaxCategoryFind");

   Route::post('products/sku_combination','Products\ProductController@skuCombinations')->name('products.sku_combination');

   Route::post('add-product-images/{product_image_id}','Products\ProductController@addProductImages');
   Route::post('delete-product-image','Products\ProductController@removeProductImage');
   Route::get('products/ajax-pagination/fetch', 'Products\ProductController@fetch__data')->name('products.ajaxPgination');
   Route::get('pending-products/ajax-pagination/fetch', 'Products\ProductController@pending_fetch__data')->name('pendingProducts.ajaxPgination');

   //export products
   Route::get('export-products', function(){return abort(404);});
   Route::post('export-products', 'Products\ProductController@export_products_post')->name('productsExport.post');

   //product reviews
   Route::resource('product-reviews', 'Products\ProductReviewController');
   Route::get('show-product-reviews/{reivew_tbl_id}', 'Products\ProductReviewController@show_single_product_reviews')->name('showProductReviews.get');
   Route::get('ajax-product-reviews/fetch', 'Products\ProductReviewController@fetch_product_reviews')->name('productReivews.ajaxPgination');
   Route::get('single-product-reviews/fetch', 'Products\ProductReviewController@fetch_single_product_reviews')->name('reviews.ajaxPgination');



   //orders

   Route::resource('orders', 'order\OrderController');
   Route::get('order-status/{orderID}/{status}', 'order\OrderController@order_status_update')->name("orderAction.post");
   Route::get('ajax-orders/fetch', 'order\OrderController@fetch_orders_list')->name('orders.ajaxPgination');
   Route::get('order-detail/{id}','order\OrderController@orderDetial')->name('OrderDetail');
   Route::get('waybill-request-orders','order\OrderController@wayBillOrder')->name('orders.waybill-request');
   Route::get('waybill-order-detail/{id}','order\OrderController@wayBillOrderDetial')->name('wayBillOrderDetail');
   Route::post('attached-waybill','order\OrderController@attachedWayBill')->name('orders.attached-waybill');

   //

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
  Route::get('customfield-edit/{id}','customfields\CustomfieldController@edit_custom_field')->name('customFields.edit.get');
  Route::post('customfield-update/{id}','customfields\CustomfieldController@update_custom_field')->name('customFields.update.post');

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

  // Products Warranty
  Route::get('get-products-warranties','warranty\WarrantyController@index')->name('productWarranty.get');
  Route::get('add-product-warranty','warranty\WarrantyController@addProductsWarranty')->name('addProductsWarranty.get');
  Route::post('submit-product-warranty','warranty\WarrantyController@addNew')->name('addProductWarranty.post');
  Route::get('edit-warranty/{id}','warranty\WarrantyController@edit_warranty_get')->name('warranty.edit.get');
  Route::post('edit-warranty/{id}','warranty\WarrantyController@update_warranty_post')->name('warranty.edit.post');
  Route::get('delete-warranty/{id}','warranty\WarrantyController@delete_warranty')->name('warranty.delete');
  // Products Warranty

  Route::get('add-variation','variation\VariationController@addVariation')->name('variations.addvariation');
  Route::post('/get_subcategories/{id}','HomeController@getSubcategories');

  // Transactions

    Route::get('transaction','transaction\TransactionController@index')->name('transactions');


  //
  // files added by asad ..

  // order page ..
  Route::get("/test/order",function(){
    return view("order");
  });
  // order view page ..
  Route::get("/test/order/view",function(){
    return view("orderview");
  });

});








