<?php

namespace App\Http\Livewire\Product;

use App\Product;
use App\VendorProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
class AutoApproved extends Component
{


    use WithPagination;

    public $perpage;
    public $orderBy;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function mount(Request $request){
        $this->perpage=10;
        $this->orderBy='desc';
        $this->search=null;
    }
    public function getFormateDate($date){
        if(!is_null($date)){
            return Carbon::parse($date)->format('d/m/Y');
        }
        return '';
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
//        if(!empty($this->search)){
//            $qry=array('title','like','%'.$this->search.'%');
//            $where=[
//                'approved'=>0,
//                $qry
//            ];
//
//        }else{
//            $where=['approved'=>0 ];
//
//        }

//        DB::enableQueryLog();

//        $data=VendorProduct::where('is_auto_approved',0)
//        ->join('vendors as v','v.id','=','vendor_products.ven_id')
//        ->join('products as p','p.id','=','vendor_products.prod_id')
//        ->select('vendor_products.id as v_p_id',
//            'p.created_at',
//            'v.first_name',
//            'v.last_name',
//            'v.id as vendor_id',
//            'p.id as product_id',
//            'p.title',
//            'p.submission_id',
//            'p.approved',
//            'p.rejected',
//            'p.disable',
//
//        )->paginate($this->perpage);
        if(!empty($this->search)){
            $qry=array('products.title','like','%'.$this->search.'%');
            $where=[
                'products.approved'=>1,
                'vp.is_auto_approved'=>1,
                $qry
            ];

        }else{
            $where=[
                'products.approved'=>1,
                'vp.is_auto_approved'=>1,
            ];

        }
        $data = Product::join('vendor_products as vp','vp.prod_id','=','products.id')
            ->where($where)
            ->orderBy('products.id', $this->orderBy)
            ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations', 'get_vendor_products'])
            ->paginate($this->perpage);
//dd($data);
        return view('livewire.product.auto-approved',['data'=>$data])->extends('layouts.master');
    }


}
