<?php

namespace App\Http\Controllers\Deals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Deal;
use Carbon\Carbon;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Deal::orderBy('created_at', 'DESC')
                ->with(['get_vendor', 'get_product'])
                ->paginate(20);
        return view('Deals.index', compact('data'));
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

    //custom
    public function get_pending_deals(){
        $data = Deal::where('status', 0)
                ->with(['get_vendor', 'get_product'])
                ->paginate(20);
        return view('Deals.pending-list', compact('data'));
    }

    public function approve_deal($id){
        $id = \Crypt::decrypt($id);
        $data = Deal::where([
            'id'=>$id,
            'status'=>0
        ])->first();

        if (!$data) {
            return redirect()->back()->with('error', 'SORRY - Deal Not Found');
        }

        $data->update([
            'status'=>1,
            'updated_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('success', 'SUCCESS - Deal Approved');
    }
}
