<div class="row">

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9 pl-0">
                <h3 class="pl-1">
                    <i class="feather icon-settings"></i>
                    Settings
                </h3>
            </div>
            <div class="col-md-3 text-right">
                <div class="d-flex justify-content-end">
                    @if($data->active == 0)
                    <h3 title="Approve Account" onclick="if(confirm('Are you sure to approve this account?')) document.getElementById('approveVendorAccountForm').submit();" style="cursor:pointer;margin-right: 15px">
                        <i class="feather text-warning icon-check"></i>
                    </h3>
                    @endif

                    <h3 style="cursor: pointer;" title="Edit Business Address" id="btn-edit-vendor-settings">
                        <i class="feather text-primar icon-edit"></i>
                    </h3>
                </div>
            </div>
        </div>
    </div> <!-- row end here-->
    <div class="col-md-12 border border-warning"></div>


    <div class="col-md-12">
        <!--Show seller Details-->
        <div id="show--vendor-settings">
            <div class="card">
                <div class="card-body pr-0 pl-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Auto Approval</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            <div class="d-inline-block custom-control custom-switch custom-switch-success">
                                                <input type="checkbox" disabled name="product_auto_approved" class="custom-control-input" id="customSwitch12" {{$data->product_auto_approved == 'on' ? 'checked' :''}}>
                                                <label class="custom-control-label" for="customSwitch12">
                                                    <span class="switch-icon-left">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                                            <polyline points="20 6 9 17 4 12"></polyline>
                                                        </svg>
                                                    </span>

                                                    <span class="switch-icon-right">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
        </div>
    </div><!-- row end here-->


    <div class="col-md-12">
        <div id="edit--vendor-settings" class="d-none">
            @include('Vendors.partials.update-vendor-settings')
        </div>
    </div> <!-- row end here-->

</div>

