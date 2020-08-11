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
use DB;
use Hash;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = DB::table('categories')
                      ->select('*')
                      ->where('visibility', 1)
                      ->where('parent_id', 0)
                      ->get();
		$categories = array();
		foreach($cat as $c){
			$child = DB::table('categories')
                      ->select('*')
                      ->where('visibility', 1)
                      ->where('parent_id', $c->id)
                      ->get();
			if(count($child) > 0){
				if(!in_array($c->name, $categories)){
					$categories[] = array(
						'id' => $c->id,
						'name' => $c->name,
						'display_order' => $c->display_order,
						'visibility' => $c->visibility,
						'show_on_homepage' => $c->show_on_homepage,
					);
				}
				
				// if has child level -1
				foreach($child as $cc){
					$child_1 = DB::table('categories')
                      ->select('*')
                      ->where('visibility', 1)
                      ->where('parent_id', $cc->id)
                      ->get();
					if(count($child) > 0){
						
						$categories[] = array(
							'id' => $cc->id,
							'name' => $c->name .' > '. $cc->name,
							'display_order' => $cc->display_order,
							'visibility' => $cc->visibility,
							'show_on_homepage' => $cc->show_on_homepage,
						);
						
						foreach($child_1 as $cc_1){
							$categories[] = array(
								'id' => $cc_1->id,
								'name' => $c->name .' > '. $cc->name .' > '. $cc_1->name,
								'display_order' => $cc_1->display_order,
								'visibility' => $cc_1->visibility,
								'show_on_homepage' => $cc_1->show_on_homepage,
							);	
						}
					}else{
						$categories[] = array(
							'id' => $cc->id,
							'name' => $c->name .' > '. $cc->name,
							'display_order' => $cc->display_order,
							'visibility' => $cc->visibility,
							'show_on_homepage' => $cc->show_on_homepage,
						);	
					}
				}
			}else{
				//if has no any child
				$categories[] = array(
					'id' => $c->id,
					'name' => $c->name,
					'display_order' => $cc->display_order,
					'visibility' => $cc->visibility,
					'show_on_homepage' => $cc->show_on_homepage,
				);
			}
		}
     	return view('categories',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function get_category(Request $request){
      $parent_id = $request->cat_id;
        $subcategories = Category::select('id', 'name')->where('id',$parent_id)
                          ->with('subcategories')
                          ->get();
		
		return response()->json([
			'subcategories' => $subcategories
		]);
    }
    
    public function create_category(Request $request)
    {    
		
		//parent_id_settings
		
		if(isset($request->child_3)){
			if($request->child_3 == 0 || $request->child_3 == ''){
				$parent_id = $request->child_2;
			}else{
				$parent_id = $request->child_3;	
			}
		}else if(isset($request->child_2)){
			if($request->child_2 == 0 || $request->child_2 == ''){
				$parent_id = $request->child_1;
			}else{
				$parent_id = $request->child_2;	
			}
		}else if(isset($request->child_1)){
			if($request->child_1 == 0 || $request->child_1 == ''){
				$parent_id = $request->category_id;
			}else{
				$parent_id = $request->child_1;	
			}
		}else{
			$parent_id=0;
		}
		
		
		$visible = $request->visibility_yes.$request->visibility_no;
		$show_on_home_page = $request->homepage_yes.$request->homepage_no;
		$show_category_image = $request->show_category_yes.$request->show_category_no;

		if ($request->category_image != '') {
			$image = $request->file('category_image');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/images/category/');
			$image->move($destinationPath, $name);
		}

		$category = new Categories;
		$category->parent_id = $parent_id;
		$category->name = $request->name_lang_1;
		$category->slug = $request->slug_lang;
		$category->title_meta_tag = $request->title_meta_tag;
		$category->description = $request->description;
		$category->keyword = $request->keywords;
		$category->display_order =   $request->category_order;
		$category->homepage_sort_order =   $request->homepage_order;
		$category->commission =   $request->homepage_order;
		$category->visibility =   1;
		$category->show_on_homepage =   1;
		//$category->show_image_nav =   $show_category_image;
		//$category->image =   $name;
		//$category->is_active =   1;
		//$category->is_disabled =   0;
		if($category->save()){
			echo 'saved';
		}else{
			echo 'error';
		}
    }
	
    public function slider_view(Request $request)
    {   
        // if($request->session()->has('active'))
        // {  
        // }else{
        //      return redirect('/login');
        // }
         $slider = DB::table('images')
                    ->select('*')
                    ->where('is_active',1)
                    ->where('is_deleted',0)
                    ->get();
            return view('slider',compact('slider'));
      
    }

    // Vendor Dashboard Closed


    // Vendor Login Function Starts
    public function vendor_login(Request $request)
    {   
         
       $user = DB::table('vendor')
                    ->select('id','is_active')
                    ->where('username',$request->email)
                    ->get();
        if($user[0]->is_active==1){
            Session::put('active', $user[0]->is_active);
                 return redirect('/');
        }else{
               return redirect('/login');
        }
       
    }
     // Vendor Login Function Closed

     // Vendor Loging Out Function Starts
    public function Logout(Request $request){
           if($request->id !=''){
                Session::flush();
                echo"1";
           }else{
            echo "2";
           }
    
    
    }
    // Vendor Loging Out Function CLosed
 	
	public function register()
    {   
       return redirect('/register');
    }
	
 	public function vendor_register(Request $request)
    {   
       $vendor = new Vendor;
                $vendor->first_name = $request->first_name;
                $vendor->last_name = $request->last_name;
                $vendor->username = $request->username;
                $vendor->company_name = $request->company_name;
                $vendor->email = $request->email;
                $vendor->is_active = 1;
                $vendor->password =  Hash::make($request->password);
                $vendor->save();
                return redirect('/login');
            
    }
    


 	public function profile_setup(Request $request)
	 {   
                $data = DB::table('vendor')
                    ->join('vendor_details','vendor_details.vendor_id','=','vendor.id')
                    ->select('*')
                    ->where('username','xyzlogin2@gmail.com')
                    ->get();
                 $bank = DB::table('bank_details')
                        ->join('vendor','bank_details.vendor_id','=','vendor.id')
                        ->select('bank_details.*')
                        ->where('vendor.username','xyzlogin2@gmail.com')
                        ->get();
                // dd($request->session()->get('active'));
                    if($request->session()->has('active'))
                    {
                        return view('vendor.profile',compact('data','bank'));
                    }else{
                         return redirect('/login');
                    }
              }
            

	public function post_profile(Request $request)
	{   
                     // dd($request->all());
                    if($request->session()->has('active'))
                    {
                        if ($request->logo != '') {
                        $image = $request->file('logo');
                        $name = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/logo');
                        $image->move($destinationPath, $name);
                      
                        Vendor::where('id', $request->session()->get('active'))
                           ->update([
                                'logo'=>$name, 
                                'company_name'=>$request->company_name, 
                                'low_stock'=>$request->low_stock, 
                                'out_of_office'=>$request->out_of_office,
                                'is_active'=>$request->account_status, 
                            ]);
                           return redirect()->back()->with('message', 'Updated successfully..');
                    }else{
                         return redirect('/login');
                    }
              }

            }
  	
	public function post_business(Request $request)
	{   
                     // dd($request->all());
                    if($request->session()->has('active'))
                    {
                        if ($request->vendor_doc != '') {
                        $image = $request->file('vendor_doc');
                        $name = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/business_docs/');
                        $image->move($destinationPath, $name);
                      
                        VendorDetail::where('vendor_id', $request->session()->get('active'))
                           ->update([
                                'legal_name'=>$request->legal_name, 
                                'business_type'=>$request->business_type, 
                                'registration_no'=>$request->registration_no, 
                                'document'=>$name,
                                
                            ]);
                           return redirect()->back()->with('message', 'Updated successfully..');
                    }else{
                         return redirect('/login');
                    }
              }

            }
             
	public function post_addresses(Request $request)
	{   
			// dd($request->all());
			if($request->session()->has('active'))
			{

				VendorDetail::where('vendor_id', $request->session()->get('active'))
				   ->update([
						'recipient_name'=>$request->recipient_name, 
						'street_address'=>$request->street_address, 
						'street_no'=>$request->street_no, 
						'city'=>$request->city,
						'country'=>$request->country, 
						'postal_code'=>$request->postal_code, 
					]);
				   return redirect()->back()->with('message', 'Updated successfully..');
			}else{
				 return redirect('/login');
			}
	  }
         
	public function post_bank(Request $request)
	{   
				// dd($request->all());
				if($request->session()->has('active'))
				{
				   if ($request->debit_order_form != '') {
					$image = $request->file('debit_order_form');
					$name = time().'.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/vendor_docs/');
					$image->move($destinationPath, $name);

					BankDetail::where('vendor_id', $request->session()->get('active'))
					   ->update([
							'fullname'=>$request->fullname, 
							'bank_name'=>$request->bank_name, 
							'account_no'=>$request->account_no, 
							'branch_code'=>$request->branch_code,
							'debit_order_form'=>$name, 
							'approval_status'=>0, 
						]);
					   return redirect()->back()->with('message', 'Updated successfully..');
				}else{
					 return redirect('/login');
				}
		  }
	  }
  	
	public function create_slider(Request $request)
	{   
			 // dd($request->all());
			if($request->session()->has('active'))
			{
				if ($request->file != '') {
				$image = $request->file('file');
				$name = time().'.'.$image->getClientOriginalExtension();
				$destinationPath = public_path('/images/slider/');
				$image->move($destinationPath, $name);


				  $image2 = $request->file('file_mobile');
				  $file_mobile = time().'.'.$image2->getClientOriginalExtension();
				  $destinationPath = public_path('/images/slider/');
				  $image2->move($destinationPath, $file_mobile);

					Images::create([
						'language'=>$request->lang_id, 
						'title'=>$request->title, 
						'description'=>$request->description,
						'link'=>$request->link, 
						'order'=>$request->item_order, 
						'botton_text'=>$request->button_text, 
						'text_color'=>$request->text_color, 
						'botton_color'=>$request->botton_color, 
						'botton_text_color'=>$request->button_text_color, 
						'animation_title'=>$request->animation_title, 
						'animation_description'=>$request->animation_description, 
						'animation_button'=>$request->animation_button, 
						'desktop_image'=>$name, 
						'mobile_image'=>$file_mobile, 
						'is_active'=>1, 
						'is_deleted'=>0,

					]);
				   return redirect()->back()->with('message', 'Slider added successfully..');
			}else{
				 return redirect('/login');
			}
	  }

	}





    public function create()
    {
		$categories = DB::table('categories')
					->select('*')
					->orderBy('id', 'DESC')
					->where('parent_id', 0)
					->get();
        return view('add-category', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
  
        Category::create($request->all());
        return redirect()->route('categories.index')->with('success','Category created successfully.');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $category)
    {
        $edit_cat = DB::table('categories')
					->select('*')
					->orderBy('id', 'DESC')
					->where('id', request()->segment(2))
					->get();
		
		
		//getting all parent categories
		$categories = DB::table('categories')
					->select('*')
					->orderBy('id', 'DESC')
					->where('parent_id', 0)
					->get();
		
        return view('add-category', compact('edit_cat', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
  
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success','Category updated successfully.');        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
