<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\FileUploader;
use App\Banner;
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
        $data = Banner::where('type', 'Banner')
                        ->orderBy('order_no', 'ASC')
                        ->paginate(20);
        return view('Banners.index', compact('data', 'pageTitle'));
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
        $validation = Validator::make($request->all(), [
            'type'=>'required|string|in:Banner,Ads-Banner',
            'title'=>'nullable|string|max:100',
            'link'=>'nullable|string|url',
            'order_no'=>'required|numeric',
            'start_time'=>'required|date',
            'end_time'=>'required|date'
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

        $current = Carbon::now();
        $today = $current->format('Y-m-d');
        if ($today > (date('Y-m-d', strtotime($request->start_time)))) {
            return response()->json([
                    'field'=>"start_time",
                    'targetHighlightIs'=>"",
                    'msg'=>"SORRY - Start Time can not be backdate",
                    'need_scroll'=>"yes"
                ], 422);
        }

        if (date('Y-m-d', strtotime($request->start_time)) >= date('Y-m-d', strtotime($request->end_time))) {
            return response()->json([
                    'field'=>"end_time",
                    'targetHighlightIs'=>"",
                    'msg'=>"SORRY - End Time can not be equal or less of Start Time",
                    'need_scroll'=>"yes"
                ], 422);
        }
        

        $fileName = "";
        if ($request->type === "Banner") {
            $validation = Validator::make($request->all(), [
                'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=390,height=193'
            ]);
            if ($validation->fails()) {
                return response()->json([
                    'field'=>"image_lg",
                    'targetHighlightIs'=>"",
                    'msg'=>"Image is required of png,jpeg,jpg,gif & width=390, height=193",
                    'need_scroll'=>"no"
                ], 422);
            }
            $fileName = 'banner-'.uniqid();
        }else{

            $validation = Validator::make($request->all(), [
                'ads_banner_position'=>'required|string|in:Banner-Groups,Banner-Long,Banner-Short,Banner-Box'
            ]);
            if ($validation->fails()) {
                return response()->json([
                    'field'=>"ads_banner_position",
                    'targetHighlightIs'=>"",
                    'msg'=>"Required Banner Position",
                    'need_scroll'=>"no"
                ], 422);
            }

            if ($request->ads_banner_position === "Banner-Groups") {
                $validation = Validator::make($request->all(), [
                    'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=285'
                ]);
                if ($validation->fails()) {
                    return response()->json([
                        'field'=>"image_lg",
                        'targetHighlightIs'=>"",
                        'msg'=>"Image is required of png,jpeg,jpg,gif & width=530, height=285",
                        'need_scroll'=>"no"
                    ], 422);
                }
            }
            if ($request->ads_banner_position === "Banner-Long") {
                $validation = Validator::make($request->all(), [
                    'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=1090,height=245'
                ]);
                if ($validation->fails()) {
                    return response()->json([
                        'field'=>"image_lg",
                        'targetHighlightIs'=>"",
                        'msg'=>"Image is required of png,jpeg,jpg,gif & width=1090, height=245",
                        'need_scroll'=>"no"
                    ], 422);
                }
            }
            if ($request->ads_banner_position === "Banner-Short") {
                $validation = Validator::make($request->all(), [
                    'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=245'
                ]);
                if ($validation->fails()) {
                    return response()->json([
                        'field'=>"image_lg",
                        'targetHighlightIs'=>"",
                        'msg'=>"Image is required of png,jpeg,jpg,gif & width=530, height=245",
                        'need_scroll'=>"no"
                    ], 422);
                }
            }
            if ($request->ads_banner_position === "Banner-Box") {
                $validation = Validator::make($request->all(), [
                    'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=487,height=379'
                ]);
                if ($validation->fails()) {
                    return response()->json([
                        'field'=>"image_lg",
                        'targetHighlightIs'=>"",
                        'msg'=>"Image is required of png,jpeg,jpg,gif & width=487, height=379",
                        'need_scroll'=>"no"
                    ], 422);
                }
            }
            $fileName = 'ads-banner-'.uniqid();
        }

        //insert image
        $obj_fu = new FileUploader();
        $lgImage = "";
        $location = "upload-images/banners/";
        if($request->hasFile('image_lg')){
            $fileName__ = $obj_fu->fileUploader($request->file('image_lg'), $fileName, $location);
            $lgImage = $fileName__;
        }else{
            if ($validation->fails()) {
                return response()->json([
                    'field'=>"image_lg",
                    'targetHighlightIs'=>"",
                    'msg'=>"Please Upload Image",
                    'need_scroll'=>"no"
                ], 422);
            }
        }

        $url = $this->getURL();
        $inserted = Banner::insert([
            'type'=>$request->type,
            'title'=>$request->title,
            'link'=>$request->link,
            'order_no'=>$request->order_no,
            'image_lg'=>$url."/".$location.$lgImage,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'ads_banner_position'=>$request->ads_banner_position,
            'created_at'=>Carbon::now()
        ]);

        if ($inserted == true) {
            return response()->json([
                    'success'=>true,
                    'msg'=>"Banner Added",
            ], 200);
        }else{
            return response()->json("Something went wrong, please try again later", 500);
        }
    }


    private function getURL(){
        if(isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }
        else{
            $protocol = 'http';
        }
        $http_port = $protocol . "://" . parse_url($_SERVER['REQUEST_URI'], PHP_URL_HOST);
        return $http_port.$_SERVER['HTTP_HOST'];
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
            'end_time'=>'required|date'
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
                $validation = Validator::make($request->all(), [
                    'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=390,height=193'
                ]);
                if ($validation->fails()) {
                    return response()->json([
                        'field'=>"image_lg",
                        'targetHighlightIs'=>"",
                        'msg'=>"Image is required of png,jpeg,jpg,gif & width=390, height=193",
                        'need_scroll'=>"no"
                    ], 422);
                }
                $fileName = 'banner-'.uniqid();
            
            }else{
                $validation = Validator::make($request->all(), [
                    'ads_banner_position'=>'required|string|in:Banner-Groups,Banner-Long,Banner-Short,Banner-Box'
                ]);
                if ($validation->fails()) {
                    return response()->json([
                        'field'=>"ads_banner_position",
                        'targetHighlightIs'=>"",
                        'msg'=>"Required Banner Position",
                        'need_scroll'=>"no"
                    ], 422);
                }

                if ($request->ads_banner_position === "Banner-Groups") {
                    $validation = Validator::make($request->all(), [
                        'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=285'
                    ]);
                    if ($validation->fails()) {
                        return response()->json([
                            'field'=>"image_lg",
                            'targetHighlightIs'=>"",
                            'msg'=>"Image is required of png,jpeg,jpg,gif & width=530, height=285",
                            'need_scroll'=>"no"
                        ], 422);
                    }
                }
                if ($request->ads_banner_position === "Banner-Long") {
                    $validation = Validator::make($request->all(), [
                        'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=1090,height=245'
                    ]);
                    if ($validation->fails()) {
                        return response()->json([
                            'field'=>"image_lg",
                            'targetHighlightIs'=>"",
                            'msg'=>"Image is required of png,jpeg,jpg,gif & width=1090, height=245",
                            'need_scroll'=>"no"
                        ], 422);
                    }
                }
                if ($request->ads_banner_position === "Banner-Short") {
                    $validation = Validator::make($request->all(), [
                        'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=530,height=245'
                    ]);
                    if ($validation->fails()) {
                        return response()->json([
                            'field'=>"image_lg",
                            'targetHighlightIs'=>"",
                            'msg'=>"Image is required of png,jpeg,jpg,gif & width=530, height=245",
                            'need_scroll'=>"no"
                        ], 422);
                    }
                }
                if ($request->ads_banner_position === "Banner-Box") {
                    $validation = Validator::make($request->all(), [
                        'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=487,height=379'
                    ]);
                    if ($validation->fails()) {
                        return response()->json([
                            'field'=>"image_lg",
                            'targetHighlightIs'=>"",
                            'msg'=>"Image is required of png,jpeg,jpg,gif & width=487, height=379",
                            'need_scroll'=>"no"
                        ], 422);
                    }
                }
                $fileName = 'ads-banner-'.uniqid();
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
            return response()->json([
                    'success'=>true,
                    'msg'=>"Banner Updated",
            ], 200);
        }else{
            return response()->json("Something went wrong, please try again later", 500);
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
            return redirect()->back()->with('error', 'SORRY - Banner not Found!');
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
