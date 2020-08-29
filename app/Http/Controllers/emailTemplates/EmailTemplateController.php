<?php

namespace App\Http\Controllers\emailTemplates;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use App\EmailTemplate;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = EmailTemplate::orderBy('id', 'DESC')->get();
        return view('email-templates.control.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('email-templates.control.setup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $validate = Validator::make($request->all(), [
            'template'=>'required|string|in:Signup',
            'text_line_one'=>'required|string|max:300',
            'button_text'=>'required|string|max:40',
            'button_link'=>'nullable|url',
            'text_line_two'=>'required|string|max:350',
            'facebook_url'=>'nullable|url',
            'twitter_url'=>'nullable|url',
            'linkedin_url'=>'nullable|url',
            'pinterest_url'=>'nullable|url',
            'youtube_url'=>'nullable|url',
            'footer_text'=>'nullable|string|max:350',
            'top_banner'=>'nullable|image|mimes:png,jpeg,jpg,gif',
            'footer_banner'=>'nullable|image|mimes:png,jpeg,jpg,gif',
        ]);

        if ($validate->fails()) {
            foreach ($validate->messages()->get('*') as $key => $value) {
                return response()->json($value, 422);
            }
        }

        $oldData = EmailTemplate::where('template', $request->template)->first();
        $location = "upload-images/email-assets/";
        $response = $this->manageFiles($request, $oldData, $location);
        if ($response[0] === false) {
            return response()->json($response[1], 422);
        }

        //insert value
        if ($oldData) {
            //update
            $updated = $oldData->update([
                'top_banner'=>($response[1] === NULL ? $oldData->top_banner : url('/')."/".$location.$response[1]),
                'text_line_one'=>$request->text_line_one,
                'button_text'=>$request->button_text,
                'button_link'=>$request->button_link,
                'text_line_two'=>$request->text_line_two,
                'facebook_url'=>$request->facebook_url,
                'twitter_url'=>$request->twitter_url,
                'linkedin_url'=>$request->linkedin_url,
                'pinterest_url'=>$request->pinterest_url,
                'youtube_url'=>$request->youtube_url,
                'footer_banner'=>($response[2] === NULL ? $oldData->footer_banner : url('/')."/".$location.$response[2]),
                'footer_text'=>$request->footer_text,
                'updated_at'=>Carbon::now()
            ]);
            if ($updated == true) {
                return response()->json('Template Updated', 200);
            }else{
                return response()->json('Something went wrong, please refresh & try again.', 422);
            }
        }else{
            //insert
            $inserted = EmailTemplate::insert([
                'template'=>$request->template,
                'top_banner'=>url('/')."/".$location.$response[1],
                'text_line_one'=>$request->text_line_one,
                'button_text'=>$request->button_text,
                'button_link'=>$request->button_link,
                'text_line_two'=>$request->text_line_two,
                'facebook_url'=>$request->facebook_url,
                'twitter_url'=>$request->twitter_url,
                'linkedin_url'=>$request->linkedin_url,
                'pinterest_url'=>$request->pinterest_url,
                'youtube_url'=>$request->youtube_url,
                'footer_banner'=>($response[2] === NULL ? NULL : url('/')."/".$location.$response[2]),
                'footer_text'=>$request->footer_text,
                'created_at'=>Carbon::now()
            ]);
            if ($inserted == true) {
                return response()->json('Template Successfully Setup', 200);
            }else{
                return response()->json('Something went wrong, please refresh & try again to setup.', 422);
            }
        }
    }

    private function manageFiles($request, $oldData, $location){
        $top_banner = NULL;
        $footer_banner = NULL;
        //check files
        $obj_fu = new FileUploader();
        $url  = url('/');
        

        //if has old data
        if ($oldData) {
            if ($request->hasFile('top_banner')) {
                if ($oldData->top_banner != NULL) {
                    //delete old file
                    $file_name = str_replace($url."/".$location, "", $oldData->top_banner);
                    $obj_fu->deleteFile($file_name, $location);
                }
                //upload new one
                $fileName ='banner-'.uniqid();
                $fileName__ = $obj_fu->fileUploader($request->file('top_banner'), $fileName, $location);
                $top_banner = $fileName__;
            }
        }

        //if not old data
        if (!$oldData) {
            if ($request->hasFile('top_banner')) {
                $fileName ='banner-'.uniqid();
                $fileName__ = $obj_fu->fileUploader($request->file('top_banner'), $fileName, $location);
                $top_banner = $fileName__;
            }else{
                $respone = [false, 'Top Banner is required'];
                return $respone;
            }
        }

        //if has old data
        if ($request->hasFile('footer_banner')) {
            if ($oldData && $oldData->footer_banner != NULL) {
                //delete old file
                $file_name = str_replace($url."/".$location, "", $oldData->footer_banner);
                $obj_fu->deleteFile($file_name, $location);
            }
            //upload new one
            $fileName ='banner-'.uniqid();
            $fileName__ = $obj_fu->fileUploader($request->file('footer_banner'), $fileName, $location);
            $footer_banner = $fileName__;
        }
        
        $respone = [true, $top_banner, $footer_banner];
        return $respone;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = \Crypt::decrypt($id);
        $data = EmailTemplate::findOrFail($id);
        return view('email-templates.control.show', compact('data'));
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


    //custom
    public function get_template(Request $request){
        

        if ($request->ajax()) {
            $validation = Validator::make($request->all(), [
                'templateName'=>'required|string|in:Signup'
            ]);

            if ($validation->fails()) {
                return response()->json('Invalid Request', 422);
            }
            $data = EmailTemplate::where('template', $request->templateName)->first();
            return view('email-templates.control.partials.form-body', compact('data'))->render();
        }
        return abort(404);
    }
}
