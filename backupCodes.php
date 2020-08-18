<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use App\Slider;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //store sliders
        $this->validate([
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
            'image_lg'=>'required|image:png,jpeg,jpg,gif|max:1000',
            'image_sm'=>'required|image:png,jpeg,jpg,gif|max:1000',
        ]);

        //insert image
        $obj_fu = new FileUploader();
        $lgImage = "";
        $smImage = "";
        if($request->hasFile('image_lg')){
            $location = "upload-images/sliders/";
            $fileName ='slider-'.uniqid();
            $fileName__ = $obj_fu->fileUploader($request->file('image_lg'), $fileName, $location);
            $lgImage = $fileName__;
        }else{
            return redirect()->back()->with('error','Please Upload Image');
        }
        if($request->hasFile('image_sm')){
            $location = "upload-images/sliders/";
            $fileName ='slider-'.uniqid();
            $fileName__ = $obj_fu->fileUploader($request->file('image_sm'), $fileName, $location);
            $smImage = $fileName__;
        }else{
            return redirect()->back()->with('error','Please Upload Image');
        }


        Slider::insert([
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
            'image_lg'=>$lgImage,
            'image_sm'=>$smImage,
            'created_at'=>Carbon::now()
        ]);
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
