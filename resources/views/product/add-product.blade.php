@extends('layouts.master')
@section('page-title','Add New Product')
        
<link href="{{asset('src/selectstyle.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('src/themify-icons.css')}}">
<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item active">Add New Product</li>
@endsection    
                            
@section('content')

            <div class="content-body">
                <!-- Contextual colors -->
                <section id="contextual-colors" class="card overflow-hidden">
                    <div class="card-header">
                        <h4 class="card-title">Add Product Pictures</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
								<div class="row">
									<div class="col-sm-8">
										<div class="row">
											<!-- <div class="col-sm-6 text-center" onclick="uploadImage1()">
                                            <img id="thumbnail" style="width:20%; margin-top:10px; display:none;"  src="" alt="image"/>
												<div class="col-12 primary-image">
													<i class="feather icon-camera f28" ></i>
                                                    
													<p class="use-web-link" type="file" id="file">
														<strong>Upload Primary Image</strong>
														<br />
														<small>Or <a href="javascript:void(0)">use link from web</a></small>
                                                        <input id="file-input" type="file" name="name" style="display: none;" />
                                                    </p>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="row">
													<div class="col-6 text-center pl-0 mb-1">
														<div class="col-12 thumb">
															<i class="feather icon-camera f28"></i>
															<p class="use-web-link">
																<strong>Upload Image 2</strong>
																<br />
																<small>Or <a href="javascript:void(0)">use link from web</a></small>
															</p>
														</div>
													</div>
													<div class="col-6 text-center pl-0 mb-1">
														<div class="col-12 thumb">
															<i class="feather icon-camera f28"></i>
															<p class="use-web-link">
																<strong>Upload Image 3</strong>
																<br />
																<small>Or <a href="javascript:void(0)">use link from web</a></small>
															</p>
														</div>
													</div>
													<div class="col-6 text-center pl-0">
														<div class="col-12 thumb">
															<i class="feather icon-camera f28"></i>
															<p class="use-web-link">
																<strong>Upload Image 4</strong>
																<br />
																<small>Or <a href="javascript:void(0)">use link from web</a></small>
															</p>
														</div>
													</div>
													<div class="col-6 text-center pl-0">
														<div class="col-12 thumb">
															<i class="feather icon-camera f28"></i>
															<p class="use-web-link">
																<strong>Upload Image 5</strong>
																<br />
																<small>Or <a href="javascript:void(0)">use link from web</a></small>
															</p>
														</div>
													</div>
												</div>
											</div> -->
                                            <form id="my-awesome-dropzone" class="dropzone" action="upload.php">
    <div class="dropzone-previews"></div>
    <!-- this is were the previews should be shown. -->

    <!-- Now setup your input fields -->
    <!-- <input type="text" name="Name"/>
    <input type="text" name="Description"/>

    <button type="submit">Submit data and files!</button> -->

</form>
										</div>
									</div>
									<div class="col-sm-4 images-instructions">
										<ul>
											<li>Lorem ipsum site emit dollar...</li>
											<li>Lorem ipsum site emit dollar...</li>
											<li>Lorem ipsum site emit dollar...</li>
											<li>Lorem ipsum site emit dollar...</li>
											<li>Lorem ipsum site emit dollar...</li>
											<li>Lorem ipsum site emit dollar...</li>
										</ul>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </section>

                <!--/ Contextual colors -->

                <!-- Text alignment -->
                <section id="text-alignment" class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                <div class="form-group">
                                	<label for="title">Product Title</label>
                                	<input type="text" class="form-control" required maxlength="100" placeholder="Product Title" />
                                </div>
                                <div class="row">
                                	<div class="col-sm-6">
                                		<div class="form-group">
											<label for="title">Brand</label>
											<input type="text" class="form-control" required maxlength="100" placeholder="Search brand here" />
										</div>	
                                	</div>
                                	<div class="col-sm-6">
                                		<div class="form-group">
											<label for="title">Product Code (SKU)</label>
											<input type="text" class="form-control" maxlength="100" />
										</div>
                                	</div>
                                </div>
                                <div class="form-group">
                                	<label for="title">Short Description</label>
                                	<textarea class="form-control" placeholder="Enter Product Short Description" rows="4"></textarea>
                                </div>
									
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Text alignment -->


                    <!-- Category Selection starts -->
                       <section id="text-alignment" class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                <div class="form-group">
                                    <label for="title">Select Categories</label>
                                    <input  class="form-control select_categories"  data-toggle="modal" data-target="#xlarge" type="text" class="form-control" required maxlength="100" placeholder="Product Title" />
                                </div>
                                
                                    
                            </div>
                        </div>
                    </div>
                </section>
                    <!-- Category Selection  closed -->


                   <!-- category modal  -->
            <div class="modal-size-xl mr-1 mb-1 d-inline-block">
                  <!-- Button trigger modal -->
                

                  <!-- Modal -->
                  <div class="modal fade text-left" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel16">Select Categoires</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body" style="height: 300px;">
                         <div class="row">
                            <!-- First section -->
                            <div class="col-md-3">
                             <div id="state">
                                    <i class="ti-angle-down"></i>
                                    <select name="state" onchange="getCategory(this)">
                                         <option value="1">Electronics</option>
                                         <option value="1">Fashion</option>
                                    </select>
                              </div>
   
                            </div>
                            <!-- second section -->
                            <div class="col-md-3">
                                <div >
                                    <div class="select select_2"  style="display: none;">
                                        <i class="ti-angle-down"></i>
                                        <select onchange="getCategory2(this)" class="select_2" name="select" id="select">
                                            <option value="" selected>Choose option</option>
                                            <option value="2">Sub 1</option>
                                            <option value="2">Sub 2</option>
                                            <option value="2">Sub 3</option>
                                              <option value="2">Sub 4</option>
                                            <option value="2">Sub 5</option>
                                            <option value="2">Sub 6</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- third section -->
                            <div class="col-md-3">
                               <div >
                                     <div class="select select_3" style="display: none;">
                                            <i class="ti-angle-down"></i>
                                            <select onchange="getCategory3(this)" class="select_3" name="select" id="select">
                                                <option value="" selected>Choose option</option>
                                                <option value="3">Sub 1</option>
                                                <option value="3">Sub 2</option>
                                                <option value="3">Sub 3</option>
                                                  <option value="3">Sub 4</option>
                                                <option value="3">OSub 5</option>
                                                <option value="3">Sub 6</option>
                                                </select>
                                        </div>
                                </div>
                            </div>
                            <!-- fourth section -->
                            <div class="col-md-3">
                                <div >
                                     <div class="select select_4" style="display: none;">
                                            <i class="ti-angle-down"></i>
                                            <select onchange="getCategory4(this)" name="select" id="select">
                                                <option value="" selected>Choose option</option>
                                                <option value="4">Sub 1</option>
                                                <option value="4">Sub 2</option>
                                                  <option value="4">Sub 3</option>
                                            <option value="4">OSub 4</option>
                                            <option value="4">Sub 5</option>
                                                <option value="4">Sub 6</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                         </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Accept</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                 <!-- Category model closed -->





                 <section id="text-transform" class="card overflow-hidden">
                    <div class="card-header">
                        <h4 class="card-title">Product Attribution</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>SPF Rating</span>
                                              </div>
                                                                  <div class="col-md-8">
                                                                     <div class="select select_3">
                                                                            <i class="ti-angle-down"></i>
                                                                            <select onchange="getCategory3(this)" class="select_3" name="select" id="select">
                                                                                <option value="" selected>Choose option</option>
                                                                                <option value="3">Sub 1</option>
                                                                                <option value="3">Sub 2</option>
                                                                                <option value="3">Sub 3</option>
                                                                                  <option value="3">Sub 4</option>
                                                                                <option value="3">OSub 5</option>
                                                                                <option value="3">Sub 6</option>
                                                                                </select>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                    <span>Make up finish</span>
                                                                  </div>
                                                                    <div class="col-md-8">
                                                                     <div class="select select_3" >
                                                                            <i class="ti-angle-down"></i>
                                                                            <select onchange="getCategory3(this)" class="select_3" name="select" id="select">
                                                                                <option value="" selected>Choose option</option>
                                                                                <option value="3">Sub 1</option>
                                                                                <option value="3">Sub 2</option>
                                                                                <option value="3">Sub 3</option>
                                                                                  <option value="3">Sub 4</option>
                                                                                <option value="3">OSub 5</option>
                                                                                <option value="3">Sub 6</option>
                                                                                </select>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group row">
                                                                            <div class="col-md-4">
                                                                            <span>Watter proof</span>
                                                                          </div>
                                                                            <div class="col-md-8">
                                                                     <div class="select select_3">
                                                                            <i class="ti-angle-down"></i>
                                                                            <select onchange="getCategory3(this)" class="select_3" name="select" id="select">
                                                                                <option value="" selected>Choose option</option>
                                                                                <option value="3">Sub 1</option>
                                                                                <option value="3">Sub 2</option>
                                                                                <option value="3">Sub 3</option>
                                                                                  <option value="3">Sub 4</option>
                                                                                <option value="3">OSub 5</option>
                                                                                <option value="3">Sub 6</option>
                                                                                </select>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <span>Warranty type</span>
                                                                      </div>
                                                                     <div class="col-md-8">
                                                                     <div class="select select_3">
                                                                            <i class="ti-angle-down"></i>
                                                                            <select onchange="getCategory3(this)" class="select_3" name="select" id="select">
                                                                                <option value="" selected>Choose option</option>
                                                                                <option value="3">Sub 1</option>
                                                                                <option value="3">Sub 2</option>
                                                                                <option value="3">Sub 3</option>
                                                                                  <option value="3">Sub 4</option>
                                                                                <option value="3">OSub 5</option>
                                                                                <option value="3">Sub 6</option>
                                                                                </select>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <span>Warranty Period Months</span>
                                                                      </div>
                                                                     <div class="col-md-8">
                                                                     <div class="select select_3">
                                                                            <i class="ti-angle-down"></i>
                                                                            <select onchange="getCategory3(this)" class="select_3" name="select" id="select">
                                                                                <option value="" selected>Choose option</option>
                                                                                <option value="3">Sub 1</option>
                                                                                <option value="3">Sub 2</option>
                                                                                <option value="3">Sub 3</option>
                                                                                  <option value="3">Sub 4</option>
                                                                                <option value="3">OSub 5</option>
                                                                                <option value="3">Sub 6</option>
                                                                                </select>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                          
                                                </form>
                                            </div>
                        
                                  </div>
                </section>



                <section id="text-transform" class="card overflow-hidden">
                    <div class="card-header">
                        <div class="col-md-8">
                        <h4 class="card-title">Product Variants (Options)</h4>
                        <p >
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.


                        </p>
                        </div>

                        <div class="col-md-4">
                             <div class="select select_3">
                                    <i class="ti-angle-down"></i>
                                    <select onchange="getCategory3(this)" class="select_3" name="select" id="select">
                                        <option value="" selected>Choose option</option>
                                        <option value="3">Sub 1</option>
                                        <option value="3">Sub 2</option>
                                        <option value="3">Sub 3</option>
                                          <option value="3">Sub 4</option>
                                        <option value="3">OSub 5</option>
                                        <option value="3">Sub 6</option>
                                        </select>
                                  </div>
                        </div>
                    </div>
                    <div class="devider"></div>
                    <div class="card-content">
                        <div class="card-body">
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                           
                                                            <div class="col-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-3">
                                                                 
                                                                        <div class="form-group">
                                                                            <label for="first-name-vertical">Primary Color</label>
                                                                            <input type="text" id="first-name-vertical" class="form-control" name="fname" placeholder="First Name">
                                                                        </div>
                                   
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                 
                                                                        <div class="form-group">
                                                                            <label for="first-name-vertical">Color Name</label>
                                                                            <input type="text" id="first-name-vertical" class="form-control" name="fname" placeholder="First Name">
                                                                        </div>
                                   
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                 
                                                                        <div class="form-group">
                                                                            <label for="first-name-vertical">Secondary Color</label>
                                                                            <input type="text" id="first-name-vertical" class="form-control" name="fname" placeholder="First Name">
                                                                        </div>
                                   
                                                                  </div>
                                                                  <div class="col-md-3">
                                                                 
                                                                        <div class="form-group">
                                                                            <label for="first-name-vertical">Secondary Color Name</label>
                                                                            <input type="text" id="first-name-vertical" class="form-control" name="fname" placeholder="First Name">
                                                                        </div>
                                   
                                                                    </div>
                                                                   
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-3 text-center">
                                                                        <div class="col-12 primary-image">
                                                                            <i class="feather icon-camera f28"></i>
                                                                            <p class="use-web-link">
                                                                                <strong>Upload Image 1</strong>
                                                                                <br />
                                                                                <small>Or <a href="javascript:void(0)">use link from web</a></small>
                                                                            </p>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-3 text-center">
                                                                        <div class="col-12 primary-image">
                                                                            <i class="feather icon-camera f28"></i>
                                                                            <p class="use-web-link">
                                                                                <strong>Upload Image 2</strong>
                                                                                <br />
                                                                                <small>Or <a href="javascript:void(0)">use link from web</a></small>
                                                                            </p>
                                                                            </div>

                                                                        </div>

                                                                        <div class="col-sm-3 text-center">
                                                                        <div class="col-12 primary-image">
                                                                            <i class="feather icon-camera f28"></i>
                                                                            <p class="use-web-link">
                                                                                <strong>Upload Image 3</strong>
                                                                                <br />
                                                                                <small>Or <a href="javascript:void(0)">use link from web</a></small>
                                                                            </p>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-3 text-center">
                                                                        <div class="col-12 primary-image">
                                                                            <i class="feather icon-camera f28"></i>
                                                                            <p class="use-web-link">
                                                                                <strong>Upload  Image 4</strong>
                                                                                <br />
                                                                                <small>Or <a href="javascript:void(0)">use link from web</a></small>
                                                                            </p>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                           
                                                    </div>
                                                            
                                          <button style="float: right;" type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                </form>
                                            </div>
                        
                                  </div>
                </section>






            </div>

    <script src="{{asset('src/jquery-1.12.4.min.js')}}"></script>
	<script src="{{asset('src/selectstyle.js')}}"></script>

    
	<script>
		$(function(){
			$('.select').jselect_search({
				fillable : true, // allow custom item on the dropdown upon search input trigger
				searchable : true // set to searchable items
			});

			$('#state').attr('data-pagination',1);

			$('#state').jselect_search({
			fillable : true, // allow custom item on the dropdown upon search input trigger
			searchable : true, // set to searchable items
			on_top_edge : function(){
				if( parseInt( $('#state').attr('data-pagination') ) > 1 ){
					$('#state').attr('data-pagination',parseInt( $('#state').attr('data-pagination') )-1);
				}
			},
				on_bottom_edge : function(){
					if( parseInt( $('#state').attr('data-pagination') ) >= 1 ){
					$('#state').attr('data-pagination',parseInt( $('#state').attr('data-pagination') )+1);
					}
				}
			});
		});

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-36251023-1']);
		_gaq.push(['_setDomainName', 'jqueryscript.net']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		var category = ['>>',];
		function getCategory(id){
			console.log(id.value);
			localStorage.setItem("main", id.value);
			$('.select_2').show();


			category.push(id.value);
			$('.select_categories').val(category);

		}
		function getCategory2(id){
			console.log(id.value);
			localStorage.setItem("sub-1", id.value);
			$('.select_3').show();

			category.push(id.value);
			$('.select_categories').val(category);

		}
		function getCategory3(id){
			console.log(id.value);
			localStorage.setItem("sub-2", id.value);
			$('.select_4').show();
			category.push(id.value);
			$('.select_categories').val(category);
		}
		function getCategory4(id){
			console.log(id.value);
			localStorage.setItem("sub-3", id.value);
			category.push(id.value);
			$('.select_categories').val(category);
		}


    //     function uploadImage1(){
    //         $('#file-input').trigger('click');
        
    // }
function uploadImage1(contentType, multiple) {
    // debugger
  var input = document.createElement("input");
  input.type = "file";
  input.multiple = multiple;
  input.accept = contentType;
  return new Promise(function(resolve) {
    document.activeElement.onfocus = function() {
      document.activeElement.onfocus = null;
      setTimeout(resolve, 100);
    };
    input.onchange = function() {
      var files = Array.from(input.files);
      if (multiple)
        return resolve(files);
      resolve(files[0]);
    };
    input.click();
  });
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
            $('#thumbnail').show();
            reader.readAsDataURL(file);
        }    
    }
    $(function () {
  Dropzone.options.myAwesomeDropzone = {
    previewsContainer: '.dropzone-previews',
    autoProcessQueue: false,
    uploadMultiple: false,
    parallelUploads: 100,
    maxFiles: 100,
    init: function () {
      var myDropzone = this;

      this.element.querySelector("button[type=submit]").addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        myDropzone.processQueue();
      });
    },
    sending: function(file, xhr, formData) {
      alert('sending');
    },
    sendingmultiple: function (file, xhr, formData) {
      alert("successfully");
    },
    successmultiple: function (file, xhr, formData) {
      alert("successfully");

    },
    error: function (a, errorMessage, xhr) {
      alert("Error");
    }
  };
});

	</script>

   

@endsection

