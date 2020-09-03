@extends('layouts.master')
@section('page-title',"Popup's")

@push('styles')
<style type="text/css">
    #searchKey__{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Popup's</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div><h4 class="card-title">Popup List</h4></div>
                                <div>
                                    <input type="text" name="searchKey__" id="searchKey__" placeholder="Search">
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> ID</th>
                                                    <th class="sortAble" sorting-column='title' sorting-order=''>Name</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Button Text</th>
                                                    <th>POPUP BG</th>
                                                    <th class="sortAble" sorting-column='start_time' sorting-order=''>Start Time</th>
                                                    <th class="sortAble" sorting-column='end_time' sorting-order=''>End Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="render__data">
                                                @include('Popup.partials.popup-list')
                                            </tbody>
                                        </table>

                                        <input type="hidden" id="hidden__action_url" value="/sliders-ajax-pagination/fetch">
                                        <input type="hidden" id="hidden__page_number" value="1">
                                        <input type="hidden" id="hidden__sort_by" value="id">
                                        <input type="hidden" id="hidden__sorting_order" value="DESC">
                                        <input type="hidden" id="hidden__status" value="">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
