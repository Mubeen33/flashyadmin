@extends('layouts.master')
@section('page-title','Products')

@push('styles')
<style type="text/css">
    #searchKey__,
    #selected_row_per_page,
    #hidden__id,
    #hidden__status{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Vendors Products</li>
@endsection 
@section('content')

            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div><h4 class="card-title">Pending Products</h4></div>
                                <div>
                                    <select id="hidden__id" title="Select Vendor">
                                        <option value="">Select Vendor</option>
                                        @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->first_name." ".$vendor->last_name }}</option>
                                        @endforeach
                                    </select>
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
                                        <table  class="table table-striped table-hover mb-0">                                            <thead>
                                                <tr>
                                                    <th class="sortAble" sorting-column='id' sorting-order='DESC'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg> 
                                                        ID
                                                    </th>
                                                    <th>Vendor</th>
                                                    <th class="sortAble" sorting-column='title' sorting-order=''>
                                                        Title
                                                    </th>
                                                    <th>Category</th>
                                                    <th>Image</th>
                                                    <th class="sortAble" sorting-column='product_type' sorting-order=''>
                                                        Product Type
                                                    </th>
                                                    <th class="sortAble" sorting-column='created_at' sorting-order=''>
                                                        Date
                                                    </th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody id="render__data">
                                                @include('product.partials.pending-product-list')
                                            </tbody>
                                            
                                        </table>
                                        <input type="hidden" id="hidden__action_url" value="{{ route('admin.pendingProducts.ajaxPgination') }}">
                                        <input type="hidden" id="hidden__page_number" value="1">
                                        <input type="hidden" id="hidden__sort_by" value="id">
                                        <input type="hidden" id="hidden__sorting_order" value="DESC">
                                        <input type="hidden" id="hidden__status" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')

<script type="text/javascript">
    $(document).on('change', '#hidden__id', function(e){
        e.preventDefault()
        let action_url = $("#hidden__action_url").val()
        let pageNumber = 1;
        let searchKey = $("#searchKey__").val()
        $("#hidden__page_number").val(pageNumber)
        let sort_by = $("#hidden__sort_by").val()
        let sorting_order = $("#hidden__sorting_order").val()
        let hidden__status = $("#hidden__status").val()
        let row_per_page = $("#selected_row_per_page").val()
        let hidden__id = $("#hidden__id").val()
        fetch_paginate_data(action_url, pageNumber, searchKey, sort_by, sorting_order, hidden__status, row_per_page, hidden__id);
    })

    $(document).on('change', '#hidden__status', function(e){
        e.preventDefault()
        let action_url = $("#hidden__action_url").val()
        let pageNumber = 1;
        let searchKey = $("#searchKey__").val()
        $("#hidden__page_number").val(pageNumber)
        let sort_by = $("#hidden__sort_by").val()
        let sorting_order = $("#hidden__sorting_order").val()
        let hidden__status = $("#hidden__status").val()
        let row_per_page = $("#selected_row_per_page").val()
        let hidden__id = $("#hidden__id").val()
        fetch_paginate_data(action_url, pageNumber, searchKey, sort_by, sorting_order, hidden__status, row_per_page, hidden__id);
    })
</script>

<script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
@endpush