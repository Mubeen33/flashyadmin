@extends('layouts.master')
@section('page-title','Categories')

@push('styles')
<style type="text/css">
    #searchKey__,
    #selected_row_per_page{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Categories</li>
@endsection    

    
@section('content') 
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">                               
            <div class="content-body">
                @if(session('msg'))
                  {!! session('msg') !!}
                @endif
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div class="d-flex">
                                    <h4 class="card-title mr-1">Categories List</h4>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.addCategory.get')}}"><i class="fa fa-plus">Add Category</i></a>
                                </div>
                                <div>
                                    <input type="text" id="searchKey__" placeholder="Search">
                                    <select id="selected_row_per_page" title="Display row per page">
                                        <option value="5" selected="1">Show 5</option>
                                        <option value="10">Show 10</option>
                                        <option value="15">Show 15</option>
                                        <option value="20">Show 20</option>
                                        <option value="25">Show 25</option>
                                        <option value="30">Show 30</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <div class="table-responsive ">
                                        <table  class="table table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th class="sortAble" sorting-column='id' sorting-order='DESC'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg> ID</th>
                                                    <th class="sortAble" sorting-column='name' sorting-order=''>Name</th>
                                                    <th>Image</th>
                                                    <th class="sortAble" sorting-column='commission' sorting-order=''>Commission</th>
                                                    <th class="sortAble" sorting-column='category_order' sorting-order=''>order</th>
                                                    <th>Visibilty</th>
                                                    <th>Show on Homepage</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           <tbody id="render__data">
                                            
                                            @include('Category.partials.category-list')

                                           </tbody>

                                        </table>
                                        <input type="hidden" id="hidden__action_url" value="{{ route('admin.categories.ajaxPgination') }}">
                                        <input type="hidden" id="hidden__page_number" value="1">
                                        <input type="hidden" id="hidden__sort_by" value="id">
                                        <input type="hidden" id="hidden__sorting_order" value="DESC">
                                        <input type="hidden" id="hidden__status" value="0">
                                        <input type="hidden" id="hidden__id" value="">
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
            ajax: "{{ route('admin.category.categories') }}",
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


@push('scripts')
<script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
@endpush