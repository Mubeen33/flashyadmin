<div class="card">
   <div class="card-content">
      <div class="card-body">
         <div class="row">
            <div class="col-12">
               <div class="card-body pr-0 pl-0">
                  <h4>Business Details</h4>
                  <div class="row">
                     <div class="col-12">
                        <div class="form-group">
                           <label>Company Name</label>
                           <input is-required='true' onclick="removeErrorLevels($(this), 'input')"  type="text" name="company_name" class="form-control" placeholder="Company Name">
                           <small class="place-error--msg text-danger"></small>
                        </div>

                        <div class="form-group">
                           <label>Website URL</label>
                           <input onclick="removeErrorLevels($(this), 'input')"  type="url" name="website_url" class="form-control" placeholder="Website URL">
                           <small class="place-error--msg"></small>
                        </div>

                        <div class="form-group">
                           <div class="row">
                              <div class="col-lg-6 col-md-6">
                                 <label>Vat Register?</label>
                                 <select is-required='true' onclick="removeErrorLevels($(this), 'input')"  name="vat_register" class="form-control">
                                    <option value="Yes" selected="1">Yes</option>
                                    <option value="No">No</option>
                                 </select>
                                 <small class="place-error--msg text-danger"></small>
                              </div>
                              <div class="col-lg-6 col-md-6">
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
                           <label>Business Information</label>
                           <textarea onclick="removeErrorLevels($(this), 'input')"  name="business_information" class="form-control" cols="10" placeholder="Business Information" style="min-height: 116px"></textarea>
                           <small class="place-error--msg"></small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- card-body end here -->
   </div>
</div>