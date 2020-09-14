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
                            'type'=>'Banners_Group',
                            'order_no'=>1
                        ])->first();
        $banner_group_2 = Banner::where([
                            'type'=>'Banners_Group',
                            'order_no'=>2
                        ])->first();
        $banner_group_3 = Banner::where([
                            'type'=>'Banners_Group',
                            'order_no'=>3
                        ])->first();

        $banner_long = Banner::where('type', 'Banner_Long')
                        ->first();
        $banner_short = Banner::where('type', 'Banner_Short')
                        ->first();
        $banner_box = Banner::where('type', 'Banner_Box')
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
            'type'=>'required|string|in:Banners_Top_Right,Banners_Group,Banner_Long,Banner_Short,Banner_Box',
            'title'=>'nullable|string|max:60',
            'link'=>'nullable|string|url',
            'primary_image'=>'nullable|image|mimes:jpg,jpeg,png,gif|max:1000',
            'secondary_title'=>'nullable|string|max:60',
            'secondary_link'=>'nullable|string|url',
            'start_time'=>'nullable|date',
            'end_time'=>'nullable|date',
            'secondary_image'=>'nullable|image|mimes:jpg,jpeg,png,gif|max:1000'
        ]);

        
        //if Banners_Top_Right
        if ($request->type === "Banners_Top_Right") {
            $this->validate($request, [
                'order_no'=>'required|numeric|in:1,2,3',
                'primary_image'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=390,height=193'
            ]);

            if ($request->hasFile('secondary_image')) {
                $this->validate($request, [
                    'secondary_image'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=390,height=193',
                    'start_time'=>'required|date',
                    'end_time'=>'required|date'
                ]);
                $result = $this->validateDateTime($request->start_time, $request->end_time);
                if ($result !== true) {
                    return redirect()->back()->with('error', $result);
                }
            }

            $data = Banner::where([
                'type'=>"Banners_Top_Right",
                'order_no'=>$request->order_no
            ])->first();
            if ($data) {
                return redirect()->back()->with('error', $request->order_no." order no banner is already exists.");
            }
        }

        //if  Banners_Group
        if ($request->type === "Banners_Group") {
            $this->validate($request, [
                'order_no'=>'required|numeric|in:1,2,3',
                'primary_image'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=285'
            ]);

            if ($request->hasFile('secondary_image')) {
                $this->validate($request, [
                    'secondary_image'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=285',
                    'start_time'=>'required|date',
                    'end_time'=>'required|date'
                ]);
                $result = $this->validateDateTime($request->start_time, $request->end_time);
                if ($result !== true) {
                    return redirect()->back()->with('error', $result);
                }
            }

            $data = Banner::where([
                'type'=>"Banners_Group",
                'order_no'=>$request->order_no
            ])->first();
            if ($data) {
                return redirect()->back()->with('error', $request->order_no." order no banner is already exists.");
            }
        }

        //if  Banner_Long
        if ($request->type === "Banner_Long") {
            $this->validate($request, [
                'order_no'=>'required|numeric|in:0',
                'primary_image'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=1090,height=245'
            ]);

            if ($request->hasFile('secondary_image')) {
                $this->validate($request, [
                    'secondary_image'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=1090,height=245',
                    'start_time'=>'required|date',
                    'end_time'=>'required|date'
                ]);
                $result = $this->validateDateTime($request->start_time, $request->end_time);
                if ($result !== true) {
                    return redirect()->back()->with('error', $result);
                }
            }

            $data = Banner::where([
                'type'=>"Banner_Long",
            ])->first();
            if ($data) {
                return redirect()->back()->with('error', "Long banner is already exists.");
            }
        }

        //if  Banner_Short
        if ($request->type === "Banner_Short") {
            $this->validate($request, [
                'order_no'=>'required|numeric|in:0',
                'primary_image'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=245'
            ]);

            if ($request->hasFile('secondary_image')) {
                $this->validate($request, [
                    'secondary_image'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=245',
                    'start_time'=>'required|date',
                    'end_time'=>'required|date'
                ]);
                $result = $this->validateDateTime($request->start_time, $request->end_time);
                if ($result !== true) {
                    return redirect()->back()->with('error', $result);
                }
            }

            $data = Banner::where([
                'type'=>"Banner_Short",
            ])->first();
            if ($data) {
                return redirect()->back()->with('error', "Short banner is already exists.");
            }
        }

        //if  Banner_Box
        if ($request->type === "Banner_Box") {
            $this->validate($request, [
                'order_no'=>'required|numeric|in:0',
                'primary_image'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=487,height=379'
            ]);

            if ($request->hasFile('secondary_image')) {
                $this->validate($request, [
                    'secondary_image'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=487,height=379',
                    'start_time'=>'required|date',
                    'end_time'=>'required|date'
                ]);
                $result = $this->validateDateTime($request->start_time, $request->end_time);
                if ($result !== true) {
                    return redirect()->back()->with('error', $result);
                }
            }

            $data = Banner::where([
                'type'=>"Banner_Box",
            ])->first();
            if ($data) {
                return redirect()->back()->with('error', "Box banner is already exists.");
            }
        }



        //insert image
        $obj_fu = new FileUploader();
        $primay_banner = NULL;
        $secondary_banner = NULL;
        $location = "upload-images/banners/";
        if($request->hasFile('primary_image')){
            $fileName = "primary-banner-".uniqid().Auth::user()->id.mt_rand(10, 9999);
            $fileName__ = $obj_fu->fileUploader($request->file('primary_image'), $fileName, $location);
            $primay_banner = $fileName__;
        }else{
            return redirect()->back()->with('error', 'Please Upload Primary Banner Image');
        }

        if($request->hasFile('secondary_image')){
            $fileName = "secondary-banner-".uniqid().Auth::user()->id.mt_rand(10, 9999);
            $fileName__ = $obj_fu->fileUploader($request->file('secondary_image'), $fileName, $location);
            $secondary_banner = $fileName__;
        }

        $url = url('/');
        $inserted = Banner::insert([
            'type'=>$request->type,
            'title'=>$request->title,
            'link'=>$request->link,
            'order_no'=>$request->order_no,
            'primary_image'=>$url."/".$location.$primay_banner,
            'secondary_image'=>($secondary_banner === NULL ? NULL : $url."/".$location.$secondary_banner),
            'secondary_title'=>$request->secondary_title,
            'secondary_link'=>$request->secondary_link,
            'secondary_link'=>$request->secondary_link,
            'secondary_start_time'=>$request->start_time,
            'secondary_end_time'=>$request->end_time,
            'created_at'=>Carbon::now()
        ]);

        if ($inserted == true) {
            return redirect()->route('admin.banners.index')->with('success', 'Banner Added');
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    private function validateDateTime($start_time, $end_time){
        $current = Carbon::now();
        $today = $current->format('Y-m-d H:m');
        if ($today > (date('Y-m-d H:m', strtotime($start_time)))) {
            return "SORRY - Start Time can not be backdate";
        }

        if (date('Y-m-d H:m', strtotime($start_time)) >= date('Y-m-d H:m', strtotime($end_time))) {
            return "SORRY - End Time can not be equal or less of Start Time";
        }
        return true;
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
        // $id = \Crypt::decrypt($id);
        // $data = Banner::findOrFail($id);
        // return view('Banners.edit', compact('data'));
    }

    public function edit_banner($type, $orderNo)
    {
        $data = NULL;
        return view('Banners.add', compact('data', 'type', 'orderNo'));
    }
    public function edit_banner_with_id($id)
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
            'type'=>'required|string|in:Banners_Top_Right,Banners_Group,Banner_Long,Banner_Short,Banner_Box',
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


    public function update_banner(Request $request){
        //validate banners
        $this->validate($request, [
            'type'=>'required|string|in:Banner,Ads-Banner',
            'title'=>'nullable|string|max:100',
            'link'=>'nullable|string|url',
            'order_no'=>'required|numeric',
            'start_time'=>'required|date',
            'end_time'=>'required|date',
        ]);
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
