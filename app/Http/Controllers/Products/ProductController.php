<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Exports\ProductsExport;
use App\Product;
use App\Category;
use App\brand;
use App\Vendor;
use Carbon\Carbon;
use App\ProductMedia;
use App\CustomField;
use App\VendorProduct;
use App\Variation;
use App\ProductCustomfield;
use App\VariantOptionOptions;
use App\ProductOtherCategory;
use App\VariationOption;
use App\ProductVariation;
use PDF;
use Excel;
use Response;

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
                            ['approved','=',0],
                            ['rejected','=',0],
                            ['disable','=',0]
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
        $product_other_categories     = ProductOtherCategory::where('product_id',$Id)->first();
        $productVariations      = DB::table('product_variations')->where('product_id',$Id)->get();
        $first_variation_name   = ProductVariation::where('product_id',$Id)->value('first_variation_name');
        $first_variation_value  = DB::table('product_variations')->where('product_id',$Id)->select('first_variation_value')->distinct()->get();
        $second_variation_name  = ProductVariation::where('product_id',$Id)->value('second_variation_name');
        $second_variation_value  = DB::table('product_variations')->where('product_id',$Id)->select('second_variation_value')->distinct()->get();
        $variationList          = Variation::where('active',1)->get();

        $categories             = Category::where('deleted',0)->get();
        
        return view('product.approval-product', compact('product','productCustomField', 'currentCategory', 'currentImages','variationList','productVariations','second_variation_name','first_variation_name','first_variation_value','second_variation_value','categories', 'product_other_categories'));
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
            return view('product.partials.update_product.sku_combinations', compact('combinations','variationOne','count'));
        }else{

            return view('product.partials.update_product.sku_combinations', compact('combinations','variationOne','variationTwo','count'));
        }    
    } 
    // 
    public function getWarranty(Request $request){

        if ($request->ajax()) {

            $categoryId   = $request->categoryId;
            $productWarranty = ProductWarranty::where("category_id", $categoryId)->first();

            return view('product.partials.auto-warranty', compact('productWarranty'))->render();
        }
    }

    public function ajax_category_find(Request $request){
        if(!empty($_GET)){
         $data['category'] = Category::where("parent_id", $_GET['id'])->get();
         $data['cat_count'] = $_GET['cat_count'];
         if(empty(count($data['category']))){
             $category_veriation = Variation::where("category_id", $_GET['id'])->first();
             $categoryVer='no';
             if(!empty($category_veriation->category_id)){
                 $categoryVer='yes';
             }
              $responseData=array(
                     'veriant' => $categoryVer,
                     'catID' => '<input class="alldiv" type="hidden" name="cate_id[]" value="'.$_GET['id'].'" >'
                 );
                 
             return $responseData;
         }
         else{
             
             $data['category_id'] = $_GET['id'];
             return view('product.partials.update_product.ajax-category-select',$data);
 
         }
        }else{
            return null;
        }
          
     }
     
// addProduct title,categories and customfields start
private function addProductTitle($request){
    $brand=null;
     if(!empty($request->input('brand'))){
         $brand=decrypt($request->input('brand'));
     }
     $product               = new Product();
     $newSlug               = Str::slug($request->input('title'), '-');
     $product->title        = $request->input('title');
     $product->sku          = $request->sku;
     $product->brand_id     = $brand;
     $product->image_id     = $request->input('image_id');
     $product->slug         = $newSlug.'-'.$this->uniqueSlug();
     $product->vendor_id    = Auth::id();
     $product->submission_id    =  $this->randomid();     
         if($product->save()){
             $Id=$product->id;
             $request->session()->put('add_pro_img_id', $Id);
          $responseData=array( 
                 'product_id' => encrypt($Id),
                 'msg' => 'Product Created Successfully'
             );
         }else{
             $responseData=array(
                 'product_id' => '',
                 'msg' => 'Product Not Created Successfully'
             );
         }
         
    
       
    
     return json_encode($responseData);
    
     
}
// addProduct title,categories and customfields end 
// addProduct title,categories and customfields start
private function addProductCategory($request){
    //  echo '<pre>';
    //  print_r($request->all());
    //  exit;
        $category=array();    
        $category_id=null;
        if(!empty($request->input('cate_id'))){
            $category=$request->input('cate_id');
            $category_id=array_values(array_slice($request->input('cate_id'), -1))[0];
       
        }
        
            
            $Id=$this->getProductID($request->input('productId'));
            $product = Product::where('id',$Id)->first();
            $product->category_id        = json_encode($category);
            if($product->save()){
           
            //custome fields start
             if ($request['element_0']) {
                    
                    $data = array();
                    $i = 0;
                    
                    foreach (json_decode(CustomField::where('category_id', $category_id)->first()->options) as $key => $element) {
                        
                        $item = array();
                        if ($element->type == 'text') {
                            $item['type'] = 'text';
                            $item['label'] = $element->label;
                            $item['value'] = $request['element_'.$i];
                        }
                        elseif ($element->type == 'select' || $element->type == 'radio') {
                            $item['type'] = 'select';
                            $item['label'] = $element->label;
                            $item['value'] = $request['element_'.$i];
                        }
                        elseif ($element->type == 'multi_select') {
                            $item['type'] = 'multi_select';
                            $item['label'] = $element->label;
                            $item['value'] = json_encode($request['element_'.$i]);
                        }
                        elseif ($element->type == 'file') {
                            $item['type'] = 'file';
                            $item['label'] = $element->label;
                            $item['value'] = $request['element_'.$i]->move('product_images/media',$request['element_'.$i]);
                        }
                        array_push($data, $item);      
                        $i++;
                    }

                    $productCustomFields = new ProductCustomField();
                    $productCustomFields->product_id = $Id;
                    $productCustomFields->customfields = json_encode($data);
                    $productCustomFields->save();
                }

                $responseData=array(

                    'product_id' => encrypt($Id),
                    'msg' => 'Category Created Successfully'
                );
            }else{
                $responseData=array(
                    'product_id' => encrypt($Id),
                    'msg' => 'Category Not Created Successfully'
                ); 
            }
            
    
       
       
        return json_encode($responseData);
       
        
}
// addProduct title,categories and customfields end
 //update current product code start
 private function updateCurrentProduct($request){
     
    $brand=null;
    if(!empty($request->input('brand'))){
        $brand=decrypt($request->input('brand'));
    }
   
        $prodID=$this->getProductID($request->input('productId'));
        $product = Product::where('id',$prodID)->first();
        $newSlug=Str::slug($request->input('title'), '-');
        
        $product->title        = $request->input('title');
        $product->image_id     = $request->input('image_id');
        $product->sku= $request->sku;
       // $product->category_id  = $category;
        $product->brand_id  = $brand;
        $product->slug         = $newSlug.'-'.$this->uniqueSlug();
        $product->save();
        $responseData=array(

            'product_id' => encrypt($prodID),
            'msg' => 'Product Updated Successfully'
        );
       
        return json_encode($responseData);
       
     
}  
//update current product code end
//update product action
public function viewProductDetails(){

    
    return view('product.view-product-details');

    }

 //main addproduct action
 public function addProduct(Request $request){
   
    // $product->product_type = $request->product_type;
   
   //  title,category and custom fields form data submit
      if(!empty($request->input('action')) && $request->input('action')=='titleForm' && empty($request->input('productId')) && $request->input('productId')=='')
      {
         $validator = Validator::make($request->all(), [
             'title' => 'required|max:80|min:10',
             ]);
         if($validator->fails()){
             $allErorrs=$validator->errors();
             $responseData=array(
                 'titleError'=>$allErorrs->first('title'),
                 'msg' => 'Product Not Updated'
             );
             return json_encode($responseData);
         }else{
             return $this->addProductTitle($request);
         }
         
        
   
      }

      //update category title and custom fields
     if(!empty($request->input('action')) && $request->input('action')=='titleForm' && !empty($request->input('productId')) && $request->input('productId')!='')
     {   
         $validator = Validator::make($request->all(), [
             'title' => 'required|max:80|min:10',   
         ]);
         if($validator->fails()){
             $allErorrs=$validator->errors();
             $responseData=array(
                 'titleError'=>$allErorrs->first('title'),
                 'msg' => 'Product Not Updated'
             );
             return json_encode($responseData);
         }else{
         return $this->updateCurrentProduct($request);
         }   
     }
    
     //product category start
     if(!empty($request->input('action')) && $request->input('action')=='categoryForm' && !empty($request->input('cate_id')) && !empty($request->input('productId')))
     { 
            
         return $this->addProductCategory($request);
     }
    //product category
     //Description add or update here
     
     if(!empty($request['action']) && $request['action']=='descriptionfrm' && !empty($request['description']) && !empty($request['productId']))
     {
         
         $prodID=$this->getProductID($request['productId']);
         $product = Product::where('id',$prodID)->first();
         $product->description  = $request['description'];
         $product->whats_in_box  = $request['whatsbox'];
         if($product->save()){
             $responseData=array(
 
                 'product_id' => encrypt($prodID),
                 'msg' => 'Product Description Updated Successfully'
             );
            
             return json_encode($responseData);
         }else{
             $responseData=array(
                 'product_id' => encrypt($prodID),
                 'msg' => 'Product Description Not Updated'
             );
            
             return json_encode($responseData);
         }
     }


    
     //inventory submit or update here
     if(!empty($request->input('action')) && $request->input('action')=='choice_form' && !empty($request->input('productId')) && $request->input('productId')!='')
     {
         return $this->inventorysData($request);
     } 
        
     //veriations submit or update here
     if(!empty($request->input('action')) && $request->input('action')=='variations_form' && !empty($request->input('productId')) && $request->input('productId')!='')
     {
         return $this->veriationsData($request);
     }
   
       
    //Exit listing here
  
    if(!empty($request->input('action')) && $request->input('action')=='exitListing' && !empty($request->input('productId')) && $request->input('productId')!='')
      {
         
        return $this->exitListing($request);
        
         
      }
     
 }
 protected function exitListing($request){
    $prodID=$this->getProductID($request->input('productId'));
    $productStatus=false;
    $customFieldsStatus=false;
    $variationStatus=false;
    $vendor_id=Auth::guard('vendor')->user()->id;
    //delete product 
    
    $product = Product::where(['id'=> $prodID,'vendor_id'=> $vendor_id])->first();
   
    if(!empty($product->id)){
        if(Product:: where(['id'=> $prodID,'vendor_id'=> $vendor_id])->delete())
        {
            $productStatus=true;

            //delete custom fields
            $customFields = ProductCustomField::where('product_id',$prodID)->first();
            if(!empty($customFields->product_id)){
                ProductCustomField:: where('product_id',$prodID)->delete();
                $customFieldsStatus=true;

                // //if veriations created than delete
      
                $productVeriant = ProductVariation::where('product_id',$prodID)->first();
                if(!empty($productVeriant->product_id)){
                    ProductVariation:: where('product_id',$prodID)->delete();
                    $variationStatus=true;
                }
            }
            $imagePath='product_images/product_'.$prodID;
            $path = public_path($imagePath);
            if(File::isDirectory($path)){
                File::deleteDirectory($path);
            }
            $responseData=array(
                'productStatus'=> $productStatus,
                'customFieldsStatus'=> $customFieldsStatus,
                'variationStatus'=> $variationStatus,
                'msg' => 'Product deleted'
            );
        }else{
            $responseData=array(
                'productStatus'=> $productStatus,
                'customFieldsStatus'=> $customFieldsStatus,
                'variationStatus'=> $variationStatus,
                'msg' => 'Product not deleted'
            );
        }
        
    }else{
        $responseData=array(
            'productStatus'=> $productStatus,
            'customFieldsStatus'=> $customFieldsStatus,
            'variationStatus'=> $variationStatus,
            'msg' => 'Product not deleted'
        );
    }
    
    
if(!empty($request->session()->get('add_pro_img_id'))){
   $request->session()->forget('add_pro_img_id');    
 }
   

return json_encode($responseData);
}

//veriations data
protected function inventorysData($request){
    
    $prodID=$this->getProductID($request->input('productId'));
   
           $validator = Validator::make($request->all(), [
              
               'width' =>  'required|numeric|max:100000|min:1',
               'hieght' => 'required|numeric|max:100000|min:1',
               'length' => 'required|numeric|max:100000|min:1',
               'weight' => 'required|numeric|max:100000|min:1',
              
           ]);
           if($validator->fails()){
               $allErorrs=$validator->errors();
               $responseData=array(
                   
                   'width' =>$allErorrs->first('width'),
                   'hieght' => $allErorrs->first('hieght'),
                   'length' => $allErorrs->first('length'),
                   'weight' => $allErorrs->first('weight'),
                  
               );
               return json_encode($responseData);
           }else{
         
           $product = Product::where('id',$prodID)->first();
          
          
           $product->width= $request->width;
           $product->hieght= $request->hieght;
           $product->length= $request->length;
           $product->weight= $request->weight;
           if($product->save()){
            if ($request->has('variation_name')) {
                 
                $count= count($request->variation_name);
                if ($count == 1) {
                    //check veratrine available or not
                    $productVeriant = ProductVariation::where('product_id',$prodID)->first();
                   
                    if(!empty($productVeriant->product_id)){
                        ProductVariation:: where('product_id',$prodID)->delete();
                    }
                        
                    foreach ($request->variant_combinations as $key => $value) {
                        
                        $productVariations = new ProductVariation();
    
                        $productVariations->first_variation_name  = $request->variation_name[0];
                        $productVariations->first_variation_value = $request->variant_combinations[$key];
                        $productVariations->sku                   = $request->variant_sku[$key];
                        $productVariations->product_id            = $prodID;
    
                        if ($request->has('variant_image')) {
                            
                            $image = $request->file('variant_image')[$key];
            
                            $file_name=uniqid().(Auth::guard('vendor')->user()->id).$image->getClientOriginalName();
                            //resize image
                            $image_resize = Image::make($image->getRealPath());              
                            $imageSizes=array('1200','600','300');
                            $imagePath='product_images/product_'.$prodID;
                            $path = public_path($imagePath);
                            if(!File::isDirectory($imagePath)){
                               File::makeDirectory($path, 0777, true, true);
                               if(!File::isDirectory($imagePath.'/variant_image')){
                                 File::makeDirectory($path.'/variant_image', 0777, true, true);
                                 for($i=0;$i<count($imageSizes);$i++){
                                     $file_nameRenew=$imageSizes[$i].'_'.$file_name;
                                     $image = $image_resize->resize($imageSizes[$i], $imageSizes[$i]);
                                     $image->save($imagePath.'/variant_image/'. $file_nameRenew);
                                   }
                                   $image->save($imagePath.'/variant_image/'. $file_name);
                               }else{
                                 for($i=0;$i<count($imageSizes);$i++){
                                     $file_nameRenew=$imageSizes[$i].'_'.$file_name;
                                     $image = $image_resize->resize($imageSizes[$i], $imageSizes[$i]);
                                     $image->save($imagePath.'/variant_image/'. $file_nameRenew);
                                   }
                               }
                              
                               
                             }else{
                                 if(!File::isDirectory($imagePath.'/variant_image')){
                                     File::makeDirectory($path.'/variant_image', 0777, true, true);
                                     for($i=0;$i<count($imageSizes);$i++){
                                         $file_nameRenew=$imageSizes[$i].'_'.$file_name;
                                         $image = $image_resize->resize($imageSizes[$i], $imageSizes[$i]);
                                         $image->save($imagePath.'/variant_image/'. $file_nameRenew);
                                       }
                                   }else{
                                     for($i=0;$i<count($imageSizes);$i++){
                                         $file_nameRenew=$imageSizes[$i].'_'.$file_name;
                                         $image = $image_resize->resize($imageSizes[$i], $imageSizes[$i]);
                                         $image->save($imagePath.'/variant_image/'. $file_nameRenew);
                                       }
                                   }
                             }
                            $productVariations->variant_image = url('/').$imagePath.'/variant_image/'.$file_name;
                        }
                         
                        $productVariations->save();
                        
    
                    }
                }
                if ($count == 2) {
                    $productVeriant = ProductVariation::where('product_id',$prodID)->first();
                   
                    if(!empty($productVeriant->product_id)){
                        ProductVariation:: where('product_id',$prodID)->delete();
                    }
                    foreach ($request->variant_combinations as $key => $value) {
                        
                        $variants = $request->variant_combinations[$key];
                        $variants = explode("-",$variants);
                        $first_variation_value = $variants[0];
                        $second_variation_value = $variants[1];
    
                        $productVariations = new ProductVariation();
    
                        $productVariations->first_variation_name   = $request->variation_name[0];
                        $productVariations->first_variation_value  = $first_variation_value;
                        $productVariations->second_variation_name  = $request->variation_name[1];
                        $productVariations->second_variation_value = $second_variation_value;
                        $productVariations->sku                    = $request->variant_sku[$key];
                        $productVariations->product_id             = $prodID;
    
                        if ($request->has('variant_image')) {
                            
                         $image = $request->file('variant_image')[$key];
         
                         $file_name=uniqid().(Auth::guard('vendor')->user()->id).$image->getClientOriginalName();
                         //resize image
                         $image_resize = Image::make($image->getRealPath());              
                         $imageSizes=array('1200','600','300');
                         $imagePath='product_images/product_'.$prodID;
                         $path = public_path($imagePath);
                         if(!File::isDirectory($imagePath)){
                            File::makeDirectory($path, 0777, true, true);
                            if(!File::isDirectory($imagePath.'/variant_image')){
                              File::makeDirectory($path.'/variant_image', 0777, true, true);
                              for($i=0;$i<count($imageSizes);$i++){
                                  $file_nameRenew=$imageSizes[$i].'_'.$file_name;
                                  $image = $image_resize->resize($imageSizes[$i], $imageSizes[$i]);
                                  $image->save($imagePath.'/variant_image/'. $file_nameRenew);
                                }
                                $image->save($imagePath.'/variant_image/'. $file_name);
                            }else{
                              for($i=0;$i<count($imageSizes);$i++){
                                  $file_nameRenew=$imageSizes[$i].'_'.$file_name;
                                  $image = $image_resize->resize($imageSizes[$i], $imageSizes[$i]);
                                  $image->save($imagePath.'/variant_image/'. $file_nameRenew);
                                }
                            }
                           
                            
                          }else{
                              if(!File::isDirectory($imagePath.'/variant_image')){
                                  File::makeDirectory($path.'/variant_image', 0777, true, true);
                                  for($i=0;$i<count($imageSizes);$i++){
                                      $file_nameRenew=$imageSizes[$i].'_'.$file_name;
                                      $image = $image_resize->resize($imageSizes[$i], $imageSizes[$i]);
                                      $image->save($imagePath.'/variant_image/'. $file_nameRenew);
                                    }
                                }else{
                                  for($i=0;$i<count($imageSizes);$i++){
                                      $file_nameRenew=$imageSizes[$i].'_'.$file_name;
                                      $image = $image_resize->resize($imageSizes[$i], $imageSizes[$i]);
                                      $image->save($imagePath.'/variant_image/'. $file_nameRenew);
                                    }
                                }
                          }
                         $productVariations->variant_image = url('/').$imagePath.'/variant_image/'.$file_name;
                     }
    
                        $productVariations->save();
                        
    
                    }
                }
            }
                   $responseData=array(
   
                       'product_id' => encrypt($prodID),
                       'msg' => 'Product Inventory Updated Successfully'
                   );
                   return json_encode($responseData);
               
               }else{
               $responseData=array(
   
                   'product_id' => encrypt($prodID),
                   'msg' => 'Product Inventory Not Updated'
               );
              
               return json_encode($responseData);
           }
          }
}

// //veriations data
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

        //manage other categories
        if (!empty($request->categories)) {
            if (is_array($request->categories)) {
                if (ProductOtherCategory::where('product_id', decrypt($id))->exists()) {
                    //update
                    ProductOtherCategory::where('product_id', decrypt($id))->update([
                        'other_categories'=>json_encode($request->categories)
                    ]);
                }else{
                    //insert
                    ProductOtherCategory::insert([
                        'product_id'=>decrypt($id),
                        'other_categories'=>json_encode($request->categories),
                        'created_at'=>Carbon::now()
                    ]);
                }
            }else{
                return redirect()->back()->with('error', 'Invalid Product Other Categories Data.');
            }
            
        }else{
            if (ProductOtherCategory::where('product_id', decrypt($id))->exists()) {
                //update
                ProductOtherCategory::where('product_id', decrypt($id))->update([
                    'other_categories'=>NULL
                ]);
            }
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
                    if(isset($request->active[$key])){
                        
                        $productVariationsUpdate->active = $request->active[$key];
                    }else{

                        $productVariationsUpdate->active = 0;
                    }
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
                ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations', 'get_vendor_products'])
                ->paginate(5);

        $vendors = Vendor::where('active', 1)
                    ->orderBy('first_name', 'ASC')
                    ->get();
        return view('product.products', compact('data', 'vendors'));
    }
    //start all pending approval products
    public function pending_approval(){
      
        return view('product.pending-for-approval');
        
    }
     //end all pending approval products


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

    		return view('product.partials.update_product.auto-customfields', compact('customFields'))->render();
    	}
    }
    // 
    // ajax-get-variant-options

    public function getVariationsOptions(Request $request){

    	if ($request->ajax()) {

    		$variation_id  = $request->variation_id;
    		$variationName = Variation::where('id',$variation_id)->value('variation_name');
    		$options       = VariationOption::where('variation_id',$variation_id)->where('active',1)->get();

			$variationList = Variation::where('active',1)->get();
			
			return response()->json(array(
				'second_variations' => $options,
				'variationName' => $variationName,
				'variationList' => $variationList
			));

    		//return view('product.partials.auto-variantOptions', compact('options','variationName','variationList'))->render();

    	}

    } 

    //
    
    // getSecondVariationsOptions

    public function getSecondVariationsOptions(Request $request){

    		$variation_id  = $request->variation_id;
    		$variationName = Variation::where('id',$variation_id)->value('variation_name');
    		$options       = VariationOption::where('variation_id',$variation_id)->where('active',1)->get();

    		$variationList = Variation::where('active',1)->get();
            return view('product.partials.auto-variantOptions2', compact('options','variationName','variationList'))->render();
    }


    public function getThirdVariationsOptions(Request $request) {
        $variation_id  = $request->variation_id;
        $variation = DB::table('variant_options_options')->where('option_id', $variation_id)->get();
        return response()->json(array(
            'variation3' => $variation
        ));
    }
    //
    // product Images
    public function addProductImages(Request $request,$product_image_id) 
	{
        $product_image_id=$request->session()->get('add_pro_img_id');
        
        $validate = Validator::make($request->all(), [
            'fileDropzone'=>'required|image|mimes:png,jpeg,jpg,gif,webp'
        ]);
        if ($validate->fails()) {
            return response()->json('Please upload valid image', 422);
        }
		
        $image = $request->file('fileDropzone');
		
		$file_name=uniqid().(Auth::guard('vendor')->user()->id).$product_image_id.$image->getClientOriginalName();
		$is_present=ProductMedia::where(['image'=>$file_name,'image_id'=>$product_image_id])->get();
		
        if(count($is_present) > 0){
			return;
		}

       
      ///new code start
      $image_resize = Image::make($image->getRealPath());              
      $imageSizes=array('1200','600','300');
      $imagePath='product_images/product_'.$product_image_id;
      $path = public_path($imagePath);
      if(!File::isDirectory($imagePath)){
         File::makeDirectory($path, 0777, true, true);
            for($i=0;$i<count($imageSizes);$i++){
               $file_nameRenew=$imageSizes[$i].'_'.$file_name;
               $image = $image_resize->resize($imageSizes[$i], $imageSizes[$i]);
               $image->save($imagePath.'/'. $file_nameRenew);
             }
             $image->save($imagePath.'/'. $file_name);
         }else{    
            for($i=0;$i<count($imageSizes);$i++){
                $file_nameRenew=$imageSizes[$i].'_'.$file_name;
                $image = $image_resize->resize($imageSizes[$i], $imageSizes[$i]);
                $image->save($imagePath.'/'. $file_nameRenew);
              }
              $image->save($imagePath.'/'.$file_name);
         }
         
           
		$product_image = new ProductMedia;
		$product_image->image_id = $product_image_id;
		$product_image->image = url('/').$imagePath.'/'.$file_name;
		$product_image->save();
        //new code end
		$success_message = array('success'=>200,
			'filename' => $file_name,
		);
		return json_encode($success_message);
		
	 }
     
     public function removeProductImage(Request $request) {
        $product_image_id=$request->session()->get('add_pro_img_id');
        
        ProductMedia::where('image', $request->name)->delete();
        $imageSizes=array('1200','600','300');
        for($i=0;$i<count($imageSizes);$i++){
            $image_path = public_path()."/product_images/product_".$product_image_id.'/'.$imageSizes[$i].'_'.$request->name;
            @unlink($image_path);
        }
		$image_path = public_path()."/product_images/product_".$product_image_id.'/'.$request->name;
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
    public function get_product_all_vendors($product_id, $variationID=NULL){
        //referer id is product id of products tbl
        //get product
        $ven_product = NULL;
        $ven_product = VendorProduct::where([
                ['prod_id', '=', decrypt($product_id)],
                ['variation_id', '!=', NULL]
            ])
            ->with('get_product', 'get_variation')
            ->first();

        if (!$ven_product) {
            $ven_product = VendorProduct::where([
                ['prod_id', '=', decrypt($product_id)],
            ])
            ->with('get_product', 'get_variation')
            ->first();
        }

        if (!$ven_product) {
            return "No Vendor Selling This Product - Means Product is not found in vendor_products tbl";
        }
        //get vendors
        $product_vendors = VendorProduct::where('prod_id', decrypt($product_id))
                        ->with(['get_vendor', 'get_variation'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);

        $product_vendors_all = VendorProduct::where('prod_id', decrypt($product_id))
                        ->with(['get_vendor', 'get_variation'])
                        ->orderBy('created_at', 'desc')
                        ->get();

        
        $total_vendors = [];
        $total_active_vendors = [];

        foreach ($product_vendors_all as $key => $value) {
            $total_vendors[] = $value->ven_id;
            if ($value->active == 1) {
                $total_active_vendors[] = $value->ven_id;
            }
        }
        $total_vendors = array_unique($total_vendors);
        $total_active_vendors = array_unique($total_active_vendors);
        
        $vendors = Vendor::where('active', 1)->orderBy('first_name', 'ASC')->paginate(5);
        return view('product.show-product-vendors', compact('ven_product', 'product_vendors', 'total_vendors', 'total_active_vendors', 'vendors', 'product_id', 'variationID'));
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
                                ['approved', '=', $status],
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
                                ['approved', '=', $status],
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
                                ['approved', '=', $status],
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
                                ['approved', '=', $status],
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
                $data = Product::orderBy($sort_by, $sorting_order)
                        ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations'])
                        ->paginate($row_per_page );
                    return view('product.partials.product-list', compact('data'))->render();
            }

            $data = Product::where([
                        ['approved', '=', $status],
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


    public function product_vendors_fetch(Request $request){

    }

    public function product_vendor_assign_fetch(Request $request){
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
                $vendors = Vendor::where('active', 1)
                            ->orderBy('first_name', 'ASC')
                            ->paginate(5);
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





    /*========== Export ================*/
    public function export_products_post(Request $request){
        $id_list = explode(',', $request->product_id);
        $data = Product::whereIn('id', $id_list)
                ->with(['get_category', 'get_images'])
                ->orderBy('title', 'ASC')
                ->get();
        if ($data->isEmpty()) {
            return redirect()->back()->with('error', 'No Data Found');
        }

        if ($request->expert_as === "PDF") {
            //pdf
            return $this->Export_as_PDF($data);

        }elseif ($request->expert_as === "CSV") {
            return $this->Export_as_CSV($data);
        }else{
            return redirect()->back()->with('error', 'Invalid Export Type');
        }
    }

    //pdf
    public function Export_as_PDF($data){
        $pdf = PDF::loadView('export.pdf.products-export', compact('data'))->setPaper('letter', 'landscape');
        return $pdf->download(date('d-m-Y').'-products.pdf');    
    }

    public function Export_as_CSV($data){
        return Excel::download(new ProductsExport($data), "products.xlsx");
        //return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function uniqueSlug(){
        $today = date("d-m-Y");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $Slugid = $rand.$today ;
        return $Slugid;
    }
    public function getProductID($productID = null){
        $id=null;
        if(!empty(session()->get('add_pro_img_id'))){
            $Id =  session()->get('add_pro_img_id');
        }else{
            $Id = decrypt($productID);
        }
        return $Id;
    }
    public function randomid(){
        date_default_timezone_set('Africa/Johannesburg');
        $today = date("dmY");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $submissionID = $rand.$today ;
        return $submissionID;
    }

}
