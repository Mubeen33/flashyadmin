@extends('layouts.master')
@section('page-title','Add New Custom Field | Flashy Buy')
        

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
                                    <div class="left">
                                        
                                    
                                </div><!-- /.box-header -->

                                <!-- form start -->
                                <form action="h/vendor/create-category" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    @csrf
									<input type="hidden" id="catId" data-id="0" />
                                <div class="box-body">
                                	<div class="row" id="catSection">
                                		<div class="col-sm-12 form-group">
											<label>Category Name</label>
											<select class="form-control" onChange="getCategory(this)" data-id="child-1">
												<option value="">Select Category</option>
												@if(!empty($categories))
													@foreach($categories as $c)
														<option value="{{ $c->id }}">
															{{ $c->name }}
														</option>
													@endforeach
												@endif
											</select>
										</div>
										<div id="child-1" class="col-sm-12 p-0">
											
										</div>
										<div id="child-2" class="col-sm-12 p-0">
											
										</div>
										<div id="child-3" class="col-sm-12 p-0">
											
										</div>
									</div>
                                	
										
										
                                       
                                    
                                    <div class="form-group">
                                        <label class="control-label">
											Slug						
											<small>(If you leave it blank, it will be generated automatically.)</small>
                                        </label>
                                        <input type="text" class="form-control" name="slug_lang" placeholder="Slug">
                                    </div>
                                    
                                    <div class="row">
										<div class="form-group col-sm-3">
											<label>Parent Category</label>
											<select class="form-control" name="parent_id[]" onchange="get_subcategories(this.value, 0);" required="">
												<option value="0">None</option>
												<option value="1">Clothing</option>
												<option value="2">Shoes</option>
												<option value="3">Home &amp; Living</option>
												<option value="4">Jewelry &amp; Accessories</option>
												<option value="5">Toys &amp; Entertainment</option>
												<option value="6">Graphics &amp; Photos</option>
												<option value="7">Video &amp; Audio</option>
												<option value="8">Web Templates  &amp; Code</option>
											</select>
											<div id="subcategories_container"></div>
										</div>
                                   	</div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12">
                                                <label>Visibility</label>
                                            </div>
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="customRadio" id="customRadio1" checked="">
                                                            <label class="custom-control-label" for="customRadio1">Yes</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Image</label>
                                        <div class="display-block">
                                            <a class="btn btn-primary btn-sm btn-file-upload">
                                                Select Image							<input type="file" id="Multifileupload" name="file" size="40" accept=".png, .jpg, .jpeg, .gif">
                                            </a>
                                        </div>
                                        <div id="MultidvPreview" class="image-preview"></div>
                                    </div>

                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary pull-right">Add Category</button>
                                </div>
                                <!-- /.box-footer -->
                                </form><!-- form end -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </section>
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
						var selectSecSubCat = '<div class="col-sm-12 form-group"><label>Child 1</label><select class="form-control" onChange="getCategory(this)" data-id="child-'+cId+'"><option value="">Select Category</option> '+outPut+' </select> </div>';
						$('#child-'+cId).html(selectSecSubCat);
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
