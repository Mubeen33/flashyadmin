@extends('layouts.master')
@section('page-title','Vendor Add')
@push('styles')
<style type="text/css">
   .border-danger-alert{
   border:1px solid red;
   }
</style>
@endpush
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="">Home</a></li>
<li class="breadcrumb-item active">Vendor Add</li>
@endsection    
@section('content')
@include('msg.msg')                                
<div class="content-body">
   <form id="add_vendor_form" action="{{ route('admin.vendor.addvendor.post') }}" method="POST">
      @csrf
      <div class="row" id="basic-table">
         <div class="col-lg-6 col-md-6">
            @include('Vendors.partials.add-vendor.add-seller-details')
         </div>
         <div class="col-lg-6 col-md-6">
            @include('Vendors.partials.add-vendor.add-business-details')
         </div>
         <div class="col-lg-6 col-md-6">
            @include('Vendors.partials.add-vendor.add-bank-details')
         </div>
         <div class="col-lg-6 col-md-6">
            @include('Vendors.partials.add-vendor.add-director-details')
         </div>
         <div class="col-lg-6 col-md-6">
            @include('Vendors.partials.add-vendor.add-business-address-details')
         </div>
         <div class="col-lg-6 col-md-6">
            @include('Vendors.partials.add-vendor.add-wirehouse-details')
         </div>

         <div class="col-lg-12 col-md-12 col-sm-12">
            <button class="btn btn-warning" type="submit">Add</button>
         </div>
      </div>
   </form>
</div>
@endsection


@push('scripts')
<script type="text/javascript">
   $("#add_vendor_form").on('submit', function(e){
       formClientSideValidation(e, "add_vendor_form", 'yes');
   })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush