@extends('layouts.master')
@section('page-title','Custom Fields List')
    

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Custom Fields</li>
@endsection    
                            
@section('content')

            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                    <div class="box col-sm-12">
			<div class="box-header with-border">
				<div class="left">
					<h3 class="box-title"></h3>
				</div>
			</div><!-- /.box-header -->

            <!-- include message block -->
            <div class="col-sm-12">
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <div id="cs_datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div><div class="col-sm-12" style="float:right;"></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered table-striped dataTable no-footer" id="cs_datatable" role="grid" aria-describedby="cs_datatable_info">
                                <thead>
									<tr role="row">
										<th class="sorting_desc" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-sort="descending" aria-label="Id: activate to sort column ascending" >SR. #</th>
										
										<th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Name Eng</th>
										
										<th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="&amp;nbsp;: activate to sort column ascending">Name Deu</th>
										
										<th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Type</th>
										
										<th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Required: activate to sort column ascending">Required</th>
										
										<th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Order: activate to sort column ascending">Order</th>
										
										<th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
										
										<th class="th-options sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending">Options</th>
									</tr>
                                </thead>
                                <tbody>
                                @if(!empty($categories))
									@php $index=1; @endphp
									@foreach($categories as $dc)
										<tr>
											<td>{{ $index }}</td>
											<td>{{ $dc->name_eng }}</td>
											<td>{{ $dc->name_dus }}</td>
											<td>{{ $dc->field_type }}</td>
											<td>{{ $dc->required }}</td>
											<td>{{ $dc->field_order }}</td>
											<td>{{ $dc->status }}</td>
											<td>
												<div class="dropdown">
													<button class="btn btn-primary dropdown-toggle waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 8px 20px;">
														Action
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
														<a class="dropdown-item" href="/{{ $dc->id }}/edit/custom-fields">Edit</a>
														<a class="dropdown-item" href="/{{ $dc->id }}/delete/custom-fields">Delete</a>
													</div>
												</div>
											</td>
										</tr>
									@endforeach
								@else
									<p>no data found </p>
								@endif

								</tbody>
                            </table>
                            <!-- </div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="cs_datatable_info" role="status" aria-live="polite">Showing 1 to 3 of 3 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="cs_datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="cs_datatable_previous"><a href="#" aria-controls="cs_datatable" data-dt-idx="0" tabindex="0">‹</a></li><li class="paginate_button active"><a href="#" aria-controls="cs_datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button next disabled" id="cs_datatable_next"><a href="#" aria-controls="cs_datatable" data-dt-idx="2" tabindex="0">›</a></li></ul></div></div></div></div>
                         -->
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
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
						var selectSecSubCat = '<div class="col-sm-12 form-group"><label>Child 1</label><select name="child_'+cId+'" class="form-control" onChange="getCategory(this)" data-id="child-'+cId+'"><option value="">Select Category</option> '+outPut+' </select> </div>';
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
