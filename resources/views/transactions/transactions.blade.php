@extends('layouts.master')
@section('page-title','Transactions')


@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Transactions</li>
@endsection 
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div><h4 class="card-title">Transactions List</h4></div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table  class="table table-striped table-hover mb-0">                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Vendor Order id</th>
                                                    <th>Order Token</th>
                                                    <th>Vendor</th>
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Product Price</th>
                                                    <th title="Grand Total">Transaction Type</th>
                                                    <th>Commission</th>
                                                    <th>VAT</th>
                                                    <th>User Transaction Amount</th>
                                                    <th>Vendor Balance</th>
                                                </tr>
                                            </thead>

                                            <tbody id="render__data">
                                            @foreach($transactions as $transaction)
                                                <tr>
                                                    <td>{{ $transaction->order_id }}</td>
                                                    <td>{{ $transaction->vendor_order_id }}</td>
                                                    <td>{{ $transaction->order_token }}</td>
                                                    <td>
                                                        @php
                                                            $vendor = (App\Vendor::where('id',$transaction->vendor_id)->value('company_name'));
                                                        @endphp
                                                        {{ $vendor }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $product = (App\Product::where('id',$transaction->product_id)->first());
                                                        @endphp
                                                        {{ $product->title }}
                                                    </td>
                                                    <td>
                                                        @php 
                                                            $vendorProduct = (App\VendorProduct::where('id',$transaction->vendor_product_id)->first());
                                                            if (!empty($vendorProduct->variation_id)) {
                                                                
                                                                $image = (App\ProductVariation::where('id',$vendorProduct->variation_id)->value('variant_image'));
                                                                if (empty($image)) {
                                                                    
                                                                    $image = (App\ProductMedia::where('image_id',$product->image_id)->value('image'));
                                                                }
                                                            }else{

                                                                $image = (App\ProductMedia::where('image_id',$product->image_id)->value('image'));
                                                            }
                                                        @endphp

                                                        <img src="{{ $image }}" width="80" height="80">
                                                    </td>
                                                    <td>
                                                        {{ $transaction->product_price }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->transaction_type }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->deduct_amount }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->vat_amount }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->user_t_amount }}
                                                    </td>
                                                    <td>
                                                        {{ $transaction->total_balance }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
