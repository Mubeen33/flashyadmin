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
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label class="mb-xs-1 strong">Categories</label> <br/>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-9">
                                    <input type="text" name="" class="form-control form-group" placeholder="Search and press enter">
                                </div>
                                <div class="col-3">
                                    <select class="form-control">
                                        <option>All</option>
                                        <option>Active</option>
                                        <option>In Active</option>
                                    </select>
                                </div>
                            </div>
                            
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th width="20px" class="bg-primary"></th>
                                        <th class="bg-primary" width="10%">Sr</th>
                                        <th class="bg-primary text-left" width="70%">Name</th>
                                        <th class="bg-primary" width="10%">Status</th>
                                    </tr>
                                </thead>
                                <body>
                                    <tr>
                                        <td class="details-control"><button class="btn btn-sm btn-success"><i class="feather icon-plus"></i></button></td>
                                        <td>1</td>
                                        <td class="text-left">Heater</td>
                                        <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="details-control"><button class="btn btn-sm btn-success"><i class="feather icon-plus"></i></button></td>
                                        <td>1</td>
                                        <td class="text-left">Heater</td>
                                        <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="details-control"><button class="btn btn-sm btn-success"><i class="feather icon-plus"></i></button></td>
                                        <td>1</td>
                                        <td class="text-left">Heater</td>
                                        <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="details-control"><button class="btn btn-sm btn-success"><i class="feather icon-plus"></i></button></td>
                                        <td>1</td>
                                        <td class="text-left">Heater</td>
                                        <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="details-control"><button class="btn btn-sm btn-success"><i class="feather icon-plus"></i></button></td>
                                        <td>1</td>
                                        <td class="text-left">Heater</td>
                                        <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="details-control"><button class="btn btn-sm btn-success"><i class="feather icon-plus"></i></button></td>
                                        <td>1</td>
                                        <td class="text-left">Heater</td>
                                        <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="details-control"><button class="btn btn-sm btn-success"><i class="feather icon-plus"></i></button></td>
                                        <td>1</td>
                                        <td class="text-left">Heater</td>
                                        <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td>
                                    </tr>
                                </body>
                            </table>
                        </div>
                    </div>
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
  </script>
@endpush
    
