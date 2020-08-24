<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            'text_lines'=>'required|string|max:350',
        ]);

        //if pass then
        $result = NULL;
        $oldData = SignupContent::where('id', 1)->first();
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
