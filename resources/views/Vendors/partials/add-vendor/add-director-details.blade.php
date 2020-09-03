<div class="card-body pr-0 pl-0">
    <h4>Director Details</h4>
    <div class="row">
        <div class="col-12">
                <div class="form-group">
                	<label>Director First Name</label>
                	<input type="text" name="director_first_name"  class="form-control">
                </div>

                <div class="form-group">
                    <label>Director Last Name</label>
                    <input type="text" name="director_last_name"  class="form-control">
                </div>

                <div class="form-group">
                    <label>Director Email</label>
                    <input type="email" name="director_email" class="form-control">
                </div>


                <div class="form-group">
                	<label>Director Details</label>
                	<textarea name="director_details" class="form-control" rows="6" cols="10"></textarea>
                </div>

                <div class="form-group">
                    <label>Website URL</label>
                    <input type="text" name="website_url" class="form-control">
                </div>

                <div class="form-group">
                    <label>Vat Register?</label>
                    <select required="1" name="vat_register" class="form-control">
                        <option value="Yes" selected="1">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label>Additioinal Info.</label>
                    <textarea name="additional_info" class="form-control" rows="6" cols="10"></textarea>
                </div>

                <div class="form-group">
                    <label>Product Type</label>
                    <select required="1" name="product_type" class="form-control">
                        <option value="Physical Products">Physical Product </option>
                        <option value="Digital Products">Digital Products</option>
                        <option value="Grouped Products">Grouped Products</option>
                        <option value="Services">Services</option>
                    </select>
                </div>
                
            </div>
        </div>
</div>