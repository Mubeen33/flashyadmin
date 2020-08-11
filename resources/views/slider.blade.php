@extends('layouts.master')
@section('page-title','Add Slider')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Slider</li>
@endsection    
                            
@section('content')

            <div class="content-body"> 
            @if(session()->has('message'))
  
            <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                <!-- account setting page start -->
                <section id="page-account-settings" >
                    <div class="row">
                 
                                    
                            <div class="col-lg-5 col-md-12 card" style="padding:20px;">
                                <div class="box box-primary">
                                    <!-- /.box-header -->
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Add Slider Item</h3>
                                    </div><!-- /.box-header -->

                                    <!-- form start -->
                                    <form action="/admin/create-slider" enctype="multipart/form-data" method="post" id="slider_form" accept-charset="utf-8">
                                        @csrf         
                                        <input name="slider_id" type="hidden" id="slider_id"></input>                                                       

                                    <div class="box-body">
                                        <!-- include message block -->
                                        
                            <!--print error messages-->

                            <!--print custom error message-->

                            <!--print custom success message-->
                                        <div class="form-group">
                                            <label>Language</label>
                                            <select name="lang_id" class="form-control">
                                                                            <option value="English" selected="">English</option>
                                                                            <!-- <option value="2">Deutsch</option> -->
                                                                    </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control title" name="title" placeholder="Title" value="">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="description" class="form-control description" placeholder="Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Link</label>
                                            <input type="text" class="form-control link" name="link" placeholder="Link" value="">
                                        </div>

                                        <div class="row row-form">
                                            <div class="col-sm-12 col-md-6 col-form">
                                                <div class="form-group">
                                                    <label class="control-label">Order</label>
                                                    <input type="number" class="form-control item_order" name="item_order" placeholder="Order" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-form">
                                                <div class="form-group">
                                                    <label class="control-label">Button Text</label>
                                                    <input type="text" class="form-control button_text" name="button_text" placeholder="Button Text" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row row-form">
                                            <div class="col-sm-12 col-md-4 col-form">
                                                <div class="form-group">
                                                    <label class="control-label">Text Color</label>
                                                    <input type="color" class="form-control text_color" name="text_color" value="#ffffff">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-form">
                                                <div class="form-group">
                                                    <label class="control-label">Button Color</label>
                                                    <input type="color" class="form-control button_color" name="button_color" value="#222222">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-form">
                                                <div class="form-group">
                                                    <label class="control-label">Button Text Color</label>
                                                    <input type="color" class="form-control button_text_color" name="button_text_color" value="#ffffff">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row row-form">
                                            <div class="col-sm-12" style="padding-left: 7.5px;">
                                                <label>Animations</label>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-form">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <select name="animation_title" class="form-control animation_title">
                                                                                            <option value="none">none</option>
                                                                                            <option value="bounce">bounce</option>
                                                                                            <option value="flash">flash</option>
                                                                                            <option value="pulse">pulse</option>
                                                                                            <option value="rubberBand">rubberBand</option>
                                                                                            <option value="shake">shake</option>
                                                                                            <option value="swing">swing</option>
                                                                                            <option value="tada">tada</option>
                                                                                            <option value="wobble">wobble</option>
                                                                                            <option value="jello">jello</option>
                                                                                            <option value="heartBeat">heartBeat</option>
                                                                                            <option value="bounceIn">bounceIn</option>
                                                                                            <option value="bounceInDown">bounceInDown</option>
                                                                                            <option value="bounceInLeft">bounceInLeft</option>
                                                                                            <option value="bounceInRight">bounceInRight</option>
                                                                                            <option value="bounceInUp">bounceInUp</option>
                                                                                            <option value="fadeIn">fadeIn</option>
                                                                                            <option value="fadeInDown">fadeInDown</option>
                                                                                            <option value="fadeInDownBig">fadeInDownBig</option>
                                                                                            <option value="fadeInLeft">fadeInLeft</option>
                                                                                            <option value="fadeInLeftBig">fadeInLeftBig</option>
                                                                                            <option value="fadeInRight">fadeInRight</option>
                                                                                            <option value="fadeInRightBig">fadeInRightBig</option>
                                                                                            <option value="fadeInUp" selected="">fadeInUp</option>
                                                                                            <option value="fadeInUpBig">fadeInUpBig</option>
                                                                                            <option value="flip">flip</option>
                                                                                            <option value="flipInX">flipInX</option>
                                                                                            <option value="flipInY">flipInY</option>
                                                                                            <option value="lightSpeedIn">lightSpeedIn</option>
                                                                                            <option value="rotateIn">rotateIn</option>
                                                                                            <option value="rotateInDownLeft">rotateInDownLeft</option>
                                                                                            <option value="rotateInDownRight">rotateInDownRight</option>
                                                                                            <option value="rotateInUpLeft">rotateInUpLeft</option>
                                                                                            <option value="rotateInUpRight">rotateInUpRight</option>
                                                                                            <option value="slideInUp">slideInUp</option>
                                                                                            <option value="slideInDown">slideInDown</option>
                                                                                            <option value="slideInLeft">slideInLeft</option>
                                                                                            <option value="slideInRight">slideInRight</option>
                                                                                            <option value="zoomIn">zoomIn</option>
                                                                                            <option value="zoomInDown">zoomInDown</option>
                                                                                            <option value="zoomInLeft">zoomInLeft</option>
                                                                                            <option value="zoomInRight">zoomInRight</option>
                                                                                            <option value="zoomInUp">zoomInUp</option>
                                                                                            <option value="hinge">hinge</option>
                                                                                            <option value="jackInTheBox">jackInTheBox</option>
                                                                                            <option value="rollIn">rollIn</option>
                                                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-form">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <select name="animation_description" class="form-control animation_description">
                                                                                            <option value="none">none</option>
                                                                                            <option value="bounce">bounce</option>
                                                                                            <option value="flash">flash</option>
                                                                                            <option value="pulse">pulse</option>
                                                                                            <option value="rubberBand">rubberBand</option>
                                                                                            <option value="shake">shake</option>
                                                                                            <option value="swing">swing</option>
                                                                                            <option value="tada">tada</option>
                                                                                            <option value="wobble">wobble</option>
                                                                                            <option value="jello">jello</option>
                                                                                            <option value="heartBeat">heartBeat</option>
                                                                                            <option value="bounceIn">bounceIn</option>
                                                                                            <option value="bounceInDown">bounceInDown</option>
                                                                                            <option value="bounceInLeft">bounceInLeft</option>
                                                                                            <option value="bounceInRight">bounceInRight</option>
                                                                                            <option value="bounceInUp">bounceInUp</option>
                                                                                            <option value="fadeIn">fadeIn</option>
                                                                                            <option value="fadeInDown">fadeInDown</option>
                                                                                            <option value="fadeInDownBig">fadeInDownBig</option>
                                                                                            <option value="fadeInLeft">fadeInLeft</option>
                                                                                            <option value="fadeInLeftBig">fadeInLeftBig</option>
                                                                                            <option value="fadeInRight">fadeInRight</option>
                                                                                            <option value="fadeInRightBig">fadeInRightBig</option>
                                                                                            <option value="fadeInUp" selected="">fadeInUp</option>
                                                                                            <option value="fadeInUpBig">fadeInUpBig</option>
                                                                                            <option value="flip">flip</option>
                                                                                            <option value="flipInX">flipInX</option>
                                                                                            <option value="flipInY">flipInY</option>
                                                                                            <option value="lightSpeedIn">lightSpeedIn</option>
                                                                                            <option value="rotateIn">rotateIn</option>
                                                                                            <option value="rotateInDownLeft">rotateInDownLeft</option>
                                                                                            <option value="rotateInDownRight">rotateInDownRight</option>
                                                                                            <option value="rotateInUpLeft">rotateInUpLeft</option>
                                                                                            <option value="rotateInUpRight">rotateInUpRight</option>
                                                                                            <option value="slideInUp">slideInUp</option>
                                                                                            <option value="slideInDown">slideInDown</option>
                                                                                            <option value="slideInLeft">slideInLeft</option>
                                                                                            <option value="slideInRight">slideInRight</option>
                                                                                            <option value="zoomIn">zoomIn</option>
                                                                                            <option value="zoomInDown">zoomInDown</option>
                                                                                            <option value="zoomInLeft">zoomInLeft</option>
                                                                                            <option value="zoomInRight">zoomInRight</option>
                                                                                            <option value="zoomInUp">zoomInUp</option>
                                                                                            <option value="hinge">hinge</option>
                                                                                            <option value="jackInTheBox">jackInTheBox</option>
                                                                                            <option value="rollIn">rollIn</option>
                                                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-form">
                                                <div class="form-group">
                                                    <label>Button</label>
                                                    <select name="animation_button" class="form-control">
                                                                                            <option value="none">none</option>
                                                                                            <option value="bounce">bounce</option>
                                                                                            <option value="flash">flash</option>
                                                                                            <option value="pulse">pulse</option>
                                                                                            <option value="rubberBand">rubberBand</option>
                                                                                            <option value="shake">shake</option>
                                                                                            <option value="swing">swing</option>
                                                                                            <option value="tada">tada</option>
                                                                                            <option value="wobble">wobble</option>
                                                                                            <option value="jello">jello</option>
                                                                                            <option value="heartBeat">heartBeat</option>
                                                                                            <option value="bounceIn">bounceIn</option>
                                                                                            <option value="bounceInDown">bounceInDown</option>
                                                                                            <option value="bounceInLeft">bounceInLeft</option>
                                                                                            <option value="bounceInRight">bounceInRight</option>
                                                                                            <option value="bounceInUp">bounceInUp</option>
                                                                                            <option value="fadeIn">fadeIn</option>
                                                                                            <option value="fadeInDown">fadeInDown</option>
                                                                                            <option value="fadeInDownBig">fadeInDownBig</option>
                                                                                            <option value="fadeInLeft">fadeInLeft</option>
                                                                                            <option value="fadeInLeftBig">fadeInLeftBig</option>
                                                                                            <option value="fadeInRight">fadeInRight</option>
                                                                                            <option value="fadeInRightBig">fadeInRightBig</option>
                                                                                            <option value="fadeInUp" selected="">fadeInUp</option>
                                                                                            <option value="fadeInUpBig">fadeInUpBig</option>
                                                                                            <option value="flip">flip</option>
                                                                                            <option value="flipInX">flipInX</option>
                                                                                            <option value="flipInY">flipInY</option>
                                                                                            <option value="lightSpeedIn">lightSpeedIn</option>
                                                                                            <option value="rotateIn">rotateIn</option>
                                                                                            <option value="rotateInDownLeft">rotateInDownLeft</option>
                                                                                            <option value="rotateInDownRight">rotateInDownRight</option>
                                                                                            <option value="rotateInUpLeft">rotateInUpLeft</option>
                                                                                            <option value="rotateInUpRight">rotateInUpRight</option>
                                                                                            <option value="slideInUp">slideInUp</option>
                                                                                            <option value="slideInDown">slideInDown</option>
                                                                                            <option value="slideInLeft">slideInLeft</option>
                                                                                            <option value="slideInRight">slideInRight</option>
                                                                                            <option value="zoomIn">zoomIn</option>
                                                                                            <option value="zoomInDown">zoomInDown</option>
                                                                                            <option value="zoomInLeft">zoomInLeft</option>
                                                                                            <option value="zoomInRight">zoomInRight</option>
                                                                                            <option value="zoomInUp">zoomInUp</option>
                                                                                            <option value="hinge">hinge</option>
                                                                                            <option value="jackInTheBox">jackInTheBox</option>
                                                                                            <option value="rollIn">rollIn</option>
                                                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Image (1920x600)</label>
                                            <div class="display-block">
                                                <a  style="width: 190px;" class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer waves-effect waves-light file">
                                                    <input onchange='validate(this)' id="product_images"  type="file" name="file" size="20" accept=".png, .jpg, .jpeg, .gif" required="" >
                                                </a>
                                                <img src="" style="display:none;height:80px;width:80px;margin:21px;" id="image_1">
                                                <span id="lbError" style="color: red;"></span>
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label">Image (768x500)</label><br>
                                           
                                                <a  style="width: 190px;"  class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer waves-effect waves-light file_mobile">
                                                    <input onchange='validate2(this)' id="product_images2" type="file" name="file_mobile" size="20" accept=".png, .jpg, .jpeg, .gif" required="" onchange="show_preview_image(this);">
                                                </a>
                                                <img src="" style="display:none;height:80px;width:80px;margin:21px;" id="image_2" >
                                             </div>

                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary pull-right">Add Slider Item</button>
                                    </div>
                                    <!-- /.box-footer -->
                                    </form><!-- form end -->
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-12 card">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Slider Items</h3>
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
                                                    <div id="cs_datatable_lang_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                        <div class="dataTables_length" id="cs_datatable_lang_length">
                                                           
                                                                <div style="float:right;" id="cs_datatable_lang_filter" class="dataTables_filter"><label>Search
                                                                    <input type="search" class="form-control input-sm" placeholder="" aria-controls="cs_datatable_lang"></label>
                                                                </div>
                                                                    <table class="table table-bordered table-striped dataTable no-footer" id="cs_datatable_lang" role="grid" aria-describedby="cs_datatable_lang_info">
                                                        <thead>
                                                        <tr role="row"><th width="20" class="sorting_desc" tabindex="0" aria-controls="cs_datatable_lang" rowspan="1" colspan="1" aria-label="Id: activate to sort column ascending" aria-sort="descending" style="width: 12px;">Id</th><th class="sorting" tabindex="0" aria-controls="cs_datatable_lang" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 180px;">Image</th><th class="sorting" tabindex="0" aria-controls="cs_datatable_lang" rowspan="1" colspan="1" aria-label="Language: activate to sort column ascending" style="width: 59px;">Language</th><th class="sorting" tabindex="0" aria-controls="cs_datatable_lang" rowspan="1" colspan="1" aria-label="Order: activate to sort column ascending" style="width: 35px;">Order</th><th class="th-options sorting" tabindex="0" aria-controls="cs_datatable_lang" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 86px;">Options</th></tr>
                                                        </thead>
                                                        <tbody>
                                                       @if(count($slider) >0)
                                                       @php $index=1; @endphp
                                                       @foreach($slider as $s)
                                                            <tr role="row" class="even">
                                                                <td class="sorting_1">{{$index++}}</td>
                                                                <td>
                                                                    <img src="/images/slider/{{$s->desktop_image}}" alt="" style="width: 100px;height:100px;">
                                                                </td>
                                                                <td>
                                                                {{$s->language}} 
                                                                  </td>
                                                                <td>    {{$s->order}}  </td>

                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown">Select an option                                                    <span class="caret"></span>
                                                                        </button>
                                                                        <ul class="dropdown-menu options-dropdown">
                                                                            <li>
                                                                                <a href="javascript:void(0)" id="edit" onclick="update_item('{{$s->id}}');"><i class="fa fa-edit option-icon"></i>Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="/{{ $s->id }}/delete/slider" onclick="delete_item('{{$s->id}}');"><i class="fa fa-trash option-icon"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <p>No data found</p>
                                                            @endif
                                                        </tbody>
                                                    </table><div class="dataTables_info" id="cs_datatable_lang_info" role="status" aria-live="polite"> </div><div class="dataTables_paginate paging_simple_numbers" id="cs_datatable_lang_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="cs_datatable_lang_previous"><a href="#" aria-controls="cs_datatable_lang" data-dt-idx="0" tabindex="0">‹</a></li><li class="paginate_button active"><a href="#" aria-controls="cs_datatable_lang" data-dt-idx="1" tabindex="0">@php count($slider); @endphp</a></li><li class="paginate_button next disabled" id="cs_datatable_lang_next"><a href="#" aria-controls="cs_datatable_lang" data-dt-idx="2" tabindex="0">›</a></li></ul></div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                    

                    
                    </div>
                    
                </section>
                <!-- account setting page end -->
<script>

    function validate(el) {
          var maxfilesize = 3;  // 1 Mb
          filesize = el.files[0].size /1024 /1024;
         
          myfile= $(el).val();
          var ext = myfile.split('.').pop();
          var reader = new FileReader();
        //Read the contents of Image File.
          reader.readAsDataURL(el.files[0]);
          reader.onload = function (e) {

            //Initiate the JavaScript Image object.
            var image = new Image();

            //Set the Base64 string return from FileReader as source.
            image.src = e.target.result;

            //Validate the File Height and Width.
            image.onload = function () {
            var ht = this.height;
            var wdh = this.width;
            
            
            if (ht != 1920 && wdh != 600) {
               
                alert("Width and Height must be 1920px * 600px");
                  $('#h2').css('border-color','red');
                  $('#h2').val('');
                  $('#product_images').val('');
                  $('#product_images').val(null);
                  $('#h2').css('border-color','red');
                  $('#h2').val('');
              
            }
            // alert("Uploaded image has valid Height and Width.");
           
            };
        }
          
             
          if(filesize > maxfilesize){
                // alert(filesize+''+maxfilesize);
                 // warningel   = document.getElementById( 'lbError' );
                  $('#h2').css('border-color','red');
                  $('#h2').val('');
                  $('#product_images').val('');
                  alert('File size is larger than 3 MB');
                  // $('#lbError').text = " ";
                  $('#product_images').val(null);
                  $('#h2').css('border-color','red');
                  $('#h2').val('');
                } 
                else if(ext =="jpg" || ext =="png" && filesize < maxfilesize){
                        $('#lbError').hide();
                }else{
                  $('#h2').css('border-color','red');
                  $('#h2').val('');
                  $('#product_images').val('');
                  alert('jpg or png file allowed');
                  // $('#lbError').text = "";
                  $('#product_images').val(null);
                  $('#h2').css('border-color','red');
                  $('#h2').val('');

                }

       
    }

 function validate2(el) {
          var maxfilesize = 3;  // 1 Mb
          filesize = el.files[0].size /1024 /1024;
         
          myfile= $(el).val();
          var ext = myfile.split('.').pop();
          var reader = new FileReader();
        //Read the contents of Image File.
          reader.readAsDataURL(el.files[0]);
          reader.onload = function (e) {

            //Initiate the JavaScript Image object.
            var image = new Image();

            //Set the Base64 string return from FileReader as source.
            image.src = e.target.result;

            //Validate the File Height and Width.
            image.onload = function () {
            var ht = this.height;
            var wdh = this.width;
            
            
            if (ht != 500 && wdh != 768) {
               
                alert("Width and Height must be 768px * 500px");
                  $('#h2').css('border-color','red');
                  $('#h2').val('');
                  $('#product_images2').val('');
                  $('#product_images2').val(null);
                  $('#h2').css('border-color','red');
                  $('#h2').val('');
              
            }
            // alert("Uploaded image has valid Height and Width.");
           
            };
        }
          
             
          if(filesize > maxfilesize){
                // alert(filesize+''+maxfilesize);
                 // warningel   = document.getElementById( 'lbError' );
                  $('#h2').css('border-color','red');
                  $('#h2').val('');
                  $('#product_images2').val('');
                  alert("File size is larger than 3 MB ");
                  // $('#lbError').text = "";
                  $('#product_images2').val(null);
                  $('#h2').css('border-color','red');
                  $('#h2').val('');
                } 
                else if(ext =="jpg" || ext =="png" && filesize < maxfilesize){
                        $('#lbError').hide();
                }else{
                  $('#h2').css('border-color','red');
                  $('#h2').val('');
                  $('#product_images2').val('');
                 alert("jpg or png file allowed");
                  // $('#lbError').text = "jpg or png file allowed";
                  $('#product_images2').val(null);
                  $('#h2').css('border-color','red');
                  $('#h2').val('');

                }

       
    }


function update_item(id){
    $('#slider_form').attr('action','/admin/update-slider');
    $("#slider_id").val(id);
    $('#product_images2').removeAttr('required');
    $('#product_images').removeAttr('required');
    // alert(id);
    $.ajax({
     type: "POST",
     url: '/edit',
     data: {
        "id":id,
        "_token": "{{ csrf_token() }}",
       
        },
     success: function(response){
        // console.log((response));
        $.each(JSON.parse(response), function () {
           console.log(JSON.parse(response));
            $('.id').val(this.id);
            $('.language').val(this.language);
            $('.title').val(this.title);
            $('.link').val(this.link);
            $('.item_order').val(this.order);
            $('.button_text').val(this.botton_text);
            $('.button_color').val(this.botton_color);
            $('.text_color').val(this.text_color);
            $('.button_text_color').val(this.botton_text_color);
            $('.animation_title').val(this.animation_title);
            $('.animation_description').val(this.animation_description);
            $('.animation_button').val(this.animation_button);
            $('.description').val(this.description);
            // $('.file').val(this.desktop_image);
            $('#image_1').css('display','block');
            $('#image_1').attr('src','/images/slider/'+this.desktop_image);
            $('#image_2').css('display','block');
            $('#image_2').attr('src','/images/slider/'+this.mobile_image);
        });
       
     }
});
}

function reset_form(id){
    $('#slider_form').attr('action','/create-slider');
}


</script>   
@endsection      
