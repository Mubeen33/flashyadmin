<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Product;
use App\Category;
use App\Vendor;
use Carbon\Carbon;
use App\ProductMedia;
use App\CustomField;
use App\VendorProduct;
use App\Variation;
use App\ProductCustomfield;
use App\VariantOptionOptions;
use App\VariationOption;
use App\ProductVariation;

use Illuminate\Support\Collection;


class ProductController extends Controller
{
    public function get_pending_products(){
        $data = Product::where([
        			'approved'=>0,
                    'rejected'=>0,
                    'disable'=>0
        		])
        		->orderBy('id', 'DESC')
                ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                ->paginate(5);
        
        $vendors = Vendor::where('active', 1)
                    ->orderBy('first_name', 'ASC')
                    ->get();

        return view('product.pending-products', compact('data', 'vendors'));
    }

    //show details
    public function product_details_show($id){
    	$data = Product::where('id' , decrypt($id))
    			->first();
    	if (!$data) {
    		return abort(404);
    	}
        return view('product.show', compact('data'));
    }

    //approve product

    public function getProductApproval($id){

        $Id      = decrypt($id);
        $product = Product::where([
                            ['id','=',$Id],
                            ['approved','=',0]
                        ])
                        ->first();
        if (!$product) {
            return abort(404);
        }
        $currentCategory        = Category::where('id', $product->category_id)->first();
        $currentImages          = ProductMedia::where('image_id', $product->image_id)
                                    ->orderBy('created_at', 'ASC')
                                    ->get();
        //return $currentImages;
        $productCustomField     = ProductCustomfield::where('product_id',$Id)->first();
        $productVariations      = DB::table('product_variations')->where('product_id',$Id)->get();
        $first_variation_name   = ProductVariation::where('product_id',$Id)->value('first_variation_name');
        $first_variation_value  = DB::table('product_variations')->where('product_id',$Id)->select('first_variation_value')->distinct()->get();
        $second_variation_name  = ProductVariation::where('product_id',$Id)->value('second_variation_name');
        $second_variation_value  = DB::table('product_variations')->where('product_id',$Id)->select('second_variation_value')->distinct()->get();
        $variationList          = Variation::where('active',1)->get();

        $categories             = Category::where('deleted',0)->get();
      
       
        return view('product.approval-product', compact('product','productCustomField', 'currentCategory', 'currentImages','variationList','productVariations','second_variation_name','first_variation_name','first_variation_value','second_variation_value','categories'));
    }

    //
    public function getProductEdit($id){

        $id      = decrypt($id);
        $product = Product::where([
                            ['id','=',$id],
                            ['approved','=',1]
                        ])
                        ->first();
        if (!$product) {
            return abort(404);
        }
        $currentCategory        = Category::where('id', $product->category_id)->first();
        $currentImages          = ProductMedia::where('image_id', $product->image_id)
                                    ->orderBy('created_at', 'ASC')
                                    ->get();
        //return $currentImages;
        $productCustomField     = ProductCustomfield::where('product_id',$id)->first();
        $productVariations      = ProductVariation::where('product_id',$id)->get();
        $first_variation_name   = ProductVariation::where('product_id',$id)->value('first_variation_name');
        $first_variation_value  = DB::table('product_variations')->where('product_id',$id)->select('first_variation_value')->distinct()->get();
        $second_variation_name  = ProductVariation::where('product_id',$id)->value('second_variation_name');
        $second_variation_value = DB::table('product_variations')->where('product_id',$id)->select('second_variation_value')->distinct()->get();
        $variationList          = Variation::where('active',1)->get();
        $categories             = Category::where('deleted',0)->get();

       
        return view('product.edit-product', compact('product','productCustomField', 'currentCategory', 'currentImages','variationList','productVariations','second_variation_name','first_variation_name','first_variation_value','second_variation_value','categories'));
    }

    // 
    public function skuCombinations(Request $request){

        $options = Array();
        $variations = Array();
        $variantOne;
        $variantTwo;
        $count;
        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $my_str = implode('|', $request[$name]);

                array_push($options, explode(',', $my_str));
            }
        }
        if ($request->has('variation_name')) {
            
            $count        = count($request->variation_name);
            if ($count == 1) {
                
                    $variantOne   = $request->variation_name[0];
                    $variationOne = Variation::where('variation_name',$variantOne)->first();
            }
            else{

                $variantOne   = $request->variation_name[0];
                $variationOne = Variation::where('variation_name',$variantOne)->first();
                $variantTwo   = $request->variation_name[1];
                $variationTwo = Variation::where('variation_name',$variantTwo)->first();

            }
            

        }

        $combinations = combinations($options);
        if ($count == 1) {
            return view('product.partials.sku_combinations', compact('combinations','variationOne','count'));
        }else{

            return view('product.partials.sku_combinations', compact('combinations','variationOne','variationTwo','count'));
        }    
    } 


    //approve_product
    public function approve_product(Request $request,$id){

        $product = Product::find(decrypt($id));

        $isNewImageUploaded = ProductMedia::where([
            'image_id'=>$request->image_id
        ])->get();

        $isImagesUpdated = NULL;
        if (!$isNewImageUploaded->isEmpty()) {
            $isImagesUpdated = "Yes";
        }else{
            $isImagesUpdated = NULL;
        }
        // 
        $oldData = Product::where('id', decrypt($id))->first();
        if (!$oldData) {
            return redirect()->back()->with('error', 'SORRY - Requested Product Not Found.');
        }

        //update
        $updated = $oldData->update([
            'title'=>$request->title,
            'category_id'=>($request->category_id == null ? $oldData->category_id : $request->category_id),
            'description'=>$request->description,
            'image_id'=>($isImagesUpdated === "Yes" ? $request->image_id : $oldData->image_id),
            'product_type'=>$request->product_type,
            'sku'=>$request->sku,
            'width'=>$request->width,
            'hieght'=>$request->hieght,
            'length'=>$request->length,
            'warranty'=>$request->warranty,
            'video_link'=>$request->video_link,
            'approved'=> 1,
            'updated_at'=>Carbon::now()
            
        ]);
        // 
        $Id = decrypt($id);
        if ($request->has('variant_combinations')) {

            foreach ($request->variant_combinations as $key => $variantUpdate) {
                
                $productVariationsUpdate = ProductVariation::find($request->variant_id[$key]);

                $productVariationsUpdate->sku = $request->variant_sku[$key];
                if ($request->has('variant_image')) {
                    
                     $image = $request->file('variant_image')[$key];
        
                        $file_name=uniqid().(Auth::guard('vendor')->user()->id)."_300_".$image->getClientOriginalName();
                        //resize image
                        $image_resize = Image::make($image->getRealPath());              
                        $image_300 = $image_resize->resize(300, 300);
                        $image_300->save('product_images/'.$file_name);

                        $productVariationsUpdate->variant_image = url('/')."/product_images/".$file_name;
                }

                if ($request->has('active')) {
                    $productVariationsUpdate->active = $request->active[$key];
                }else{

                    $productVariationsUpdate->active = 0;
                }

                $productVariationsUpdate->save();       

            }
           $productVariants = ProductVariation::where('product_id',$Id)->get(); 
           foreach ($productVariants as $key => $vari) {
                
                if($vari->active == 1){
                    VendorProduct::insert([
                        'ven_id'=>$product->vendor_id,
                        'prod_id'=>$product->id,
                        'variation_id'=>$vari->id,
                        'quantity'=>0,
                        'mk_price'=>0,
                        'price'=>0
                    ]);
                }
            }
            return redirect()->route('admin.pendingProducts.get')->with('success', 'Product Approved'); 
        }else{

            if ($updated == true) {
            //update to vendor_products tbl
                VendorProduct::insert([
                    'ven_id'=>$product->vendor_id,
                    'prod_id'=>$product->id,
                    'quantity'=>0,
                    'mk_price'=>0,
                    'price'=>0
                ]);
                return redirect()->route('admin.pendingProducts.get')->with('success', 'Product Approved');
            }
            else{
                return redirect()->route('admin.pendingProducts.get')->with('error', 'Something went wrong.');
            }
        } 
    }

    //reject_product
    public function reject_product($id){
        $id = decrypt($id);
        $updated = Product::where('id', $id)->update([
            'approved'=>0,
            'disable'=>0,
            'rejected'=>1,
            'updated_at'=>Carbon::now()
        ]);
        if ($updated == true) {
            return redirect()->back()->with('success', 'Product Rejected');
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    //disable_product
    public function disable_product($id){
        $id = decrypt($id);
        $updated = Product::where('id', $id)->update([
            'approved'=>0,
            'disable'=>1,
            'rejected'=>0,
            'updated_at'=>Carbon::now()
        ]);
        if ($updated == true) {
            return redirect()->back()->with('success', 'Product Disabled');
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }



    //get all products
    public function get_all_products(){
        //except pending
        $data = Product::where([
                    'approved'=>1,
                    'rejected'=>0,
                    'disable'=>0
                ])
                ->orderBy('id', 'DESC')
                ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                ->paginate(5);
        
        $vendors = Vendor::where('active', 1)
                    ->orderBy('first_name', 'ASC')
                    ->get();
        return view('product.products', compact('data', 'vendors'));
    }

    // 
    // get Categories 

    public function getCategories(Request $request){

        if ($request->ajax()) {

            $searchKey = $request->search_key;

            $categories = Category::where("name", "LIKE", "%$searchKey%")->get();

            return view('product.partials.auto-category', compact('categories'))->render();
        }
    }

    // get getCustomFields

    public function getCustomFields(Request $request){

        if ($request->ajax()) {

            $categoryId   = $request->categoryId;
            $customFields = CustomField::where("category_id", $categoryId)->get();

            return view('product.partials.auto-customfields', compact('customFields'))->render();
        }
    }
    // 
    // product Images
    public function addProductImages(Request $request,$product_image_id) 
    {
        $image = $request->file('fileDropzone');
        
        $file_name=$product_image_id.'_'.$image->getClientOriginalName();
        $is_present=ProductMedia::where(['image'=>$file_name,'image_id'=>$product_image_id])->get();
        if(count($is_present) > 0){
            return;
        }
        if($image->move(public_path()."\product_images",$file_name)){
            $product_image = new ProductMedia;
            $product_image->image_id = $product_image_id;
            $product_image->image = url('/')."/product_images/".$file_name;
            $product_image->save();

            $success_message = array( 'success' => 200,
                'filename' => $file_name,
            );
            return json_encode($success_message);
        }
     }
     
     public function removeProductImage(Request $request) {
        ProductMedia::where('image', $request->name)->delete();
        $image_path = public_path()."\product_images/".$request->name;
        @unlink($image_path);
        return "Image deleted successfully";
     }



    //update product
    public function product__update(Request $request, $id){
        $isNewImageUploaded = ProductMedia::where([
            'image_id'=>$request->image_id
        ])->get();

        $isImagesUpdated = NULL;
        if (!$isNewImageUploaded->isEmpty()) {
            $isImagesUpdated = "Yes";
        }else{
            $isImagesUpdated = NULL;
        }

        $oldData = Product::where('id', decrypt($id))->first();
        if (!$oldData) {
            return redirect()->back()->with('error', 'SORRY - Requested Product Not Found.');
        }

        //update
        $updated = $oldData->update([
            'title'=>$request->title,
            'category_id'=>($request->category_id == null ? $oldData->category_id : $request->category_id),
            'description'=>$request->description,
            'image_id'=>($isImagesUpdated === "Yes" ? $request->image_id : $oldData->image_id),
            'made_by'=>$request->made_by,
            'what_is_it'=>$request->what_is_it,
            'made_date'=>$request->made_date,
            'renewal'=>$request->renewal,
            'product_type'=>$request->product_type,
            'sku'=>$request->sku,
            'video_link'=>$request->video_link,
            'updated_at'=>Carbon::now()
            
        ]);
        if ($updated == true) {
            return redirect()->back()->with('success', "Product updated successfully");
        }else{
            return redirect()->back()->with('error', "SORRY - Soomething went wrong, please try again later.");
        }

    }

    // Get Products Vendors 
    public function get_all_products_vendors($id){

        echo decrypt($id);
    }
    // 
    public function fetch__data(Request $request){
    	if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;
            $id = $request->id;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }
            

            if (!empty($request->search_key)) {
                //if have specific vendor ID
                if (!empty($id) && is_numeric($id)) {
                    $data1 = Product::where([
                                ['vendor_id', '=', $id],
                                ['approved', '=', 1],
                                ['rejected', '=', 0],
                                ['disable', '=', 0],
                            ])
                            ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                            ->whereHas('get_product_variations', function($q) use ($searchKey)
                            {
                                $q->where('active', '=', 1);
                                $q->where('first_variation_value', 'LIKE', '%'.$searchKey.'%');
                                $q->orWhere('second_variation_value', 'LIKE', '%'.$searchKey.'%');
                            })
                            ->orderBy($sort_by, $sorting_order)
                            ->get();

                    $data2 = Product::where([
                                ['vendor_id', '=', $id],
                                ['approved', '=', 1],
                                ['rejected', '=', 0],
                                ['disable', '=', 0],
                            ])
                            ->where("title", "LIKE", "%$searchKey%")
                            ->orWhere("created_at", "LIKE", "%$searchKey%")
                            ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                            ->orderBy($sort_by, $sorting_order)
                            ->get();
                    $data = $data1->merge($data2);
                    $data = (new Collection($data))->paginate_build_by_developer_rijan($row_per_page);

                    return view('product.partials.product-list', compact('data', 'id'))->render();
                }
                $data1 = Product::where([
                                ['approved', '=', 1],
                                ['rejected', '=', 0],
                                ['disable', '=', 0]
                            ])
                            ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                            ->whereHas('get_product_variations', function($q) use ($searchKey)
                            {
                                $q->where('active', '=', 1);
                                $q->where('first_variation_value', 'like', '%'.$searchKey.'%');
                                $q->orWhere('second_variation_value', 'like', '%'.$searchKey.'%');
                            })
                            ->orderBy($sort_by, $sorting_order)
                            ->get();
                $data2 = Product::where([
                                ['approved', '=', 1],
                                ['rejected', '=', 0],
                                ['disable', '=', 0]
                            ])
                            ->where("title", "LIKE", "%$searchKey%")
                            ->orWhere("created_at", "LIKE", "%$searchKey%")
                            ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                            ->orderBy($sort_by, $sorting_order)
                            ->get();

                $data = $data1->merge($data2);
                $data = (new Collection($data))->paginate_build_by_developer_rijan($row_per_page);
                return view('product.partials.product-list', compact('data', 'id'))->render();
                
            }

            //without search
                //if have specific vendor id
            if (!empty($id) && is_numeric($id)) {
                $data = Product::where([
                            ['vendor_id', '=', $id],
                            ['approved', '=', 1],
                            ['rejected', '=', 0],
                            ['disable', '=', 0]
                        ])
                        ->orderBy($sort_by, $sorting_order)
                        ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                        ->paginate($row_per_page );
                    return view('product.partials.product-list', compact('data'))->render();
            }

            $data = Product::where([
                        ['approved', '=', 1],
                        ['rejected', '=', 0],
                        ['disable', '=', 0]
                    ])
                    ->orderBy($sort_by, $sorting_order)
                    ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                    ->paginate($row_per_page );
                return view('product.partials.product-list', compact('data'))->render();
            
        }
        return abort(404);
    }

    public function pending_fetch__data(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;
            $id = $request->id;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            if (!empty($request->search_key)) {
                if (!empty($id) && is_numeric($id)) {
                    $data = Product::where([
                            ['vendor_id', '=', $id],
                            ['approved', '=', 0],
                            ['rejected', '=', 0],
                            ['disable', '=', 0]
                        ])
                        ->orderBy($sort_by, $sorting_order)
                        ->where("title", "LIKE", "%$searchKey%")
                        ->orWhere("created_at", "LIKE", "%$searchKey%")
                        ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                        ->paginate($row_per_page );
                        return view('product.partials.pending-product-list', compact('data', 'id'))->render();
                }
                $data = Product::where([
                            ['approved', '=', 0],
                            ['rejected', '=', 0],
                            ['disable', '=', 0]
                        ])
                        ->orderBy($sort_by, $sorting_order)
                        ->where("title", "LIKE", "%$searchKey%")
                        ->orWhere("created_at", "LIKE", "%$searchKey%")
                        ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                        ->paginate($row_per_page );
                        return view('product.partials.pending-product-list', compact('data', 'id'))->render();
                
                    
            }


            if (!empty($id) && is_numeric($id)) {
                $data = Product::where([
                        ['vendor_id', '=', $id],
                        ['approved', '=', 0],
                        ['rejected', '=', 0],
                        ['disable', '=', 0]
                    ])
                    ->orderBy($sort_by, $sorting_order)
                    ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                    ->paginate($row_per_page );
                return view('product.partials.pending-product-list', compact('data'))->render(); 
            }
            $data = Product::where([
                        ['approved', '=', 0],
                        ['rejected', '=', 0],
                        ['disable', '=', 0]
                    ])
                    ->orderBy($sort_by, $sorting_order)
                    ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                    ->paginate($row_per_page );
                return view('product.partials.pending-product-list', compact('data'))->render(); 
            
        }
        return abort(404);
    }
}
