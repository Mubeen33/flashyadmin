@extends('layouts.master')
@section('page-title','Vendor Request Acceptance')
@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
@endsection    
@section('content')         
            <div class="content-body">
               
                <section id="basic-horizontal-layouts">
                    <form action="{{url('add-vendor')}}" method="post">
                        @csrf
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
                                                                    <input type="text" id="first-name"  class="form-control" name="company_name" style="font-weight: bold" placeholder="Company Name" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>First Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="first-name"  class="form-control" name="first_name" placeholder="First Name" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Last Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="email-id"  class="form-control" name="last_name" placeholder="Last Name" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Email</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="email-id"  class="form-control" name="email" placeholder="Email" style="font-weight: bold;" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Mobile</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="contact-info" class="form-control" name="mobile" placeholder="Mobile"  required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Phone</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="phone" placeholder="Phone Number"  required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Bussiness information</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <textarea class="form-control" name="business_info" required=""></textarea>
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
                                                                    <input type="text" class="form-control" name="account_holder" required="" placeholder="Account Holder" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Bank</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="bank_name" required="" placeholder="Bank Name" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Bank Account</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="bank_account" required="" placeholder="Bank Account" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Branch Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="branch_name" required="" placeholder="Branch Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Branch Code</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="branch_code" required="" placeholder="Branch Code">
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
                                                                    <input type="text" id="first-name" class="form-control" name="director_first_name" placeholder="First Name" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Director Last Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="director_last_name" placeholder="Director Last Name" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Director Email</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="email"  id="contact-info" class="form-control" name="director_email" placeholder="Director email" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Website Url</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"   class="form-control" name="website_url" placeholder="Website Url">
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
                                                                            <option value="0" selected="">No</option>
                                                                            <option value="1">Yes</option>
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
                                                                    <textarea class="form-control" name="additional_info"></textarea>
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
                                                                            <option value="0" selected="">No</option>
                                                                            <option value="1">Yes</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span><b>Other Permission will be add here in future.</b></span>
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
                                                                    <input type="text" id="first-name"  class="form-control" name="address" required="" placeholder="Address">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Street</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="street" required="" placeholder="street">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>City</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="email-id"  class="form-control" name="city" required="" placeholder="city">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>State</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="contact-info" class="form-control" name="state" required="" placeholder="State" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Subrub</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="subrub" required="" placeholder="Subrubr" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Postal Code</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="zip_code" required="" placeholder="Postal Code" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Country</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="country" required="" placeholder="Country" >
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
                                                                    <input type="text" id="first-name"  class="form-control" name="waddress" required="" placeholder="Address">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Street</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="email-id"  class="form-control" name="wstreet" required="" placeholder="street">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>City</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="email-id"  class="form-control" name="wcity" required="" placeholder="city">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>State</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="contact-info" class="form-control" name="wstate" placeholder="State" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Subrub</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="wsubrub" required="" placeholder="Subrubr" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Postal Code</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="wzip_code" required="" placeholder="Postal Code" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Country</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text"  class="form-control" name="wcountry" required="" placeholder="Country" >
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