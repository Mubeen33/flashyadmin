@extends('layouts.master')
@section('page-title','Variations')
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
    <li class="breadcrumb-item active">Variations</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @if(session('msg'))
                  {!! session('msg') !!}
                @endif
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex">
                                    <h4 class="card-title mr-1">Variatons List</h4>
                                    <a class="btn btn-primary btn-sm" href="{{Route('variations.addvariation')}}">Add new</a>
                                </div>
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
                                                    <th class="sortAble" sorting-column='id' sorting-order='DESC'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg> ID</th>
                                                    <th class="sortAble" sorting-column='variation_name' sorting-order=''>Name</th>
                                                    <th>Category Name</th>
                                                    <th>Image Approval</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="render__data">

                                                @include('variation.partials.variations-list')

                                            </tbody>
                                        </table>
                                        <input type="hidden" id="hidden__action_url" value="/variations-ajax-pagination/fetch">
                                        <input type="hidden" id="hidden__page_number" value="1">
                                        <input type="hidden" id="hidden__sort_by" value="id">
                                        <input type="hidden" id="hidden__sorting_order" value="DESC">
                                        <input type="hidden" id="hidden__status" value="1">
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