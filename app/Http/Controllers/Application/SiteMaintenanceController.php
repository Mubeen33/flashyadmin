<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application;
use Carbon\Carbon;

class SiteMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Application::where('type', 'site')->first();
        return view('Application.index', compact('data'));
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
            'application_mood'=>'required|numeric|in:1,0',
        ]);

        $live_at = NULL;
        if (intval($request->application_mood) === 0) {
            $this->validate($request, [
                'live_time'=>'required|date_format:Y-m-d\TH:i'
            ]);
            $result = $this->validateDateTime($request->live_time);
            if ($result !== true) {
                return redirect()->back()->with('error', $result);
            }
            $live_at = date('Y-m-d H:i', strtotime($request->live_time));
        }
        

        $data = Application::where('type', 'site')->first();
        if ($data) {
            //update
            $data->update([
                'active_mood'=>$request->application_mood,
                'live_at'=>$live_at,
                'updated_at'=>Carbon::now()
            ]);
            return redirect()->back()->with('success', 'Application Mood Updated Successfully');
        }else{
            Application::insert([
                'active_mood'=>$request->application_mood,
                'live_at'=>$live_at,
                'created_at'=>Carbon::now()
            ]);
            return redirect()->back()->with('success', 'Application Mood Setup Successfully');
        }
    }


    private function validateDateTime($live_time){
        $current = Carbon::now();
        $current = $current->addMinutes(10);
        $today = $current->format('Y-m-d H:i');
        if ($today > (date('Y-m-d H:i', strtotime($live_time)))) {
            return "SORRY - Live Time can not be backdate & at least 10 minutes difference from now.";
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
