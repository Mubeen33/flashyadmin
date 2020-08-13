@extends('layouts.master')
@section('page-title','Vendor Request Acceptance')
@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
@endsection    
@section('content')         
            <div class="content-body">
                @if(session('msg'))
                  {!! session('msg') !!}
                @endif
                <section id="basic-horizontal-layouts">
                    <form action="{{url('update-vendor')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$vendor->id}}">
                        <div class="row match-height">
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Contact Details</b></h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span><b>Store/Company Name</b></span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="first-name" value="{{ $vendor->company_name}}" class="form-control" name="company_name" style="font-weight: bold" placeholder="Company Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>First Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="first-name" value="{{ $vendor->first_name}}" class="form-control" name="first_name" placeholder="First Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Last Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="email-id" value="{{$vendor->last_name}}" class="form-control" name="last_name" placeholder="Last Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Email</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="email-id" value="{{$vendor->email}}" class="form-control" name="email" placeholder="Email" style="font-weight: bold;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Mobile</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="contact-info" class="form-control" name="mobile" placeholder="Mobile" value="{{ $vendor->mobile }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Phone</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="phone" placeholder="Phone Number" value="{{ $vendor->phone}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Bussiness information</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <textarea class="form-control" name="business_info">{{$vendor->business_info}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4>Bank Details</h4>
                                                    <br><div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Account Holder</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="account_holder" required="" placeholder="Account Holder" value="{{$vendor->account_holder }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Bank</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="bank_name" required="" placeholder="Bank Name" value="{{$vendor->bank_name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Bank Account</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="bank_account" required="" placeholder="Bank Account" value="{{$vendor->bank_account }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Branch Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="branch_name" required="" placeholder="Branch Name" value="{{$vendor->bank_name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Branch Code</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="branch_code" required="" placeholder="Branch Code" value="{{$vendor->branch_code }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Business Direcctor Details</b></h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Director First Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="first-name" class="form-control" name="director_first_name" placeholder="First Name" value="{{ $vendor->director_first_name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Director Last Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="director_last_name" placeholder="Director Last Name" value="{{ $vendor->director_last_name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Director Email</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="email"  id="contact-info" class="form-control" name="director_email" placeholder="Director email" value="{{ $vendor->director_email}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Website Url</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" value="{{$vendor->website_url}}"  class="form-control" name="website_url" placeholder="Website Url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>VAT Registered</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select class="form-control" name="vat_register">
                                                                        @if($vendor->vat_register == 0)
                                                                            <option value="0" selected="">No</option>
                                                                            <option value="1">Yes</option>
                                                                        @else
                                                                            <option value="1" selected="">Yes</option>
                                                                            <option value="0">No</option>
                                                                        @endif    
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Additional Bussiness information</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <textarea class="form-control" name="additional_info">{{$vendor->additional_info}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span><b>Active|Approved</b></span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select class="form-control" name="active">
                                                                        @if($vendor->active == 0)
                                                                            <option value="0" selected="">No</option>
                                                                            <option value="1">Yes</option>
                                                                        @else
                                                                            <option value="1" selected="">Yes</option>
                                                                            <option value="0">No</option>
                                                                        @endif    
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span><b>Other Permission will be add here in future.</b></span>
                                                                </div>
                                                                <!-- <div class="col-md-8">
                                                                    <select class="form-control">
                                                                        @if($vendor->active == 0)
                                                                            <option value="0" selected="">No</option>
                                                                            <option value="1">Yes</option>
                                                                        @else
                                                                            <option value="1" selected="">Yes</option>
                                                                            <option value="0">No</option>
                                                                        @endif    
                                                                    </select>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row match-height">
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Business Address</b></h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Address</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="first-name" value="{{ $vendor->address}}" class="form-control" name="address" required="" placeholder="Address">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Street</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  value="{{$vendor->street}}" class="form-control" name="street" required="" placeholder="street">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>City</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="email-id" value="{{$vendor->city}}" class="form-control" name="city" required="" placeholder="city">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>State</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="contact-info" class="form-control" name="state" required="" placeholder="State" value="{{ $vendor->state }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Subrub</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="subrub" required="" placeholder="Subrubr" value="{{ $vendor->subrub}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Postal Code</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="zip_code" required="" placeholder="Postal Code" value="{{ $vendor->zip_code}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Country</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="country" required="" placeholder="Country" value="{{ $vendor->country}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>WareHouse Address</b></h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Address</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="first-name" value="{{ $vendor->waddress}}" class="form-control" name="waddress" required="" placeholder="Address">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Street</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="email-id" value="{{$vendor->wstreet}}" class="form-control" name="wstreet" required="" placeholder="street">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>City</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="email-id" value="{{$vendor->wcity}}" class="form-control" name="wcity" required="" placeholder="city">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>State</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="contact-info" class="form-control" name="wstate" placeholder="State" value="{{ $vendor->wstate }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Subrub</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="wsubrub" required="" placeholder="Subrubr" value="{{ $vendor->wsubrub}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Postal Code</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="wzip_code" required="" placeholder="Postal Code" value="{{ $vendor->wzip_code}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Country</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="wcountry" required="" placeholder="Country" value="{{ $vendor->wcountry}}">
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
                        <div class="col-12">
                            <div class="col-md-6"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="card">
                                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                </div>
                            </div>    
                        </div>
                    </form>    
                </section>

            </div>
@endsection       