@extends('layouts.master')
@section('page-title','Product Vendors')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Product Vendors</li>
@endsection 

@push('styles')
<style type="text/css">
    .searchKey__,
    #selected_row_per_page{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
    }
    .table th, .table td{
        text-align: left !important;
    }
</style>
@endpush

@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    
                    @include('product.partials.product_vendors.row_1')

                    @if($variationID !== NULL)
                        @include('product.partials.product_vendors.row_2_for_variants')
                        @else
                        @include('product.partials.product_vendors.row_2')
                    @endif

                    @include('product.partials.product_vendors.row_3')
                    @include('product.partials.product_vendors.row_4')


                </div>
            </div>

            <input type="hidden" id="searchProductVendorsURL" value="{{ route('admin.searchProductVendorsURL.ajaxPgination') }}">
            <input type="hidden" id="searchVendorAssignURL" value="{{ route('admin.searchVendorsAssignURL.ajaxPgination') }}">
            
            <input type="hidden" id="hidden__action_url" value="{{route('admin.searchProductVendorsURL.ajaxPgination')}}">
            <input type="hidden" id="hidden__page_number" value="1">
            <input type="hidden" id="hidden__sort_by" value="id">
            <input type="hidden" id="hidden__sorting_order" value="DESC">
            <input type="hidden" id="hidden__status" value="">
            <input type="hidden" id="hidden__id" value="">
@endsection


@push('scripts')

<script type="text/javascript">
    function setSearchURLandRenderID(type){
        if (type === "searchProductVendors") {
            $("#productVendorsTBL tbody").attr('id', 'render__data')
            $("#productVendorAssignTBL tbody").removeAttr('id')

            $("#hidden__action_url").val($("#searchProductVendorsURL").val())
        }else if (type === "searchVendorToAssign") {
            $("#productVendorsTBL tbody").removeAttr('id')
            $("#productVendorAssignTBL tbody").attr('id', 'render__data')

            $("#hidden__action_url").val($("#searchVendorAssignURL").val())
        }else{
            alert("Invalid Search Option")
        }
    }
</script>
<script type="text/javascript" src="{{ asset('js/ajax-pagination-type-2.js') }}"></script>
@endpush