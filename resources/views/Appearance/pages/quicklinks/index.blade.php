@extends('layouts.master')
@section('page-title','Appearance')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Pages</a></li>
    <li class="breadcrumb-item active">Quick Links</li>
@endsection    
                            
@section('content') 
<link href="{{ asset('app-assets/vendors/css/extensions/toastr.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
  td:hover{
    cursor:move;
    }
</style>
<div class="content-body">
            
            <!-- Photos -->
            <div class="card form-group">
              <div class="card-body">
              	<div class="row mb-2">
              		<div class="col-9">
              			<h4>Custom Quick-Links Pages<span class="ml-2 text-light" style="font-size: 10px;">(Drag the rows to change the position.)</span></h4>
              		</div>
              		<div class="col-3">
              			<a class="btn btn-primary float-right" href="{{route('admin.quicklinks.create')}}">Add New Page</a>
              		</div>
              	</div>
              	<table class="table table-bordered" cellspacing="0" width="100%" id="myTable">
                <thead>
                    <tr>
                        <th class="bg-white text-dark" width="10%">#</th>
                        <th class="bg-white text-dark text-left">Title</th>
                        <th class="bg-white text-dark text-left">Slug</th>
                        <th class="bg-white text-dark">Visibility</th>
                        <th class="bg-white text-dark" width="10%">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Page::where('page_type' , 'Q')->orderBy('position')->get() as $key => $page)
                        <tr>
                            <td class="id" style="display: none;">{{$page->id}}</td>
                            <td class="index">{{$key+1}}</td>
                            <td class="text-left">{{$page->title}}</td>
                            <td class="text-left slug"><a href="{{ route('custom-pages.show_custom_page', $page->slug) }}">{{ route('custom-pages.show_custom_page', $page->slug) }}<a></td>
                            <td>
                              <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input onchange="update_visibility(this)" type="checkbox" name="check-button" class="custom-control-input" value="{{$page->id}}" id="__BVID_{{$key+1}}" <?php if($page->visibility == 1) echo "checked";?>><label class="custom-control-label" for="__BVID_{{$key+1}}"></label></div>
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-sm btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        Actions <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a class="dropdown-item" href="{{route('admin.quicklinks.edit', $page->id)}}">Edit</a></li>
                                        <li>
                                        <a class="dropdown-item"
                                       onclick="event.preventDefault();
                                                     document.getElementById('destroy').submit();">
                                        {{ __('Delete') }}
                                    </a>

                                    <form id="destroy" action="{{ route('admin.quicklinks.destroy' , $page->id) }}" method="POST" style="display: none;">
                                      @method('DELETE')
                                        @csrf
                                    </form>
                                    </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
              </div>
          </div>
  </div>
  @push('scripts')
  <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
  <script type="text/javascript">
    var fixHelperModified = function(e, tr) {
    var $originals = tr.children();
    var $helper = tr.clone();
    $helper.children().each(function(index) {
      $(this).width($originals.eq(index).width())
    });
    return $helper;
  },
    updateIndex = function(e, ui) {
      var array = [];
      $('td.index', ui.item.parent()).each(function (i) {
        $(this).html(i+1);
      });
      $('td.id', ui.item.parent()).each(function (i) {
        array[i] = $(this).html();
      });

      $.post('{{ route('admin.update_positions') }}', {_token:'{{ csrf_token() }}', array:array}, function(data){
        if(data == 1){
          toastr.success('Position has been Changed!', 'Success');
        }
        else{
          toastr.error('Something went wrong!', 'Error');
        }
    });
    };

  $("#myTable tbody").sortable({
    helper: fixHelperModified,
    stop: updateIndex
  }).disableSelection();
  
    $("tbody").sortable({
    distance: 5,
    delay: 100,
    opacity: 0.6,
    cursor: 'move',
    update: function() {
      
    }
      });
    
  function update_visibility(el){
    if(el.checked){
        var status = 1;
    }
    else{
        var status = 0;
    }
    $.post('{{ route('admin.update_visibility') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
        if(data == 1){
          toastr.success('Page Status has been changed!', 'Success');
        }
        else{
            toastr.success('Something went wrong!', 'Error');
        }
    });
  }
</script>
@if(session('msg'))
<script type="text/javascript">
  toastr.success('{{session('msg')}}', 'Success');
</script>
@endif
  @endpush
@endsection