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
use App\Admin_User;
use DB;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(){
      return view('add-user');
  }

  public function users_list(){

    $data = DB::table('admin_users')->select('*')->where('visibility',1)->paginate(3);
		return view('user',compact('data'));
	
   
}

  public function create_user(Request $request){
    // dd($request->all());
    $data = new Admin_User;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->address = $request->address;
    $data->mobile = $request->mobile;
    $data->role_id = $request->role_id;
    $data->visibility = $request->visibility;
    
    if($data->save()){
        return redirect()->back()->with('success','User Created Successfully');
    }else{
        return redirect()->back()->with('error','Somthing Wrong, please try again later....');
    }
}
public function update_user(Request $request){
    // dd($request->all());
    Admin_User::where('id', $request->user_id)
    ->update([
        'name'=>$request->name, 
        'email'=>$request->email, 
        'address'=>$request->address, 
        'mobile'=>$request->mobile, 
        'role_id'=>$request->role_id, 
        'visibility'=>$request->visibility, 

     ]);
    return redirect()->back()->with('message', 'User Updated successfully...');
}
public function del_user($id){
    $insert = Admin_User::where('id', $id)
    ->update([
        'visibility' => 0, 
        ]);

        if($insert == true){
            //    dd('Custom Field Updated Successfully');
                 return redirect()->back()->with('success','User Deleted successfully.'); 
            }else{
                // print_r($id);
                return redirect()->back()->with('error','Something wrong, please try agian later');
            }
}
}
