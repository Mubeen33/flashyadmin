<div class="card">
   <div class="card-content">
      <div class="card-body">
         <div class="row">
            <div class="col-12">
               <div class="card-body pr-0 pl-0">
                  <h4>Director Details</h4>
                  <div class="row">
                     <div class="col-12">
                        <div class="form-group">
                           <div class="row">
                              <div class="col-lg-6 col-md-6">
                                 <label>Director First Name</label>
                                 <input onclick="removeErrorLevels($(this), 'input')"  type="text" name="director_first_name"  class="form-control" placeholder="Director First Name">
                                 <small class="place-error--msg"></small>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                 <label>Director Last Name</label>
                                 <input onclick="removeErrorLevels($(this), 'input')"  type="text" name="director_last_name"  class="form-control" placeholder="Director Last Name">
                                 <small class="place-error--msg"></small>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Director Email</label>
                           <input onclick="removeErrorLevels($(this), 'input')" type="email" name="director_email" class="form-control" placeholder="Director Email">
                           <small class="place-error--msg"></small>
                        </div>
                        <div class="form-group">
                           <label>Director Details</label>
                           <textarea onclick="removeErrorLevels($(this), 'input')"  name="director_details" class="form-control" cols="10" placeholder="Director Details" style="min-height: 77px"></textarea>
                           <small class="place-error--msg"></small>
                        </div>
                        <div class="form-group">
                           <label>Additioinal Info.</label>
                           <textarea onclick="removeErrorLevels($(this), 'input')"  name="additional_info" class="form-control" cols="10" placeholder="Additioinal Info." style="min-height: 77px"></textarea>
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