@extends('layouts.master')
@section('content')
@foreach($ordersData as $orders)
@endforeach
                <!-- dataTable starts -->
                <div class="container-fluid">
                    <!-- Order details -->
                    <div class="row">
                        <div class="col-lg-9 ">
                            <div class="card">
                                <div class="card-body">
                                    <label class="mb-xs-1 strong title-order">
                                        Order # <font color="#EA5455"> <b> {{ $orders->order_id }} </b> </font> 
                                    </label> <br/>
                                    <p class="text-gray-lighter">
                                        Payment via <strong>{{ $orders->payment_option }}</strong>. 
                                    </p>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <h5 class="order-title"> 
                                                    <i class="fa fa-address-card" aria-hidden="true"></i> General details 
                                                </h5>
                                                <p class="text-muted">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    Order DateTime:
                                                </p>
                                                <label>{{$orders->created_at->format(env('GENERAL_DATE_FORMAT_WITH_HI'))}}</label>
                                            </div>
                                           {{--  <div class="form-group">
                                                <h5 class="order-title">    
                                                     <i class="fa fa-calendar" aria-hidden="true"></i>
                                                     Due Date: 
                                                </h5>
                                                <label>12- aug - 1975</label>
                                            </div> --}}
                                            <div class="form-group">
                                                <h5 class="order-title"> 
                                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                    Total amount: 
                                                </h5>
                                                <label>{{ $orders->grand_total }}</label>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <h5 class="order-title"> 
                                                        <i class="fa fa-address-card" aria-hidden="true"></i>
                                                        Seller Details 
                                                    </h5>
                                                    <p class="text-muted">
                                                        <i class="fa fa-address-card" aria-hidden="true"></i>
                                                        Address:
                                                    </p>
                                                    <p> Paolo Rossi via della liberate <br /> 00181 Roma , <br /> ROMA </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <h5 class="text-muted">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i> Email:
                                                    </h5>
                                                    <a href="#">axad03213@gmail.com</a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <h5 class="text-muted">
                                                        <i class="fa fa-phone" aria-hidden="true"></i> Phone:
                                                    </h5>
                                                    <a href="#">03215489658</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-6">
                                            <h5 class="order-title"> 
                                                <i class="fa fa-address-card" aria-hidden="true"></i>
                                                Shipping Details
                                            </h5>
                                            <div class="form-group">
                                                <h5 class="text-muted">
                                                    <i class="fa fa-user"></i> Customer Name:
                                                </h5>
                                                @php
                                                    $customer = (App\Customer::where('id',$orders->customer_id)->first());
                                                @endphp
                                                <a href="#">{{ $customer->first_name }} {{ $customer->last_name }}</a>
                                            </div>
                                            <div class="form-group">
                                                <h5 class="text-muted">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i> Customer Email:
                                                </h5>
                                                <a href="#">{{ $customer->email }}</a>
                                            </div>
                                            <div class="form-group">
                                                <h5 class="text-muted">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                    Phone:
                                                </h5>
                                                <a href="#">{{ $customer->phone }}</a>
                                            </div>
                                            <div class="form-group">
                                                <h5 class="order-title"> Shipping Address 
                                                    <a href="#"> <i class="fa fa-edit"></i> </a> 
                                                </h5>
                                                <p class="text-muted">
                                                    <i class="fa fa-address-card" aria-hidden="true"></i> Address:
                                                </p>
                                                <p> Paolo Rossi via della liberate <br /> 00181 Roma , <br /> ROMA </p>
                                            </div>
                                             <div class="default-collapse collapse-bordered">
                                                <div class="card collapse-header">
                                                    <div id="headingCollapse1" style="border:1px solid #EEEEEE;" class="card-header" data-toggle="collapse" role="button" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                                        <span class="lead collapse-title order-title">
                                                           <font color="#EA5455"> 
                                                            <i class="fa fa-info-circle"></i> Special Note 
                                                           </font>
                                                        </span>
                                                    </div>
                                                    <div id="collapse1" style="border:1px solid #EEEEEE;" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                Pie dragée muffin. Donut cake liquorice marzipan carrot cake topping powder candy. Sugar plum
                                                                brownie brownie cotton candy.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <br />
                                            <!-- using api -->
                                            <button class="btn btn-danger btn-sm"> Check Rates (through api)</button>
                                            <!-- end button -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label class="mb-xs-1 strong title-order">
                                        <i class="fa fa-check-square" aria-hidden="true"></i>
                                        Order Actions
                                    </label>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <select name="" class="form-control">
                                            <option selected>Actions</option>
                                            <option>Hold On</option>
                                            <option>Completed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <button class="btn btn-primary btn-sm float-right">
                                        <i class="fa fa-edit"></i> Update
                                    </button>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- End order details -->
                    <div class="row">
                        <div class="col-lg-9 ">
                            <div class="card"> 
                                <div class="card-header">
                                    <label class="mb-xs-1 strong title-order">
                                        <i class="fa fa-bars" aria-hidden="true"></i> Order Details
                                    </label>
                                    <button class="btn btn-light mr-1 mb-1 waves-effect waves-light btn-sm">
                                        <i class="fa fa-print" aria-hidden="true"></i> Print Order
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped w-100 d-block d-md-table">
                                                <thead>
                                                    <tr class="table-head">
                                                        <td width="300px"  align="left"> Item </td>
                                                        <td width="100px" > Cost </td>
                                                        <td width="100px" ></td>
                                                        <td width="100px" > Quantity </td>
                                                        <td width="100px" >Total</td>
                                                        <td width="100px" > Action </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                        <td align="left" width="300px" >
                                                            <img src="app-assets/images/elements/apple-watch.png" width="40"  height="40" /> <font size="2">  Apple Watch series 4 Bold 5 Amazing  </font>
                                                        </td>
                                                        <td width="100px">
                                                            R 1500 
                                                        </td>
                                                        <td width="100px">
                                                            x
                                                        </td>
                                                        <td width="100px">
                                                            1
                                                        </td>
                                                        <td width="100px">
                                                            $1500
                                                        </td>
                                                        <td width="100px">
                                                            <div class="dropdown">
                                                                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" n="1" id="cancle-order" href="#">
                                                                        Cancle
                                                                    </a>
                                                                    <a class="dropdown-item" href="#">Proccess</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection