<?php

namespace App\Http\Controllers\Coupons;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Coupon::orderBy('status', 'DESC')->paginate(20);
        return view('Coupons.index', compact('data'));
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
        $this->validate($request, [
            'coupon_image'=>'required|image|mimes:png,jpeg,jpg,gif|max:1000'
        ]);
        $obj_fu = new FileUploader();
        $coupon = NULL;
        $location = "upload-images/coupons/";
        if($request->hasFile('coupon_image')){
            $fileName ='coupon-'.uniqid();
            $fileName__ = $obj_fu->fileUploader($request->file('coupon_image'), $fileName, $location);
            $coupon = $fileName__;
        }else{
            return redirect()->back()->with('error','Please Upload Image');
        }

        if ($coupon === NULL) {
            return redirect()->back()->with('error',"We can't upload image, please try again.");
        }
        
        $inserted = Coupon::insert([
            'image'=>url('/')."/".$location.$coupon,
            'created_at'=>Carbon::now()
        ]);

        if ($inserted == true) {
            return redirect()->back()->with('success',"Coupon added");
        }else{
            return redirect()->back()->with('error',"SORRY - Something wrong");
        }
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
        $this->validate($request, [
            'coupon_image'=>'required|image|mimes:png,jpeg,jpg,gif|max:1000'
        ]);

        $oldData = Coupon::where('id', $id)->first();
        if (!$oldData) {
            return redirect()->back()->with('error', 'SORRY - Invalid Request');
        }
        //update image
        $obj_fu = new FileUploader();
        $coupon = NULL;
        $location = "upload-images/coupons/";
        $url = url('/');

        if($request->hasFile('coupon_image')){
            //delete
            if ($oldData->image != NULL) {
                $file_name = str_replace($url."/".$location, "", $oldData->image);
                $obj_fu->deleteFile($file_name, $location);
            }
            //upload
            $fileName ='coupon-'.uniqid();
            $fileName__ = $obj_fu->fileUploader($request->file('coupon_image'), $fileName, $location);
            $coupon = $fileName__;
        }

        $updated = Coupon::where('id', $id)->update([
            'image'=>($coupon === NULL ? $oldData->image : $url."/".$location.$coupon),
            'updated_at'=>Carbon::now()
        ]);

        if ($updated == true) {
            return redirect()->back()->with('success',"Coupon Updated");
        }else{
            return redirect()->back()->with('error',"SORRY - Something wrong");
        }
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


    //customs
    public function active_inactive(Request $request){
        $this->validate($request, [
            'status'=>'required|numeric|in:0,1'
        ]);
        if ($request->id == "" && !is_numeric($request->id)) {
            return redirect()->back()->with('error', 'SORRY - Invalid Attempt');
        }

        Coupon::where([
            ['id', '!=', $request->id],
        ])->update([
            'status'=>0,
            'updated_at'=>Carbon::now()
        ]);

        Coupon::where('id', $request->id)->update([
            'status'=>$request->status,
            'updated_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Status updated');
    }

    public function delete($id){
        $id = \Crypt::decrypt($id);
        $data = Coupon::where('id', $id)->first();
        if (!$data) {
            return redirect()->back()->with('error', 'SORRY - Coupon Not Found!');
        }

        //delete slider images
        $url = url('/');
        $location = "upload-images/coupons/";
        $obj_fu = new FileUploader();
        if ($data->image != NULL) {
            $fileName = str_replace($url."/".$location, "", $data->image);
            $obj_fu->deleteFile($fileName, $location);
        }

        $deleted = $data->delete();
        if ($deleted == true) {
            return redirect()->back()->with('success', 'Coupon Deleted');
        }else{
            return redirect()->back()->with('error', 'SORRY - Something Wrong!');
        }
    }
}
