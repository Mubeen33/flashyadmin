<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use App\SignupContent;
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
            'heading'=>'nullable|string|max:250',
            'description'=>'nullable|string|max:250',
            'text_line_one'=>'nullable|string|max:250',
            'text_line_two'=>'nullable|string|max:250',
            'text_line_three'=>'nullable|string|max:250',
            'text_line_one_icon'=>'nullable|image|mimes:jpeg,jpg,png,gif|max:1000',
            'text_line_two_icon'=>'nullable|image|mimes:jpeg,jpg,png,gif|max:1000',
            'text_line_three_icon'=>'nullable|image|mimes:jpeg,jpg,png,gif|max:1000',
        ]);


        //if pass then
        $result = NULL;
        $oldData = SignupContent::where('id', 1)->first();

        $obj_fu = new FileUploader();
        $url = url('/');
        $text_line_one_icon = NULL;
        $location = "upload-images/signup-contents/";
        if ($request->hasFile('text_line_one_icon')) {
            $oldFile = ($oldData ? $oldData->text_line_one_icon : NULL);
            $this->uploadIcon($location, $request->text_line_one_icon, );
        }

        if ($oldData) {
            $result = $oldData->update([
                'heading'=>$request->heading,
                'description'=>$request->description,
                'text_lines'=>$request->text_lines,
                'updated_at'=>Carbon::now()
            ]);
        }else{
            $result = SignupContent::insert([
                'heading'=>$request->heading,
                'description'=>$request->description,
                'text_lines'=>$request->text_lines,
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
        if ($oldFile != NULL) {
            $file_name = str_replace($url."/".$location, "", $oldFile);
            $obj_fu->deleteFile($file_name, $location);
        }
        $fileName ='icon-'.uniqid();
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
