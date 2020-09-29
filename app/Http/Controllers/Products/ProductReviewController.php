<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductReview;
use App\Customer;
use DB;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProductReview::select('*', 
                    DB::raw("COUNT(product_id) as total_review"),
                    DB::raw("SUM(star) as total_star")
                )
                 ->groupBy('product_id')
                 ->with(['get_product', 'get_customer'])
                 ->orderBy('id', 'DESC')
                 ->paginate(5);

        return view('product.review.index', compact('data'));
    }


    //show single product reivews
    public function show_single_product_reviews($review_tbl_id){
        $review = ProductReview::where('id', decrypt($review_tbl_id))
                        ->first();
        if (!$review) {
            return abort(404);
        }
        $data = ProductReview::where('product_id', $review->product_id)
                ->with(['get_customer'])
                ->orderBy('created_at', 'DESC')
                ->paginate(5);

        return view('product.review.show', compact('review', 'data'));
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



    public function fetch_product_reviews(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;

            if (empty($sort_by)) {
                $sort_by = "id";
            }
            if (empty($sorting_order)) {
                $sorting_order = "DESC";
            }

            $renderPage = "product.review.partials.list";

            if ($searchKey != '') {
                $review_product_id_list = [];

                $product_reviews = ProductReview::get('product_id');
                foreach ($product_reviews as $key => $value) {
                    $review_product_id_list[] = $value->product_id;
                }

                //products
                $products = Product::where("title", "LIKE", "%$searchKey%")
                            ->get('id');
                
                //if product have review
                $product_id_list = [];
                foreach ($products as $key => $product) {
                    if (in_array($product->id, $review_product_id_list)) {
                        $product_id_list[] = $product->id;
                    }
                }

                $data = ProductReview::whereIn('product_id', $product_id_list)
                                    ->select('*', 
                                        DB::raw("COUNT(product_id) as total_review"),
                                        DB::raw("SUM(star) as total_star")
                                    )
                                     ->groupBy('product_id')
                                     ->with(['get_product', 'get_customer'])
                                     ->orderBy($sort_by, $sorting_order)
                                     ->paginate($row_per_page);
                return view($renderPage, compact('data'))->render();
            }

            //withour search
            $data = ProductReview::select('*', 
                                        DB::raw("COUNT(product_id) as total_review"),
                                        DB::raw("SUM(star) as total_star")
                                    )
                                     ->groupBy('product_id')
                                     ->with(['get_product', 'get_customer'])
                                     ->orderBy($sort_by, $sorting_order)
                                     ->paginate($row_per_page);
            return view($renderPage, compact('data'))->render();
        }
        return abort(404);
    }



    public function fetch_single_product_reviews(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $product_id = decrypt($request->id);
            $row_per_page = $request->row_per_page;

            if (empty($sort_by)) {
                $sort_by = "id";
            }
            if (empty($sorting_order)) {
                $sorting_order = "DESC";
            }


            $renderPage = "product.review.partials.review-list";
            if ($searchKey != '') {

                $get_reviews = ProductReview::where('product_id', $product_id)->get(['id', 'customer_id']);
                $get_review_customers = [];
                foreach ($get_reviews as $key => $value) {
                    $get_review_customers[] = $value->customer_id;
                }


                //customer_id
                $customer_id = Customer::where("first_name", "LIKE", "%$searchKey%")
                            ->orWhere("last_name", "LIKE", "%$searchKey%")
                            ->get('id');

                //if review have certain customer
                $cutomer_id_list = [];
                foreach ($customer_id as $key => $customer) {
                    if (in_array($customer->id, $get_review_customers)) {
                        $cutomer_id_list[] = $customer->id;
                    }
                }

                $data = ProductReview::whereIn('customer_id', $cutomer_id_list)
                                    ->where('product_id', $product_id)
                                     ->with('get_customer')
                                     ->orderBy($sort_by, $sorting_order)
                                     ->paginate($row_per_page);
                return view($renderPage, compact('data'))->render();
            }

            //withour search
            $data = ProductReview::where('product_id', $product_id)
                                    ->with('get_customer')
                                     ->orderBy($sort_by, $sorting_order)
                                     ->paginate($row_per_page);
            return view($renderPage, compact('data'))->render();
        }
        return abort(404);
    }
}
