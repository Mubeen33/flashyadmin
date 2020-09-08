<div class="card-body pr-0 pl-0">
    <h4>Seller Details</h4>
        <div class="row">
            <div class="col-12">

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <label>Fist Name</label>
                            <input is-required='true' onclick="removeErrorLevels($(this), 'input')"  type="text" name="first_name" class="form-control" placeholder="Fist Name">
                            <small class="place-error--msg text-danger"></small>
                        </div>
                        
                        <div class="col-lg-6 col-md-6">
                            <label>Last Name</label>
                            <input is-required='true' onclick="removeErrorLevels($(this), 'input')"  type="text" name="last_name" class="form-control" placeholder="Last Name">
                            <small class="place-error--msg text-danger"></small>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <label>Phone</label>
                            <input onclick="removeErrorLevels($(this), 'input')"  type="text" name="phone" class="form-control" placeholder="Phone">
                            <small class="place-error--msg"></small>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <label>Mobile</label>
                            <input is-required='true' onclick="removeErrorLevels($(this), 'input')"  type="text" name="mobile" class="form-control" placeholder="Mobile">
                            <small class="place-error--msg text-danger"></small>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>Email</label>
                            <input is-required='true' onclick="removeErrorLevels($(this), 'input')"  type="email" name="email" class="form-control" placeholder="Email">
                            <small class="place-error--msg text-danger"></small>
                        </div>
                    </div>
                </div>
                    
                    
            </div>
            
        </div>
</div>
