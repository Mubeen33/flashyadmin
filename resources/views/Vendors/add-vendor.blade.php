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
            <div class="content-body">
                
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Vendor Add</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                  @include('msg.msg')
                                    <div class="row">
                                      
                                      <div class="col-12">
                                        <form id="add_vendor_form" action="{{ route('admin.vendor.addvendor.post') }}" method="POST">
                                          @csrf
                                          @include('Vendors.partials.add-vendor.add-seller-details')
                                          @include('Vendors.partials.add-vendor.add-contact-details')
                                          @include('Vendors.partials.add-vendor.add-bank-details')
                                          @include('Vendors.partials.add-vendor.add-director-details')
                                          @include('Vendors.partials.add-vendor.add-business-address-details')
                                          @include('Vendors.partials.add-vendor.add-wirehouse-details')

                                          <div class="form-group">
                                            <div class="row">
                                              <div class="col-lg-6 col-md-6">
                                                <label>Password</label>
                                                <input onclick="removeErrorLevels($(this), 'input')" type="password" name="password" placeholder="Password" class="form-control">
                                                <small class="place-error--msg"></small>
                                              </div>
                                              <div class="col-lg-6 col-md-6">
                                                <div class="mb-1"><label>is active?</label></div>
                                                <input type="radio" name="active" value="1"> <span>Yes</span>
                                                <input type="radio" name="active" value="0" checked="1"> <span>No</span>
                                                <small class="place-error--msg"></small>
                                              </div>
                                            </div>
                                          </div>

                                          <button type="submit" class="btn btn-primary">Add Vendor</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#add_vendor_form").on('submit', function(e){
            e.preventDefault()
            let formID = "add_vendor_form";
            let form = $(this);
            let url = form.attr('action');
            let type = form.attr('method');
            let form_data = form.serialize();
            formSubmitWithFile(formID, url, type, form_data);
        })
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush