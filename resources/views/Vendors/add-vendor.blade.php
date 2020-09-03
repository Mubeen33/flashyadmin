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
                                <h4 class="card-title">Vendor Add</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                      
                                      <div class="col-12">
                                        <form>
                                          @include('Vendors.partials.add-vendor.add-seller-details')
                                          @include('Vendors.partials.add-vendor.add-contact-details')
                                          @include('Vendors.partials.add-vendor.add-bank-details')
                                          @include('Vendors.partials.add-vendor.add-director-details')
                                          @include('Vendors.partials.add-vendor.add-business-address-details')
                                          @include('Vendors.partials.add-vendor.add-wirehouse-details')

                                        </form>
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