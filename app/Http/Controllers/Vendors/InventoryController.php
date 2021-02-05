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
