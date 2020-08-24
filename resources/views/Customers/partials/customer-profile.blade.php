<div class="row">
    
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9 pl-0">
                <h3 class="pl-1">
                       <i class="feather icon-user"></i> Profile Details
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
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>First Name</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->first_name}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Last Name</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->last_name}}
                                        </div>
                                    </div>
                                    
                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Phone</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->phone}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Email</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{$data->email}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Birthday</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{$data->birthday}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Gender</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{$data->gender}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Join Date</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{$data->created_at->format('d/m/Y')}}
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


    
</div>

