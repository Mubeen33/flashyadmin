@extends('layouts.master')
@section('content')
        <!-- dataTable starts -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="" />
                            </div>
                            <div class="col-lg-1">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div> <br />
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <thead>
                                        <tr class="table-head">
                                            <td width="10%">
                                                <i class="fa fa-calendar" aria-hidden="true"></i> Date
                                            </td>
                                            <td width="8%">
                                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                                 Order ID
                                            </td>
                                            <td width="8%" align="middle">
                                                <i class="fa fa-user-circle"></i> Seller
                                            </td>
                                            <td width="10%">
                                                <i class="fa fa-check-square"></i> Total
                                            </td>
                                            <td width="12%">Payment Status</td>
                                            <td width="10%">Payment Type</td>
                                            <td width="8%">Shipped</td>
                                            <td width="12%">Order Status</td>
                                            <td width="10%" >View</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $order)    
                                        <tr>
                                            <td width="10%" >
                                                {{$order->created_at->format(env('GENERAL_DATE_FORMAT_WITH_HI'))}}
                                            </td>
                                            <td width="8%">
                                                {{$order->order_id}}
                                            </td>
                                            <td width="8%">
                                                @php
                                                    $vendor = (App\Vendor::where('id',$order->vendor_id)->value('company_name'));
                                                @endphp
                                                {{ $vendor }}
                                            </td>
                                            <td width="8%">
                                                <strong>R{{ $order->grand_total }}</strong> 
                                            </td>
                                            <td width="8%">
                                                <div class="chip chip-warning">
                                                    <div class="chip-body">
                                                        <div class="chip-text">{{ $order->payment }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="8%">
                                                <span class="chip-text">
                                                    {{ $order->payment_option }}
                                                </span>
                                            </td>
                                            @if(!empty($order->shipped))
                                                <td width="8%">
                                                    <div class="chip chip-info">
                                                        <div class="chip-body">
                                                            <div class="chip-text">{{ $order->shipped }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                            @else
                                                <td width="8%">
                                                    <div class="chip chip-danger">
                                                        <div class="chip-body">
                                                            <div class="chip-text">No</div>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif    
                                            <td width="10">
                                                <div class="chip chip-success">
                                                    <div class="chip-body">
                                                        <div class="chip-text">{{ $order->status }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ Route('admin.wayBillOrderDetail',$order->order_id ) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>   
                                    @endforeach
                                    </tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- dataTable ends -->
                    </div>
@endsection