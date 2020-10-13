<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Vendor;
use App\Product;
use App\VendorProduct;
use App\Category;
use App\Customer;
use App\User;
use App\Transaction;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\orderMail;
use App\Mail\orderAdminMail;
use App\Mail\orderSellerMail;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::groupBy('order_id')
                        ->orderBy('created_at', 'DESC')
                        ->paginate(5);
        return view('orders.order', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //ajax fetch
    public function fetch_orders_list(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;
            $vendor_id = $request->id;

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
                    $order_id_list = Order::where('order_id', 'LIKE', "%$searchKey%")->get('vendor_product_id');
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
                                            ->where(['active'=>1])
                                            ->get('id');
                
                foreach ($vendor_products as $key => $value) {
                    $ven_product_id_list[] = $value->id;
                }


                //unique the array - the id list of vendor_products tbl id
                $ven_product_id_list = array_unique($ven_product_id_list);

                //if have status and vendor_id
                if (!empty($vendor_id) && is_numeric($vendor_id) && !empty($status)) {
                    $data = Order::whereIn('vendor_product_id', $ven_product_id_list)
                        ->where([
                            'vendor_id'=>$vendor_id,
                            'status'=>$status
                        ])
                        ->with(['get_vendor', 'get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                    return view('orders.partials.orders-list', compact('data'))->render();
                }

                //if have vendor_id only
                if (!empty($vendor_id) && is_numeric($vendor_id)) {
                    $data = Order::whereIn('vendor_product_id', $ven_product_id_list)
                        ->where([
                            'vendor_id'=>$vendor_id
                        ])
                        ->with(['get_vendor', 'get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                    return view('orders.partials.orders-list', compact('data'))->render();
                }

                //if have status only
                if (!empty($status)) {
                    $data = Order::whereIn('vendor_product_id', $ven_product_id_list)
                        ->where([
                            'status'=>$status
                        ])
                        ->with(['get_vendor', 'get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                    return view('orders.partials.orders-list', compact('data'))->render();
                }

                $data = Order::whereIn('vendor_product_id', $ven_product_id_list)
                        ->with(['get_vendor', 'get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                return view('orders.partials.orders-list', compact('data'))->render();
            }


            //without search key

            //if have status and vendor_id
            if (!empty($vendor_id) && is_numeric($vendor_id) && !empty($status)) {
                $data = Order::where([
                        'vendor_id'=>$vendor_id,
                        'status'=>$status
                    ])
                    ->with(['get_vendor', 'get_customer', 'get_vendor_product'])
                    ->orderBy($sort_by, $sorting_order)
                    ->paginate($row_per_page);
                return view('orders.partials.orders-list', compact('data'))->render();
            }

            //if only have vendor id
            if (!empty($vendor_id) && is_numeric($vendor_id)) {
                $data = Order::where([
                        'vendor_id'=>$vendor_id
                    ])
                    ->with(['get_vendor', 'get_customer', 'get_vendor_product'])
                    ->orderBy($sort_by, $sorting_order)
                    ->paginate($row_per_page);
                return view('orders.partials.orders-list', compact('data'))->render();
            }

            //if only have status
            if (!empty($status)) {
                $data = Order::where([
                        'status'=>$status
                    ])
                    ->with(['get_vendor', 'get_customer', 'get_vendor_product'])
                    ->orderBy($sort_by, $sorting_order)
                    ->paginate($row_per_page);
                return view('orders.partials.orders-list', compact('data'))->render();
            }

            $data = Order::with(['get_vendor', 'get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
            return view('orders.partials.orders-list', compact('data'))->render();
            
        }
        return abort(404);
    }



    //order_status_update
    public function order_status_update($orderID, $status){

        if ($status === "Completed") {

            Order::findOrFail(decrypt($orderID));

            Order::where('id', decrypt($orderID))->update([
                'status'=>$status
            ]);

            // 
                $order = Order::where('id',decrypt($orderID))->get();

                $vat   = User::value('vat');

                foreach ($order as $key => $data) {
                    
                    $catcommission = Category::where('id',$data->category_id)->value('commission');
                    $catname       = Category::where('id',$data->category_id)->value('name');
                    $vendor_name   = Vendor::where('id',$data->vendor_id)->value('company_name');
                    $customer      = Customer::where('id',$data->customer_id)->first();

                    $productPrice = $data->product_price * $data->qty;

                    $vatcommission = $catcommission + $vat;

                    $vatamount     =  ($productPrice * $vat) / 100;

                    $commission    = ($productPrice * $vatcommission) / 100;

                    $vendor_amount = $productPrice - $vatcommission;

                    $vendorTotalBalance = Transaction::where('vendor_id',$data->vendor_id)->orderBy('id','desc')->limit(1)->value('total_balance');
                    if (empty($vendorTotalBalance)) {
                        
                        $vendorTotalBalance = 0;
                    }
                    

                        $newBalance = $vendorTotalBalance - $commission;

                        $transaction = new Transaction();

                        $transaction->product_id             = $data->product_id;
                        $transaction->order_id               = $data->order_id;
                        $transaction->vendor_order_id        = decrypt($orderID);
                        $transaction->product_price          = $productPrice;
                        $transaction->vendor_product_id      = $data->vendor_product_id;
                        $transaction->order_token            = $data->order_token;
                        $transaction->category_id            = $data->category_id;
                        $transaction->category_commission    = $catcommission;
                        $transaction->deduct_amount          = $commission;
                        $transaction->user_t_amount          = $commission;
                        $transaction->transfer_amount        = '0';
                        $transaction->vat_amount             = $vatamount;
                        $transaction->total_balance          = $newBalance;
                        $transaction->note                   = "Success Commission";
                        $transaction->customer_id            = $data->customer_id;
                        $transaction->vendor_id              = $data->vendor_id;
                        $transaction->vendor_name            = $vendor_name;
                        $transaction->transaction_type       = "Success payment For ".$catname."- ".$catcommission."% for vendorOrderId ".decrypt($orderID)." and Order Token is ".$data->order_token;
                        $transaction->customer_name          = $customer->first_name." ".$customer->last_name;

                        $transaction->save();

                    // vendor Transaction

                        $vendorTotalBalance = Transaction::where('vendor_id',$data->vendor_id)->orderBy('id','desc')->limit(1)->value('total_balance');

                        $newBlance = $vendorTotalBalance + $productPrice;

                        $transaction = new Transaction();

                        $transaction->product_id             = $data->product_id;
                        $transaction->order_id               = $data->order_id;
                        $transaction->vendor_order_id        = decrypt($orderID);
                        $transaction->product_price          = $productPrice;
                        $transaction->vendor_product_id      = $data->vendor_product_id;
                        $transaction->category_id            = $data->category_id;
                        $transaction->order_token            = $data->order_token;
                        $transaction->user_t_amount          = $productPrice;
                        $transaction->transfer_amount        = $productPrice;
                        $transaction->total_balance          = $newBlance;
                        $transaction->note                   = "vendor_payment";
                        $transaction->customer_id            = $data->customer_id;
                        $transaction->vendor_id              = $data->vendor_id;
                        $transaction->vendor_name            = $vendor_name;
                        $transaction->transaction_type       = "vendor payment added to your account";
                        $transaction->customer_name          = $customer->first_name." ".$customer->last_name; 

                        $transaction->save();

                    // vendor Transaction

                }

                foreach ($order as $key => $value) {
                    
                    

                    //customer mail

                        $customeremail = Customer::where('id',$value->customer_id)->value('email');
                        $subject = 'Your order# ("'.$value->order_id.') has been delieverd';
                        Mail::to($customeremail)->send(new OrderMail(
                             $subject,$order
                        ));
                    //

                    //vendor mail

                        $selleremail = Vendor::where('id',$value->vendor_id)->value('email');
                        $subject = 'Your order# ("'.$value->order_id.') has been delieverd';
                        Mail::to($selleremail)->send(new OrderSellerMail(
                             $subject,$order
                        ));

                     //admin mail

                     $adminemail = User::value('email');
                        $subject = 'Order # ("'.$value->order_id.') has been delieverd';
                        Mail::to($adminemail)->send(new OrderAdminMail(
                             $subject,$order
                        ));   


                }



            // 
            return redirect()->back()->with('success', 'Order '.$status);
        }
        return redirect()->back()->with('error', 'Invalid Request');
    }

    // Order Detial

    public function orderDetial($order_id){

        $ordersData = Order::where('order_id',$order_id)->groupby('vendor_id')->get();
        $vendorOrdersData = Order::where('order_id',$order_id)->get()->groupby('vendor_id');
        return view('orders.orderdetialview',compact('ordersData','vendorOrdersData'));
    }
}
