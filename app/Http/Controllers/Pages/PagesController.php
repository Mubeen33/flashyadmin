<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function show_custom_page($slug){
         //return redirect('http://localhost/flashy/flashyweb/public/'.$slug);
    	return redirect('http://mejensi.com/'.$slug);
    }

    public function get_page($pageName){
    	if(view()->exists('AdminViews.Pages.' . $pageName)){
            return view("AdminViews.Pages.$pageName");
        }else{
            return abort(404);
        }
    }
}
