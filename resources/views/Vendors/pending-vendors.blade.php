@extends('layouts.master')
@section('page-title','Vendors')

@push('styles')
<style type="text/css">
    #searchKey__,
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

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Vendors</li>
@endsection
@section('content')
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div><h4 class="card-title">Vendors List</h4></div>
                                <div>
                                    <select class="hidden" id="selected_row_status" title="Display row per page">
                                        <option  value="1">Approved</option>
                                        <option selected value="0">Unapproved</option>
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
                                        <table  class="table table-striped table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="sortAble" sorting-column='id' sorting-order='DESC'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg> ID</th>
                                                    <th class="sortAble" sorting-column='first_name' sorting-order=''>First Name</th>
                                                    <th class="sortAble" sorting-column='last_name' sorting-order=''>Last Name</th>
                                                    <th class="sortAble" sorting-column='email' sorting-order=''>Email</th>
                                                    <th class="sortAble" sorting-column='mobile' sorting-order=''>Mobile</th>
                                                    <th>Company Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody id="render__data">
                                                @include('Vendors.partials.vendors-pending-list')
                                            </tbody>

                                        </table>
                                        <input type="hidden" id="hidden__action_url" value="{{ route('admin.vendors.ajaxPgination') }}">
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
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
@endpush
