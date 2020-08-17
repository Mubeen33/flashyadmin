<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use Carbon\Carbon;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all vendors list
        $data = Vendor::orderBy('id', 'DESC')->paginate(30);
        return view('AdminViews.Vendors.index', compact('data'));
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
        $data = Vendor::findOrFail($id);
        return view('AdminViews.Vendors.show', compact('data'));
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
        //store vendor requests
        if ($request->type === "UpdateSellerDetails") {
            $this->validate($request, [
                'first_name' => ['required', 'string', 'max:50'],
                'last_name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors,email,'.$id],
                'mobile' => ['required', 'string', 'max:16']
            ]);
            return $this->updateSellerDetails($request, $id);
        
        }elseif ($request->type === "UpdateContactDetails") {
            $this->validate($request, [
                'company_name' => ['required', 'string', 'max:250'],
                'business_information' => ['required', 'string', 'max:300']
            ]);
            return $this->updateContactDetails($request, $id);
        
        }elseif ($request->type === "UpdateBankDetails") {
            $this->validate($request, [
                'account_holder' => ['string', 'max:250'],
                'bank_name' => ['string', 'max:250'],
                'bank_account' => ['string', 'max:250'],
                'branch_name' => ['string', 'max:250'],
                'branch_code' => ['string', 'max:250'],
            ]);
            return $this->updateBankDetails($request, $id);
        }
        
        
        
    }


    private function updateSellerDetails($request, $id){
        Vendor::findOrFail($id);
        //if validation pass
        $updated = Vendor::where('id', $id)->update([
           'first_name'=> $request->first_name,
           'last_name'=> $request->last_name,
           'email'=> $request->email,
           'phone'=> $request->phone,
           'mobile'=> $request->mobile,
           'updated_at'=> Carbon::now()
        ]);
        
        if($updated == true){
            return redirect()->back()->with('success', 'Seller Details Updated');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
    }

    private function updateContactDetails($request, $id){
        Vendor::findOrFail($id);
        //if validation pass
        $updated = Vendor::where('id', $id)->update([
           'company_name'=> $request->company_name,
           'business_information'=> $request->business_information,
           'updated_at'=> Carbon::now()
        ]);
        
        if($updated == true){
            return redirect()->back()->with('success', 'Contact Details Updated');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
    }

    private function updateBankDetails($request, $id){
        Vendor::findOrFail($id);
        //if validation pass
        $updated = Vendor::where('id', $id)->update([
           'account_holder'=> $request->account_holder,
           'bank_name'=> $request->bank_name,
           'bank_account'=> $request->bank_account,
           'branch_name'=> $request->branch_name,
           'branch_code'=> $request->branch_code,
           'updated_at'=> Carbon::now()
        ]);
        
        if($updated == true){
            return redirect()->back()->with('success', 'Bank Details Updated');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
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



    public function vendor_account_approve(Request $request){
        $updated = Vendor::where('id', $request->vendorID)->update([
                'active'=>1,
                'updated_at'=>Carbon::now()
            ]);
            
        if($updated == true){
            return redirect()->back()->with('success', 'Seller Account Approved');
        }else{
            return redirect()->back()->with('error', 'SORRY - Something went wrong!');
        }
    }
}
