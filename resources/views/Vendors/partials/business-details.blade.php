<div class="row">
    
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9 pl-0">
                <h3 class="pl-1">
                       <i class="feather icon-user"></i> Business Details
                </h3>
            </div>
            <div class="col-md-3 text-right">
                <div class="d-flex justify-content-end">
                    @if($data->active == 0)
                    <h3 title="Approve Account" onclick="if(confirm('Are you sure to approve this account?')) document.getElementById('approveVendorAccountForm').submit();" style="cursor:pointer;margin-right: 15px">
                        <i class="feather text-primary icon-check"></i>
                    </h3>
                    @endif
                    
                    <h3 style="cursor: pointer;" title="Edit Profile" id="btn-edit-contact-details">
                        <i class="feather text-primar icon-edit"></i>
                    </h3>
                </div>
            </div>
        </div>
    </div> <!-- row end here-->
    <div class="col-md-12 border border-primary"></div>


    <div class="col-md-12">
        <!--Show seller Details-->
        <div id="show--contact-details">
            <div class="card">
                <div class="card-body pr-0 pl-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row pt-0">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Company Name</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->company_name}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3">
                                            <strong>Website URL</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->website_url}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3">
                                            <strong>Vat Register?</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->vat_register}}
                                        </div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Product Type</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->product_type}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Business Informations</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->business_information}}
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
        <div id="edit--contact-details" class="d-none">
            @include('Vendors.partials.update-business-details')
        </div>
    </div> <!-- row end here-->
    
</div>

