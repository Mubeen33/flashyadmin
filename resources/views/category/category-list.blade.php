@extends('layouts.master')
@section('page-title','Brands')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Table</li>
@endsection    

    
@section('content') 
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">                               
            <div class="content-body">
                @if(session('msg'))
                  {!! session('msg') !!}
                @endif

                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Categories List</h4>
                                <a href="{{url('add-category')}}"><button type="button" class="btn btn-primary" style="float:right;" ><i class="fa fa-plus">Add Category</i></button></a>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive ">
                                        <table  class="table table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Commission</th>
                                                    <th>order</th>
                                                    <th>Visibilty</th>
                                                    <th>Show on Homepage</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           <tbody>
                                            @if(count($categories) > 0)
                                        @foreach ($categories as $item)
                                           <tr>
                                               
                                           <td><b>{{ $item->getParentsNames() }}</b></td>
                                            <td>{{$item->commission}}%</td>
                                            <td>{{$item->category_order}}</td>
                                            <td>
                                            @if ($item->visibility == 1)
                                            <div class="fonticon-wrap"> <div class="badge badge-success">&nbsp;&nbsp;<i class="fa fa-eye fa-x"></i>&nbsp;&nbsp;</div> </div>  
                                            @else
                                            <div class="fonticon-wrap"> <div class="badge badge-danger">&nbsp;&nbsp;<i class="fa fa-eye-slash"></i>&nbsp;&nbsp;</div> </div>    
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->show_on_homepage == 0)
                                            <div class="badge badge-danger"><strong>NO</strong></div>  
                                            @else
                                            <div class="badge badge-success"><strong>YES</strong></div> 
                                            @endif
                                        </td>
                                            <td> 
                                                <div class="btn-group dropdown mr-1 mb-1">
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                        <strong>Select an option</strong>
                                                    </button>
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{url('category-edit')}}/{{$item->id}}"><i class="fa fa-edit"></i>Edit</a>
                                                        <a class="dropdown-item" href="{{url('category-disable')}}/{{$item->id}}"><i class="fa fa-trash"></i>Delete</a>
                                                    </div>
                                                </div>
 
                                            </td>
                                        </tr>
                                        @endforeach
                                         @else  
                                         <tr colspan="7">
                                               
                                            <td>No Record found </td>
                                         </tr>
                                         @endif

                                           </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>                      
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" defer></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script> 
           
@endsection
  {{--  <script>
    $(document).ready(function(){
        $("#laratable").DataTable({
            serverSide: true,
            ajax: "{{ route('category.categories') }}",
            columns: [
                { name: 'name' },
                { name: 'slug' },
                { name: 'title' },
                { name: 'desc' },
                { name: 'keyword' },
                { name: 'order' },
                // { name: 'start_date' },
                // { name: 'salary' },
            ],
        });
    });

    
</script>  --}}