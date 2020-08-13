@extends('layouts.master')
@section('page-title','Users')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">User</li>
@endsection    
         
                  
@section('content')
<body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
        <div class="col-auto float-right ml-auto">
								<a href="/add-users" class="btn add-btn" ><i class="fa fa-plus"></i> Add User</a>
							</div>
					<div class="row">
						<div class="col-md-12 card" style="padding:20px;">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable mb-0">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Mobile</th>
                                            <th>Role</th>
											<th>Status</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
                                    @php
                                        $index = 1;
                                    @endphp
                                    @if(!empty($data))
                                    @foreach ($data as $d)
										<tr>
											<td>{{ $index }}</td>
											<td>{{$d->name}}</td>
                                            <td>{{$d->email}}</td>
                                            <td>{{$d->address}}</td>
                                            <td>{{$d->mobile}}</td>
                                            <td>{{$d->role_id}}</td>
											<td>
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-dot-circle-o text-success"></i>@php
                                                    	if($d->visibility == 1){
                                                    		echo 'Active';
                                                    	}
                                                    	@endphp
													</a>
													<!-- <div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a href="#" class="dropdown-item"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div> -->
												</div>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" id="edit" onclick="update_item('{{$d->id}}');" data-toggle="modal" data-target="#edit_leavetype"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="/{{ $d->id }}/delete/user"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
                                        <input type="hidden" value="{{$d->name}}" class="name_value_{{$d->id}}"> 
										<input type="hidden" value="{{$d->email}}" class="email_{{$d->id}}" > 
										<input type="hidden" value="{{$d->address}}" class="address_{{$d->id}}" > 
										<input type="hidden" value="{{$d->visibility}}" class="status_{{$d->id}}" > 
										<input type="hidden" value="{{$d->mobile}}" class="mobile_{{$d->id}}" > 
                                        <input type="hidden" value="{{$d->role_id}}" class="role_id_{{$d->id}}"> 
										</tr>
										
                                        @endforeach
                                        @php
                                            $index++;
                                        @endphp
                                    @else <p> No Menu Created Yet</p>
                                    @endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
                    {{ $data->links() }}
                </div>
				<!-- /Page Content -->
				
				<!-- Add Leavetype Modal -->
				<!-- <div id="add_leavetype" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add User</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post" action="{{route('menu')}}" enctype="multipart/form-data">
                                @csrf
									<div class="form-group">
										<label>Menu Name <span class="text-danger">*</span></label>
										<input name="title" class="form-control" type="text">
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /Add Leavetype Modal -->
				
				<!-- Edit Leavetype Modal -->
				<div id="edit_leavetype" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit User</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post" action="{{route('users')}}" enctype="multipart/form-data">
                                @csrf
                                <input name="user_id" type="hidden" id="user_id"></input> 
                                    <div class="form-group">
										<label>Name <span class="text-danger">*</span></label>
										<input name="name" class="form-control name" id="name_value" type="text" placeholder="Name" value="">
									</div>
                                    <div class="form-group">
										<label>Role <span class="text-danger">*</span></label>
										<select name="role_id" id="role_id" class="browser-default custom-select role_id">
											<option value="">Select role</option>
											<option value="1">Admin</option>
											<option value="0">CEO</option>
										</select>
									</div>
									<div class="form-group">
										<label>Email <span class="text-danger">*</span></label>
										<input name="email" id="email" disabled style="cursor:not-allowed;" class="form-control email" type="email" placeholder="Email" value="">
									</div>
                                    <div class="form-group">
										<label>Address <span class="text-danger">*</span></label>
										<textarea name="address" class="form-control address" ></textarea>
									</div>
                                    <div class="form-group">
										<label>Mobile <span class="text-danger">*</span></label>
										<input name="mobile" class="form-control mobile" id="mobile" type="number" placeholder="Mobile Number" value="">
									</div>
									<div class="form-group">
										<label>Status <span class="text-danger">*</span></label>
										<select name="visibility" id="visibility" class="browser-default custom-select visibility">
											<option value="">Select status</option>
											<option value="1">Active</option>
											<option value="0">In-Active</option>
										</select>
									</div>
									
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Leavetype Modal -->
				
				<!-- Delete Leavetype Modal -->
				<div class="modal custom-modal fade" id="delete_leavetype" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Leave Type</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Delete Leavetype Modal -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Datatable JS -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
    
@endsection
<script>
function update_item(id){
    
    var name = $(".name_value_"+id).val();
    // var name = $(".name").val();
	var email = $(".email_"+id).val();
	var address = $(".address_"+id).val();
	var mobile = $(".mobile_"+id).val();
	var role_id = $(".role_id_"+id).val();
    var visibility_value = $(".visibility_value_"+id).val();
	$('#user_id').val(id);
	$('#name_value').val(name);
	$('#email').val(email);
	$('#address').val(address);
	$('#mobile').val(mobile);
	$('#role_id').val(role_id);
    $('#visibility').val(visibility_value);

}
</script>
		
    </body>