@extends('layouts.master')
@section('page-title','Appearance')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Appearance</a></li>
    <li class="breadcrumb-item active">Home Categories Settings</li>
@endsection    
                            
@section('content') 
<div class="content-body">
    <div class="container-fluid">
            @if(session('msg'))
                  {!! session('msg') !!}
                @endif
            <!-- Photos -->
            <div class="card form-group">
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-9">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                      <ul class="nav nav-tabs  mb-0" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active pb-0" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home Page Categories</a>
                        </li>
                        <li class="nav-item ">
                          <a class="nav-link pb-0" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Preview Style</a>
                        </li>
                      </ul>  
                  </div>
                  <div class="col-3">
                    <a id="btn-add" href="{{route('admin.home-category.create')}}" class="btn btn-primary float-right">Add New Category</a>
                  </div>
                </div>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                      <div class="col-12">
                        <table class="table table-striped table-bordered table-sm" width="100%">
                          <thead class="text-dark">
                            <tr>
                              <th class="bg-white">#</th>
                              <th class="bg-white text-left">Category</th>
                              <th class="bg-white">Status</th>
                              <th class="bg-white">Option</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach(\App\HomeCategory::all() as $key => $home_category)
                              @if ($home_category->category != null)
                            <tr>
                              <td>{{$key+1}}</td>
                              <td class="text-left">{{$home_category->category->name}}</td>
                              <td>
                                <div class="custom-control-primary custom-control custom-switch" data-v-78a2cb7d=""><input onchange="update_home_category_status(this)" type="checkbox" name="check-button" class="custom-control-input" value="{{$home_category->id}}" id="__BVID_{{$home_category->id}}" <?php if($home_category->status == 1) echo "checked";?>><label class="custom-control-label" for="__BVID_{{$home_category->id}}"></label></div>
                              </td>
                              <td>
                                <div class="btn-group dropdown">
                                  <button class="btn btn-sm btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                      Actions <i class="dropdown-caret"></i>
                                  </button>
                                  <ul class="dropdown-menu dropdown-menu-right">
                                      <li class="dropdown-item"><a class="btn btn-sm btn-info col-12" href="{{route('admin.home-category.edit' , $home_category->category_id )}}">Edit</a></li>
                                      <li class="dropdown-item">
                                      <form action="{{ route('admin.home-category.destroy', $home_category->category_id )}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                      </form>
                                      </li>
                                  </ul>
                              </div>
                              </td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row mb-2">
                      <div class="col-12">
                        <h6>Select the Category style that how to preview on site.</h6>                      
                      </div>
                    </div>
                    <form action="{{route('admin.preview-style')}}" method="post">
                      @csrf
                      @php $style = \App\Application::where('type' , 'site')->first(); @endphp
                      <div class="row mb-2">
                        <div class="col-12">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="preview" id="inlineRadio1" value="1" <?php if($style->preview_mode == 1) echo "checked";?>>
                            <label class="form-check-label" for="inlineRadio1">Sidebar preview</label>
                          </div>
                          <div class="form-check form-check-inline ml-4">
                            <input class="form-check-input" type="radio" name="preview" id="inlineRadio2" value="0" <?php if($style->preview_mode == 0) echo "checked";?>>
                            <label class="form-check-label" for="inlineRadio2">Dropdown Preview</label>
                          </div>
                        </div>
                      </div> 
                      <div class="row">
                      <div class="col-3">
                        <button class="btn btn-primary">Save</button>
                      </div>
                    </div>   
                    </form>
                  </div>
                </div>
              </div>
            </div>   
        </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('src/js/scripts/extensions/sweet-alerts.js')}}"></script>

<script type="text/javascript">
  $("#profile-tab").on('click' , function(){
    $("#btn-add").hide();
  });
  $("#home-tab").on('click' , function(){
    $("#btn-add").show();
  });
  var table = $('#example').DataTable();
  function update_home_category_status(el){
    if(el.checked){
        var status = 1;
    }
    else{
        var status = 0;
    }
    $.post('{{ route('admin.categories_update_status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
        if(data == 1){
            Swal.fire({
        title: 'Status has been changed successfully',
      });
        }
        else{
            Swal.fire({
        title: 'Error! Status not changed',
      });
        }
    });
  }
</script>
@if(session()->has('message'))
<script type="text/javascript">
  Swal.fire({
        title: '{{ session()->get('message') }}',
      });
</script>
@endif
@endpush
    
