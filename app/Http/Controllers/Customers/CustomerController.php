<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\CustomerAddress;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::orderBy('created_at', 'DESC')->paginate(5);
        return view('Customers.index', compact('data'));
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
        $id = \Crypt::decrypt($id);
        $data = Customer::where('id', $id)->with('get_addresses')->first();
        if (!$data) {
            return abort(404);
        }
        return view('Customers.show', compact('data'));
    }

    public function show_block_customer($id){
        $id = \Crypt::decrypt($id);
        $data = Customer::withTrashed()
            ->where('id', $id)
            ->with('get_addresses')
            ->first();
        if (!$data) {
            return abort(404);
        }
        return view('Customers.show', compact('data'));
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

    //block customer
    public function block_customer($id){
        $id = \Crypt::decrypt($id);
        $blocked = Customer::where('id', $id)->delete();
        if ($blocked == true) {
            return redirect()->back()->with('success', 'Customer Blocked');
        }else{
            return redirect()->back()->with('error', 'SORRY - Something wrong.');
        }
    }
    //unblocked customer
    public function unblock_customer($id){
        $id = \Crypt::decrypt($id);
        $result = Customer::where('id', $id)->restore();
        if ($result == true) {
            return redirect()->back()->with('success', 'Customer Unblocked');
        }else{
            return redirect()->back()->with('error', 'SORRY - Something wrong.');
        }
    }
    //blocked customer list
    public function block_customers_list(){
        $data = Customer::onlyTrashed()
                ->paginate(5);
        return view('Customers.blocked-list', compact('data'));
    }


    //custom
    public function fetch_paginate_data(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $row_per_page = $request->row_per_page;
            $status = $request->status;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            $viewName = "";
            if ($status === "unblocked") {
                $viewName = "Customers.partials.customers-list";
            }else{
                $viewName = "Customers.partials.blocked-customers-list";
            }

            if ($request->search_key != "") {
                if($status === "unblocked"){
                    $data = Customer::where("first_name", "LIKE", "%$searchKey%")
                            ->orWhere("last_name", "LIKE", "%$searchKey%")
                            ->orWhere("email", "LIKE", "%$searchKey%")
                            ->orWhere("phone", "LIKE", "%$searchKey%")
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);
                    return view($viewName, compact('data'))->render();
                }
                if($status === "blocked"){
                    $data = Customer::onlyTrashed()
                            ->where("first_name", "LIKE", "%$searchKey%")
                            ->orWhere("last_name", "LIKE", "%$searchKey%")
                            ->orWhere("email", "LIKE", "%$searchKey%")
                            ->orWhere("phone", "LIKE", "%$searchKey%")
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);
                    return view($viewName, compact('data'))->render();
                }
                return response()->json('SORRY - Invalid Request', 422);
                
            }

            if($status === "unblocked"){
                $data = Customer::orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                return view($viewName, compact('data'))->render();
            }
            if($status === "blocked"){
                $data = Customer::onlyTrashed()
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                return view($viewName, compact('data'))->render();
            }
            return response()->json('SORRY - Invalid Request', 422);
            
        }
        return abort(404);
    }
}
