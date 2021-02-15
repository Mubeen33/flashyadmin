@extends('layouts.master')
@section('page-title','Appearance')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Appearance</a></li>
    <li class="breadcrumb-item active">Home Page Settings</li>
@endsection    
                            
@section('content') 
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
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
                    <h4>Add Home Categories</h4>    
                  </div>
                </div>
                <form action="{{route('admin.home-category.store')}}" method="post">
                  @csrf
                  <div class="row mb-2">
                    <div class="col-12">
                      <select class="form-control select2" name="category_id">
                        <option>Choose Category</option>
                        @foreach(App\Category::where('deleted', 0)->where('parent_id' , 0)->where('show_on_homepage' , 0)->get() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>   
        </div>
  </div>
@endsection
@push('scripts')
<script src="{{ asset('src/js/scripts/extensions/sweet-alerts.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>

<script type="text/javascript">
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
@endpush
    
