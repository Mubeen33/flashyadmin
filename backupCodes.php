<?php

namespace App\Http\Controllers\Popup;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use App\Popup;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Popup::orderBy('id', 'DESC')->paginate(5);
        return view('Popup.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Popup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store sliders
        $validation = Validator::make($request->all(), [
            'name'=>'required|string|max:70|unique:popups',
            'title'=>'required|string|max:80',
            'description'=>'nullable|string|max:150',
            'button_text'=>'nullable|string|max:20',
            'button_background'=>'nullable|string',
            'button_text_color'=>'nullable|string',
            'button_link'=>'nullable|url',
            'popup_background_image'=>'nullable|image:png,jpeg,jpg,gif|max:1000|dimensions:width=830,height=398',
            'start_time'=>'required|date',
            'end_time'=>'required|date',
            'url_list'=>'required|string|max:3000'
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
                    'need_scroll'=>"no"
                ], 422);
        }

        if (date('Y-m-d', strtotime($request->start_time)) >= date('Y-m-d', strtotime($request->end_time))) {
            return response()->json([
                    'field'=>"end_time",
                    'targetHighlightIs'=>"",
                    'msg'=>"SORRY - End Time can not be equal or less of Start Time",
                    'need_scroll'=>"no"
                ], 422);
        }

        //insert image
        $obj_fu = new FileUploader();
        $popupBG = NULL;
        $location = "upload-images/popup/";
        if($request->hasFile('popup_background_image')){
            $fileName ='popup-bg-'.uniqid();
            $fileName__ = $obj_fu->fileUploader($request->file('popup_background_image'), $fileName, $location);
            $popupBG = $fileName__;
        }

        $url = url('/');

        //insert
        $created = Popup::insert([
            'name'=>$request->name,
            'title'=>$request->title,
            'description'=>$request->description,
            'button_text'=>$request->button_text,
            'button_background'=>$request->button_background,
            'button_text_color'=>$request->button_text_color,
            'popup_background_image'=>($popupBG === NULL ? NULL : $url."/".$location.$popupBG),
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'url_list'=>$request->url_list,
            'created_at'=>Carbon::now()
        ]);

        if ($created == true) {
            return response()->json([
                    'success'=>true,
                    'msg'=>"Popup Created",
            ], 200);
        }else{
            return response()->json("Something went wrong, please try again later", 500);
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
        $id = \Crypt::decrypt($id);
        $data = Popup::findOrFail($id);
        return view('Popup.edit', compact('data'));
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
