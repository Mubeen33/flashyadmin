<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\FileUploader;
use App\Banner;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Banners";
        $top_right_banner_1 = Banner::where([
                            'type'=>'Banners_Top_Right',
                            'order_no'=>1
                        ])->first();
        $top_right_banner_2 = Banner::where([
                            'type'=>'Banners_Top_Right',
                            'order_no'=>2
                        ])->first();
        $top_right_banner_3 = Banner::where([
                            'type'=>'Banners_Top_Right',
                            'order_no'=>3
                        ])->first();

        $banner_group_1 = Banner::where([
                            'type'=>'Banner-Groups',
                            'order_no'=>1
                        ])->first();
        $banner_group_2 = Banner::where([
                            'type'=>'Banner-Groups',
                            'order_no'=>2
                        ])->first();
        $banner_group_3 = Banner::where([
                            'type'=>'Banner-Groups',
                            'order_no'=>3
                        ])->first();

        $banner_long = Banner::where('type', 'Banner-Long')
                        ->first();
        $banner_short = Banner::where('type', 'Banner-Short')
                        ->first();
        $banner_box = Banner::where('type', 'Banner-Box')
                        ->first();

        return view('Banners.index', compact(
            'pageTitle', 
            'top_right_banner_1',
            'top_right_banner_2',
            'top_right_banner_3',
            'banner_group_1',
            'banner_group_2',
            'banner_group_3',
            'banner_long', 
            'banner_short', 
            'banner_box'
        ));
    }
    public function ads_banner_index(){
        $pageTitle = "Ads-Banners";
        $data = Banner::where('type', 'Ads-Banner')
                        ->orderBy('order_no', 'ASC')
                        ->paginate(20);
        return view('Banners.index', compact('data', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Banner";
        return view('Banners.add', compact('pageTitle'));
    }

    public function create_ads_banner()
    {
        $pageTitle = "Ads-Banner";
        return view('Banners.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store banners
        $this->validate($request, [
            'type'=>'required|string|in:Banners_Top_Right,Ads-Banner',
            'title'=>'nullable|string|max:100',
            'link'=>'nullable|string|url',
            'start_time'=>'required|date',
            'end_time'=>'required|date'
        ]);

        $current = Carbon::now();
        $today = $current->format('Y-m-d');
        if ($today > (date('Y-m-d', strtotime($request->start_time)))) {
            return redirect()->back()->with('error', 'SORRY - Start Time can not be backdate');
        }

        if (date('Y-m-d', strtotime($request->start_time)) >= date('Y-m-d', strtotime($request->end_time))) {
            return redirect()->back()->with('error', 'SORRY - End Time can not be equal or less of Start Time');
        }
        

        if ($request->type === "Banners_Top_Right") {
            $this->validate($request, [
                'order_no'=>'required|numeric|in:1,2,3',
                'image'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=390,height=193'
            ]);

            $data = Banner::where([
                'type'=>"Banners_Top_Right",
                'order_no'=>$request->order_no
            ])->first();
            if ($data) {
                return redirect()->back()->with('error', $request->order_no." order no banner is already exists.");
            }
        }

        //insert image
        $obj_fu = new FileUploader();
        $image = NULL;
        $location = "upload-images/banners/";
        if($request->hasFile('image')){
            $fileName = "banner-".uniqid().Auth::user()->id.mt_rand(10, 9999);
            $fileName__ = $obj_fu->fileUploader($request->file('image'), $fileName, $location);
            $image = $fileName__;
        }else{
            return redirect()->back()->with('error', 'Please Upload Image');
        }

        $url = url('/');
        $inserted = Banner::insert([
            'type'=>$request->type,
            'title'=>$request->title,
            'link'=>$request->link,
            'order_no'=>$request->order_no,
            'image'=>$url."/".$location.$image,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'created_at'=>Carbon::now()
        ]);

        if ($inserted == true) {
            return redirect()->back()->with('success', 'Banner Added');
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
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


    // else{

    //         $this->validate($request, [
    //             'ads_banner_position'=>'required|string|in:Banner-Groups,Banner-Long,Banner-Short,Banner-Box'
    //         ]);

    //         if ($request->ads_banner_position === "Banner-Groups") {
    //             $this->validate($request, [
    //                 'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=285'
    //             ]);
    //         }
    //         if ($request->ads_banner_position === "Banner-Long") {
    //             $this->validate($request, [
    //                 'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=1090,height=245'
    //             ]);
    //         }
    //         if ($request->ads_banner_position === "Banner-Short") {
    //             $this->validate($request, [
    //                 'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=245'
    //             ]);
    //         }
    //         if ($request->ads_banner_position === "Banner-Box") {
    //             $this->validate($request, [
    //                 'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=487,height=379'
    //             ]);
    //         }

    //         $fileName = 'ads-banner-'.uniqid().Auth::user()->id;
    //     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = \Crypt::decrypt($id);
        $data = Banner::findOrFail($id);
        return view('Banners.edit', compact('data'));
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
        //store banners
        $this->validate($request, [
            'type'=>'required|string|in:Banner,Ads-Banner',
            'title'=>'nullable|string|max:100',
            'link'=>'nullable|string|url',
            'order_no'=>'required|numeric',
            'start_time'=>'required|date',
            'end_time'=>'required|date',
        ]);
        $oldData = Banner::where([
            'id'=>$id,
            'type'=>$request->type,
        ])->first();
        if (!$oldData) {
            return redirect()->back()->with('error', 'Sorry - Requested Data not Found!');
        }

        $fileName = "";
        $obj_fu = new FileUploader();
        $lgImage = NULL;
        $url = $this->getURL();
        $location = "upload-images/banners/";

        if($request->hasFile('image_lg')){
            if ($request->type === "Banner") {
                $this->validate($request, [
                    'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=390,height=193'
                ]);
                $fileName = 'banner-'.uniqid().Auth::user()->id;
            
            }else{
                $this->validate($request, [
                    'ads_banner_position'=>'required|string|in:Banner-Groups,Banner-Long,Banner-Short,Banner-Box'
                ]);

                if ($request->ads_banner_position === "Banner-Groups") {
                    $this->validate($request, [
                        'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=285'
                    ]);
                }
                if ($request->ads_banner_position === "Banner-Long") {
                    $this->validate($request, [
                        'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=1090,height=245'
                    ]);
                }
                if ($request->ads_banner_position === "Banner-Short") {
                    $this->validate($request, [
                        'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=245'
                    ]);
                }
                if ($request->ads_banner_position === "Banner-Box") {
                    $this->validate($request, [
                        'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=487,height=379'
                    ]);
                }
                $fileName = 'ads-banner-'.uniqid().Auth::user()->id;
            }

            //upload new image
            //delete
            if ($oldData->image_lg != NULL) {
                $file_name = str_replace($url."/".$location, "", $oldData->image_lg);
                $obj_fu->deleteFile($file_name, $location);
            }
            //upload
            $fileName__ = $obj_fu->fileUploader($request->file('image_lg'), $fileName, $location);
            $lgImage = $fileName__;
            
        
        }

        $url = $this->getURL();
        $updated = Banner::where([
            'id'=>$id,
            'type'=>$request->type
        ])->update([
            'title'=>$request->title,
            'link'=>$request->link,
            'order_no'=>$request->order_no,
            'image_lg'=>($lgImage === NULL ? $oldData->image_lg : $url."/".$location.$lgImage),
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'ads_banner_position'=>$request->ads_banner_position,
            'updated_at'=>Carbon::now()
        ]);

        if ($updated == true) {
            return redirect()->back()->with('success', 'Banner Updated');
        }else{
            return redirect()->back()->with('error', "Something went wrong, please try again later");
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



    //delete the slider
    public function delete_banner($id){
        $id = \Crypt::decrypt($id);
        $data = Banner::where('id', $id)->first();
        if (!$data) {
            return redirect()->back()->with('error', "SORRY - Banner not Found");
        }

        //delete slider images
        $url = $this->getURL();
        $location = "upload-images/banners/";
        $obj_fu = new FileUploader();
        if ($data->image_lg != NULL) {
            $fileName = str_replace($url."/".$location, "", $data->image_lg);
            $obj_fu->deleteFile($fileName, $location);
        }

        $deleted = $data->delete();
        if ($deleted == true) {
            return redirect()->back()->with('success', 'Banner Deleted');
        }else{
            return redirect()->back()->with('error', 'SORRY - Something Wrong!');
        }

    }
}
