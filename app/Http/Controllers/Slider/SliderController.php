<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use App\Slider;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::orderBy('order_no', 'ASC')->paginate(20);
        return view('Sliders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sliders.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());

        //store sliders
        $this->validate($request, [
            'title'=>'nullable|string|max:100',
            'description'=>'nullable|string|max:150',
            'link'=>'nullable|string|url',
            'order_no'=>'nullable|numeric',
            'button_text'=>'nullable|string|max:30',
            'text_color'=>'nullable|string|max:100',
            'button_color'=>'nullable|string|max:100',
            'button_text_color'=>'nullable|string|max:100',
            'title_animation'=>'nullable|string|max:100',
            'description_animation'=>'nullable|string|max:100',
            'button_animation'=>'nullable|string|max:100',
            'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=1230,height=445',
            'image_sm'=>'required|image:png,jpeg,jpg,gif|max:1000|dimensions:width=600,height=300',
            'slider_type'=>'required|string|in:Product,Deal',
            'daterange'=>'required',
        ]);

        // $current = Carbon::now();
        // $today = $current->format('Y-m-d');
        // if ($today > (date('Y-m-d', strtotime($request->start_time)))) {
        //     return response()->json([
        //             'field'=>"start_time",
        //             'targetHighlightIs'=>"",
        //             'msg'=>"SORRY - Start Time can not be backdate",
        //             'need_scroll'=>"no"
        //         ], 422);
        // }

        // if (date('Y-m-d', strtotime($request->start_time)) >= date('Y-m-d', strtotime($request->end_time))) {
        //     return response()->json([
        //             'field'=>"end_time",
        //             'targetHighlightIs'=>"",
        //             'msg'=>"SORRY - End Time can not be equal or less of Start Time",
        //             'need_scroll'=>"no"
        //         ], 422);
        // }

        //insert image
        $obj_fu = new FileUploader();
        $lgImage = "";
        $smImage = "";
        $location = "upload-images/sliders/";
        if($request->hasFile('image_lg')){
            $fileName ='slider-'.uniqid().Auth::user()->id;
            $fileName__ = $obj_fu->fileUploader($request->file('image_lg'), $fileName, $location);
            $lgImage = $fileName__;
        }else{
            return redirect()->back()->with('error', "Please Upload Desktop Image");
        }

        if($request->hasFile('image_sm')){
            $fileName ='slider-'.uniqid();
            $fileName__ = $obj_fu->fileUploader($request->file('image_sm'), $fileName, $location);
            $smImage = $fileName__;
        }else{
            return redirect()->back()->with('error', "Please Upload Mobile Image");
        }


        $string = explode('-', $request->daterange);
        

        $date1 = explode('/',$string[0]);
        $date2 = explode('/',$string[1]);

        

        $makefinalDate1 = $date1[2].'-'.$date1[0].'-'.$date1[1];
        $makefinalDate2 = $date2[2].'-'.$date2[0].'-'.$date2[1];

        
        $finalDate1 = date('Y-m-d', strtotime($makefinalDate1));
        $finalDate2 = date('Y-m-d', strtotime($makefinalDate2));

       // return $finalDate1;

        //dd($finalDate1);

        $url = $this->getURL();
        $inserted = Slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'link'=>$request->link,
            'order_no'=>$request->order_no,
            'button_text'=>$request->button_text,
            'text_color'=>$request->text_color,
            'button_color'=>$request->button_color,
            'button_text_color'=>$request->button_text_color,
            'title_animation'=>$request->title_animation,
            'description_animation'=>$request->description_animation,
            'button_animation'=>$request->button_animation,
            'image_lg'=>$url."/".$location.$lgImage,
            'image_sm'=>$url."/".$location.$smImage,
            'slider_type'=>$request->slider_type,
            'start_time'=>$finalDate1,
            'end_time'=>$finalDate2,
            'created_at'=>Carbon::now()
        ]);

        if ($inserted == true) {
            return redirect()->back()->with('success', 'Slider Added');
            
        }else{
            return redirect()->back()->with('error', 'SORRY - Something wrong.');
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
        $data = Slider::findOrFail($id);
        return view('Sliders.edit', compact('data'));
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
        //update slider
        $this->validate($request, [
            'title'=>'nullable|string|max:100',
            'description'=>'nullable|string|max:150',
            'link'=>'nullable|string|url',
            'order_no'=>'nullable|numeric',
            'button_text'=>'nullable|string|max:30',
            'text_color'=>'nullable|string|max:100',
            'button_color'=>'nullable|string|max:100',
            'button_text_color'=>'nullable|string|max:100',
            'title_animation'=>'nullable|string|max:100',
            'description_animation'=>'nullable|string|max:100',
            'button_animation'=>'nullable|string|max:100',
            'image_lg'=>'nullable|image:png,jpeg,jpg,gif|max:1000|dimensions:width=1230,height=445',
            'image_sm'=>'nullable|image:png,jpeg,jpg,gif|max:1000|dimensions:width=600,height=300',
            'slider_type'=>'required|string|in:Product,Deal',
            'start_time'=>'required|date',
            'end_time'=>'required|date'
        ]);


        $oldData = Slider::where('id', $id)->first();
        if (!$oldData) {
            return response()->json("SORRY - Invalid Request", 404);
        }

        $current = Carbon::now();
        $today = $current->format('Y-m-d');

        if ($oldData->start_time != $request->start_time) {
            if ($today > (date('Y-m-d', strtotime($request->start_time)))) {
                return redirect()->back()->with('error', 'SORRY - Start Time can not be backdate');
            }
        }
        

        if ($oldData->end_time != $request->end_time) {
            if (date('Y-m-d', strtotime($request->start_time)) >= date('Y-m-d', strtotime($request->end_time))) {
                return redirect()->back()->with('error', 'SORRY - End Time can not be equal or less of Start Time');
            }
        }
        
        
        

        //insert image
        $obj_fu = new FileUploader();
        $lgImage = NULL;
        $smImage = NULL;
        $url = $this->getURL();
        $location = "upload-images/sliders/";
        if($request->hasFile('image_lg')){
            //delete
            if ($oldData->image_lg != NULL) {
                $file_name = str_replace($url."/".$location, "", $oldData->image_lg);
                $obj_fu->deleteFile($file_name, $location);
            }
            //upload
            $fileName ='slider-'.uniqid().Auth::user()->id;
            $fileName__ = $obj_fu->fileUploader($request->file('image_lg'), $fileName, $location);
            $lgImage = $fileName__;
        }

        if($request->hasFile('image_sm')){
            //delete
            if ($oldData->image_sm != NULL) {
                $file_name = str_replace($url."/".$location, "", $oldData->image_sm);
                $obj_fu->deleteFile($file_name, $location);
            }
            //upload
            $fileName ='slider-'.uniqid().Auth::user()->id;
            $fileName__ = $obj_fu->fileUploader($request->file('image_sm'), $fileName, $location);
            $smImage = $fileName__;
        }


        $updated = Slider::where('id', $id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'link'=>$request->link,
            'order_no'=>$request->order_no,
            'button_text'=>$request->button_text,
            'text_color'=>$request->text_color,
            'button_color'=>$request->button_color,
            'button_text_color'=>$request->button_text_color,
            'title_animation'=>$request->title_animation,
            'description_animation'=>$request->description_animation,
            'button_animation'=>$request->button_animation,
            'image_lg'=>($lgImage === NULL ? $oldData->image_lg : $url."/".$location.$lgImage),
            'image_sm'=>($smImage === NULL ? $oldData->image_sm : $url."/".$location.$smImage),
            'slider_type'=>$request->slider_type,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'updated_at'=>Carbon::now()
        ]);

        if ($updated == true) {
            return redirect()->back()->with('success', 'Slider Updated Successfully.');
        }else{
            return redirect()->back()->with('error', 'SORRY - Something wrong.');
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
    public function delete_slider($id){
        $id = \Crypt::decrypt($id);
        $data = Slider::where('id', $id)->first();
        if (!$data) {
            return redirect()->back()->with('error', 'SORRY - Slider not Found!');
        }

        //delete slider images
        $url = $this->getURL();
        $location = "upload-images/sliders/";
        $obj_fu = new FileUploader();
        if ($data->image_lg != NULL) {
            $fileName = str_replace($url."/".$location, "", $data->image_lg);
            $obj_fu->deleteFile($fileName, $location);
        }
        if ($data->image_sm != NULL) {
            $fileName = str_replace($url."/".$location, "", $data->image_sm);
            $obj_fu->deleteFile($fileName, $location);
        }

        $deleted = $data->delete();
        if ($deleted == true) {
            return redirect()->back()->with('success', 'Slider Deleted');
        }else{
            return redirect()->back()->with('error', 'SORRY - Something Wrong!');
        }

    }



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
                $data = Slider::where("title", "LIKE", "%$searchKey%")
                            ->orWhere("description", "LIKE", "%$searchKey%")
                            ->orWhere("slider_type", "LIKE", "%$searchKey%")
                            ->orWhere("start_time", "LIKE", "%$searchKey%")
                            ->orWhere("end_time", "LIKE", "%$searchKey%")
                            ->orderBy($sort_by, $sorting_order)
                            ->paginate($row_per_page);
                return view('Sliders.partials.sliders-list', compact('data'))->render();
            }

            $data = Slider::orderBy($sort_by, $sorting_order)->paginate($row_per_page);
            return view('Sliders.partials.sliders-list', compact('data'))->render();
        }
        return abort(404);
    }
}
