<form action="{{ route('admin.vendors.update',$data->id) }}" method="post">
   @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body pr-0 pl-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <label>Fist Name</label>
                                <input type="text" name="first_name" value="{{ $data->first_name }}" required="1" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" value="{{ $data->last_name }}" required="1" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" value="{{ $data->phone }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" value="{{ $data->mobile }}" required="1" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                    <option value="">Owner</option>
                                    <option value="">Manager</option>
                                    <option value="">Marketer</option>
                                    <option value="">Seller</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $data->email }}" class="form-control" required="1">
                            </div>

                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" name="company_name" value="{{ $data->company_name }}" class="form-control" required="1">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row pt-1">
                                <div class="col-md-6 col-6">
                                    <strong>Phone Number</strong>
                                </div>
                                <div class="col-md-6 col-6 p-0">
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
                                    <strong>Company Name</strong>
                                </div>
                                <div class="col-md-9 col-9 pl-0">
                                    {{$data->company_name}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
</form>