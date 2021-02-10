@extends('layouts.master')
@section('page-title','Appearance')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Appearance</a></li>
    <li class="breadcrumb-item active">Home Categories Settings</li>
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
table tr td:nth-child(3) div{
    font-weight: 600;
    font-family: calibri;
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
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="mb-xs-1 strong mb-1">Attach Categories</label> <br/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mb-1">
                                    <label>Select Product</label>
                                    <select class="form-control select2">
                                        <option>Select Product</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mb-1">
                                    <label>Main Category of the product</label>
                                    <select class="form-control select2">
                                        <option>Haelth & Beauty > Health Care</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mb-1 form-group">
                                    <label>Linked Catgeories with Product</label>
                                    <select class="form-control select2">
                                        <option>All Linked</option>
                                    </select>
                                </div>
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead class="text-dark">
                                    <tr>
                                        <th width="5%" class="bg-light"></th>
                                        <th class="bg-light" width="5%">Sr</th>
                                        <th class="bg-light text-left" width="90%">Name of Categories</th>
                                        <!-- <th class="bg-light" width="10%">Status</th> -->
                                    </tr>
                                </thead>
                                <body>
                                    <tr>
                                        <td class="details-control"><div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1"></label>
                                          </div></td>
                                        <td>1</td>
                                        <td class="text-left">
                                              <div class="alert alert-success mb-0" role="alert">
                                              <span class="text-dark">Health & Beauty > Personal Care > Massage & Relaxation > Massagers > Electric Massagers</span>
                                                <button type="button" class="close" aria-label="Close" style="margin-top : -4px;" onclick="closethis()">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div></td>
                                        <!-- <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td class="details-control"><div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1"></label>
                                          </div></td>
                                        <td>2</td>
                                        <td class="text-left">
                                            <div class="alert alert-success mb-0" role="alert">
                                              <span class="text-dark">Health & Beauty > Personal Care > Massage & Relaxation > Massagers > Electric Massagers</span>
                                                <button type="button" class="close" aria-label="Close" style="margin-top : -4px;">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div></td>
                                        <!-- <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td class="details-control"><div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1"></label>
                                          </div></td>
                                        <td>3</td>
                                        <td class="text-left">
                                            <div class="alert alert-success mb-0" role="alert">
                                              <span class="text-dark">Health & Beauty > Personal Care > Massage & Relaxation > Massagers > Electric Massagers</span>
                                                <button type="button" class="close" aria-label="Close" style="margin-top : -4px;">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div></td>
                                        <!-- <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td class="details-control"><div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1"></label>
                                          </div></td>
                                        <td>4</td>
                                        <td class="text-left">
                                            <div class="alert alert-success mb-0" role="alert">
                                              <span class="text-dark">Health & Beauty > Personal Care > Massage & Relaxation > Massagers > Electric Massagers</span>
                                                <button type="button" class="close" aria-label="Close" style="margin-top : -4px;">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div></td>
                                        <!-- <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td class="details-control"><div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1"></label>
                                          </div></td>
                                        <td>5</td>
                                        <td class="text-left">
                                            <div class="alert alert-success mb-0" role="alert">
                                              <span class="text-dark">Health & Beauty > Personal Care > Massage & Relaxation > Massagers > Electric Massagers</span>
                                                <button type="button" class="close" aria-label="Close" style="margin-top : -4px;">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div></td>
                                        <!-- <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td class="details-control"><div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1"></label>
                                          </div></td>
                                        <td>6</td>
                                        <td class="text-left">
                                            <div class="alert alert-success mb-0" role="alert">
                                              <span class="text-dark">Health & Beauty > Personal Care > Massage & Relaxation > Massagers > Electric Massagers</span>
                                                <button type="button" class="close" aria-label="Close" style="margin-top : -4px;">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div></td>
                                        <!-- <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        
                                        <td class="details-control"><div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1"></label>
                                          </div></td>
                                        <td>7</td>
                                        <td class="text-left">
                                            <div class="alert alert-success mb-0" role="alert">
                                              <span class="text-dark">Health & Beauty > Personal Care > Massage & Relaxation > Massagers > Electric Massagers</span>
                                                <button type="button" class="close" aria-label="Close" style="margin-top : -4px;">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div></td>
                                        <!-- <td>
                                            <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input type="checkbox" name="check-button" class="custom-control-input" value="true" id="__BVID__757" checked=""><label class="custom-control-label" for="__BVID__757"></label></div>
                                        </td> -->
                                    </tr>
                                </body>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10"></div>
                        <div class="col-2">
                            <button class="btn btn-primary col-12 ">Save</button>
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
  <script src="{{ asset('src/js/scripts/extensions/sweet-alerts.js')}}"></script>
  <script src="{{ asset('src/js/scripts/extensions/sweet-alerts.min.js')}}"></script>
  <script type="text/javascript">
    function closethis(){
        Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
    }).then(function (result) {
      if (result.value) {
        Swal.fire(
          {
            type: "success",
            title: 'Deleted!',
            text: 'Your file has been deleted.',
            confirmButtonClass: 'btn btn-success',
          }
        )
      }
    })
    }

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
    
