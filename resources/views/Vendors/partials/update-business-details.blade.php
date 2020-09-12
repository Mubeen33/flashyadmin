<form action="{{ route('admin.vendors.update',$data->id) }}" method="post">
   @csrf
    @method('PUT')
    <div class="card">
    	<br>
    	<h4>Edit</h4>
        <input type="hidden" name="type" value="UpdateBusinessDetails">
	    <div class="card-body pr-0 pl-0">
	        <div class="row">
	            <div class="col-12">
	                        


                        <div class="form-group">
                        	<label>Company Name</label>
                        	<input type="text" name="company_name" value="{{ $data->company_name }}" required="1" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Website URL</label>
                            <input type="text" name="website_url" value="{{ $data->website_url }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Vat Register?</label>
                            <select required="1" name="vat_register" class="form-control">
                                <option value="">Select One</option>
                                <option value="Yes" @if($data->vat_register == "Yes") selected @endif>Yes</option>
                                <option value="No" @if($data->vat_register == "No") selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Product Type</label>
                            <select required="1" name="product_type" class="form-control">
                                <option value="Physical Products" @if($data->product_type == "Physical Products") selected @endif>Physical Product </option>
                                <option value="Digital Products" @if($data->product_type == "Digital Products") selected @endif>Digital Products</option>
                                <option value="Grouped Products" @if($data->product_type == "Grouped Products") selected @endif>Grouped Products</option>
                                <option value="Services" @if($data->product_type == "Services") selected @endif>Services</option>
                            </select>
                        </div>


                        <div class="form-group">
                        	<label>Business Information</label>
                        	<textarea name="business_information" class="form-control" rows="6" cols="10">{{ $data->business_information }}</textarea>
                        </div>
	                    
                        <button class="btn btn-primary" type="submit" name="update">UPDATE</button>
                        <button id="cancel-contact-edit--btn" class="btn btn-danger" type="button">CANCEL</button>
	            </div>
	            
	            </div>
	        </div>
	</div>
</form>