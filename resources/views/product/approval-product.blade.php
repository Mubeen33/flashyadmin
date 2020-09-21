@extends('layouts.master')
@section('page-title','Add Product')
@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Add Product</li>
@endsection
@section('content')
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link href="{{ asset('app-assets/vendors/css/jquery.tagsinput-revisited.css')}}" rel="stylesheet" type="text/css">

<style type="text/css">
  .p-graph {
    font-size:10px !important;
  }
.dropzone{
	min-height : 190px !important;
	max-width: 180px;
    display: flex;
    min-width: 178px;
    border: 1px solid grey !important;
    color: #373738 !important;
    justify-content: center;
    margin: 0 auto;
}

@media only screen and (max-width: 768px) {
	.dropzone {
		margin-bottom: 15px;
	}
}

@media only screen and (min-width: 769px) and (max-width: 991px) {
	.col22 {
		flex: 0 0 100%!important;
        max-width: 100%!important;
	}

	.dropzone {
		margin-bottom: 15px;
	}
}

@media only screen and (min-width: 992px) and (max-width: 1200px) {
	.col22 {
		flex: 0 0 25%!important;
        max-width: 25%!important;
	}
}
  .dropzone .dz-message:before{
	top        : 18px!important;
	font-size  : 46px !important;
	color      : #373738 !important;
  }
  .dropzone .dz-message{
	font-size  : 1rem !important;
	color      : #373738 !important;
	position: absolute;
	z-index: 9;
  }
  .dz-filename{
    display: none !important;
  }
  .dz-size{
    display: none !important;
  }
<?php $today = date('YmdHi');
      $startDate = date('YmdHi', strtotime('2012-03-14 09:06:00'));
      $range = $today - $startDate;
      $prod_img_id = rand(0, $range);  
?>
</style>
<div class="content-body">
	<div class="container-fluid">
            @include('msg.msg')
            @if(session('msg'))
              {!! session('msg') !!}
            @endif
      		<!-- Photos -->
      		<div class="card form-group">
             	<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<label class="mb-xs-1 strong">Photos</label> <br/>
							<p class="text-gray-lighter">Add as many as you can so buyers can see every detail<small>(Use up to ten photos to show your item's most important qualities).</small> </p>	
							<label class="text-smaller text-gray-lighte"> Tips: </label>
						</div>
					</div>
					<div class="row">
						<div  class="col-lg-2 col-md-3">
							<ul class="text-smaller text-gray-lighter">
								<li>Use natural light and no flash. </li>
								<li>Include a common object for scale. </li>
								<li>Show the item being held, worn, or used. </li>
								<li>Shoot against a clean, simple background. </li>
							</ul>
						</div>

						<div class="col-lg-2 col-md-3 col22">
							<form action="{{url('admin/add-product-images')}}/{{$prod_img_id}}" 
								method="POST"  
								enctype="multipart/form-data" 
								class="dropzone dropzone-area"
								id="dpz-single-file-p1"
							>
							@csrf
								<input type="hidden" name="fileDropzone" />

                @include('product.partials.preview-current-thumb', ['serialNumber'=>0])
							</form>
						</div>
						<div class="col-lg-2 col-md-3 col22">
							<form action="{{url('admin/add-product-images')}}/{{$prod_img_id}}" 
								method="POST"  
								enctype="multipart/form-data" 
								class="dropzone dropzone-area" 
								id="dpz-single-file-p2"
							>  
							@csrf
								<input type="hidden" name="fileDropzone" />
                @include('product.partials.preview-current-thumb', ['serialNumber'=>1])
							</form>
						</div>
						<div class="col-lg-2 col-md-3 col22">
							<form action="{{url('admin/add-product-images')}}/{{$prod_img_id}}" 
								method="POST"  
								enctype="multipart/form-data" 
								class="dropzone dropzone-area" 
								id="dpz-single-file-p3"
							>  
							@csrf
								<input type="hidden" name="fileDropzone" />
                @include('product.partials.preview-current-thumb', ['serialNumber'=>2])
							</form>
						</div>  
						<div class="col-lg-2 col-md-3 col22">
							<form action="{{url('admin/add-product-images')}}/{{$prod_img_id}}" 
								method="POST"  
								enctype="multipart/form-data" 
								class="dropzone dropzone-area" 
								id="dpz-single-file-p4" 
							>  
							@csrf
								<input type="hidden" name="fileDropzone" />
                @include('product.partials.preview-current-thumb', ['serialNumber'=>3])
							</form>
						</div>  
						<div class="col-lg-2 col-md-3 col22">
							<form action="{{url('admin/add-product-images')}}/{{$prod_img_id}}" 
								method="POST"  
								enctype="multipart/form-data" 
								class="dropzone dropzone-area" 
								id="dpz-single-file-p5"
							>  
							@csrf
								<input type="hidden" name="fileDropzone" />
                @include('product.partials.preview-current-thumb', ['serialNumber'=>4])
							</form> 
						</div>
						</div>  
						<br />      
            				<div class="row">
            					<div class="col-lg-2"></div>
            					<div class="col-lg-8">
            						<p class="strong mb-xs-2"> Link photos to variations </p>
            						<p class="text-smaller text-gray-lighter">
            							Add photos to your variations so buyers can see all their options. Try it out
            						</p>
            					</div>
            				</div>     			
      			  </div>
      		</div>
    
    
        <form action="{{route('admin.productUpdate.post', encrypt($product->id))}}" method="post" enctype="multipart/form-data" id="choice_form">
            @csrf
            <input type="hidden" name="image_id" value="{{$prod_img_id}}">      
          		<!-- end Photos -->
          		<!-- Card video -->
          		<div class="card" style="min-height: unset !important;">
          			<div class="card-body pad-video" style="padding-top:1%; !important;">
          				    <div class="row">
          						<div class="col-lg-2">
          							<label class="mb-xs-1 strong">Video</label>
          						</div>
          						<div class="col-lg-9">
          							<input type="text" placeholder="Paste here youtube link" class="form-control" name="video_link" value="{{ $product->video_link }}">
          							<p class="text-smaller text-gray-lighter">
          								Add photos to your variations so buyers can see all their options. Try it out
          							</p>
          						</div>
          					</div>    
          			</div>
          		</div>
          		<!-- end card -->
          		<!--Listing Details -->        
          		<div class="card">
          			<div class="card-body">
          				<div class="row">
                 					<div class="col-lg-12">
                 						<label class="mb-xs-1 strong">Listing Details</label> <br/>
                     					<p class="text-gray-lighter">
                     						Include keywords that buyers would use to search for your item.
                     					</p>
                 					</div>	
                     			</div>
                          <div class="row">
                            <div class="col-lg-3">
                            <div class="mb-xs-2 strong"> Type
                              <span class="text-gray-lightest">*</span> 
                            </div>
                          </div>
                          <div class="col-lg-3"> <br />
                              <label class="radio-custom">
                                <input type="radio" name="product_type" value="physical" @if($product->product_type === "physical") checked @endif> <span class="radio-label">  Physical </span>
                                <p class="text-smaller text-gray-lighter" style="margin-left:15px;">
                                  A tangible item that you will deliver to buyers.
                                </p>
                            </label>
                          </div>
                          <div class="col-lg-3"> <br />
                            <label class="radio-custom">
                                <input type="radio" name="product_type" value="digital" @if($product->product_type === "digital") checked @endif> <span class="radio-label">  Digital </span>
                                <p class="text-smaller text-gray-lighter" style="margin-left:15px;">
                                  A digital file that buyers will download.
                                </p>
                            </label>
                          </div>
                          </div>
                     			<div class="row">
                     				<div class="col-lg-3">
                 						<div class="mb-xs-2 strong"> Title <span class="text-gray-lightest">*</span> </div>

                 						<p class="text-smaller text-gray-lighter">
                 							Include keywords that buyers would use to search for your item.
                 						</p>
                 					</div>
                 					<div class="col-lg-9"> <br />
                 						<input type="text" class="form-control" name="title" required="" value="{{ $product->title }}" />
                 					</div>
                     			</div>
                     			<div class="row">
                     				<div class="col-lg-3">
                 						<div class="mb-xs-2 strong"> Category 
                 							<span class="text-gray-lightest">*</span> 
                 						</div>
                 						<p class="text-smaller text-gray-lighter">
                 							Type a two- or three-word description of your item to get category suggestions that will help more shoppers find it.
                 						</p>
                 					</div>
                 					<div class="col-lg-9"> <br />
                 						<input type="text" id="category_search" class="form-control" name="" value="{{$currentCategory->name}}" />
        										<input type="hidden" name="category_id" id='category_id' value="">
        										<i id="filtersubmit" class="fa fa-search"></i>
                                        <div id="render__data">
                                            @include('product.partials.auto-category')
                                        </div>
                 					</div>
                     			</div>
                                <div id="render__customfields__data">
                                    @include('product.partials.auto-customfields')
                                </div>
                     			<div class="row">
                            <div class="col-lg-3">
                            <div class="mb-xs-2 strong">Category Commission 
                              <span class="text-gray-lightest"></span> 
                            </div>
                          </div>
                          <div class="col-lg-9"> <br />
                            <input type="text" name="" class="form-control" value="{{$currentCategory->commission}}" readonly="">
                          </div>
                          </div>
                     			<div class="row">
                            <div class="col-lg-3">
                            <div class="mb-xs-2 strong"> Select Other Categories 
                              <span class="text-gray-lightest">*</span> 
                            </div>
                            <p class="text-smaller text-gray-lighter">
                              Type a two- or three-word description of your item to get category suggestions that will help more shoppers find it.
                            </p>
                          </div>
                          <div class="col-lg-9"> <br />
                            <select class="form-control select2" name="categories[]"  multiple="multiple" >
                              @foreach($categories as $category)
                                 <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          </div>
                     			<div class="row">
                     				<div class="col-lg-3">
                 						<div class="mb-xs-2 strong"> Description
                 							<span class="text-gray-lightest">*</span> 
                 						</div>
                 						<p class="text-smaller">
                 							Start with a brief overview that describes your item’s finest features. Shoppers will only see the first few lines of your description at first, so make it count!
          							Not sure what else to say? Shoppers also like hearing about your process, and the story behind this item.
                 						</p>
                 					</div>
                 					<div class="col-lg-9">
                 						<textarea class="form-control textarea" rows="10" name="description"><?php echo $product->description;?></textarea>
                 					</div>
                 				</div>
          			</div>
          		</div>
          		<!-- End Listing Details -->
          		<!-- Inventory and pricing  -->
          		<div class="card" style="min-height: unset !important;">
          			<div class="card-body">
          				<div class="mb-xs-1 strong"> Inventory and Dimensions
          			</div> <br />
          			
          			<div class="row">
          				<div class="col-lg-3">
          					<div class="mb-xs-2 strong"> SKU <span class="text-gray-lightest">Optional</span> </div>
          					<p class="text-smaller text-gray-lighter">
          						SKUs are for your use only — buyers won’t see them. 
          					</p>
          				</div>
          				<div class="col-lg-3">
          					<br />
          					<input type="text" class="form-control" name="sku" value="{{ $product->sku }}" />
          				</div>
          			</div>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="mb-xs-2 strong"> Width </div>
                    
                  </div>
                  <div class="col-lg-3">
                    <br />
                    <input type="text" class="form-control" name="width" value="{{ $product->width }}" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="mb-xs-2 strong"> Hieght  </div>
                    
                  </div>
                  <div class="col-lg-3">
                    <br />
                    <input type="text" class="form-control" name="hieght" value="{{ $product->hieght }}" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="mb-xs-2 strong"> Length  </div>
                    
                  </div>
                  <div class="col-lg-3">
                    <br />
                    <input type="text" class="form-control" name="length" value="{{ $product->length }}" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="mb-xs-2 strong"> Warranty  </div>
                    
                  </div>
                  <div class="col-lg-3">
                    <br />
                    <input type="text" class="form-control" name="warranty" value="{{ $product->warranty }}" />
                  </div>
                </div>
          			<hr />
          			<!-- <div class="row">
        					<div class="col-lg-9">
        						<label class="mb-xs-2 strong">Variations</label> <br/>
           					<p class="text-gray-lighter">Add available options like color or size. Buyers will choose from these during checkout.</p>
        					</div>
          			</div> 
          			<div class="row">
          				 
                      <div class="col-lg-10">
                						<button type="button" onclick="openVariant()" class="btn btn-light mr-1 mb-1 waves-effect waves-light">
                							Add Variations
                						</button>
                        </div>
          					</div>-->
          			</div>
          		</div>

           
             
       
            <div class="card" id="customer_options">
          @if(count($productVariations) > 0)     
              <div class="card-body" id="customer_choice_options">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td class="text-center">
                        <label for="" class="control-label">{{__('Variant')}}</label>
                      </td>
                      <td class="text-center">
                        <label for="" class="control-label">{{__('SKU')}}</label>
                      </td>
                      <td class="text-center">
                        <label for="" class="control-label">{{__('Variant Image')}}</label>
                      </td>
                      <td class="text-center">
                        <label for="" class="control-label">{{__('Active')}}</label>
                      </td>
                    </tr>
                  </thead>
                <tbody>
                @foreach($productVariations as $variants)  
                  <tr>
                    <td>
                      <label for="" class="control-label">{{ $variants->first_variation_value }}-{{ $variants->second_variation_value }}</label>
                      <input type="hidden" name="variant_combinations[]" value="{{ $variants->first_variation_value }}-{{ $variants->second_variation_value }}">
                      <input type="hidden" name="variant_id[]" value="{{$variants->id}}">
                    </td>
                    <td>
                      <input type="text" name="variant_sku[]" value="{{$variants->sku}}" class="form-control" required>
                    </td>
                      @if( !empty($variants->variant_image))
                        <td>
                          <input type="file" name="variant_image[]" class="form-control">
                          <span><img width="80" src="{{$variants->variant_image}}"></span>
                        </td>
                      @else
                        <td>
                          No Image Available.
                        </td>
                      @endif
                        <td>
                          <input type="checkbox" name="active[]" value="1" class="form-control">
                        </td>    
                  </tr>
                @endforeach  
                </tbody>
              </table>  
              </div>
            @endif  
                  <div class="col-lg-4 d-flex">
                      @if(intval($product->rejected) === 0)
                      <a onclick="return confirm('Are you sure to reject?')" href="{{ route('admin.rejectProduct.post', encrypt($product->id)) }}" class="btn btn-warning">Reject</a>
                      @endif

                      @if(intval($product->approved) === 0)
                      <button type="submit" class="btn btn-success ml-1">Approve</button>
                      @endif

                      @if(intval($product->approved) === 1)
                      <button type="submit" class="btn btn-warning ml-1">UPDATE</button>
                      @endif
                  </div>
            </div> 

      		<!-- End Inventory and pricing  -->
        </form>    
	    </div>
  </div>
</div>
{{-- <input type="hidden"  id="nmbr" name="" value="0"> --}}
@endsection
@push('scripts')
  <script src="{{ asset('app-assets/vendors/js/jquery.tagsinput-revisited.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
  <script src="{{ asset('app-assets/js/scripts/extensions/custom-dropzone.js')}}"></script>
  <!-- <script src="{{ asset('app-assets/js/scripts/extensions/variants.js')}}"></script> -->
  <!-- <script src="{{ asset('app-assets/js/scripts/extensions/getVariantOptions.js')}}"></script> -->
  <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
  <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>

  <script type="text/javascript">


  $(function() {
     $("div.dz-preview").parent().children('div.dz-message').css('display', 'none');
  });
</script>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
  <script type="text/javascript">
    $('.tagsInput').tagsInput('items');
  $("#render__data").hide();

        //search category
    $("#category_search").on('keyup', function(){
        //get category
        let searchCategory = $(this).val();

        if (!$(this).val()) {
            $("#render__data").html('')
            return;
        }
        if (searchCategory !== "") {
            $.ajax({
                url:"/admin/ajax-get-category/fetch?search_key="+searchCategory,
                method:'GET',
                cache:false,
                success:function(response){
					if(response) {
						let res = response.search('<li');
						if(res == -1) {
							$("#render__data .auto-complete-wrapper ul").html("<p class='pt-1 px-2'>No Result Found!</p>");
						}
						else {
							$("#render__data").show();
							$("#render__data").html(response);
						}
					}
					//console.log(response);
                },
            });
        
        }else{
            return false;
        }


    });
    $("#render__data").on('click', "ul li", function(){
        let categoryID = $(this).attr('getCategoryId');
        let getTitle = $(this).attr('gettitle');
        
        $("#category_id").val(categoryID);
        $("#category_search").val(getTitle);
        $("#render__data .auto-complete-wrapper").html('');

        getCustomFields(categoryID);
    });

    // get custom fields of selected category

    function getCustomFields(categoryID){

        if (categoryID !== "") {
            $.ajax({
                url:"/admin/ajax-get-category-customfields/fetch?categoryId="+categoryID,
                method:'GET',
                cache:false,
                success:function(response){
                    $("#render__customfields__data").html(response);
                    // console.log(response);
                },
            });
        
        }else{
            return false;
        }
    }

    // 
    var i = 0;
      function add_more_customer_choice_option(){

        $('#customer_options').css('display','');
        $('#customer_choices').html(null);

        $("select#variation :selected").each(function() {

          vari = $(this).val();

            $('#customer_choices').append('<div class="row mb-3"><div class="col-8 col-md-3 order-1 order-md-0"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice_no_'+i+'" value="'+vari+'" readonly=""></div><div class="col-12 col-md-7 col-xl-8 order-3 order-md-0 mt-2 mt-md-0"><input type="text" class="form-control tagsInput" data-role="tagsinput" name="choice_options_'+i+'[]" placeholder="Enter choice values"></div><div class="col-4 col-xl-1 col-md-2 order-2 order-md-0 text-right"><button type="button" onclick="delete_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button></div></div>');
             i++;
            $('.tagsInput').tagsInput('items');
        });    
      }
      function update_sku(){
            $.ajax({
           type:"POST",
           url:'{{ route('admin.products.sku_combination') }}',
           data:$('#choice_form').serialize(),
           success: function(data){

             $('#customer_choice_options').html(data);
             
           }
         });
      }

      function delete_row(em){
        $(em).closest('.row').remove();
        update_sku();
      }
      // 
      $("#variation").select2({
          maximumSelectionLength: 2
      });
  </script>
@endpush
    
