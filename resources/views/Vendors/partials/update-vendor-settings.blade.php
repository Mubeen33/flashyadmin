<form action="{{ route('admin.vendors.update',$data->id) }}" method="post">
   @csrf
    @method('PUT')
    <div class="card">
    	<br>
    	<h4>Edit</h4>
        <input type="hidden" name="type" value="UpdateVendorSettingsDetails">
	    <div class="card-body pr-0 pl-0">

	            <div class="row">
                    <div class="col">
                        <p class="mb-50 d-inline-block pr-2">Product Auto Approval</p>
                        <div class="d-inline-block custom-control custom-switch custom-switch-success">
                            <input type="checkbox" name="product_auto_approved" class="custom-control-input" id="customSwitch111" {{$data->product_auto_approved == 'on' ? 'checked' :''}}>
                            <label class="custom-control-label" for="customSwitch111">
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

                        <div class="form-group">
                            <label>Notes</label>
                            <textarea type="text" name="notes" class="form-control"></textarea>
                        </div>
                    </div>

	            </div>
            <div class="row pt-5">
                <div class="col">
                    <button class="btn btn-warning" type="submit" name="update">UPDATE</button>
                    <button id="cancel-vendor-settings-edit--btn" class="btn btn-danger" type="button">CANCEL</button>
                </div>
            </div>

        </div>
	    </div>
</form>
