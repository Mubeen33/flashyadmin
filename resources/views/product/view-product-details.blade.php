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
    <link href="{{ asset('css/addproduct.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/product_category.css')}}">
	<script src="https://cdn.tiny.cloud/1/engqutrfxcqjgr0hu2tcnoxmuj8hanintsrrda7vuc8sbtup/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/toastr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.css')}}">
	


<style>
	
	span.select2.select2-container.select2-container--default {

    min-width: 100% !important;         

    }
	.card {
    min-height: 100px !important;
     }
</style>
	
	<div class="content-body">

      @livewire('product.view-product-details') 

    </div>
</div>

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
  <script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/add-new-products-1.js') }}"></script>
  <script src="{{ asset('app-assets/js/scripts/extensions/toastr.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>    
  

<script type="text/javascript">
	 var urlCheck = new URL(window.location.href);
	 var product_id=''; 
</script>
  <script type="text/javascript">

  $("#render__data").hide();
  $("#render__variations__data22").hide();

	
	// Disable Variant Button
	$("#addVariantButton").prop('disabled', true);
	$("#addVariantButton").attr('title', 'Please Select a Category First');

    $("#render__data").on('click', "ul li", function(){
        let categoryID = $(this).attr('getCategoryId');
        let getTitle = $(this).attr('gettitle');
        
        $("#category_id").val(categoryID);
        $("#category_search").val(getTitle);
        $("#render__data .auto-complete-wrapper").html('');
    
		//getCustomFields(categoryID);
       //getWarranty(categoryID);
		$("#addVariantButton").prop('disabled', false);
		let category_id = $("#category_id").val();
		
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
                   
                },
            });
        
        }else{
            return false;
        }
    }

    


var i = 0;
      function add_more_customer_choice_option(){

        $('#customer_options').css('display','');
        $('#customer_choices').html(null);

        $("select#variation :selected").each(function() {

          vari = $(this).val();

            $('#customer_choices').append('<div class="row mb-3"><div class="col-8 col-md-3 order-1 order-md-0"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice_no_'+i+'" value="'+vari+'" readonly=""></div><div class="col-12 col-md-7 col-xl-8 order-3 order-md-0 mt-2 mt-md-0"><input type="text" class="form-control tagsInput" data-role="tagsinput" name="choice_options_'+i+'[]" placeholder="Enter choice values"></div><div class="col-4 col-xl-1 col-md-2 order-2 order-md-0 text-right"><button type="button" onclick="delete_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button></div></div>');
             i++;
            $('.tagsInput').tagsInput('items');
			update_sku('remove');
        });    
      }
      function update_sku(check=null){
		  if(check=='remove'){
			$('#customer_choice_options').html('');
		  }else{
            $.ajax({
           type:"POST",
           url:'{{ route('admin.products.sku_combination') }}',
           data:$('#choice_form').serialize(),
           success: function(data){
          
             $('#customer_choice_options').html(data);
             
           }
         });
		  }
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

   

<script>
    function breadcrums(type,catname){
	
		nextShow('breadcurmsdiv');
		if (document.getElementById('brad_'+type)) {
			    
					$('#brad_'+type+'').nextAll('.bredcrumnext').remove();
					$('#brad_'+type+'').remove();
					$('<li class="breadcrumb-item bredcrumnext" id="brad_'+type+'" ><a href="javascript:void(0)">'+catname+'</a></li>').appendTo(".nextbrad");

       } else {
	          
				$('#brad_'+type+'').nextAll('.bredcrumnext').remove();
				$('<li class="breadcrumb-item bredcrumnext" id="brad_'+type+'" ><a href="javascript:void(0)">'+catname+'</a></li>').appendTo(".nextbrad");
			}    
	}
    var cat_count =0; 
   function category(catid,ulID,type,catulID,catname){
	breadcrums(type,catname);
	var titleVal =$("input[name=title]").val();
	//var brandVal =$("#brandoption").val();
    $(".b-red").removeClass("b-red");
	$('.emptymsgs').text('');  
    if(titleVal!=null && titleVal!=''){
    $("#addVariantButton").prop('disabled', true);
	$('#categoryBtn').css('display', 'none');
	$( 'ul#'+catulID+' li' ).on( 'click', function(event) {
		       
                $( this ).parent().find( 'li.catulActive' ).removeClass( 'catulActive' );               
				$( this ).addClass( 'catulActive' );
				
			
          });
    var typesuper=0;
    cat_count++;
	
    $('#'+type+'').nextAll('.alldiv').remove();
    $.ajax({
            
            url: "{{route('admin.ajaxCategoryFind')}}",
            methods: "POST",           
			data:{id: catid,type: type,typesuper: typesuper,cat_count:cat_count},
		    success: function(data){
				
               if(data.catID!=null){
				
				   if(data.veriant!=null){
                    $("#addVariantButton").prop('disabled', false);
				   }
				
				$('#categoryBtn').css('display', 'initial');
				$(data.catID).appendTo("#categoryDivs");
				$('#nextslider').click();
				 getCustomFields(catid);
				//  $('#brad_'+type+'').remove();
               }
               else{
				  $(data).appendTo("#categoryDivs");
                 $('#resource-slider .resource-slider-item').each(function(i) {
                 var $this = $(this),
                 left = $this.width() * i;
                 $this.css({
                  left: left
                  })
				 }); 
				 // end each

				 $('#nextslider').click();

				 //call custom fields and append theme 
				 getCustomFields(catid);

               }
                
            }
        });
        if(typesuper==0){
        typesuper=1;
    }

}else{
	if(titleVal==null || titleVal==''){
	$('#titleMsg').text('The title field is required!');
	toastr.error('', 'The title field is required!');
	bordercolor('title');
	}
	// if(brandVal==null || brandVal==''){
	// $('#brandMsg').text('The brand field is required');
	// toastr.error('', 'The brand field is required');
    //  bordercolor('brand');
	// }
	

}
}

    function defer(method) {
      if (window.jQuery)
        method();
      else
        setTimeout(function() {
          defer(method)
        }, 50);
    }
defer(function() {
      (function($) {
        
        function doneResizing() {
          var totalScroll = $('.resource-slider-frame').scrollLeft();
          var itemWidth = $('.resource-slider-item').width();
          var difference = totalScroll % itemWidth;
          if ( difference !== 0 ) {
            $('.resource-slider-frame').animate({
              scrollLeft: '-=' + difference
            }, 500, function() {
              // check arrows
              checkArrows();
            });
          }
        }
        
 function checkArrows() {
          var totalWidth = $('#resource-slider .resource-slider-item').length * $('.resource-slider-item').width();
          var frameWidth = $('.resource-slider-frame').width();
          var itemWidth = $('.resource-slider-item').width();
          var totalScroll = $('.resource-slider-frame').scrollLeft();
          
          if ( ((totalWidth - frameWidth) - totalScroll) < itemWidth ) {
            $(".next").css("visibility", "visible");
          }
          else {
            $(".next").css("visibility", "visible");
          }
          if ( totalScroll < itemWidth ) {
            $(".prev").css("visibility", "visible");
          }
          else {
            $(".prev").css("visibility", "visible");
          }
    }
        
    $('.arrow').on('click', function() {
          var $this = $(this),
            width = $('.resource-slider-item').width(),
            speed = 500;
          if ($this.hasClass('prev')) {
            $('.resource-slider-frame').animate({
              scrollLeft: '-=' + width
            }, speed, function() {
              // check arrows
              checkArrows();
            });
          } else if ($this.hasClass('next')) {
            $('.resource-slider-frame').animate({
              scrollLeft: '+=' + width
            }, speed, function() {
              // check arrows
              checkArrows();
            });
          }
        }); // end on arrow click
        
        $(window).on("load resize", function() {
          checkArrows();
          $('#resource-slider .resource-slider-item').each(function(i) {
            var $this = $(this),
              left = $this.width() * i;
            $this.css({
              left: left
            })
          }); // end each
        }); // end window resize/load
        
        var resizeId;
        $(window).resize(function() {
            clearTimeout(resizeId);
            resizeId = setTimeout(doneResizing, 500);
        });
        
      })(jQuery); // end function
});
   
	</script>

	<script>
$( "#titlFrm" ).on( "submit", function(e) {
	 
	var titleVal =$("input[name=title]").val();
	// var brandVal =$("#brandoption").val();
    $(".b-red").removeClass("b-red");
	$('.emptymsgs').text('');  

    if(titleVal!=null && titleVal!=''){
		btnDisabled('titleBtn',true);
	
         var dataString = $(this).serialize();
	
	

			// if (urlCheck.searchParams.get('productID')) {
			// 	product_id=urlCheck.searchParams.get('productID'); // getUrlParameter('productID'); //$("#currentProductID").val();
			// }
			var urlParams = new URLSearchParams(window.location.search);
			if (urlParams.get('productID')) {
				product_id=urlParams.get('productID') // getUrlParameter('productID'); //$("#currentProductID").val();
			}
			 $('.emptymsgs').text('');  
		$.ajax({
			            
						type: "POST",
						url: "{{url('vendor/add-product')}}",
						data: dataString+"&action=titleForm&productId="+product_id,
						dataType: 'json',
						success: function (json) {
						 
							
							
							if(json.msg=='Product Created Successfully'  &&  json.product_id!=''){
							//	$("#currentProductID").val(json.product_id);
								setProductID(json.product_id);
								
								toastr.success('', 'Product step 1 completed!');
								$('#titleBtn').text('Update');
								 nextShow('category-div');
								 $('.emptymsgs').text('');
								 $('#titleCollap').click();
								
							}
							if(json.msg=='Product Updated Successfully'  &&  json.product_id!=''){
								//$("#currentProductID").val(json.product_id);
								setProductID(json.product_id);
								toastr.success('', 'Product step 1 updated!');
								$('#titleBtn').text('Update');
								 nextShow('imageDiv');
								 $('.emptymsgs').text('');
								 $('#titleCollap').click();
								
							}
							 if(json.msg=='Product Not Updated'){
								if(json.titleError!=''){
									$('#titleMsg').text(json.titleError);
									 toastr.error('', json.titleError);
								}
								if(json.brandError!=''){
									$('#brandMsg').text(json.brandError);
									toastr.error('', json.brandError);
								}
								
								
							}
							
							btnDisabled('titleBtn',false);
				}
			}
			);
				}else{
			if(titleVal==null || titleVal==''){
	$('#titleMsg').text('The title field is required!');
	toastr.error('', 'The title field is required!');
	bordercolor('title');
	}
	// if(brandVal==null || brandVal==''){
	// $('#brandMsg').text('The brand field is required');
	// toastr.error('', 'The brand field is required');
    //  bordercolor('brand');
	// }
		}

       e.preventDefault();
});

$( "#categoryFrm" ).on( "submit", function(e) {
	
		  var dataString = new FormData(this);
		//   var dataString = $(this).serialize();
	
		
		var urlParams = new URLSearchParams(window.location.search);
			if (urlParams.get('productID')) {
				product_id=urlParams.get('productID') // getUrlParameter('productID'); //$("#currentProductID").val();
			    }
			if(product_id!=null && product_id!=''){
			  dataString.append('action','categoryForm');
			  dataString.append('productId',product_id);
			  $('.emptymsgs').text('');  
			  var catIDCheck=$("input[name='cate_id[]']").val();
		      if(catIDCheck!=null && catIDCheck!='' && catIDCheck!='undefine'){
				btnDisabled('categoryBtn',true);
		      $.ajax({       
						 
						 type: "POST",
						 url: "{{url('vendor/add-product')}}",
						 data: dataString,
						 dataType: 'json',
						 contentType: false,
						 cache: false,
						 processData:false,
						 success: function (json) {
							cattxt=$('#categoryBtn').text();
							setProductID(json.product_id);
							if(cattxt=='Update'){

								toastr.success('', 'Product step 2 Updated!');
							}else{
								toastr.success('', 'Product step 2 Completed!');
								
							}
							
							    $('#catCollap').click();
							    $('#categoryBtn').text('Update');
								 nextShow('imageDiv');
								 $('.emptymsgs').text('');
								 btnDisabled('categoryBtn',false); 
							
							
				         }
			 }
			 );
			}else{
				
				$('#catMsg').text('Category Required!');
				toastr.error('', 'Category Required!');
			}
				 
		}else{
			toastr.error('', 'Listing Expired!');
		}
		e.preventDefault();
 });
	</script>
	<script>
	
function updatedesc(btnID){
	var ed = tinyMCE.get('editortiny');

			var description = ed.getContent();
			var whatsbox = $('#whats_in_box').val();
		    
			
			var urlParams = new URLSearchParams(window.location.search);
			if (urlParams.get('productID')) {
				product_id=urlParams.get('productID') // getUrlParameter('productID'); //$("#currentProductID").val();
			}
				$('.emptymsgs').text('');
            if (description!=null && description!='' && whatsbox!='' && whatsbox!=null) {
				btnDisabled('descriptionBtn',true); 
                $.ajax({
                    url: "{{url('vendor/add-product')}}",
                    type: "POST",
                    data: { description: description,whatsbox: whatsbox, productId: product_id, action: 'descriptionfrm' },
                    dataType: "json",
                    success: function(json) {
						
						if(json.msg=='Product Description Updated Successfully' &&  json.product_id!=''){
							//$("#currentProductID").val(json.product_id);
							setProductID(json.product_id);
							if($('#'+btnID).text()=='Next'){
								toastr.success('', 'Product step 6 completed!');
								$('#desCollap').click();
							
							}else{
								toastr.success('', 'Product step 6 updated successfully!');
								$('#desCollap').click();
							}
							
							$('#'+btnID).text('Update');
						     $('.emptymsgs').text('');
							   completeListing();
						}if(json.msg=='Product Description And Whats In The Box Not Updated'){
							
							toastr.error('', 'Description And Whats In The Box not updated!');
						}
						if(json.product_id==''){
										toastr.error('', 'Listing expire please refresh page and start new listing!');
									}
									btnDisabled('descriptionBtn',false); 
                    }
                });
			}
			else{
				if(whatsbox==null || whatsbox==''){
					$('#boxMsg').text('Whats in the box Required!');
				    toastr.error('', 'Whats in the box  Required!');
				}
				if(description==null || description==''){
					$('#descMsg').text('Description Required!');
				    toastr.error('', 'Description Required!');
				}
				
			}
	
}
	</script>
<script>
	$(document).ready(function(e){
    // Submit form data via Ajax
    $("#choice_form").on('submit', function(e){
		
			e.preventDefault();
			
			var formData = new FormData(this);
			btnDisabled('inventoryBtn',true); 
		
			var urlParams = new URLSearchParams(window.location.search);
			if (urlParams.get('productID')) {
				product_id=urlParams.get('productID') // getUrlParameter('productID'); //$("#currentProductID").val();
			}
			formData.append('action','choice_form');
			formData.append('productId',product_id);
			$('.emptymsgs').text('');  
            $.ajax({
            type: 'POST',
			url: "{{url('vendor/add-product')}}",
			data: formData,
			dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
             
            },
            success: function (json) {

				             if(json.msg=='Product Inventory Updated Successfully' &&  json.product_id!=''){
								 //$("#currentProductID").val(json.product_id);
								 setProductID(json.product_id);
								 if($('#inventoryBtn').text()=='Next'){
									toastr.success('', 'Product step 4 completed!');
								
								  }else{
								  toastr.success('', 'Product step 4 updated!');
								
								 }
								 $('#inventoryBtn').text('Update');
									
									
									
									$('#verCollap').click();
									 nextShow('description-card');

                                   





									
								 }
								 if(json.msg=='Product Inventory Not Updated'){
									 toastr.error('', 'Product inventory not updated');
								 }
								  if(json.width !='' && json.width!=null &&  json.product_id!=''){
								 
									 $('#widthMsg').text(json.width);
									 toastr.error('', json.width);
								 }
								 if(json.weight !='' && json.weight!=null &&  json.product_id!=''){
								 
									 $('#weightMsg').text(json.weight);
									 toastr.error('', json.weight);
								 }
								 if(json.hieght !='' && json.hieght!=null &&  json.product_id!=''){
									 $('#heigtMsg').text(json.hieght);
									 toastr.error('', json.hieght);
								 }
								 if(json.length !='' && json.length!=null &&  json.product_id!=''){
									 $('#lengthMsg').text(json.length);
									 toastr.error('', json.length);
								 }
								 if(json.product_id==''){
									 toastr.error('', 'Listing expire please refresh page and start new listing!');
								 }
							 
								 btnDisabled('inventoryBtn',false); 
								 }   
        });
    });
});	
</script>

<script>

	function cancelListing(){
		var urlParams = new URLSearchParams(window.location.search);
			if (urlParams.get('productID')) {
				product_id=urlParams.get('productID') // getUrlParameter('productID'); //$("#currentProductID").val();
			}
		 if(product_id!=null && product_id!=''){
			Swal.fire({
			title: 'Are you sure to cancel this listing?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText:'Continue Listing!',
			confirmButtonColor: '#4839EB',
			cancelButtonColor: '#28C76F',
			confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			if (result.isConfirmed) {
			
				$.ajax({
                    url: "{{url('products/add-product')}}",
                    type: "POST",
                    data: { productId: product_id , action: 'exitListing' },
                    dataType: "json",
                    success: function(json) {
					  if(json.msg=='Product deleted'){
						  window.location.href = "{{route('home')}}";
					   }else{
						
							window.location.href = "{{route('home')}}";
					   }
						
                    }
                });
			
			}
			})
		}else{
	         window.location.href = "{{route('home')}}";
		}
	}

</script>
<script>
	function completeListing(){
    // completion product listing
      $('#completeProduct').css('display','');
     Swal.fire({
        title: 'Do you want to send it for approval?',
        text: "After click on it listing will be submitted for review!",
        icon: 'success',
        showCancelButton: true,
        cancelButtonText:'Continue Listing!',
        confirmButtonColor: '#4839EB',
        cancelButtonColor: '#28C76F',
        confirmButtonText: 'Yes, do it!'
        }).then((result) => {
        if (result.isConfirmed) {
           
            window.location.href = "{{route('home')}}";
        }
        })

       //end code
}
</script>
{{-- <script>
	 window.onbeforeunload = function(event)
    {
        return confirm("Confirm refresh");
    };          
</script> --}}





@endpush
    
@endsection