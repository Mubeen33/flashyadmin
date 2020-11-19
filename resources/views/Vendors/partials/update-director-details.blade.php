<form action="{{ route('admin.vendors.update',$data->id) }}" method="post">
   @csrf
    @method('PUT')
    <div class="card">
    	<br>
    	<h4>Edit</h4>
        <input type="hidden" name="type" value="UpdateDirectorDetails">
	    <div class="card-body pr-0 pl-0">
	        <div class="row">
	            <div class="col-12">
	                        


                        <div class="form-group">
                        	<label>Director First Name</label>
                        	<input type="text" name="director_first_name" value="{{ $data->director_first_name }}"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Director Last Name</label>
                            <input type="text" name="director_last_name" value="{{ $data->director_last_name }}"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Director Email</label>
                            <input type="email" name="director_email" value="{{ $data->director_email }}" class="form-control">
                        </div>


                        <div class="form-group">
                        	<label>Director Details</label>
                        	<textarea name="director_details" class="form-control" rows="6" cols="10">{{ $data->director_details }}</textarea>
                        </div>


                        <div class="form-group">
                            <label>Additioinal Info.</label>
                            <textarea name="additional_info" class="form-control" rows="6" cols="10">{{ $data->additional_info }}</textarea>
                        </div>

	                    
                        <button class="btn btn-warning" type="submit" name="update">UPDATE</button>
                        <button id="cancel-director-edit--btn" class="btn btn-danger" type="button">CANCEL</button>
	            </div>
	            
	            </div>
	        </div>
	    </div>
</form>