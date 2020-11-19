<?php

namespace App\Http\Controllers\Vendors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use App\Product;
use App\ProductVariation;
use App\VendorProduct;
use Illuminate\Support\Collection;

class InventoryController extends Controller
{
   public function get_vendor_products($vendorID){
       $vendor = Vendor::where(['id'=>decrypt($vendorID), 'active'=>1])->first();
       if (!$vendor) {
           return abort(404);
       }

       //get vendor products
       $data = VendorProduct::where('ven_id', decrypt($vendorID))
                ->with(['get_product', 'get_active_variation'])
                ->orderBy('id', 'DESC')
                ->paginate(5);
        return view('Vendors.inventory.index', compact('data', 'vendor'));

   }

   //fetch
   public function ajax_fetch_data(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $vendorID = decrypt($request->id);
            $row_per_page = $request->row_per_page;

            if (empty($sort_by)) {
                $sort_by = "id";
            }
            if (empty($sorting_order)) {
                $sorting_order = "DESC";
            }

            $renderPage = "Vendors.inventory.partials.product-list";

            if ($searchKey != '') {
                $vendor_products_id = [];

                //search products title
                $product_id = Product::where("title", "LIKE", "%$searchKey%")
                            ->get('id');

                foreach ($product_id as $key => $value) {
                    $data = VendorProduct::where(['ven_id'=>$vendorID, 'prod_id'=>$value->id])->first();
                    if ($data) {
                        $vendor_products_id[] = $data->id;
                    }
                }

                //search product variations
                $product_variation_id = ProductVariation::where("first_variation_value", "LIKE", "%$searchKey%")
                            ->orWhere("second_variation_value", "LIKE", "%$searchKey%")
                            ->where('active', '=', 1)
                            ->get('id');

                foreach ($product_variation_id as $key => $value) {
                    $data = VendorProduct::where(['ven_id'=>$vendorID, 'variation_id'=>$value->id])->first();
                    if ($data) {
                        $vendor_products_id[] = $data->id;
                    }
                }


                $vendor_products_id = array_unique($vendor_products_id);
                if ($status != '' && is_numeric($status)) {
                    $data = VendorProduct::whereIn('id', $vendor_products_id)
                                    ->where('ven_id', $vendorID)
                                    ->where('active', $status)
                                    ->orderBy($sort_by, $sorting_order)
                                    ->with(['get_product', 'get_active_variation'])
                                    ->paginate($row_per_page);
                    return view($renderPage, compact('data'))->render();
                }

                $data = VendorProduct::whereIn('id', $vendor_products_id)
                                    ->where('ven_id', $vendorID)
                                    ->orderBy($sort_by, $sorting_order)
                                    ->with(['get_product', 'get_active_variation'])
                                    ->paginate($row_per_page);
                return view($renderPage, compact('data'))->render();
                
            }


            //without search key
            if ($status != '' && is_numeric($status)) {
                $data = VendorProduct::where('ven_id', $vendorID)
                                ->where('active', $status)
                                ->orderBy($sort_by, $sorting_order)
                                ->with(['get_product', 'get_active_variation'])
                                ->paginate($row_per_page);
                return view($renderPage, compact('data'))->render();
            }

            $data = VendorProduct::where('ven_id', $vendorID)
                                ->with(['get_product', 'get_active_variation'])
                                ->paginate($row_per_page);
            
            if ($sorting_order === "DESC") {
                $data = $data->sortByDesc($sort_by);
                $data = (new Collection($data))->paginate_build_by_developer_rijan($row_per_page);
                return view($renderPage, compact('data'))->render();
            }
            $data = $data->sortBy($sort_by);//asc
            $data = (new Collection($data))->paginate_build_by_developer_rijan($row_per_page);
            return view($renderPage, compact('data'))->render();

            
        }
        return abort(404);
   }
}
