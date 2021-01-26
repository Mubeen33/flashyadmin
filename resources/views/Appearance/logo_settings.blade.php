@extends('layouts.master')
@section('page-title','Appearance')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Appearance</a></li>
    <li class="breadcrumb-item active">Home Page Settings</li>
@endsection    
                            
@section('content') 
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link href="{{ asset('app-assets/vendors/css/jquery.tagsinput-revisited.css')}}" rel="stylesheet" type="text/css">


<style type="text/css">

<?php $today = date('YmdHi');
      $startDate = date('YmdHi', strtotime('2012-03-14 09:06:00'));
      $range = $today - $startDate;
      $prod_img_id = rand(0, $range);  
?>

.file-drop-area {
    position: relative;
    display: flex;
    align-items: center;
    max-width: 100%;
    padding: 25px;
    border: 1px dashed rgba(255, 255, 255, 0.4);
    border-radius: 3px;
    transition: .2s
}

.choose-file-button {
    flex-shrink: 0;
    background-color: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    padding: 8px 15px;
    margin-right: 10px;
    font-size: 12px;
    text-transform: uppercase
}

.file-message {
    font-size: small;
    font-weight: 300;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
}

.file-input {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    widows: 100%;
    cursor: pointer;
    opacity: 0
}
</style>
<div class="content-body">
    <div class="container-fluid">
            @if(session('msg'))
                  {!! session('msg') !!}
                @endif
            <!-- Photos -->
            <div class="card form-group">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.appearance_logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="col-sm-3 control-label" for="logo"><b>Frontend Header Logo</b></label>
                <div class="row px-2 pb-2 pt-1">
                    <div class="border border-dark col-sm-3  text-center">
                        <div class="file-drop-area">
                            <div id="div_header_logo">
                                @if($headerlogo == null)
                                <div class="ml-5"><h3><i class="feather icon-image"></i></h3>No Logo</div>
                                @else
                                <img src="{{$headerlogo->path}}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class=" border border-dark col-sm-8">
                        <div class="file-drop-area"> <span class="choose-file-button"><u class="text-primary"><i class="feather icon-upload"></i> Choose File</u></span> <span class="file-message">or drag and drop files here</span>
                            <input type="file" class="file-input" name="{{$headerlogo->action}}" id="{{$headerlogo->action}}">
                        </div>
                    </div>
                </div>
                <label class="col-sm-3 control-label" for="footer_logo"><b>Frontend Footer Logo</b></label>
                <div class="row px-2 pb-2 pt-1">
                    <div class="border border-dark col-sm-3  text-center">
                        <div class="file-drop-area">
                            <div id="div_footer_logo">
                                @if($footerlogo == null)
                                    <div class="ml-5"><h3><i class="feather icon-image"></i></h3>No Logo</div>
                                @else
                                    <img src="{{ $footerlogo->path }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class=" border border-dark col-sm-8">
                        <div class="file-drop-area"> <span class="choose-file-button"><u class="text-primary"><i class="feather icon-upload"></i> Choose File</u></span> <span class="file-message">or drag and drop files here</span> 
                            <input type="file" class="file-input" name="footer_logo" id="footer_logo"> </div>
                    </div>
                </div>

                <label class="col-sm-3 control-label" for="favicon"><b>Favicon</b></label>
                <div class="row px-2 pb-2 pt-1">
                    <div class="border border-dark col-sm-3  text-center">
                        <div class="file-drop-area">
                            <div id="div_favicon">
                                @if($favicon == null)
                                    <div class="ml-5"><h3><i class="feather icon-image"></i></h3>No Logo</div>
                                @else
                                    <img src="{{ $favicon->path }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class=" border border-dark col-sm-8">
                        <div class="file-drop-area"> <span class="choose-file-button"><u class="text-primary"><i class="feather icon-upload"></i> Choose File</u></span> <span class="file-message">or drag and drop files here</span> 
                            <input type="file" class="file-input" name="favicon" id="favicon"> </div>
                    </div>
                </div>

                <label class="col-sm-3 control-label" for="admin_logo"><b>Admin Logo</b></label>
                <div class="row px-2 pb-2 pt-1">
                    <div class="border border-dark col-sm-3  text-center">
                        <div class="file-drop-area">
                            <div id="div_admin_logo">
                                @if($adminlogo == null)
                                    <div class="ml-5"><h3><i class="feather icon-image"></i></h3>No Logo</div>
                                @else
                                    <img src="{{ $adminlogo->path }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class=" border border-dark col-sm-8">
                        <div class="file-drop-area"> <span class="choose-file-button"><u class="text-primary"><i class="feather icon-upload"></i> Choose File</u></span> <span class="file-message">or drag and drop files here</span> 
                            <input type="file" class="file-input" name="admin_logo" id="admin_logo"> </div>
                    </div>
                </div>

                <label class="col-sm-3 control-label" for="seller_logo"><b>Seller Logo</b></label>
                <div class="row px-2 pb-2 pt-1">
                    <div class="border border-dark col-sm-3  text-center">
                        <div class="file-drop-area">
                            <div id="div_seller_logo">
                                @if($sellerlogo == null)
                                    <div class="ml-5"><h3><i class="feather icon-image"></i></h3>No Logo</div>
                                @else
                                    <img src="{{ $sellerlogo->path }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class=" border border-dark col-sm-8">
                        <div class="file-drop-area"> <span class="choose-file-button"><u class="text-primary"><i class="feather icon-upload"></i> Choose File</u></span> <span class="file-message">or drag and drop files here</span> 
                            <input type="file" class="file-input" name="seller_logo" id="seller_logo"> </div>
                    </div>
                </div>
                
                <!-- <div class="form-group">
                    <label class="col-sm-3 control-label" for="footer_logo">Frontend Header Logo</label>
                    <div class="row">
                        <div class="border ml-3 my-1" style="width: 200px;height: 100px">
                            <img src="{{url('img/logo_light_colorfull.png')}}" id="front_header_logo">
                        </div>
                        <div class="border my-1 text-center" style="width: 200px;height: 100px">
                            <img src="{{url('img/logo_light_colorfull.png')}}" id="front_header_logo">
                        </div>
                    </div>
                    <div class="input-group col-sm-9">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo">
                        <label class="custom-file-label" for="logo">Choose file</label>
                      </div>
                    </div>
                </div> -->
                    
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label" for="footer_logo">Frontend Footer logo</label>
                        <div class="col-sm-9">
                            <input type="file" id="footer_logo" name="footer_logo" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="favicon">Favicon <small>(32x32)</small></label>
                        <div class="col-sm-9">
                            <input type="file" id="favicon" name="favicon" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="admin_logo">Admin logo <small>(60x60)</small></label>
                        <div class="col-sm-9">
                            <input type="file" id="admin_logo" name="admin_logo" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="seller_logo">Seller Logo <small>(max height 40px)</small></label>
                        <div class="col-sm-9">
                            <input type="file" id="seller_logo" name="seller_logo" class="form-control" accept="image/*">
                        </div>
                    </div> -->
                <div class="col-lg-9 text-right">
                    <button class="btn btn-warning" type="submit">Save</button>
                </div>
            </form>
                    <!-- <div class="row mb-3">
                        <div class="col-lg-3">
                            <label class="mb-xs-1 strong">Frontend Logos</label> <br/>
                        </div>
                        <div class="col-lg-2 col-md-3 col22">
                            <h6>Header Logo</h6>
                            <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
                                method="POST"  
                                enctype="multipart/form-data" 
                                class="dropzone dropzone-area"
                                id="dpz-single-file-p1"
                            >
                            @csrf
                                <input type="hidden" name="fileDropzone" />
                            </form>
                            <small>Size (150 x 200)</small>
                        </div>
                        <div class="col-lg-2 col-md-3 col22">
                            <h6>Footer Logo</h6>
                            <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
                                method="POST"  
                                enctype="multipart/form-data" 
                                class="dropzone dropzone-area" 
                                id="dpz-single-file-p2"
                            >  
                            @csrf
                                <input type="hidden" name="fileDropzone" />
                            </form>
                            <small>Size (50 x 50)</small>
                        </div>
                        <div class="col-lg-2 col-md-3 col22">
                            <h6>Favicon</h6>
                            <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
                                method="POST"  
                                enctype="multipart/form-data" 
                                class="dropzone dropzone-area" 
                                id="dpz-single-file-p2"
                            >  
                            @csrf
                                <input type="hidden" name="fileDropzone" />
                            </form>
                            <small>Size (16 x 16)</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label class="mb-xs-1 strong">Admin Logo</label> <br/>
                        </div>
                        <div class="col-lg-2 col-md-3 col22">
                            <h6>Header Icon</h6>
                            <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
                                method="POST"  
                                enctype="multipart/form-data" 
                                class="dropzone dropzone-area"
                                id="dpz-single-file-p1"
                            >
                            @csrf
                                <input type="hidden" name="fileDropzone" />
                            </form>
                            <small>Size (150 x 200)</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label class="mb-xs-1 strong">Seller Logo</label> <br/>
                        </div>
                        <div class="col-lg-2 col-md-3 col22">
                            <h6>Header Icon</h6>
                            <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
                                method="POST"  
                                enctype="multipart/form-data" 
                                class="dropzone dropzone-area"
                                id="dpz-single-file-p1"
                            >
                            @csrf
                                <input type="hidden" name="fileDropzone" />
                            </form>
                            <small>Size (150 x 200)</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-9">
                            <button type="submit" class="float-right btn btn-warning">Save</button>
                        </div>
                    </div> -->
                  </div>
            </div>   
        </div>
  </div>
</div>
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
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    var table = $('#example').DataTable({
        "searching": false,
        "lengthChange": false,
        "paging":   false,
        "ordering": false,
    });
    function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellspacing="0" border="0" style="padding-left:50px;" class="table">'+
        '<tr>'+
            '<td width="20%" class="text-right">1</td>'+
            '<td width="75%" class="text-left">'+d.name+'</td>'+
            '<td width="5%"><div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div></td>'+
        '</tr>'+
        '<tr>'+
            '<td width="20%" class="text-right">1</td>'+
            '<td width="75%" class="text-left">'+d.extn+'</td>'+
            '<td width="5%"><div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div></td>'+
        '</tr>'+
        '<tr>'+
            '<td width="20%" class="text-right">1</td>'+
            '<td width="75%" class="text-left">'+d.extn+'</td>'+
            '<td width="5%"><div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div></td>'+
        '</tr>'+
    '</table>';
}
 $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );  
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

var _URL = window.URL;


$("#header_logo").change(function () {
    var file, img;
    var object = $(this);
    var textbox = $(this).prev();
    var filesCount = $(this)[0].files.length;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 40 || this.width > 200){
                alert("Please Upload Logo of size 200x40")
                $("#header_logo").val(''); 
            }
            else{
                gothere1();
            }
        };
        img.src = _URL.createObjectURL(file);
    }
function gothere1(){
if (filesCount === 1) {
var fileName = object.val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}
if (typeof (FileReader) != "undefined") {
var dvPreview = $("#div_header_logo");

$(object[0].files).each(function () {

var file = $(this);
var reader = new FileReader();
reader.onload = function (e) {
    dvPreview.html("");
var img = $("<img />");
img.attr("style", "width: 200px; height:100px; padding: 10px");
img.attr("src", e.target.result);
dvPreview.append(img);
}
reader.readAsDataURL(file[0]);
});
} else {
alert("This browser does not support HTML5 FileReader.");
}
}

});

$("#footer_logo").change(function () {
    var file, img;
    var object = $(this);
    var textbox = $(this).prev();
    var filesCount = $(this)[0].files.length;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 40 || this.width > 200){
                alert("Please Upload Logo of size 200x40")
                $("#footer_logo").val(''); 
            }
            else{
                gothere2();
            }
        };
        img.src = _URL.createObjectURL(file);
    }
function gothere2(){
if (filesCount === 1) {
var fileName = object.val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}
if (typeof (FileReader) != "undefined") {
var dvPreview = $("#div_footer_logo");

$(object[0].files).each(function () {

var file = $(this);
var reader = new FileReader();
reader.onload = function (e) {
    dvPreview.html("");
var img = $("<img />");
img.attr("style", "width: 200px; height:100px; padding: 10px");
img.attr("src", e.target.result);
dvPreview.append(img);
}
reader.readAsDataURL(file[0]);
});
} else {
alert("This browser does not support HTML5 FileReader.");
}
}

});

$("#favicon").change(function () {
    var file, img;
    var object = $(this);
    var textbox = $(this).prev();
    var filesCount = $(this)[0].files.length;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 32 || this.width > 32){
                alert("Please Upload Logo of size 32x32")
                $("#favicon").val(''); 
            }
            else{
                gothere3();
            }
        };
        img.src = _URL.createObjectURL(file);
    }
function gothere3(){
if (filesCount === 1) {
var fileName = object.val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}
if (typeof (FileReader) != "undefined") {
var dvPreview = $("#div_favicon");

$(object[0].files).each(function () {

var file = $(this);
var reader = new FileReader();
reader.onload = function (e) {
    dvPreview.html("");
var img = $("<img />");
img.attr("style", "width: 200px; height:100px; padding: 10px");
img.attr("src", e.target.result);
dvPreview.append(img);
}
reader.readAsDataURL(file[0]);
});
} else {
alert("This browser does not support HTML5 FileReader.");
}
}

});

$("#admin_logo").change(function () {
    var file, img;
    var object = $(this);
    var textbox = $(this).prev();
    var filesCount = $(this)[0].files.length;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 40 || this.width > 200){
                alert("Please Upload Logo of size 200x40")
                $("#admin_logo").val(''); 
            }
            else{
                gothere4();
            }
        };
        img.src = _URL.createObjectURL(file);
    }
function gothere4(){
if (filesCount === 1) {
var fileName = object.val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}
if (typeof (FileReader) != "undefined") {
var dvPreview = $("#div_admin_logo");

$(object[0].files).each(function () {

var file = $(this);
var reader = new FileReader();
reader.onload = function (e) {
    dvPreview.html("");
var img = $("<img />");
img.attr("style", "width: 200px; height:100px; padding: 10px");
img.attr("src", e.target.result);
dvPreview.append(img);
}
reader.readAsDataURL(file[0]);
});
} else {
alert("This browser does not support HTML5 FileReader.");
}
}

});

$("#seller_logo").change(function () {
    var file, img;
    var object = $(this);
    var textbox = $(this).prev();
    var filesCount = $(this)[0].files.length;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 40 || this.width > 200){
                alert("Please Upload Logo of size 200x40")
                $("#seller_logo").val(''); 
            }
            else{
                gothere5();
            }
        };
        img.src = _URL.createObjectURL(file);
    }
function gothere5(){
if (filesCount === 1) {
var fileName = object.val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}
if (typeof (FileReader) != "undefined") {
var dvPreview = $("#div_seller_logo");

$(object[0].files).each(function () {

var file = $(this);
var reader = new FileReader();
reader.onload = function (e) {
    dvPreview.html("");
var img = $("<img />");
img.attr("style", "width: 200px; height:100px; padding: 10px");
img.attr("src", e.target.result);
dvPreview.append(img);
}
reader.readAsDataURL(file[0]);
});
} else {
alert("This browser does not support HTML5 FileReader.");
}
}

});

  </script>
@endpush
    
