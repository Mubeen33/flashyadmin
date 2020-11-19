<?php

namespace App\Http\Controllers\Vendors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Vendor;
use App\Product;
use App\VendorProduct;

class OrderReportController extends Controller
{
    public function get_vendor_orders($vendorID){
    	$vendor = Vendor::where('id', decrypt($vendorID))->first();
    	if (!$vendor) {
    		return abort(404);
    	}
    	$data = Order::where('vendor_id', decrypt($vendorID))
    				->with(['get_customer', 'get_vendor_product'])
    				->orderBy('created_at', 'DESC')
    				->paginate(5);
    	return view("orders.order_report.index", compact('vendor', 'data'));
    }

    //ajax fetch
    public function ajax_fetch_data(Request $request){
    	if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;
            $vendor_id = decrypt($request->id);

            if (empty($sort_by)) {
                $sort_by = "created_at";
            }
            if (empty($sorting_order)) {
                $sorting_order = "DESC";
            }

            if (!empty($searchKey)) {
                $ven_product_id_list = [];
                $productIDList = [];
                //if search key only contain numeric
                if (is_numeric($searchKey)) {
                    //search order ID
                    $order_id_list = Order::where('order_id', 'LIKE', "%$searchKey%")
                    						->where('vendor_id', '=', $vendor_id)
                    						->get('vendor_product_id');
                    foreach ($order_id_list as $key => $value) {
                        $ven_product_id_list[] = $value->vendor_product_id;
                    }
                    $product_id_list = Product::where('id', 'LIKE', "%$searchKey%")->get('id');
                    foreach ($product_id_list as $key => $value) {
                        $productIDList[] = $value->id;
                    }
                }

                //products
                $products = Product::where('title', 'LIKE', "%$searchKey%")->get('id');
                foreach ($products as $key => $value) {
                    $productIDList[] = $value->id;
                }

                //vendor products
                $productIDList = array_unique($productIDList);
                $vendor_products = VendorProduct::whereIn('prod_id', $productIDList)
                                            ->where([
                                            	'ven_id'=>$vendor_id,
                                            	'active'=>1
                                            ])
                                            ->get('id');
                
                foreach ($vendor_products as $key => $value) {
                    $ven_product_id_list[] = $value->id;
                }


                //unique the array - the id list of vendor_products tbl id
                $ven_product_id_list = array_unique($ven_product_id_list);
  

                //if have status only
                if ($status != '') {
                    $data = Order::whereIn('vendor_product_id', $ven_product_id_list)
                        ->where([
                        	'vendor_id'=>$vendor_id,
                            'status'=>$status
                        ])
                        ->with(['get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                    return view('orders.order_report.partials.orders-list', compact('data'))->render();
                }

                $data = Order::whereIn('vendor_product_id', $ven_product_id_list)
                		->where('vendor_id', $vendor_id)
                        ->with(['get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                return view('orders.order_report.partials.orders-list', compact('data'))->render();
            }


            //without search key

            //if only have status
            if ($status != "") {
                $data = Order::where([
                		'vendor_id'=>$vendor_id,
                        'status'=>$status
                    ])
                    ->with(['get_customer', 'get_vendor_product'])
                    ->orderBy($sort_by, $sorting_order)
                    ->paginate($row_per_page);
                return view('orders.order_report.partials.orders-list', compact('data'))->render();
            }

            $data = Order::where('vendor_id', $vendor_id)
            			->with(['get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
            return view('orders.order_report.partials.orders-list', compact('data'))->render();
            
        }
        return abort(404);
    }
}
