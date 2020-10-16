@extends('layouts.master')
@section('content')
<style type="text/css">
    .card{

            min-height: auto !important;
    }
</style>
@foreach($ordersData as $index => $orders)
@endforeach
                <!-- dataTable starts -->
                <div class="container-fluid">
                    <!-- Order details -->
                    @include('msg.msg')
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
                                                <label><b><strong>R{{ $orders->grand_total }}</strong></b></label>
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
                                            <div c0lass="form-group">
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
                                                @php
                                                    $address = (App\CustomerAddress::where('id',$orders->address_id)->first());
                                                @endphp
                                                <p> {{ $address->address }} <br /> {{ $address->city }} ,{{ $address->state }} ,{{ $address->zip_code }} <br /> {{ $address->country }} </p>
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
                                                                {{ $orders->special_instructions }}
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
                                <form method="post" action="" onsubmit="return validation()">
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
                                        {{-- <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button> --}}
                                        <button class="btn btn-primary btn-sm float-right">
                                            <i class="fa fa-edit"></i> Update
                                        </button>
                                    </div><br>
                                </form>    
                            </div>
                            <div class="card">
                                    <form id="order-waybill" method="post" action="{{ Route('admin.orders.attached-waybill') }}" enctype="multipart/form-data" onsubmit="return validate()" id="waybillform" style="padding: 20px">
                                        <h4>Total Products in Order {{ $totalProduct }}</h4>
                                        <h4>Total Quantity in Order {{ $totalQuantity }}</h4><br>
                                        <div class="form-group">
                                            <label>Courier Price</label>
                                            <input type="number" min="0" name="courier_price" class="form-control">
                                        </div>
                                        <div class="form-group">
                                           <label>Choose Courier</label>
                                            <select class="form-control">
                                                <option value="a">a</option>
                                                <option value="b">b</option>
                                                <option value="c">c</option>
                                            </select>
                                       </div> 
                                            <input type="hidden" name="order_id" value="{{ $orders->order_id }}">
                                         @csrf
                                         <div class="form-group">
                                            <label>attach waybill</label>
                                            <input type="file" name="waybill" id="waybillfile" required>
                                        </div>
                                        <div class="form-group">
                                            <label>box</label>
                                            <select class="form-control" name="boxes">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-warning" id="btn-waybill" type="submit">Save</button>
                                        </div>
                                    </form>    
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- End order details -->
                @foreach($vendorOrdersData as $key =>$order )    
                    <div class="row">
                        <div class="col-lg-9 ">
                            <div class="card"> 
                                <div class="card-header">
                                    <label class="mb-xs-1 strong title-order">
                                        <i class="fa fa-bars" aria-hidden="true"></i> Order Details
                                    </label>
                                    <label>
                                        @php
                                            $vendor = (App\Vendor::where('id',$key)->value('company_name'));
                                        @endphp
                                        <h4>Vendor: <strong>{{ $vendor }}</strong></h4>
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
                                                        <td width="100px">Shipped</td>
                                                        <td width="100px">Status</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order as $vendorOrder)
                                                    <tr>
                                                        <td align="left" width="300px" >
                                                            <img src="{{ $vendorOrder->product_image }}" width="40"  height="40" /> <font size="2">  {{ $vendorOrder->product_name }}  </font>
                                                        </td>
                                                        <td width="100px">
                                                            {{ $vendorOrder->product_price }} 
                                                        </td>
                                                        <td width="100px">
                                                            x
                                                        </td>
                                                        <td width="100px">
                                                            {{ $vendorOrder->qty }}
                                                        </td>
                                                        <td width="100px">
                                                            {{ $vendorOrder->order_price }}
                                                        </td>
                                                        @if(!empty($vendorOrder->shipped))
                                                            <td width="8%">
                                                                <div class="chip chip-info">
                                                                    <div class="chip-body">
                                                                        <div class="chip-text">{{ $vendorOrder->shipped }}</div>
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
                                                        @if($vendorOrder->status == "Inprogress")
                                                        <td width="10">
                                                            <div class="chip chip-success">
                                                                <div class="chip-body">
                                                                    <div class="chip-text">{{ $vendorOrder->status }}</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @else
                                                            <td width="10">
                                                                <div class="chip chip-dark">
                                                                    <div class="chip-body">
                                                                        <div class="chip-text">{{ $vendorOrder->status }}</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach    
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach    
                </div>
<script type="text/javascript">
    function validate(){

        // const file = file;
        var name = document.getElementById("waybillfile").files[0].name;
        var ext = name.split('.').pop().toLowerCase();
        if(jQuery.inArray(ext, ['pdf']) == -1) 
        {

             alert("Invalid Image File");
             return false;
        }

         return true;
    }
</script>                
@endsection
