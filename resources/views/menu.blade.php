@extends('layouts.master')
@section('page-title','Menus')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Menu</li>
@endsection    
         
                  
@section('content')
<body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
        <div class="col-auto float-right ml-auto">
								<a href="/add-menus" class="btn add-btn" ><i class="fa fa-plus"></i> Add Leave Type</a>
							</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable mb-0">
									<thead>
										<tr>
											<th>#</th>
											<th>Leave Type</th>
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
														<a class="dropdown-item" href="/{{ $d->id }}/delete/menu"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<input type="hidden" value="{{$d->name}}" class="menu_title" id="menu_title"> 
										<input type="hidden" value="{{$d->parent}}" class="parent_id" id="parent_id"> 
										<input type="hidden" value="{{$d->link}}" class="url" id="url"> 
										<input type="hidden" value="{{$d->visibility}}" class="status" id="status"> 
										<input type="hidden" value="{{$d->sort_order}}" class="sort_order" id="sort_order"> 
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
                </div>
				<!-- /Page Content -->
				
				<!-- Add Leavetype Modal -->
				<div id="add_leavetype" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Menu</h5>
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
				</div>
				<!-- /Add Leavetype Modal -->
				
				<!-- Edit Leavetype Modal -->
				<div id="edit_leavetype" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Menu</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post" action="{{route('updates')}}" enctype="multipart/form-data">
                                @csrf
                                <input name="role_id" type="hidden" id="role_id"></input> 
									<div class="form-group">
										<label>Parent Menu <span class="text-danger">*</span></label>
										<select name="parent" class="form-control parent_value" >
										<option  value=''>Menu parent</option>
														<option value="1">One</option>
														<option value="2">Two</option>
														<option value="3">Three</option>
										</select>
									</div>
									<div class="form-group">
										<label>Title <span class="text-danger">*</span></label>
										<input name="title" class="form-control title_value" type="text" placeholder="Name" value="">
									</div>
									<div class="form-group">
										<label>Status <span class="text-danger">*</span></label>
										<select name="visibility" class="browser-default custom-select">
											<option selected="">Select status</option>
											<option value="1">Active</option>
											<option value="0">In-Active</option>
										</select>
									</div>
									<div class="form-group">
										<label>Link<span class="text-danger">*</span></label>
										<input name="url" class="form-control url_value" type="text" placeholder="Name" value="">
									</div>
									<div class="form-group">
										<label>Sort Order <span class="text-danger">*</span></label>
										<input name="order" class="form-control sort_order_value" type="text" placeholder="Name" value="">
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
 
	
    var parent = $("#parent_id").val();
	var title = $("#menu_title").val();
	var url = $("#url").val();
	var status = $("#status").val();
	var order = $("#sort_order").val();
	$('#role_id').val(id);
	$('.parent_value').val(parent);
	$('.title_value').val(title);

	$('.url_value').val(url);

	$('.visibility_value').val(status);

	$('.sort_order_value').val(order);



    $.ajax({
     type: "POST",
     url: '/edit-roles',
     data: {
        "id":id,
        "_token": "{{ csrf_token() }}",
       
        },
     success: function(response){
        // console.log((response));
        $.each(JSON.parse(response), function () {
           console.log(JSON.parse(response));
            // $('.id').val(this.id);
            $('.edit').val(this.name);
        });
       
     }
});
}
</script>
		
    </body>