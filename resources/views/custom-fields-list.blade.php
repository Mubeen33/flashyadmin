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
                    <div class="box">
			<div class="box-header with-border">
				<div class="left">
					<h3 class="box-title"></h3>
				</div>
				<!-- <div class="right" style="float:right;">
					<a href="/add-custom-field" class="btn btn-success">
						<i class="fa fa-plus"></i>&nbsp;&nbsp;Add Custom Field</a>
				</div> -->
			</div><!-- /.box-header -->

            <!-- include message block -->
            <div class="col-sm-12">
                
    <!--print error messages-->

    <!--print custom error message-->

    <!--print custom success message-->
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <div id="cs_datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"></div><div class="col-sm-12" style="float:right;"></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered table-striped dataTable no-footer" id="cs_datatable" role="grid" aria-describedby="cs_datatable_info">
                                <thead>
                                <tr role="row"><th width="20" class="sorting_desc" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-sort="descending" aria-label="Id: activate to sort column ascending" style="width: 20px;">Id</th><th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 50px;">Name</th><th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending" style="width: 199px;">Type</th><th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="&amp;nbsp;: activate to sort column ascending" style="width: 193px;">&nbsp;</th><th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Required: activate to sort column ascending" style="width: 72px;">Required</th><th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Order: activate to sort column ascending" style="width: 49px;">Order</th><th class="sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 53px;">Status</th><th class="th-options sorting" tabindex="0" aria-controls="cs_datatable" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 110px;">Options</th></tr>
                                </thead>
                                <tbody>

                                                                    

                                                                    

                                                                    

                                @if(!empty($data))
                                @php $index=1; @endphp
                                @foreach($data as $d)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$index++}}</td>
                                        <td>{{$d->name1}}</td>
                                        <td>{{$d->field_type}}</td>
                                        <td>
                                            <form action="https://modesy.codingest.com/category_controller/add_remove_custom_field_filters_post" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                                 <input type="hidden" name="csrf_modesy_token" value="8f9f6b59eb627692f29ffeef63b81b5d">
                                            <input type="hidden" name="id" value="3">
                                                                                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i>&nbsp;Remove from Product Filters</button>
                                                                                            </form>                                        </td>
                                        <td>
                                            {{$d->is_required}}                                      </td>
                                        <td> {{$d->field_order}}   </td>
                                        <td>
                                                                                            <label class="label bg-olive label-table">
                                                                                            @if($d->status == 1)
                                                                                            {{'Active'}}
                                                                                            @else
                                                                                            {{'Not Active'}}
                                                                                            @endif
                                                                                            </label>
                                                                                    </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown">Select an option                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu options-dropdown">
                                                    <li>
                                                        <a href="/update-custom-field/{{$d->id}}"><i class="fa fa-edit option-icon"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" onclick="delete_item('{{$d->id}}');"><i class="fa fa-trash option-icon"></i>Delete</a>
                                                    </li>
                                                </ul>
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