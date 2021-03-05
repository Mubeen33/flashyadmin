<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    public $timestamps = false;
    public function brands($id = null)
    {    if(!empty($id)){
            return Brand::where(['id'=> $id,'active'=> 'Y'])->get();  
	     }else{
			 return Brand::where('active','Y')->get();  
		 }
        
    }

  
}
