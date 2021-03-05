
@if(!empty($productDetails))
<div class="container-fluid" style="width: 74% !important;">
    @php $today=date('YmdHi');
	$startDate=date('YmdHi', strtotime('2012-03-14 09:06:00'));
	$range=$today - $startDate;
	$prod_img_id=rand(0, $range);
	@endphp
                @if(session('msg'))
                    {!! session('msg') !!}
                    @endif
                    
                    <input type="hidden" id="currentProductID" name="currentProductID" value="" >      
                            <form id="titlFrm" action="" method="post" enctype="multipart/form-data" >
                                @csrf
                                <input type="hidden" name="image_id" value="{{$prod_img_id}}">      
                                    
                                    <!--Listing Details -->        
                                        <div class="card card-radiouse">
                                                <div class="card-header">
                                                <h4 class="card-title" >Listing Details</h4>
                                                </div>
                                            <div class="card-content" id="collapsetitle" style="">
                                    
                                                <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <p class="text-gray-lighter">
                                                                        Include keywords that buyers would use to search for your item.
                                                                    </p>
                                                                </div>	
                                                            </div>
                                                            
                                                            <div class="row">
                                                                
                                                                <div class="col-sm-12"> 
                                                                    <div class="mb-xs-2 strong">Product Title <span class="text-gray-lightest label-red">*</span> <span> </span> </div>
                                                                    <div id="titleMsg" class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
                                                                    <input id="titleID" type="text" class="form-control" name="title" autocomplete="off" value="{{ $productDetails->title }}" required/>
                                                                    <p class="text-smaller text-gray-lighter">
                                                                        To ensure customers can find your product include the brand, product name and most important information.											</p>
                                                                </div>
                                                            
                                                            </div>
                                                            
                                                            <div class="row mt-1">
                                                                
                                                                        <div class="col-sm-6"> 
                                                                            <div class="mb-xs-2 strong"> SKU <span class="text-gray-lightest" style="font-size: x-small;">( Optional )</span> </div>
                                                                            <div id="skuMsg" class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
                                                                            <input type="text" class="form-control" name="sku" placeholder="SKU" autocomplete="off" value="{{ $productDetails->sku }}"/>
                                                                            <p class="text-smaller text-gray-lighter">
                                                                                SKUs are for your use only — buyers won’t see them. 
                                                                            </p>
                                                                            

                                                                        </div>
                                                                        <div class="col-sm-6 ">
                                                                            <div class="mb-xs-2 strong">Brand <span class="text-gray-lightest"></span> </div>
                                                                            <div id="brandMsg" class="emptymsgs" style="color: rgb(228, 88, 88);"></div>
                                                                            
                                                                                <select class="select2 form-control" name="brand" id="brandoption" autocomplete="off" >
                                                                                    <option value="">Select Brand </option>
                                                                                    @foreach($brandsList as $brands)
                                                                                    <option value="{{encrypt($brands->id)}}" {{ (!empty($productDetails->brand_id) && $productDetails->brand_id==$brands->id) ? 'selected' : '' }}>{{$brands->name}}</option>
                                                                                    @endforeach
                                                                                    
                                                                                </select>
                                                                                <p class="text-smaller text-gray-lighter">Select a brand that's related with your product.</p>
                                                                            
                                                                            
                                                                            
                                                                            
                                                                        </div>
                                                            </div>
                                                            
                                                            
                                                </div>
                                            </div>
                                        </div>
                            </form>
                        <div class="card card-radiouse"  id="category-div">
                            <div class="card-header" >
                                <h4 class="card-title">Category And Custom Fields</h4>
                                
                            </div>
                            <form id="categoryFrm" action="" method="post" enctype="multipart/form-data" >
                                @csrf
                            <div class="card-content collapse show" id="collapsecat" >       
                            
                            <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p class="text-gray-lighter">
                                                    Select Product Related Category.
                                                </p>
                                            </div>	
                                        </div>
                                        
                                        <div class="row" style="margin-bottom: 3%;">
                                            
                                            <div class="col-lg-12"> <br />
                                                <div id="catMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
                                            <div class="row resources" >
                                                <div   id="resource-slider" >
                                                    <a href="javascript:void(0)" class='arrow prev catBtn waves-effect waves-light'></a>
                                                    <a href="javascript:void(0)" class='arrow next catBtn  waves-effect waves-light' id="nextslider"></a>
                                                    <div class=" resource-slider-frame" id="categoryDivs">
                                                        @include('product.partials.update_product.category-select')
                                                    
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row breadcrumbs-top mb-2" id="breadcurmsdiv" style="display: none;">
                                            <div class="col-12">
                                            
                                                <div class="breadcrumb-wrapper col-12" style="    border: 1px solid #D9D9D9;">
                                                    <h6 class="content-header-title float-left " style="margin-top: 0.6rem !important;">Current Selection: </h6>
                                                    <ol class="breadcrumb nextbrad" style="    border-left: 0px solid #D6DCE1;" >
                                                        
                                                        
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="render__customfields__data">
                                            @include('product.partials.update_product.auto-customfields')
                                        </div>
                                        
                                        
                            </div>
                            </div>
                            </form>
                        </div>
                        
                        <!-- End Listing Details -->

                        <div class="card form-group card-radiouse" id="imageDiv" >
                            <div class="card-header" >
                                <h4 class="card-title">Photos</h4>
                                
                            </div>
                            <div class="card-content" id="collapseimg" style="">
                            <div class="card-body">
                                
                            <div class="row">
                                <div class="col-lg-12">
                                    
                                    <p class="text-gray-lighter">Add as many as you can so buyers can see every detail<small>(Use up to ten photos to show your item's most important qualities).</small> </p>	
                                    <label class="text-smaller text-gray-lighte"> Tips: </label>
                                </div>
                            </div>
                            <div class="row">
                                <div  class="col-lg-3 col-md-3">
                                    <ul class="text-smaller text-gray-lighter">
                                        <li>Use natural light and no flash. </li>
                                        <li>Include a common object for scale. </li>
                                        <li>Show the item being held, worn, or used. </li>
                                        <li>Shoot against a clean, simple background. </li>
                                    </ul>
                                </div>
                                    
                                <div class="col-lg-9  ">
                                    <div id="dropzon_file_1"  class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
                                <div class="row">
                                    
                                <div class="col-lg-4 ">
                                    
                                

                                    <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
                                        method="POST"  
                                        enctype="multipart/form-data" 
                                        class="dropzone dropzone-area"
                                        id="dpz-single-file-p1"
                                    >
                                    @csrf
                                        <input type="hidden" name="fileDropzone" />
                                    </form>
                                </div>
                                <div class="col-lg-4 ">
                                    <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
                                        method="POST"  
                                        enctype="multipart/form-data" 
                                        class="dropzone dropzone-area" 
                                        id="dpz-single-file-p2"
                                    >  
                                    @csrf
                                        <input type="hidden" name="fileDropzone" />
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
                                        method="POST"  
                                        enctype="multipart/form-data" 
                                        class="dropzone dropzone-area" 
                                        id="dpz-single-file-p3"
                                    >  
                                    @csrf
                                        <input type="hidden" name="fileDropzone" />
                                    </form>
                                    </div>  
                                    <div class="col-lg-4 mt-2">
                                        <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
                                            method="POST"  
                                            enctype="multipart/form-data" 
                                            class="dropzone dropzone-area" 
                                            id="dpz-single-file-p4" 
                                        >  
                                        @csrf
                                            <input type="hidden" name="fileDropzone" />
                                        </form>
                                    </div>  
                                    <div class="col-lg-4 mt-2">
                                        <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
                                            method="POST"  
                                            enctype="multipart/form-data" 
                                            class="dropzone dropzone-area" 
                                            id="dpz-single-file-p5"
                                        >  
                                        @csrf
                                            <input type="hidden" name="fileDropzone" />
                                        </form> 
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
                                            method="POST"  
                                            enctype="multipart/form-data" 
                                            class="dropzone dropzone-area" 
                                            id="dpz-single-file-p6"
                                        >  
                                        @csrf
                                            <input type="hidden" name="fileDropzone" />
                                        </form> 
                                    </div>
                                </div>
                                </div>
                                
                                
                                
                                
                                </div>  
                                            
                            </div>
                            </div>
                            </div>
                        
                    <div>	       
                    
                        <!-- Inventory and pricing  -->
                        <form id="choice_form" action="" method="post" enctype="multipart/form-data" >
                        <div class="card card-radiouse" id="inventoryDiv" >
                            <div class="card-header" >
                                <h4 class="card-title">Inventory and Dimension</h4>
                            
                            </div>
                            <div class="card-content" id="collapseinv" style="">
                            <div class="card-body" style="padding-top: 1.3rem !important;">
                                
                            
                            <div class="row">
                                
                                <div class="col-lg-3">
                                    <div class="mb-xs-2 strong"> Width<span class="text-gray-lightest label-red">*</span></div>
                                    <p class="text-smaller text-gray-lighter">
                                        Width description 
                                    </p>
                                    <div id="widthMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
                                    <input type="text" id="width" class="form-control" name="width"  placeholder="Width" autocomplete="off" value="{{ $productDetails->width }}" required/>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-xs-2 strong"> Height<span class="text-gray-lightest label-red">*</span>  </div>
                                    <p class="text-smaller text-gray-lighter">
                                        Height description 
                                    </p>
                                    <div id="heigtMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
                                    <input type="text" id="hieght" class="form-control" name="hieght" placeholder="Height" autocomplete="off" value="{{ $productDetails->hieght }}" required/>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-xs-2 strong"> Length<span class="text-gray-lightest label-red">*</span>  </div>
                                    <p class="text-smaller text-gray-lighter">
                                        Length description 
                                    </p>
                                    <div id="lengthMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
                                    <input type="text" class="form-control" id="length" name="length" placeholder="Length" autocomplete="off" value="{{ $productDetails->length }}" required/>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-xs-2 strong">Product Weight<span class="text-gray-lightest label-red">*</span> </div>
                                    <p class="text-smaller text-gray-lighter">
                                        Product Weight description 
                                    </p>
                                    <div id="weightMsg"   class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
                                    <input type="text" class="form-control" id="weight" name="weight"  placeholder="Weight" autocomplete="off" value="{{ $productDetails->weight }}" required/>
                                </div>
                            </div>
                        
                        
                            
                            
                            </div>
                            </div>
                        </div>
                    
                        {{-- </form> 
                        
                        <form id="variations_form " action="" method="post"   enctype="multipart/form-data" > --}}

                        <div class="card card-radiouse" id="addvariationsdiv" >
                            <div class="card-header" >
                                <h4 class="card-title">Variations</h4>
                            
                            </div>
                            <div class="card-content" id="collapsever" style="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            
                                        <p class="text-gray-lighter">Add available options like color or size. Buyers will choose from these during checkout.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="button" id="addVariantButton" onclick="openVariant()" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
                                                Add Variations
                                            </button>
                                            
                                        </div>
                                        
                                    </div>
                                    <div style="display: none;" id="variant-card">
                                    <h5 class="modal-title">Add variations</h5>

                                    <div class="col-md-12 mx-0 px-0" id="loadSecondVariationOptionsData"></div>

                                    <div class="row" id="render__variations__data">
                                        <div class="col-lg-12">
                                            <select class="form-control select2" name="variation_name[]" onchange="add_more_customer_choice_option()" id="variation" multiple="multiple" >
                                                <option>Choose Variation Type</option>
                                                <optgroup label="Variation Type">
                                                    @foreach($variationList as $variation)
                                                    <option value="{{$variation->variation_name}}">
                                                        {{$variation->variation_name}}
                                                    </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div  id="customer_options" style="display: none;">
                                <div class="card-body" id="customer_choices">

                                </div>
                            <div class="card-body" id="customer_choice_options">

                            </div>
                            
                            
                    </div>
                    </div>
                    </div>
                    
                    <!-- End Inventory and pricing  -->
                    </form> 
                
            <!-- Photos -->
            <div class="card card-radiouse" id="description-card" >
            <div class="card-header">
                <h4 class="card-title">Description<span class="text-gray-lightest label-red">*</span></h4>
                
            </div>
            <div class="card-content "  style="">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                                
                                <div class="col-lg-12">
                                    
                                    <div id="descMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); font-size: medium;"></div>
                                    <p class="text-smaller">
                                        Start with a brief overview that describes your item’s finest features. Shoppers will only see the first few lines of your description at first, so make it count!
                                Not sure what else to say? Shoppers also like hearing about your process, and the story behind this item.
                                    </p>
                                    {{-- <textarea class="form-control textarea" rows="10" name="description"></textarea> --}}
                                    <textarea  name="description" id="editortiny" autocomplete="off" required>{{ $productDetails->description }}</textarea>

                                </div>
                        </div>
                        </div>
                        <div class="col-lg-12 mt-5">
                        <div class="row">
                                
                                <div class="col-lg-12">
                                    <label class="mb-xs-1 strong">Whats in the box<span class="text-gray-lightest label-red">*</span></label> <br/>
                                    <div id="boxMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); font-size: medium;"></div>
                                    <p class="text-smaller">
                                        Start with a brief overview that describes your item’s finest features. Shoppers will only see the first few lines of your description at first, so make it count!
                                Not sure what else to say? Shoppers also like hearing about your process, and the story behind this item.
                                    </p>
                                    {{-- <textarea class="form-control textarea" rows="10" name="description"></textarea> --}}
                                    <textarea rows="6" style="width: 100%;"  name="whats_in_box" id="whats_in_box" placeholder="Explain whats in th box of this product" autocomplete="off" required>{{ $productDetails->whats_in_box }}</textarea>

                                </div>
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="row" >
                                <div class="col-lg-12" style="text-align: right; margin-top: 2%;">
                                    <a id="descriptionBtn"  href="javascript:void(0)" onclick="updatedesc('descriptionBtn')"   class="btn btn-primary waves-effect waves-light">Next</a>
                                    <a id="completeProduct" href="javascript:void(0)" onclick="completeListing()" style=" display:none !important;"   class="btn btn-success waves-effect waves-light">Complete</a>
                                    <a href="javascript:void(0)" onclick="cancelListing()"   class="btn btn-danger waves-effect waves-light">Cancel</a>

                                </div>
                        </div>
                        </div>
                </div>
            </div>
            </div>
            </div>
            <!--end description portion -->   

            </div>
</div>
@endif