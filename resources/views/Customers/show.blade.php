@extends('layouts.master')
@section('page-title','Customers')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Customer Details</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Customer Details</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                      <div class="col-4">

                                        <!-- List group -->
                                        <div class="list-group" id="myList" role="tablist">
                                          <a class="list-group-item list-group-item-action active" data-toggle="list" href="#home" role="tab">Customer Profile</a>
                                          <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile" role="tab">Billing Address</a>
                                          <a class="list-group-item list-group-item-action" data-toggle="list" href="#messages" role="tab">Shipping Address</a>
                                        </div>
                                      </div>

                                      <div class="col-8">
                                        <div class="tab-content">
                                          <div class="tab-pane active" id="home" role="tabpanel">
                                              @include('Customers.partials.customer-profile')
                                          </div>
                                          <div class="tab-pane" id="profile" role="tabpanel">
                                              @include('Customers.partials.billing-address')
                                          </div>
                                          <div class="tab-pane" id="messages" role="tabpanel">
                                              @include('Customers.partials.shipping-address')
                                          </div>
                                        </div>

                                      </div>
                                    </div>


                                    
                                    


                                </div> <!-- card-body end here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection