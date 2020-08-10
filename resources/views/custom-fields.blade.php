@extends('layouts.master')
@section('page-title','Add New Custom Field')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Add New Custom Field</li>
@endsection    
                            
@section('content')

<div class="content-body">
		<!-- account setting page start -->
		<section id="page-account-settings">
			<div class="row">
			   <div class="col-lg-10 col-md-12 card">
					<div class="box box-primary">
						<div class="box-header with-border">
							<div class="left"></div><!-- /.box-header -->
								<!-- form start -->
							<form action="{{ url('/create-custom-fields') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								@csrf
								<input type="hidden" id="catId" data-id="0" />
								<div class="box-body" style="padding:20px;">
									<div class="row" id="catSection">
										<div class="col-sm-12 form-group">
											<label>Category Name</label>
											<select name="category" class="form-control" onChange="getCategory(this)" data-id="child-0">
												<option value="">Select Category</option>
												@if(!empty($categories))
													@foreach($categories as $c)
														<option  value="{{ $c->id }}">
															{{ $c->name }}
														</option>
													@endforeach
												@endif
											</select>
										</div>
										<div id="child-1"  class="col-sm-12 p-0"></div>
										<div id="child-2" class="col-sm-12 p-0"></div>
										<div id="child-3" class="col-sm-12 p-0"></div>
									</div>

									<div class="form-group">
										<label>Field Name (English)</label>
										<input type="text" class="form-control" name="name_eng" placeholder="Field Name" maxlength="255" required>
									</div>
									<div class="form-group">
										<label>Field Name (Deutsch)</label>
										<input type="text" class="form-control" name="name_deu" placeholder="Field Name" maxlength="255" required>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>Row Width</label>
											</div>
											<div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="row_width" value="half" id="row_width_1" class="square-purple" checked>
												<label for="row_width_1" class="option-label">Half Width</label>
											</div>
											<div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="row_width" value="full" id="row_width_2" class="square-purple">
												<label for="row_width_2" class="option-label">Full Width</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<label class="control-label">Required</label>
											</div>
											<div class="col-md-6 col-sm-12">
												<input type="checkbox" name="is_required" value="1" class="square-purple">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-xs-12">
												<label>Status</label>
											</div>
											<div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="status" value="A" id="status_1" class="square-purple" checked>
												<label for="status_1" class="option-label">Active</label>
											</div>
											<div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="status" value="I" id="status_2" class="square-purple">
												<label for="status_2" class="option-label">Inactive</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>Order</label>
										<input type="number" class="form-control" name="field_order" placeholder="Order" min="1" max="99999" value="1" required>
									</div>

									<div class="form-group">
										<label>Type</label>
										<select class="form-control" name="field_type">
											<option value="text">Text</option>
											<option value="textarea">Textarea</option>
											<option value="number">Number</option>
											<option value="checkbox">Checkbox (Multiple Selection)</option>
											<option value="radio_button">Radio Button (Single Selection)</option>
											<option value="dropdown">Dropdown (Single Selection)</option>
											<option value="date">Date</option>
										</select>
									</div>
									<div class="box-footer">
										<button style="margin-bottom:20px;" type="submit" class="btn btn-primary pull-right">Save and Continue</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
</div>
                <!-- account setting page end -->
<script>
	var cId = 0;
	function getCategory(id){
		var parent_id = $(id).find('option:selected').val();
		var select_id = $(id).attr('data-id');
		var select_id_numb = $(id).attr('data-id').split('-');
		cId = parseInt(select_id_numb[1]) + 1;
		
		var data = {'cat_id': parent_id,  "_token": "{{ csrf_token() }}"};
		if(parent_id !== ''){
			$.ajax({
				url: '{{ url("/subcat") }}',
				data: data,
				type: 'POST',
				success: function(resp){
					console.log(resp);
					var json = resp;
					var outPut = '';
					$.each(resp.subcategories[0].subcategories,function(index,subcategory){
                        outPut +='<option value="'+subcategory.id+'">'+subcategory.name+'</option>';
					})
					if(outPut !== ''){
						var selectSecSubCat = '<div class="col-sm-12 form-group"><label>Sub Category '+cId+'</label><select name="child_'+cId+'" class="form-control" onChange="getCategory(this)" data-id="child-'+cId+'"><option value="">Select Category</option> '+outPut+' </select> </div>';
						$('#child-'+cId).html(selectSecSubCat);
					}else{
						if(cId == 0){
							$('#child-1').empty();
							$('#child-2').empty();
							$('#child-3').empty();
						}else if(cId == 1){
							$('#child-1').empty();
							$('#child-2').empty();
							$('#child-3').empty();
						}else if(cId == 2){
							$('#child-2').empty();
							$('#child-3').empty();
						}
					}
				}
			});
		}
		else{
			if(cId > 0){
				$('#child-1').empty();
				$('#child-2').empty();
				$('#child-3').empty();
			}else if(cId > 1){
				$('#child-2').empty();
				$('#child-3').empty();
			}else if(cId > 2){
				$('#child-3').empty();
			}
		}
	}
</script>
      
@endsection      
