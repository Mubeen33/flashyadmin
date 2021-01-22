<?php

namespace App\Http\Controllers\Appearances;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AppearanceSetting; 


class AppearanceController extends Controller
{
    public function appearance_logo(Request $request){
	    if($request->hasFile('logo')){
	    	$file = $request->file('logo');
	    	if(AppearanceSetting::where('role','site')->where('action','header_logo')->select('path')->exists()){
	    		$sett = AppearanceSetting::where('role','site')->where('action','header_logo')->first();
	    	}
	    	else{
	    		$sett = new AppearanceSetting();
	    	}
	    	$sett->path = "http://localhost/flashyadmin/public/appearance/images/webheader/".$file->getClientOriginalName();
	    	$sett->role = "site";
	    	$sett->action = "header_logo";
	    	$file->move(public_path('\appearance\images\webheader'), $file->getClientOriginalName());
	    	$sett->save();
	    }

	    if($request->hasFile('footer_logo')){
	    	$file = $request->file('footer_logo');
	    	if(AppearanceSetting::where('role','site')->where('action','footer_logo')->select('path')->exists()){
	    		$sett = AppearanceSetting::where('role','site')->where('action','footer_logo')->first();
	    	}
	    	else{
	    		$sett = new AppearanceSetting();
	    	}
	    	$sett->path = "http://localhost/flashyadmin/public/appearance/images/webfooter/".$file->getClientOriginalName();
	    	$sett->role = "site";
	    	$sett->action = "footer_logo";
	    	$file->move(public_path('\appearance\images\webfooter'), $file->getClientOriginalName());
	    	$sett->save();
	    }

	    if($request->hasFile('admin_logo')){
	    	$file = $request->file('admin_logo');
	    	if(AppearanceSetting::where('role','site')->where('action','admin_logo')->select('path')->exists()){
	    		$sett = AppearanceSetting::where('role','site')->where('action','admin_logo')->first();
	    	}
	    	else{
	    		$sett = new AppearanceSetting();
	    	}
	    	$sett->path = "http://localhost/flashyadmin/public/appearance/images/adminlogo/".$file->getClientOriginalName();
	    	$sett->role = "site";
	    	$sett->action = "admin_logo";
	    	$file->move(public_path('\appearance\images\adminlogo'), $file->getClientOriginalName());
	    	$sett->save();
	    }

	    if($request->hasFile('favicon')){
	    	$file = $request->file('favicon');
	    	if(AppearanceSetting::where('role','site')->where('action','favicon')->select('path')->exists()){
	    		$sett = AppearanceSetting::where('role','site')->where('action','favicon')->first();
	    	}
	    	else{
	    		$sett = new AppearanceSetting();
	    	}
	    	$sett->path = "http://localhost/flashyadmin/public/appearance/images/favicon/".$file->getClientOriginalName();
	    	$sett->role = "site";
	    	$sett->action = "favicon";
	    	$file->move(public_path('\appearance\images\favicon'), $file->getClientOriginalName());
	    	$sett->save();
	    }
	    
	    if($request->hasFile('seller_logo')){
	    	$file = $request->file('seller_logo');
	    	if(AppearanceSetting::where('role','site')->where('action','seller_logo')->select('path')->exists()){
	    		$sett = AppearanceSetting::where('role','site')->where('action','seller_logo')->first();
	    	}
	    	else{
	    		$sett = new AppearanceSetting();
	    	}
	    	$sett->path = "http://localhost/flashyadmin/public/appearance/images/sellerlogo/".$file->getClientOriginalName();
	    	$sett->role = "site";
	    	$sett->action = "seller_logo";
	    	$file->move(public_path('\appearance\images\sellerlogo'), $file->getClientOriginalName());
	    	$sett->save();
	    }
	   	
	    return back();
    }

    
}
