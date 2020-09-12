@extends('layouts.master')
@section('page-title','Brands')
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
    <li class="breadcrumb-item active">Brands</li>
@endsection    
@section('content')
        @include('msg.msg') 
                                   
            <div class="content-body">
                @if(session('msg'))
                  {!! session('msg') !!}
                @endif
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div class="d-flex">
                                    <h4 class="card-title mr-1">Brands List</h4> 
                                    <a class="btn btn-success btn-sm" href="{{Route('admin.brands.addbrand')}}">Add new</a>
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
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="sortAble" sorting-column='id' sorting-order='DESC'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg> ID</th>
                                                    <th class="sortAble" sorting-column='name' sorting-order=''>Name</th>
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="render__data">

                                                @include('brand.partials.brand-list')

                                            </tbody>
                                        </table>
                                        <input type="hidden" id="hidden__action_url" value="{{ route('admin.brands.ajaxPgination') }}">
                                        <input type="hidden" id="hidden__page_number" value="1">
                                        <input type="hidden" id="hidden__sort_by" value="id">
                                        <input type="hidden" id="hidden__sorting_order" value="DESC">
                                        <input type="hidden" id="hidden__status" value="Y">
                                        <input type="hidden" id="hidden__id" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
@endpush