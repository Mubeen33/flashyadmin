@include('layouts/header')
<link href="{{asset('src/selectstyle.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Add New Product</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ url('/add-product') }}">Add New Product</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
											<div class="col-sm-6 text-center">
												<div class="col-12 primary-image">
													<i class="feather icon-camera f28"></i>
													<p class="use-web-link">
														<strong>Upload Primary Image</strong>
														<br />
														<small>Or <a href="javascript:void(0)">use link from web</a></small>
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
											</div>
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
        </div>
    </div>
    <!-- END: Content-->


@include('layouts/footer')

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
    </script>
    <script type="text/javascript">

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


</script>



