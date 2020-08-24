<div class="row">
    
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9 pl-0">
                <h3 class="pl-1">
                       <i class="feather icon-user"></i> Billing Address
                </h3>
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
    </div> <!-- row end here-->
    <div class="col-md-12 border border-primary"></div>


    <div class="col-md-12">
        <!--Show seller Details-->
        <div id="show--seller-details">
            <div class="card">
                <div class="card-body pr-0 pl-0">
                    <div class="row">
                        <div class="col-12">
                            @if(!$data->get_addresses->isEmpty())
                                @foreach($data->get_addresses as $address)
                                    @if($address->type === "Billing")
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="row pt-1">
                                                <div class="col-md-3 col-3 ">
                                                    <strong>Address</strong>
                                                </div>
                                                <div class="col-md-9 col-9 p-0">
                                                    {{$address->address}}
                                                </div>
                                            </div>

                                            <div class="row pt-1">
                                                <div class="col-md-3 col-3 ">
                                                    <strong>City</strong>
                                                </div>
                                                <div class="col-md-9 col-9 p-0">
                                                    {{$address->city}}
                                                </div>
                                            </div>
                                            
                                            <div class="row pt-1">
                                                <div class="col-md-3 col-3 ">
                                                    <strong>State</strong>
                                                </div>
                                                <div class="col-md-9 col-9 p-0">
                                                    {{$address->state}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 pt-1">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <strong>Zip Code</strong>
                                                </div>
                                                <div class="col-md-9 col-9 pl-0">
                                                    {{$address->zip_code}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 pt-1">
                                            <div class="row">
                                                <div class="col-md-3 col-3">
                                                    <strong>Country</strong>
                                                </div>
                                                <div class="col-md-9 col-9 pl-0">
                                                    {{$address->country}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach

                            @else
                                <div>
                                    <small><span class="text-danger">{{ 'Address Not Set Yet' }}</span></small>
                                </div>
                            @endif
                        </div>
                        
                        </div>
                    </div>
                </div>
        </div>
    </div><!-- row end here-->


    
</div>

