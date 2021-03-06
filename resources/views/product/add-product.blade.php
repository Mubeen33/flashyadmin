@extends('layouts.master')
@section('page-title','Add Product')
@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Add Product</li>
@endsection
@section('content')
    
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css')}}">

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
    
    
        <form action="{{url('admin/add-product')}}" method="post" enctype="multipart/form-data" id="choice_form">
            @csrf
            <input type="hidden" name="image_id" value="{{$prod_img_id}}">      
          		<!-- end Photos -->
          		<!-- Card video -->
          		<div class="card">
          			<div class="card-body pad-video" style="padding-top:1%; !important;">
          				    <div class="row">
          						<div class="col-lg-2">
          							<label class="mb-xs-1 strong">Video</label>
          						</div>
          						<div class="col-lg-9">
          							<input type="text" placeholder="Paste here youtube link" class="form-control" name="video_link">
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
                 						<div class="mb-xs-2 strong"> Title <span class="text-gray-lightest">*</span> </div>

                 						<p class="text-smaller text-gray-lighter">
                 							Include keywords that buyers would use to search for your item.
                 						</p>
                 					</div>
                 					<div class="col-lg-9"> <br />
                 						<input type="text" class="form-control" name="title" required="" />
                 					</div>
                     			</div>
                     			<div class="row">
                     				<div class="col-lg-3">
                 						<div class="mb-xs-2 strong"> About this listing <span class="text-gray-lightest">*</span> </div>
                 						<p class="text-smaller text-gray-lighter">
                 							Learn more about what types of items are allowed on Etsy.
                 						</p>
                 					</div>
                 					<div class="col-lg-3">
                 						<br />
                 						<select class="form-control" name="made_by">>
                 							<option selected >Who made it?</option>
                 							<optgroup label="Select a maker"> 
          						      <option value="I did">I did</option>
          						      <option value="A member of my shop">A member of my shop</option>
          						      <option value="Another company or person" >Another company or person</option>
          						    </optgroup>
                 						</select>
                 					</div>
                 					<div class="col-lg-3">
                 						<br />
                 						<select class="form-control" name="what_is_it">
                 							<option>What is it?</option>
                 							<optgroup label="Select a use">
          						      <option value="A finished product">A finished product</option>
          						      <option value="Another company or person">
          						      	A supply or tool to make things
          						      </option>
          						    </optgroup>
                 						</select>
                 					</div>
                 					<div class="col-lg-3">
                 						<br />
                 						<select class="form-control" name="made_date">
                 							<option>Whan was it made?</option>
                 							<optgroup label="Not yet Made">
          						      <option value="Made to order">Made to order</option>
          						    </optgroup>
          						    <optgroup label="Recently">
          						      <option value="2020 - 2020">2020 - 2020</option>
          						      <option value="2010 - 2019">2010 - 2019</option>
          						      <option value="2001 - 2009">2001 - 2009</option>
          						    </optgroup>
          						    <optgroup label="Vintage">
          						      <option value="Before 2001">Before 2001</option>
          						      <option value="2010 - 2019">2000 - 2000</option>
          						      <option value="1990s">1990s</option>
          						       <option value="1980s">1980s</option>
          						       <option value="1970s">1970s</option>
          						    </optgroup>
                 						</select>
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
                 						<input type="text" id="category_search" class="form-control" name="" />
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
                 						<div class="mb-xs-2 strong"> Renewal options 
                 							<span class="text-gray-lightest">*</span> 
                 						</div>
                 						<p class="text-smaller text-gray-lighter">
                 							Each renewal lasts for four months or until the listing sells out. Get more details on auto-renewing here.
                 						</p>
                 					</div>
                 					<div class="col-lg-3"> <br />
                     					<label class="radio-custom">
                     						<input type="radio" name="renewal" value="auto"> <span class="radio-label">  Automatic </span>
                     						<p class="text-smaller text-gray-lighter" style="margin-left:15px;">
                     							This listing will renew as it expires for USD 0.20 USD each time (recommended).
                     						</p>
                 						</label>
                 					</div>
                 					<div class="col-lg-3"> <br />
                 						<label class="radio-custom">
                     						<input type="radio" name="renewal" value="mannual"> <span class="radio-label">  Mannual </span>
                     						<p class="text-smaller text-gray-lighter" style="margin-left:15px;">
                     							I'll renew expired listings myself.
                     						</p>
                 						</label>
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
                     						<input type="radio" name="product_type" value="physical"> <span class="radio-label">  Physical </span>
                     						<p class="text-smaller text-gray-lighter" style="margin-left:15px;">
                     							A tangible item that you will deliver to buyers.
                     						</p>
                 						</label>
                 					</div>
                 					<div class="col-lg-3"> <br />
                 						<label class="radio-custom">
                     						<input type="radio" name="product_type" value="digital"> <span class="radio-label">  Digital </span>
                     						<p class="text-smaller text-gray-lighter" style="margin-left:15px;">
                     							A digital file that buyers will download.
                     						</p>
                 						</label>
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
                 						<textarea class="form-control textarea" rows="10" name="description"></textarea>
                 					</div>
                 				</div>
          			</div>
          		</div>
          		<!-- End Listing Details -->
          		<!-- Inventory and pricing  -->
          		<div class="card">
          			<div class="card-body">
          				<div class="mb-xs-1 strong"> Inventory and pricing
          			</div> <br />
          			{{-- <div class="row">
          				<div class="col-lg-3">
          					<div class="mb-xs-2 strong"> Price <span class="text-gray-lightest">*</span> </div>
          					<p class="text-smaller text-gray-lighter">
          						Remember to factor in the costs of materials, labour, and other business expenses. If you offer free delivery, make sure to include the cost of postage so it doesn't eat into your profits.
          					</p>
          				</div>
          				<div class="col-lg-3">
          					<br />
          					<input type="text" class="form-control" name="price" />
          				</div>
          			</div>
          			<div class="row">
          				<div class="col-lg-3">
          					<div class="mb-xs-2 strong"> Quantity <span class="text-gray-lightest">*</span> </div>
          					<p class="text-smaller text-gray-lighter">
          						For quantities greater than one, this listing will renew automatically until it sells out. You’ll be charged a USD 0.20 USD listing fee each time.
          					</p>
          				</div>
          				<div class="col-lg-3">
          					<br />
          					<input type="text" class="form-control" name="price" />
          				</div>
          			</div> --}}
          			<div class="row">
          				<div class="col-lg-3">
          					<div class="mb-xs-2 strong"> SKU <span class="text-gray-lightest">Optional</span> </div>
          					<p class="text-smaller text-gray-lighter">
          						SKUs are for your use only — buyers won’t see them. 
          					</p>
          				</div>
          				<div class="col-lg-3">
          					<br />
          					<input type="text" class="form-control" name="sku" />
          				</div>
          			</div>
          			<hr />
          			<div class="row">
      					<div class="col-lg-9">
      						<label class="mb-xs-2 strong">Variations</label> <br/>
         					<p class="text-gray-lighter">Add available options like color or size. Buyers will choose from these during checkout.</p>
      					</div>
          			</div>
          			<div class="row">
          					<div class="col-lg-10">
          						{{-- <button type="button" onclick="openVariant()" class="btn btn-light mr-1 mb-1 waves-effect waves-light"> --}}
          							{{-- Add Variations
          						</button> --}}
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </div>
          					</div>
                            
          			</div>
          		</div>
                {{-- <div class="card" id="variant-card" style="display: none;">
                    <div class="card-body">
                        <h5 class="modal-title">Add variations</h5><br>
                    <div class="row" id="render__variations__data">
                        <div class="col-lg-6">
                            <select class="form-control" name="variation" onchange="getVariantOption(this.value)">
                                <option>Choose Variation Type</option>
                                <optgroup label="Variation Type">
                                    @foreach($variationList as $variation)
                                      <option value="{{$variation->id}}">
                                        {{$variation->variation_name}}
                                      </option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        @include('product.partials.auto-variantOptions')
                        
                    </div>
                    <table class="table table-bordered">
                      <thead id="first_variant">
                        <tr></tr>
                      </thead>
                    </table>
                    </div>
                    
                </div>
                <div class="card">
                  <div class="card-body" style="display: none" id="combine">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <td class="text-center"><label for="" class="control-label">{{__('Variant')}}</label></td>
                          <td class="text-center"><label for="" class="control-label">{{__('SKU')}}</label></td>
                        </tr>
                      </thead>
                      <tbody  id="sku_combination">
                      </tbody>
                    </table>  
                  </div>
                </div> --}}
      		<!-- End Inventory and pricing  -->
        </form>    
	    </div>
  </div>
</div>
{{-- <input type="hidden"  id="nmbr" name="" value="0"> --}}
@endsection
@section('script')
  <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
  <script src="{{ asset('app-assets/js/scripts/extensions/custom-dropzone.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
  <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
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
                url:"/vendor/ajax-get-category/fetch?search_key="+searchCategory,
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
                url:"/vendor/ajax-get-category-customfields/fetch?categoryId="+categoryID,
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
</script>

  
@endsection
    
