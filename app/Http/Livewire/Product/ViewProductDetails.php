<?php

namespace App\Http\Livewire\Product;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\brand;
use App\Variation;
use Livewire\Component;

class ViewProductDetails extends Component
{
    public $productID;
    public function mount(Request $request){
        $this->id=null;
        if(!empty($request->id)){
            $this->id=decrypt($request->id);
        }
       
    }
    public function render()
    {
        if(!empty($this->id)){
            $productDetails=Product::where(["id"=>$this->id,"approved"=>0])->first();
            $categoryList=Category::where("parent_id",0)->get();
            $variationList = Variation::where('active',1)->get();
            $brandModel=new brand();
            $brandsList=$brandModel->brands();
           // debug($productDetails,true);
           
            return view('livewire.product.view-product-details',compact('variationList','categoryList','brandsList','productDetails'))->extends('layouts.master');

        }
       
    }
}
