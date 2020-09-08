<div class="card-body pr-0 pl-0">
  <h4>Contact Details</h4>
  <div class="row">
    <div class="col-12">
        <div class="form-group">
        	<label>Company Name</label>
        	<input is-required='true' onclick="removeErrorLevels($(this), 'input')"  type="text" name="company_name" class="form-control" placeholder="Company Name">
          <small class="place-error--msg text-danger"></small>
        </div>

        <div class="form-group">
        	<label>Business Information</label>
        	<textarea onclick="removeErrorLevels($(this), 'input')"  name="business_information" class="form-control" rows="6" cols="10" placeholder="Business Information"></textarea>
          <small class="place-error--msg"></small>
        </div>
     </div>

    </div>
</div>