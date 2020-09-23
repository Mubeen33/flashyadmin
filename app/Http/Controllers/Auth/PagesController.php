<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use App\AuthPage;
use Carbon\Carbon;
use Auth;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AuthPage::orderBy('id', 'DESC')->get();
        return view('auth.pages', compact('data'));
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
        //store
        $this->validate($request, [
            'type'=>'required|string|in:AdminAuth,VendorAuth',
            'title'=>'required|string|max:30',
            'description'=>'nullable|string|max:100',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif|max:1000',
        ]);

        $data = AuthPage::where('type', $request->type)->first();
        if ($data) {
            //edit
            return "Need to edit under construction";
        }

        $obj_fu = new FileUploader();
        $image = NULL;
        $location = "upload-images/auth-pages/";
        if($request->hasFile('image')){
            $fileName = $request->type."-".uniqid().Auth::user()->id.mt_rand(10, 9999);
            $fileName__ = $obj_fu->fileUploader($request->file('image'), $fileName, $location);
            $image = $fileName__;
        }else{
            return redirect()->back()->withInput()->with('error', 'Please Upload Image');
        }

        AuthPage::insert([
            'type'=>$request->type,
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>url('/')."/".$location.$image,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Contetent Added');

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
}
