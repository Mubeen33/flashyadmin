<?php

namespace App\Http\Livewire\Product;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use App\Product;
use App\Vendor;

class PendingApproval extends Component
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
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        if(!empty($this->search)){
            $qry=array('title','like','%'.$this->search.'%');
            $where=[
                'approved'=>0,
                 $qry
               ];
           
        }else{
            $where=['approved'=>0 ];
            
        }
        $data = Product::where($where)
        ->orderBy('id', $this->orderBy)
        ->with(['get_vendor', 'get_category', 'get_images', 'get_product_variations', 'get_vendor_products'])
        ->paginate($this->perpage);

        return view('livewire.product.pending-approval',['data'=>$data])->extends('layouts.master');
    }
}
