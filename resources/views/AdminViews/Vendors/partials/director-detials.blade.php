<div class="col-12 col-md-12 pt-3">
    <div class="row">
        <div class="col-md-9">
            <h3 class="w-50 pb-1 mb-0">Director Details</h3>
        </div>
    </div>
</div>
<div class="col-md-12  pt-1">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-5 col-5 pr-0">
                    <strong>Company Name</strong>
                </div>
                <div class="col-md-7 col-7 pr-0">
                    {{$data->business_name}}
                </div>
                
                <div class="col-md-5 col-5 pt-1 pr-0">
                    <strong>Vat Registered</strong>
                </div>
                <div class="col-md-7 col-7 pt-1 pr-0">
                    {{$data->is_vat_registered}}
                </div>
                
                <div class="col-md-5 col-5 pt-1 pr-0">
                    <strong>Website</strong>
                </div>
                <div class="col-md-7 col-7 pt-1 pr-0">
                    {{$data->website}}
                </div>
                
                <div class="col-md-5 col-5 pt-1 pr-0">
                    <strong>Director Details</strong>
                </div>
                <div class="col-md-7 col-7 pt-1 pr-0">
                    {{$data->b_director_details}}
                </div>
                
                <div class="col-md-5 col-5 pt-1 pr-0">
                    <strong>Owner First Name</strong>
                </div>
                <div class="col-md-7 col-7 pt-1 pr-0">
                    {{$data->bo_fName}}
                </div>
                
                <div class="col-md-5 col-5 pt-1 pr-0">
                    <strong>Owner Last Name</strong>
                </div>
                <div class="col-md-7 col-7 pt-1 pr-0">
                    {{$data->bo_lName}}
                </div>
                
                <div class="col-md-5 col-5 pt-1 pr-0">
                    <strong>Owner Email</strong>
                </div>
                <div class="col-md-7 col-7 pt-1 pr-0">
                    {{$data->bo_email}}
                </div>
            
                
                
                
                
                <div class="col-md-5 col-5 pt-1 pr-0">
                    <strong>Display Name</strong>
                </div>
                <div class="col-md-7 col-7 pt-1 pr-0">
                    {{$data->display_name}}
                </div>

                <div class="col-md-5 col-5 pt-1 pr-0 ">
                    <strong>Legal Name</strong>
                </div>
                <div class="col-md-7 col-7 pt-1 pr-0">
                    {{$data->legal_name}}
                </div>

                <div class="col-md-5 col-5 pt-1 pr-0">
                    <strong>Registration Number</strong>
                </div>
                <div class="col-md-7 col-7 pr-0 pt-1">
                    {{$data->reg_num}}
                </div>
                <div class="col-md-5 col-5 pt-1 pr-0">
                    <strong>VAT Number</strong>
                </div>
                <div class="col-md-7 col-7 pt-1 pr-0">
                    {{$data->VAT_num}}
                </div>
            </div>
        </div>
        <div class="col-12 pt-3">
            <h4>Business Description</h4>
        </div>
        <div class="col-md-12">
            <p>{{$data->business_description}}</p>
        </div>
    </div>
</div>
