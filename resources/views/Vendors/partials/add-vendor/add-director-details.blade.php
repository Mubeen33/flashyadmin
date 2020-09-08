<div class="card-body pr-0 pl-0">
    <h4>Director Details</h4>
    <div class="row">
        <div class="col-12">

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <label>Director First Name</label>
                        <input onclick="removeErrorLevels($(this), 'input')"  type="text" name="director_first_name"  class="form-control" placeholder="Director First Name">
                        <small class="place-error--msg"></small>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <label>Director Last Name</label>
                        <input onclick="removeErrorLevels($(this), 'input')"  type="text" name="director_last_name"  class="form-control" placeholder="Director Last Name">
                        <small class="place-error--msg"></small>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <label>Director Email</label>
                        <input onclick="removeErrorLevels($(this), 'input')" type="email" name="director_email" class="form-control" placeholder="Director Email">
                        <small class="place-error--msg"></small>
                    </div>
                </div>
            </div>



            <div class="form-group">
            	<label>Director Details</label>
            	<textarea onclick="removeErrorLevels($(this), 'input')"  name="director_details" class="form-control" rows="6" cols="10" placeholder="Director Details"></textarea>
                <small class="place-error--msg"></small>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <label>Website URL</label>
                        <input onclick="removeErrorLevels($(this), 'input')"  type="text" name="website_url" class="form-control" placeholder="Website URL">
                        <small class="place-error--msg"></small>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <label>Vat Register?</label>
                        <select is-required='true' onclick="removeErrorLevels($(this), 'input')"  name="vat_register" class="form-control">
                            <option value="Yes" selected="1">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <small class="place-error--msg text-danger"></small>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <label>Product Type</label>
                        <select is-required='true' onclick="removeErrorLevels($(this), 'input')"  required="1" name="product_type" class="form-control">
                            <option value="Physical Products" selected="1">Physical Product </option>
                            <option value="Digital Products">Digital Products</option>
                            <option value="Grouped Products">Grouped Products</option>
                            <option value="Services">Services</option>
                        </select>
                        <small class="place-error--msg text-danger"></small>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label>Additioinal Info.</label>
                <textarea onclick="removeErrorLevels($(this), 'input')"  name="additional_info" class="form-control" rows="6" cols="10" placeholder="Additioinal Info."></textarea>
                <small class="place-error--msg"></small>
            </div>

        </div>
    </div>
</div>