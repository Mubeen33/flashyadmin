<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;


class Product extends Model implements Feedable
{
	protected $fillable = [
		'title',
		'category_id',
		'description',
		'image_id',
		'made_by',
		'what_is_it',
		'made_date',
		'renewal',
		'product_type',
		'sku',
		'video_link',
		'approved',
		'rejected',
		'disable'
	];

    public function get_vendor(){
    	return $this->belongsTo('App\Vendor', 'vendor_id', 'id');
    }

    public function get_category(){
    	return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    public function get_images(){
    	return $this->hasMany('App\ProductMedia', 'image_id', 'image_id');
    }

    public function get_product_variations(){
    	return $this->hasMany('App\ProductVariation', 'product_id')->where('active', 1);
    }
    public function get_vendor_products(){
    	return $this->hasMany('App\VendorProduct', 'prod_id');
    }


    //feedable
 //    public function toFeedItem(): FeedItem
 //    {
 //        return FeedItem::create([
 //            'id' => $this->id,
 //            'title' => $this->title,
 //            'summary' => $this->description,
 //            'updated' => $this->created_at,
 //            'link' => route('admin.productDetails.get', encrypt($this->id)),
 //            'author' => $this->get_vendor->first_name,
 //        ]);
 //    }
 //    //get feeds
 //    public static function getProductsFeed()
	// {
	//    return Product::all();
	// }
}
