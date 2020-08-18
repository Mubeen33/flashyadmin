@extends('layouts.master')
@section('page-title','Vendors')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Vendors Details</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Vendors Details</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                      <div class="col-4">

                                        <!-- List group -->
                                        <div class="list-group" id="myList" role="tablist">
                                          <a class="list-group-item list-group-item-action active" data-toggle="list" href="#home" role="tab">Seller Details</a>
                                          <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile" role="tab">Contact Details</a>
                                          <a class="list-group-item list-group-item-action" data-toggle="list" href="#messages" role="tab">Bank Details</a>
                                          <a class="list-group-item list-group-item-action" data-toggle="list" href="#settings" role="tab">Director Details</a>
                                          <a class="list-group-item list-group-item-action" data-toggle="list" href="#business-address" role="tab">Business Address</a>
                                          <a class="list-group-item list-group-item-action" data-toggle="list" href="#warehouse-address" role="tab">Warehouse Address</a>
                                        </div>
                                      </div>

                                      <div class="col-8">
                                        <div class="tab-content">
                                          <div class="tab-pane active" id="home" role="tabpanel">
                                              @include('AdminViews.Vendors.partials.seller-details')
                                          </div>
                                          <div class="tab-pane" id="profile" role="tabpanel">
                                              @include('AdminViews.Vendors.partials.contact-details')
                                          </div>
                                          <div class="tab-pane" id="messages" role="tabpanel">
                                              @include('AdminViews.Vendors.partials.bank-details')
                                          </div>
                                          <div class="tab-pane" id="settings" role="tabpanel">
                                              @include('AdminViews.Vendors.partials.director-detials')
                                          </div>
                                          <div class="tab-pane" id="business-address" role="tabpanel">
                                              @include('AdminViews.Vendors.partials.business-address')
                                          </div>
                                          <div class="tab-pane" id="warehouse-address" role="tabpanel">
                                              @include('AdminViews.Vendors.partials.warehouse-address')
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

@push('scripts')
<script type="text/javascript" src="{{ asset('js/seller.js') }}"></script>
@endpush