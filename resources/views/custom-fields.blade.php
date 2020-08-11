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
							<form action="@if(Request::segment(2) == 'edit'){{'/push/custom-fields-data'}} @else {{ url('/create-custom-fields') }} @endif" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								@csrf
								<input type="hidden" id="catId" data-id="0" />
								<input type="hidden" id="catId" data-id="0" name="custom_id" value="@if(Request::segment(2) == 'edit') {{$custome_field_data[0]->id}} @else @endif" />
								<div class="box-body" style="padding:20px;">
									<div class="row" id="catSection">
										<div class="col-sm-12 form-group">
											<label>Category Name</label>
											<select name="parent" class="form-control" onChange="getCategory(this)" data-id="child-0">
												<option value="">Select Category</option>
												@if(Request::segment(2) == 'edit')
													@if(!empty($categories))
														@foreach($categories as $c)

															<option  value="{{ $c->id }}" {{ ( $c->id == $custome_field_data[0]->category_id) ? 'selected' : '' }}>
																{{ $c->name }}
															</option>
														@endforeach
													@endif
												@else
													@if(!empty($categories))
															@foreach($categories as $c)
																<option  value="{{ $c->id }}">
																	{{ $c->name }}
																</option>
															@endforeach
													@endif
												@endif
											</select>
										</div>
										<div id="child-1"  class="col-sm-12 p-0">
											@if(Request::segment(2) == 'edit')
												@if(!empty($sub_1))
													<div class="col-sm-12 form-group">
														<label>Sub Category 1</label>
														<select name="child_1" class="form-control" onChange="getCategory(this)" data-id="child-1">
															<option value="" disabled>Sub Category 1</option> 
															@foreach($sub_1 as $s)
																<option value="{{ $s->id }}"
																<?php if($s->id == $custome_field_data[0]->sub_category_1){echo 'selected';}?>
																>
																{{ $s->name }}
																</option>
															@endforeach
														</select> 
													</div>
												@endif
											@endif
										</div>
										<div id="child-2" class="col-sm-12 p-0">
											@if(Request::segment(2) == 'edit')
												@if(!empty($sub_2))
													<div class="col-sm-12 form-group">
														<label>Sub Category 2</label>
														<select name="child_2" class="form-control" onChange="getCategory(this)" data-id="child-2">
															<option value="" disabled>Sub Category 2</option> 
															@foreach($sub_2 as $s)
																<option value="{{ $s->id }}"
																<?php if($s->id == $custome_field_data[0]->sub_category_2){echo 'selected';}?>
																>
																{{ $s->name }}
																</option>
															@endforeach
														</select> 
													</div>
												@endif
											@endif
										</div>
										<div id="child-3" class="col-sm-12 p-0">
											@if(Request::segment(2) == 'edit')
												@if(!empty($sub_3))
													<div class="col-sm-12 form-group">
														<label>Sub Category 3</label>
														<select name="child_3" class="form-control" onChange="getCategory(this)" data-id="child-3">
															<option value="" disabled>Sub Category 3</option> 
															@foreach($sub_3 as $s)
																<option value="{{ $s->id }}"
																<?php if($s->id == $custome_field_data[0]->sub_category_3){echo 'selected';}?>
																>
																{{ $s->name }}
																</option>
															@endforeach
														</select> 
													</div>
												@endif
											@endif
										</div>
									</div>

									<div class="form-group">
										<label>Field Name (English)</label>
										<input type="text" class="form-control" value="@if(Request::segment(2) == 'edit') {{$custome_field_data[0]->name_eng }} @else @endif" name="name_eng" placeholder="Field Name" maxlength="255" required>
									</div>
									<div class="form-group">
										<label>Field Name (Deutsch)</label>
										<input type="text" class="form-control" value="@if(Request::segment(2) == 'edit') {{$custome_field_data[0]->name_dus }} @else @endif"  name="name_deu" placeholder="Field Name" maxlength="255" required>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>Row Width</label>
											</div>
										@if(Request::segment(2) == 'edit' && $custome_field_data[0]->field_width =='half')
											<div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="row_width" value="half" id="row_width_1" class="square-purple" checked>
												<label for="row_width_1" class="option-label">Half Width</label>
											</div>
											<div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="row_width" value="full" id="row_width_2" class="square-purple">
												<label for="row_width_2" class="option-label">Full Width</label>
											</div>
										@else
										 <div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="row_width" value="half" id="row_width_1" class="square-purple">
												<label for="row_width_1" class="option-label">Half Width</label>
											</div>
											<div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="row_width" value="full" id="row_width_2" class="square-purple"  checked>
												<label for="row_width_2" class="option-label">Full Width</label>
											</div>
										@endif
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<label class="control-label">Required</label>
											</div>
											<div class="col-md-6 col-sm-12">
											@if(Request::segment(2) == 'edit' && $custome_field_data[0]->required =='1')
												<input type="checkbox" name="is_required" value="1" class="square-purple" checked required>
											@else
											<input type="checkbox" name="is_required" value="1" class="square-purple">
											@endif
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-xs-12">
												<label>Status</label>
											</div>
											@if(Request::segment(2) == 'edit' && $custome_field_data[0]->visibility == 1)
											<div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="visibility" value="1" id="status_1" class="square-purple" checked>
												<label for="status_1" class="option-label">Active</label>
											</div>
											<div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="visibility" value="0" id="status_2" class="square-purple">
												<label for="status_2" class="option-label">Inactive</label>
											</div>
											@else
											<div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="status" value="1" id="status_1" class="square-purple" >
												<label for="status_1" class="option-label">Active</label>
											</div>
											<div class="col-sm-3 col-xs-12 col-option">
												<input type="radio" name="status" value="0" id="status_2" class="square-purple" checked>
												<label for="status_2" class="option-label">Inactive</label>
											</div>
											@endif
											
										</div>
									</div>

									<div class="form-group">
										<label>Order</label>
										@if(Request::segment(2) == 'edit')
										<input type="number" value="{{$custome_field_data[0]->field_order}}" class="form-control" name="field_order" placeholder="Order" min="1" max="99999" value="1" required>
										@else
										<input type="number" class="form-control" name="field_order" placeholder="Order" min="1" max="99999" value="1" required>
									
										@endif
									</div>

									<div class="form-group">
										<label>Type</label>
										
											<select class="form-control" name="field_type">
											@if(Request::segment(2) == 'edit' && $custome_field_data[0]->field_type =='text')
												<option value="text" selected>Text</option>
												<option value="textarea" >Textarea</option>
												<option value="number" > Number</option>
												<option value="checkbox" >Checkbox (Multiple Selection)</option>
												<option value="radio_button" >Radio Button (Single Selection)</option>
												<option value="dropdown" >Dropdown (Single Selection)</option>
												<option value="date" >Date</option>
											@elseif(Request::segment(2) == 'edit' && $custome_field_data[0]->field_type =='textarea')
												<option value="textarea" selected>Textarea</option>
												<option value="text" >Text</option>
												
												<option value="number" > Number</option>
												<option value="checkbox" >Checkbox (Multiple Selection)</option>
												<option value="radio_button" >Radio Button (Single Selection)</option>
												<option value="dropdown" >Dropdown (Single Selection)</option>
												<option value="date" >Date</option>
											@elseif(Request::segment(2) == 'edit' && $custome_field_data[0]->field_type =='number')
												<option value="number" selected> Number</option>
												<option value="text" >Text</option>
												<option value="textarea" >Textarea</option>
												
												<option value="checkbox" >Checkbox (Multiple Selection)</option>
												<option value="radio_button" >Radio Button (Single Selection)</option>
												<option value="dropdown" >Dropdown (Single Selection)</option>
												<option value="date" >Date</option>
											@elseif(Request::segment(2) == 'edit' && $custome_field_data[0]->field_type =='checkbox')
												<option value="checkbox" selected>Checkbox (Multiple Selection)</option>
												<option value="text" >Text</option>
												<option value="textarea" >Textarea</option>
												<option value="number" > Number</option>
											
												<option value="radio_button" >Radio Button (Single Selection)</option>
												<option value="dropdown" >Dropdown (Single Selection)</option>
												<option value="date" >Date</option>
											@elseif(Request::segment(2) == 'edit' && $custome_field_data[0]->field_type =='radio_button')
												<option value="radio_button" selected>Radio Button (Single Selection)</option>
												<option value="text" >Text</option>
												<option value="textarea" >Textarea</option>
												<option value="number" > Number</option>
												<option value="checkbox" >Checkbox (Multiple Selection)</option>
											
												<option value="dropdown" >Dropdown (Single Selection)</option>
												<option value="date" >Date</option>
											@elseif(Request::segment(2) == 'edit' && $custome_field_data[0]->field_type =='dropdown')
												<option value="dropdown" selected>Dropdown (Single Selection)</option>
												<option value="text" >Text</option>
												<option value="textarea" >Textarea</option>
												<option value="number" > Number</option>
												<option value="checkbox" >Checkbox (Multiple Selection)</option>
												<option value="radio_button" >Radio Button (Single Selection)</option>
											
												<option value="date" >Date</option>
											@elseif(Request::segment(2) == 'edit' && $custome_field_data[0]->field_type =='date')
												<option value="date" selected>Date</option>
												<option value="text" >Text</option>
												<option value="textarea" >Textarea</option>
												<option value="number" > Number</option>
												<option value="checkbox" >Checkbox (Multiple Selection)</option>
												<option value="radio_button" >Radio Button (Single Selection)</option>
												<option value="dropdown" >Dropdown (Single Selection)</option>
									
											@else
											<option value="text" >Text</option>
											<option value="textarea" >Textarea</option>
											<option value="number" > Number</option>
											<option value="checkbox" >Checkbox (Multiple Selection)</option>
											<option value="radio_button" >Radio Button (Single Selection)</option>
											<option value="dropdown" >Dropdown (Single Selection)</option>
											<option value="date" >Date</option>
											@endif
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
