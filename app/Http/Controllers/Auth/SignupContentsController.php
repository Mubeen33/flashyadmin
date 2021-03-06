<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use App\SignupContent;
use Auth;
use Carbon\Carbon;

class SignupContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SignupContent::where('id', 1)->first();
        return view('SignupContents.index', compact('data'));
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
            'heading'=>'required|string|max:250',
            'description'=>'nullable|string|max:250',
            'text_line_one'=>'required|string|max:250',
            'text_line_two'=>'nullable|string|max:250',
            'text_line_three'=>'nullable|string|max:250',
            'text_line_one_icon'=>'nullable|image|mimes:jpeg,jpg,png,gif|dimensions:width=40,height=40|max:1000',
            'text_line_two_icon'=>'nullable|image|mimes:jpeg,jpg,png,gif|dimensions:width=40,height=40|max:1000',
            'text_line_three_icon'=>'nullable|image|mimes:jpeg,jpg,png,gif|dimensions:width=40,height=40|max:1000',
            'banner'=>'nullable|image|mimes:jpeg,jpg,png,gif|dimensions:width=662,height=185|max:1000',
        ]);


        //if pass then
        $result = NULL;
        $oldData = SignupContent::where('id', 1)->first();
        if (!$oldData) {
            if (!$request->hasFile('text_line_one_icon')) {
                return redirect()->back()->with('error', 'Text Line One Icon Required');
            }
        }
        
        $url = url('/');
        $location = "upload-images/signup-contents/";

        $text_line_one_icon = NULL;
        if ($request->hasFile('text_line_one_icon')) {
            $oldFile = ($oldData ? $oldData->text_line_one_icon : NULL);
            $text_line_one_icon = $this->uploadIcon($location, $request->file('text_line_one_icon'), $oldFile);
        }

        $text_line_two_icon = NULL;
        if ($request->hasFile('text_line_two_icon')) {
            $oldFile = ($oldData ? $oldData->text_line_two_icon : NULL);
            $text_line_two_icon = $this->uploadIcon($location, $request->file('text_line_two_icon'), $oldFile);
        }

        $text_line_three_icon = NULL;
        if ($request->hasFile('text_line_three_icon')) {
            $oldFile = ($oldData ? $oldData->text_line_three_icon : NULL);
            $text_line_three_icon = $this->uploadIcon($location, $request->file('text_line_three_icon'), $oldFile);
        }

        $banner = NULL;
        if ($request->hasFile('banner')) {
            $oldFile = ($oldData ? $oldData->banner : NULL);
            $banner = $this->uploadIcon($location, $request->file('banner'), $oldFile);
        }

        if ($oldData) {
            $result = $oldData->update([
                'heading'=>$request->heading,
                'description'=>$request->description,
                'text_line_one'=>$request->text_line_one,
                'text_line_two'=>$request->text_line_two,
                'text_line_three'=>$request->text_line_three,
                'text_line_one_icon'=>($text_line_one_icon === NULL ? $oldData->text_line_one_icon : $url."/".$location.$text_line_one_icon),
                'text_line_two_icon'=>($text_line_two_icon === NULL ? $oldData->text_line_two_icon : $url."/".$location.$text_line_two_icon),
                'text_line_three_icon'=>($text_line_three_icon === NULL ? $oldData->text_line_three_icon : $url."/".$location.$text_line_three_icon),
                'banner'=>($banner === NULL ? $oldData->banner : $url."/".$location.$banner),
                'updated_at'=>Carbon::now()
            ]);
        }else{
            $result = SignupContent::insert([
                'id'=>1,
                'heading'=>$request->heading,
                'description'=>$request->description,
                'text_line_one'=>$request->text_line_one,
                'text_line_two'=>$request->text_line_two,
                'text_line_three'=>$request->text_line_three,
                'text_line_one_icon'=>$url."/".$location.$text_line_one_icon,
                'text_line_two_icon'=>($text_line_two_icon === NULL ? NULL : $url."/".$location.$text_line_two_icon),
                'text_line_three_icon'=>($text_line_three_icon === NULL ? NULL : $url."/".$location.$text_line_three_icon),
                'banner'=>($banner === NULL ? NULL : $url."/".$location.$banner),
                'created_at'=>Carbon::now()
            ]);
        }
        

        if ($result == true) {
            return redirect()->back()->with('success','Data Updated');
        }else{
            return redirect()->back()->with('error','SORRY - Something wrong');
        }
    }


    private function uploadIcon($location, $newFile, $oldFile){
        $obj_fu = new FileUploader();
        $url = url('/');
        if ($oldFile != NULL) {
            $file_name = str_replace($url."/".$location, "", $oldFile);
            $obj_fu->deleteFile($file_name, $location);
        }
        $fileName ='icon-'.uniqid().Auth::user()->id;
        return $obj_fu->fileUploader($newFile, $fileName, $location);
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
