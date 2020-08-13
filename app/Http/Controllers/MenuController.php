<?php

namespace App\Http\Controllers;

use App\Category;
use App\Categories;
use App\Vendor;
use App\Images;
use App\VendorDetail;
use App\BankDetail;
use App\Home_Page;
use App\Inquiry;
use App\Role;
use App\Menu;
use DB;
use Hash;
use Illuminate\Http\Request;

class MenuController extends Controller
{
  public function index(){
      return view('add-menu');
  }

  public function create_menu(Request $request){
    // dd($request->all());
    $data = new Menu;
    $data->name = $request->title;
    $data->visibility = $request->visibility;
    $data->parent = $request->parent;
    $data->link = $request->url;
    $data->sort_order = $request->order;
    // $data->created_at = $request->title;
    
    if($data->save()){
        return redirect()->back()->with('success','Menu Created Successfully');
    }else{
        return redirect()->back()->with('error','Somthing Wrong, please try again later....');
    }
}
public function update_menu(Request $request){
    Menu::where('id', $request->role_id)
    ->update([
        'name'=>$request->title, 
        'visibility'=>$request->visibility, 
        'parent'=>$request->parent, 
        'link'=>$request->url, 
        'sort_order'=>$request->order, 
     ]);
    return redirect()->back()->with('message', 'Updated successfully...');
}
}
