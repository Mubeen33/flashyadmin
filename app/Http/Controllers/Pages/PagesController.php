<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function get_page($pageName){
    	if(view()->exists('AdminViews.Pages.' . $pageName)){
            return view("AdminViews.Pages.$pageName");
        }else{
            return abort(404);
        }
    }
}
