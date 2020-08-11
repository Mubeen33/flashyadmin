@extends('layouts.master')
@section('page-title','Add Category')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Category</li>
    <button type="button" style="float:right; margin-left:200px;" class="btn mr-1 mb-1 btn-primary btn-sm waves-effect waves-light"><i class="fa fa-list"></i> View Category List</button>
  
@endsection    
<link href="{{asset('src/selectstyle.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('src/themify-icons.css')}}">

@php
if(isset($edit_cat) && !empty($edit_cat)){
	$name = $edit_cat[0]->name;
	$slug = $edit_cat[0]->slug;
	$title_meta_tag = $edit_cat[0]->title_meta_tag;
	$description = $edit_cat[0]->description;
	$keyword = $edit_cat[0]->keyword;
	$commission = $edit_cat[0]->commission;
	$visibility = $edit_cat[0]->visibility;
	$show_on_homepage = $edit_cat[0]->show_on_homepage;
	$homepage_sort_order = $edit_cat[0]->homepage_sort_order;
	$display_order = $edit_cat[0]->display_order;
	if($edit_cat[0]->parent_id == 0){
		$parent_id = $edit_cat[0]->id;
	}else{
		$parent_id = $edit_cat[0]->parent_id;
	}
}else{
    $name = '';
	$slug = '';
	$title_meta_tag = '';
	$description = '';
	$keyword = '';
	$commission = '';
	$visibility = '';
	$show_on_homepage = '';
	$homepage_sort_order = '';
	$display_order = '';
	$parent_id = '';              
}
@endphp
                            
@section('content')

            <div class="content-body">
            @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                <!-- account setting page start -->
                <section id="page-account-settings">
                
                    <div class="row">
                   
                   
                    <div class="col-lg-8 col-md-12 card" style="padding:12px;">
                   
                            <div class="box box-primary">
                    
                                <div class="box-header with-border">
                                   <!-- /.box-header -->

                                <!-- form start -->
                                <form action="/admin/create-category" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    @csrf

                                <input type="hidden" name="parent_id" value="0">

                                <div class="box-body">
                                

                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" class="form-control" name="name_lang_1" placeholder="Category Name" maxlength="255" required value="{{ $name }}">
                                        </div>
                                       
                                    
                                    <div class="form-group">
                                        <label class="control-label">Slug						<small>(If you leave it blank, it will be generated automatically.)</small>
                                        </label>
                                        <input type="text" class="form-control" name="slug_lang" placeholder="Slug" value="{{ $slug }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Title (Meta Tag)</label>
                                        <input type="text" class="form-control" name="title_meta_tag" value="{{ $title_meta_tag }}" placeholder="Title (Meta Tag)" value="">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Description (Meta Tag)</label>
                                        <input type="text" class="form-control" name="description" value="{{ $description }}" placeholder="Description (Meta Tag)" value="">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Keywords (Meta Tag)</label>
                                        <input type="text" class="form-control" name="keywords" value="{{ $keyword }}" placeholder="Keywords (Meta Tag)" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Order</label>
                                        <input type="number" class="form-control" name="category_order" value="{{ $display_order }}" placeholder="Order" value="" min="1" max="99999" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Homepage Order</label>
                                        <input type="number" class="form-control" name="homepage_order" value="{{ $homepage_sort_order }}" placeholder="Homepage Order" value="" min="1" max="99999" required="">
                                    </div>
                                    
                                    <div class="row">
										<div class="form-group col-sm-3">
											<label>Parent Category</label>
											<div class="select select_2">
												<select class="form-control" name="parent_id" onchange="getCategory(this)" data-id="child-0">
													<option value="">--Select parent--</option>
													@foreach($categories as $c)
														@if($c->parent_id == Null)
															<option value="{{$c->id}}" <?php if($parent_id == $c->id){echo 'selected';}?>>{{$c->name}}</option>
														@endif
													@endforeach
												</select>
											</div>
											<div id="child-1"  class="col-sm-12 p-0"></div>
											<div id="child-2" class="col-sm-12 p-0"></div>
											<div id="child-3" class="col-sm-12 p-0"></div>
										</div>
                                    </div>
                                    
                                    <div class="row">
                                            <div class="col-md-4">
                                                <label class="control-label">Visibility</label>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                        
                                        
                                                <li class="d-inline-block mr-2 " >
                                                    <fieldset>
                                                    <label>
                                                        <input class="visibility_yes" name="visibility_yes" onclick="visible_yes()" type="checkbox" value="Y" checked="">
                                                        Active
                                                    </label>
                                                    </fieldset>
                                                </li>
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                    <label>
                                                        <input class="visibility_no" name="visibility_no" onclick="visible_no()" type="checkbox" value="N">
                                                        Inactive
                                                    </label>
                                                    </fieldset>
                                                </li>

                                            
                                            
                                            </div>
                                            </div>
                                     </div>

                                     <div class="row">
                                            <div class="col-md-4">
                                                <label class="control-label">Show On Homepage</label>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                        
                                        
                                                <li class="d-inline-block mr-2 " >
                                                    <fieldset>
                                                    <label>
                                                        <input class="homepage_yes" name="homepage_yes" onclick="homepage_yes2()" type="checkbox" value="Y" checked="">
                                                        Active
                                                    </label>
                                                    </fieldset>
                                                </li>
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                    <label>
                                                        <input class="homepage_no" name="homepage_no" onclick="homepage_no2()" type="checkbox" value="N">
                                                        Inactive
                                                    </label>
                                                    </fieldset>
                                                </li>

                                            
                                            
                                            </div>
                                            </div>
                                     </div>



                                     <div class="row">
                                            <div class="col-md-4">
                                                <label class="control-label">Show Category Image on Homepage</label>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                        
                                        
                                                <li class="d-inline-block mr-2 " >
                                                    <fieldset>
                                                    <label>
                                                        <input class="show_category_yes" name="show_category_yes" onclick="show_category_yes3()" type="checkbox" value="Y" checked="">
                                                        Active
                                                    </label>
                                                    </fieldset>
                                                </li>
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                    <label>
                                                        <input class="show_category_no" name="show_category_no" onclick="show_category_no3()" type="checkbox" value="N">
                                                        Inactive
                                                    </label>
                                                    </fieldset>
                                                </li>

                                            
                                            
                                            </div>
                                            </div>
                                     </div>
                                    

                                   

                                    <div class="form-group">
                                        <label class="control-label">Image</label>
                                        <div class="display-block">
                                            <a class="btn btn-primary btn-sm btn-file-upload">
                                                <input type="file" onchange="showMyImage(this)" name="category_image" size="40" accept=".png, .jpg, .jpeg, .gif">
                                            </a>
                                        </div>

                                        <img id="thumbnil" style="width:20%; margin-top:10px;"  src="" alt="image"/>
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

      
@endsection      
<script>

function visible_yes(){
    // alert('enable yes');
    $('.visibility_yes').attr('checked',true);
    $('.visibility_no').attr('checked',false);
    $('.visibility_no').hide();
    $('.visibility_yes').show();
    $('.visibility_no').removeAttr('checked');
    $('.visibility_no').removeAttr('name');
    $('.visibility_yes').attr('name','visibility_yes');
}
   



function visible_no(){
    // alert('enable no');
    $('.visibility_no').show();
    $('.visibility_yes').hide();
    $('.visibility_no').attr('checked',true);
    $('.visibility_yes').removeAttr('checked');
    $('.visibility_yes').removeAttr('name');
    $('.visibility_no').attr('name','visibility_no');
}


    
</script>

<script src="{{asset('src/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('src/selectstyle.js')}}"></script>
<script>
	

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-36251023-1']);
	_gaq.push(['_setDomainName', 'jqueryscript.net']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
     
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
					var json = resp;
					var outPut = '';
					$.each(resp.subcategories[0].subcategories,function(index,subcategory){
                        outPut +='<option value="'+subcategory.id+'">'+subcategory.name+'</option>';
					})
					if(outPut !== ''){
						var selectSecSubCat = '<div class="col-sm-12 p-0"><select name="child_'+cId+'" class="form-control" onChange="getCategory(this)" data-id="child-'+cId+'"><option value="0">Sub Category '+cId+'</option> '+outPut+' </select> </div>';
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


	function homepage_yes2(){
		// alert('enable yes');
		$('.homepage_yes').attr('checked',true);
		$('.homepage_no').attr('checked',false);
		$('.homepage_no').hide();
		$('.homepage_yes').show();
		$('.homepage_no').removeAttr('checked');
		$('.homepage_no').removeAttr('name');
		$('.homepage_yes').attr('name','homepage_yes');
	}


	function homepage_no2(){
		//  alert('enable no');
		$('.homepage_no').show();
		$('.homepage_yes').hide();
		$('.homepage_no').attr('checked',true);
		$('.homepage_yes').removeAttr('checked');
		$('.homepage_yes').removeAttr('name');
		$('.homepage_no').attr('name','homepage_no');
	}

	// Starting Show category image

	function show_category_yes3(){
		// alert('enable yes');
		$('.show_category_yes').attr('checked',true);
		$('.show_category_no').attr('checked',false);
		$('.show_category_no').hide();
		$('.show_category_yes').show();
		$('.show_category_no').removeAttr('checked');
		$('.show_category_no').removeAttr('name');
		$('.show_category_yes').attr('name','show_category_yes');
	}


	function show_category_no3(){
		// alert('enable no');
		$('.show_category_no').show();
		$('.show_category_yes').hide();
		$('.show_category_no').attr('checked',true);
		$('.show_category_yes').removeAttr('checked');
		$('.show_category_yes').removeAttr('name');
		$('.show_category_no').attr('name','show_category_no');
	}


	// Show Image preview
	function showMyImage(fileInput) {
		var files = fileInput.files;
		for (var i = 0; i < files.length; i++) {           
			var file = files[i];
			var imageType = /image.*/;     
			if (!file.type.match(imageType)) {
				continue;
			}           
			var img=document.getElementById("thumbnil");            
			img.file = file;    
			var reader = new FileReader();
			reader.onload = (function(aImg) { 
				return function(e) { 
					aImg.src = e.target.result; 
				}; 
			})(img);
			reader.readAsDataURL(file);
		}    
	}
</script>

