<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
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

class ProductController extends Controller
{
    public function get_pending_products(){
        $data = Product::where([
        			'approved'=>0
        		])
        		->orderBy('id', 'DESC')
                ->paginate(5);
        
        $vendors = Vendor::where('active', 1)
                    ->orderBy('first_name', 'ASC')
                    ->get();

        return view('product.products', compact('data', 'vendors'));
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

        $id      = decrypt($id);
        $product = Product::where([
                            ['id','=',$id],
                            ['approved','=',0]
                        ])
                        ->first();
        if (!$product) {
            return abort(404);
        }
        $currentCategory = Category::where('id', $product->category_id)->first();
        $currentImages = ProductMedia::where('image_id', $product->image_id)
                                    ->orderBy('created_at', 'ASC')
                                    ->get();
        //return $currentImages;
        $productCustomField = ProductCustomfield::where('product_id',$id)->first();
       
        return view('product.approval-product', compact('product','productCustomField', 'currentCategory', 'currentImages'));
    }



    //approve_product
    public function approve_product($id){
        $product = Product::where('id', decrypt($id))->first();
        if (!$product) {
            return abort(404);
        }

        $updated = $product->update([
            'approved'=>1,
            'rejected'=>0,
            'disable'=>0,
            'updated_at'=>Carbon::now()
        ]);
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
        }else{
            return redirect()->route('admin.pendingProducts.get')->with('error', 'Something went wrong.');
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
        $data = Product::orderBy('id', 'DESC')
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


            //check status
            $field = NULL;
            $approved = "approved";
            $value_approved = NULL;

            $rejected = "rejected";
            $value_rejected = NULL;

            $disable = "disable";
            $value_disable = NULL;

            if ($status === "pending") {
                $field = 'pending';
                $value_approved = 0;
                $value_rejected = 0;
                $value_disable = 0;

            }elseif ($status === "rejected") {
                $field = 'rejected';
                $value_approved = 0;
                $value_rejected = 1;
                $value_disable = 0;
            }elseif ($status === "disabled") {
                $field = 'disabled';
                $value_approved = 0;
                $value_rejected = 0;
                $value_disable = 1;
            }elseif ($status === "approved") {
                $field = 'approved';
                $value_approved = 1;
                $value_rejected = 0;
                $value_disable = 0;
            }else{
                $field = "all";
            }

            if (!empty($request->search_key)) {
                //if have specific vendor ID
                if (!empty($id) && is_numeric($id)) {
                    if ($field !== "all") {
                        $data = Product::where('vendor_id', $id)
                        ->orderBy($sort_by, $sorting_order)
                        ->where([
                            $approved => $value_approved,
                            $rejected => $value_rejected,
                            $disable => $value_disable
                        ])
                        ->where("title", "LIKE", "%$searchKey%")
                        ->orWhere("created_at", "LIKE", "%$searchKey%")
                        ->paginate($row_per_page );
                        return view('product.partials.product-list', compact('data', 'id'))->render();
                    }else{
                        $data = Product::where('vendor_id', $id)
                        ->orderBy($sort_by, $sorting_order)
                        ->where("title", "LIKE", "%$searchKey%")
                        ->orWhere("created_at", "LIKE", "%$searchKey%")
                        ->paginate($row_per_page );
                        return view('product.partials.product-list', compact('data', 'id'))->render();
                    }
                    
                }

                //if not have specific vendor ID
                if ($field !== "all") {
                    $data = Product::where([
                        $approved => $value_approved,
                        $rejected => $value_rejected,
                        $disable => $value_disable
                    ])
                    ->where("title", "LIKE", "%$searchKey%")
                    ->orWhere("created_at", "LIKE", "%$searchKey%")
                    ->orderBy($sort_by, $sorting_order )
                    ->paginate($row_per_page );
                    return view('product.partials.product-list', compact('data'))->render();
                }

                $data = Product::where("title", "LIKE", "%$searchKey%")
                    ->orWhere("created_at", "LIKE", "%$searchKey%")
                    ->orderBy($sort_by, $sorting_order )
                    ->paginate($row_per_page );
                    return view('product.partials.product-list', compact('data'))->render();
                
            }

            //without search
                //if have specific vendor id
            if (!empty($id) && is_numeric($id)) {
                if ($field !== 'all') {
                    $data = Product::where([
                            'vendor_id'=>$id,
                            $approved => $value_approved,
                            $rejected => $value_rejected,
                            $disable => $value_disable
                        ])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page );
                    return view('product.partials.product-list', compact('data'))->render();
                }else{
                    $data = Product::where([
                            'vendor_id'=>$id,
                        ])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page );
                    return view('product.partials.product-list', compact('data'))->render();
                }
            }

            //if not have specific vendor id
            if ($field !== 'all') {
                $data = Product::where([
                        $approved => $value_approved,
                        $rejected => $value_rejected,
                        $disable => $value_disable
                    ])
                    ->orderBy($sort_by, $sorting_order)
                    ->paginate($row_per_page );
                return view('product.partials.product-list', compact('data'))->render();
            }else{
               $data = Product::orderBy($sort_by, $sorting_order)
                    ->paginate($row_per_page );
                return view('product.partials.product-list', compact('data'))->render(); 
            }
            
        }
        return abort(404);
    }
}
