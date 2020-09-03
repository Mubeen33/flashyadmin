<?php

namespace App\Http\Controllers\Vendors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use App\VendorActivity;
use App\VendorBankDetailsTempData;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

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
        $data = Vendor::orderBy('id', 'DESC')->paginate(5);
        return view('Vendors.index', compact('data'));
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
        $id = \Crypt::decrypt($id);
        $data = Vendor::findOrFail($id);
        return view('Vendors.show', compact('data'));
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
                'business_information' => ['nullable', 'string', 'max:300']
            ]);
            return $this->updateContactDetails($request, $id);
        
        }elseif ($request->type === "UpdateBankDetails") {
            $this->validate($request, [
                'account_holder' => ['nullable', 'string', 'max:250'],
                'bank_name' => ['nullable', 'string', 'max:250'],
                'bank_account' => ['nullable', 'string', 'max:250'],
                'branch_name' => ['nullable', 'string', 'max:250'],
                'branch_code' => ['nullable', 'string', 'max:250'],
            ]);
            return $this->updateBankDetails($request, $id);

        }elseif ($request->type === "UpdateDirectorDetails") {
            $this->validate($request, [
                'director_first_name' => ['nullable', 'string', 'max:250'],
                'director_last_name' => ['nullable', 'string', 'max:250'],
                'director_email' => ['nullable', 'string', 'email', 'max:250'],
                'director_details' => ['nullable', 'string', 'max:300'],
                'website_url' => ['nullable', 'string', 'url', 'max:250'],
                'vat_register' => ['nullable', 'string', 'in:Yes,No'],
                'additional_info' => ['nullable', 'string', 'max:300'],
                'product_type' => ['nullable', 'string', 'in:Physical Products,Digital Products,Grouped Products,Services'],
            ]);
            return $this->updateDirectorDetails($request, $id);
        
        }elseif ($request->type === "UpdateBusinessAddressDetails") {
            $this->validate($request, [
                'address' => ['nullable', 'string', 'max:250'],
                'street' => ['nullable', 'string', 'max:250'],
                'city' => ['nullable', 'string', 'max:250'],
                'state' => ['nullable', 'string', 'max:250'],
                'subrub' => ['nullable', 'string', 'max:250'],
                'zip_code' => ['nullable', 'string', 'max:250'],
                'country' => ['nullable', 'string', 'max:250'],
            ]);
            return $this->updateBusinessAddressDetails($request, $id);
        
        }elseif ($request->type === "UpdateWireHouseAddressDetails") {
            $this->validate($request, [
                'waddress' => ['nullable', 'string', 'max:250'],
                'wstreet' => ['nullable', 'string', 'max:250'],
                'wcity' => ['nullable', 'string', 'max:250'],
                'wstate' => ['nullable', 'string', 'max:250'],
                'wsubrub' => ['nullable', 'string', 'max:250'],
                'wzip_code' => ['nullable', 'string', 'max:250'],
                'wcountry' => ['nullable', 'string', 'max:250'],
            ]);
            return $this->updateWireHouseAddressDetails($request, $id);
        }else{
            return redirect()->back()->with('error', 'SORRY - Invalid Request');
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

    private function updateDirectorDetails($request, $id){
        Vendor::findOrFail($id);
        //if validation pass
        $updated = Vendor::where('id', $id)->update([
           'website_url'=> $request->website_url,
           'director_first_name'=> $request->director_first_name,
           'director_last_name'=> $request->director_last_name,
           'director_email'=> $request->director_email,
           'director_details'=> $request->director_details,
           'vat_register'=> $request->vat_register,
           'additional_info'=> $request->additional_info,
           'product_type'=> $request->product_type,
           'updated_at'=> Carbon::now()
        ]);
        
        if($updated == true){
            return redirect()->back()->with('success', 'Director Details Updated');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
    }

    private function updateBusinessAddressDetails($request, $id){
        Vendor::findOrFail($id);
        //if validation pass
        $updated = Vendor::where('id', $id)->update([
           'address'=> $request->address,
           'street'=> $request->street,
           'city'=> $request->city,
           'state'=> $request->state,
           'subrub'=> $request->subrub,
           'zip_code'=> $request->zip_code,
           'country'=> $request->country,
           'updated_at'=> Carbon::now()
        ]);
        
        if($updated == true){
            return redirect()->back()->with('success', 'Business Address Details Updated');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
    }

    private function updateWireHouseAddressDetails($request, $id){
        Vendor::findOrFail($id);
        //if validation pass
        $updated = Vendor::where('id', $id)->update([
           'waddress'=> $request->waddress,
           'wstreet'=> $request->wstreet,
           'wcity'=> $request->wcity,
           'wstate'=> $request->wstate,
           'wsubrub'=> $request->wsubrub,
           'wzip_code'=> $request->wzip_code,
           'wcountry'=> $request->wcountry,
           'updated_at'=> Carbon::now()
        ]);
        
        if($updated == true){
            return redirect()->back()->with('success', 'WireHouse Address Details Updated');
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


    //update pass
    public function update_vendor_pass(Request $request){
        $this->validate($request, [
            'new_pass'=>'required|string|min:8|max:33'
        ]);

        $updated = Vendor::where('id', $request->id)->update([
            'password'=>Hash::make($request->new_pass),
            'updated_at'=>Carbon::now()
        ]);

        if ($updated == true) {
            return redirect()->back()->with('success', 'Password Updated');
        }else{
            return redirect()->back()->with('error', 'SORRY - Something wrong.');
        }
    }


    //vendor activity
    public function vendors_activitities(){
        $data = VendorActivity::orderBy('id', 'DESC')->with('get_vendor')->get();
        $data2 = $data->groupBy('vendor_id');
        $data = (new Collection($data2))->paginate_build_by_developer_rijan(5);
        //$data = collect($data);
        return view('Vendors.activity-list', compact('data'));
    }
    public function vendors_activitities_ajax(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            $viewName = "Vendors.partials.vendors-activity-list";

            if ($request->search_key != "") {
                $vendors = Vendor::where([
                                ["first_name", "LIKE", "%".$searchKey."%"],
                            ])
                            ->orWhere([
                                ["last_name", "LIKE", "%".$searchKey."%"],
                            ])->get('id');
                $idList = [];
                foreach ($vendors as $key => $value) {
                    $idList[] = $value->id;
                }
                $data = VendorActivity::whereIn('vendor_id', $idList)
                                    ->with('get_vendor')
                                    ->orderBy($sort_by, $sorting_order)
                                    ->get();
                $data2 = $data->groupBy('vendor_id');
                $data = (new Collection($data2))->paginate_build_by_developer_rijan($row_per_page);

                return view($viewName, compact('data'))->render();
            }

            $data = VendorActivity::orderBy($sort_by, $sorting_order)
                            ->with('get_vendor')
                            ->get();
            $data2 = $data->groupBy('vendor_id');
            $data = (new Collection($data2))->paginate_build_by_developer_rijan($row_per_page);
            return view($viewName, compact('data'))->render();
        }
        return abort(404);
    }

    public function vendor_actitvity($vendorID){
        $vendorID = \Crypt::decrypt($vendorID);
        $vendor = Vendor::where('id', $vendorID)->first();
        if (!$vendor) {
            return abort(404);
        }
        $loginActivities = VendorActivity::where([
                        ['vendor_id', '=', $vendorID],
                        ['activityName', '=', 'Login']
                    ])
                    ->orderBy('created_at', 'DESC')
                    ->paginate(5);
        $othersActivities = VendorActivity::where([
                        ['vendor_id', '=', $vendorID],
                        ['activityName', '!=', 'Login']
                    ])
                    ->orderBy('created_at', 'DESC')
                    ->paginate(5);

        return view('Vendors.activity', compact('vendor', 'loginActivities', 'othersActivities'));
    }


    public function ajax_single_vendor_actitvity(Request $request){

        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $row_per_page = $request->row_per_page;
            
            $vendorID = $request->id;
            $status = $request->status;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            if ($request->search_key != "") {
                if ($status === "Login") {
                    $loginActivities = VendorActivity::where("vendor_id", "=", $vendorID)
                            ->where("activityName", "=", "Login")
                            ->where("activities", "LIKE", "%$searchKey%")
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);
                    return view('Vendors.partials.vendor-login-activity-list', compact('loginActivities'))->render();
                }elseif($status === "Others"){
                    $othersActivities = VendorActivity::where("vendor_id", "=", $vendorID)
                            ->where("activityName", "!=", "Login")
                            ->where("activities", "LIKE", "%$searchKey%")
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);
                    return view('Vendors.partials.vendor-other-activity-list', compact('othersActivities'))->render();
                }else{
                    return response()->json('Unknown request type, Please refresh page & try again.', 422);
                }
                
            }

            //if not search key then
            if ($status === "Login") {
                    $loginActivities = VendorActivity::where("vendor_id", "=", $vendorID)
                            ->where("activityName", "=", "Login")
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);
                    return view('Vendors.partials.vendor-login-activity-list', compact('loginActivities'))->render();
                }elseif($status === "Others"){
                    $othersActivities = VendorActivity::where("vendor_id", "=", $vendorID)
                            ->where("activityName", "!=", "Login")
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);
                    return view('Vendors.partials.vendor-other-activity-list', compact('othersActivities'))->render();
                }else{
                    return response()->json('Unknown request type, Please refresh page & try again.', 422);
                }
        }
        return abort(404);
    }




    public function delete_vendor_activity(Request $request){
        $deleted = VendorActivity::where([
            'id'=>\Crypt::decrypt($request->activityID),
            'vendor_id'=>\Crypt::decrypt($request->vendorID)
        ])->delete();

        if ($deleted == true) {
            return redirect()->back()->with('success', 'Activity Record Deleted');
        }else{
           return redirect()->back()->with('error', 'SORRY - Something wrong!'); 
        }
    }


    //get bank details updates
    public function get_bank_updates(){
        $data = VendorBankDetailsTempData::where('status', 0)
                    ->orderBy('id', 'DESC')
                    ->with('get_vendor')
                    ->paginate(20);
        return view('Vendors.bank-updates', compact('data'));
    }

    public function ajax__vendors_bank_updates_requet(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $row_per_page = $request->row_per_page;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            if ($request->search_key != "") {
                $data = VendorBankDetailsTempData::where('status', 0)
                ->with('get_vendor')
                ->whereHas('get_vendor', function($q) use ($searchKey, $sort_by, $sorting_order)
                {
                    $q->where('first_name', 'like', '%'.$searchKey.'%');
                    $q->orWhere('last_name', 'like', '%'.$searchKey.'%');
                    $q->orWhere('email', 'like', '%'.$searchKey.'%');
                    $q->orderBy($sort_by, $sorting_order);

                })->paginate($row_per_page);
                return view('Vendors.partials.bank-updates-request-list', compact('data'))->render();
            }

            $data = VendorBankDetailsTempData::where('status', 0)
            ->orderBy($sort_by, $sorting_order)
            ->with('get_vendor')
            ->paginate($row_per_page);
            return view('Vendors.partials.bank-updates-request-list', compact('data'))->render();
            
        }
        return abort(404);
    }


    // //approve bank details update request
    public function approve_bank_updates(Request $request){
        $id = \Crypt::decrypt($request->id);
        $vendorID = \Crypt::decrypt($request->vendorID);
        
        $data = VendorBankDetailsTempData::where([
            'id'=>$id,
            'vendor_id'=>$vendorID,
            'status'=>0
        ])->first();

        if (!$data) {
            return redirect()->back()->with('error', 'SORRY - Data not Fournd');
        }

    //update bank details
        $updated = Vendor::where('id', $vendorID)->update([
            'account_holder'=>$data->account_holder,
            'bank_name'=>$data->bank_name,
            'bank_account'=>$data->bank_account,
            'branch_name'=>$data->branch_name,
            'branch_code'=>$data->branch_code,
            'updated_at'=>Carbon::now()
        ]);

        if ($updated == true) {
            //delete record
            $data->delete();
            return redirect()->back()->with('success', 'Request Approved');
        }else{
            return redirect()->back()->with('error', 'SORRY - Something wrong!');
        }
    }




    //ajax pagination
    public function fetch_paginate_data(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $row_per_page = $request->row_per_page;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            if ($request->search_key != "") {
                $data = Vendor::where("first_name", "LIKE", "%$searchKey%")
                            ->orWhere("last_name", "LIKE", "%$searchKey%")
                            ->orWhere("email", "LIKE", "%$searchKey%")
                            ->orWhere("phone", "LIKE", "%$searchKey%")
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);
                return view('Vendors.partials.vendors-list', compact('data'))->render();
            }

            $data = Vendor::orderBy($sort_by, $sorting_order)->paginate($row_per_page);
            return view('Vendors.partials.vendors-list', compact('data'))->render();
        }
        return abort(404);
        
    }


    //add_vendor_form
    public function add_vendor_form(){
        return view('Vendors.add-vendor');
    }

    //add_vendor_post
    public function add_vendor_post(Request $request){
        $validation = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'mobile' => ['required', 'string', 'max:16'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'phone' => ['nullable', 'string', 'max:16'],
            
            
            'company_name' => ['required', 'string', 'max:250'],
            'business_information' => ['nullable', 'string', 'max:300'],
            
            'account_holder' => ['nullable', 'string', 'max:250'],
            'bank_name' => ['nullable', 'string', 'max:250'],
            'bank_account' => ['nullable', 'string', 'max:250'],
            'branch_name' => ['nullable', 'string', 'max:250'],
            'branch_code' => ['nullable', 'string', 'max:250'],

            'director_first_name' => ['nullable', 'string', 'max:250'],
            'director_last_name' => ['nullable', 'string', 'max:250'],
            'director_email' => ['nullable', 'string', 'email', 'max:250'],
            'director_details' => ['nullable', 'string', 'max:300'],
            'website_url' => ['nullable', 'string', 'url', 'max:250'],
            'vat_register' => ['nullable', 'string', 'in:Yes,No'],
            'additional_info' => ['nullable', 'string', 'max:300'],
            'product_type' => ['required', 'string', 'in:Physical Products,Digital Products,Grouped Products,Services'],

            'address' => ['nullable', 'string', 'max:250'],
            'street' => ['nullable', 'string', 'max:250'],
            'city' => ['nullable', 'string', 'max:250'],
            'state' => ['nullable', 'string', 'max:250'],
            'subrub' => ['nullable', 'string', 'max:250'],
            'zip_code' => ['nullable', 'string', 'max:250'],
            'country' => ['nullable', 'string', 'max:250'],

            'waddress' => ['nullable', 'string', 'max:250'],
            'wstreet' => ['nullable', 'string', 'max:250'],
            'wcity' => ['nullable', 'string', 'max:250'],
            'wstate' => ['nullable', 'string', 'max:250'],
            'wsubrub' => ['nullable', 'string', 'max:250'],
            'wzip_code' => ['nullable', 'string', 'max:250'],
            'wcountry' => ['nullable', 'string', 'max:250'],
        ]);

        if ($validation->fails()) {
            foreach ($validation->messages()->get('*') as $key => $value) {
                $value = json_encode($value);
                $text = str_replace('["', "", $value);
                $text = str_replace('"]', "", $text);
                return response()->json([
                    'field'=>$key,
                    'targetHighlightIs'=>"",
                    'msg'=>$text,
                    'need_scroll'=>"yes"
                ], 422);
            }
        }

        //insert data
        Vendor::insert([
           'first_name'=> $request->first_name,
           'last_name'=> $request->last_name,
           'email'=> $request->email,
           'phone'=> $request->phone,
           'mobile'=> $request->mobile,

           'company_name'=> $request->company_name,
           'business_information'=> $request->business_information,

           'account_holder'=> $request->account_holder,
           'bank_name'=> $request->bank_name,
           'bank_account'=> $request->bank_account,
           'branch_name'=> $request->branch_name,
           'branch_code'=> $request->branch_code,

           'website_url'=> $request->website_url,
           'director_first_name'=> $request->director_first_name,
           'director_last_name'=> $request->director_last_name,
           'director_email'=> $request->director_email,
           'director_details'=> $request->director_details,
           'vat_register'=> $request->vat_register,
           'additional_info'=> $request->additional_info,
           'product_type'=> $request->product_type,

           'address'=> $request->address,
           'street'=> $request->street,
           'city'=> $request->city,
           'state'=> $request->state,
           'subrub'=> $request->subrub,
           'zip_code'=> $request->zip_code,
           'country'=> $request->country,

           'waddress'=> $request->waddress,
           'wstreet'=> $request->wstreet,
           'wcity'=> $request->wcity,
           'wstate'=> $request->wstate,
           'wsubrub'=> $request->wsubrub,
           'wzip_code'=> $request->wzip_code,
           'wcountry'=> $request->wcountry,
        ]);

    }
}
