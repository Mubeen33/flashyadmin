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
    font-size  : 0.85rem !important;
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

  .sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
  .border-rad-0 {
      border-radius: 0!important;
  }
  .py-05 {
      padding-top: 0.5rem!important;
      padding-bottom: 0.5rem!important;
  }
  .select2-container--default .select2-results>.select2-results__options{

    min-width: 200px !important;
  }
  .select2-container--default.select2-container--open.select2-container--above .select2-selection--single, .select2-container--default.select2-container--open.select2-container--above .select2-selection--multiple{
    min-width: 200px !important;
  }
  span.select2.select2-container.select2-container--default {
    min-width: 200px !important;
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
                    <form class="form-horizontal" action="{{ route('appearance_logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="logo">Frontend Header logo <small>(max height 40px)</small></label>
                        <div class="col-sm-9">
                            <input type="file" id="logo" name="logo" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
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
                    </div>
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
$("#logo").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 40 || this.width > 200){
                alert("Please Upload Logo of size 200x40")
                $("#logo").val(''); 
            }
        };
        img.src = _URL.createObjectURL(file);
    }
});
$("#footer_logo").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 30 || this.width > 120){
                alert("Please Upload Logo of size 200x40")
                $("#footer_logo").val(''); 
            }
        };
        img.src = _URL.createObjectURL(file);
    }
});
$("#admin_logo").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 40 || this.width > 200){
                alert("Please Upload Logo of size 200x40")
                $("#admin_logo").val(''); 
            }
        };
        img.src = _URL.createObjectURL(file);
    }
});
$("#favicon").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 32 || this.width > 32){
                alert("Please Upload Logo of size 32x32")
                $("#favicon").val(''); 
            }
        };
        img.src = _URL.createObjectURL(file);
    }
});
$("#seller_logo").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 40 || this.width > 200){
                alert("Please Upload Logo of size 200x40")
                $("#seller_logo").val(''); 
            }
        };
        img.src = _URL.createObjectURL(file);
    }
});
  </script>
@endpush
    
