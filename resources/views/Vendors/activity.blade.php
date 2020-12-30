@extends('layouts.master')
@section('page-title','Vendor Activity')
@push('styles')
<style type="text/css">
    .vendors-activity-details p{
        margin: 0;
        font-size: 12px
    }
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
    <li class="breadcrumb-item active">Vendor Activity</li>
@endsection
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div><h4 class="card-title">Activities of <b>{{ $vendor->first_name }} {{ $vendor->last_name }}</h4></div>
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

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                      <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"
                                            onclick="securityClicked()">Security</a>
                                      </li>
                                      <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"
                                            onclick="othersClicked()">Others</a>
                                      </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                          <div class="table-responsive">
                                            <table  class="table table-striped table-hover mb-0">                                                    <thead>
                                                        <tr>
                                                            <th class="sortAble" sorting-column='id' sorting-order='DESC'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg> ID</th>
                                                            <th class="sortAble" sorting-column='created_at' sorting-order=''>Time</th>
                                                            <th>Access Via</th>
                                                            <th>IP</th>
                                                            <th>Location</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="login_render" id="render__data">
                                                        @include('Vendors.partials.vendor-login-activity-list')
                                                    </tbody>
                                                </table>

                                          </div>
                                      </div>
                                      
                                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                          <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="sortAble" sorting-column='id' sorting-order='DESC'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg> ID</th>
                                                        <th>Activity</th>
                                                        <th>Details</th>
                                                        <th class="sortAble" sorting-column='created_at' sorting-order=''>Activity Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="others_render">
                                                    @include('Vendors.partials.vendor-other-activity-list')
                                                </tbody>
                                            </table>

                                        </div>

                                      </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <input type="hidden" id="hidden__action_url" value="{{ route('admin.signleVendorActivity.ajaxPgination') }}">
            <input type="hidden" id="hidden__page_number" value="1">
            <input type="hidden" id="hidden__sort_by" value="id">
            <input type="hidden" id="hidden__sorting_order" value="DESC">
            <input type="hidden" id="hidden__status" value="Login">
            <input type="hidden" id="hidden__id" value="{{$vendor->id}}">
@endsection


@push('scripts')
<script type="text/javascript">
    function othersClicked(){
        $("#hidden__status").val('Others')
        $('.login_render').removeAttr('id');
        $('.others_render').attr('id', 'render__data');
    }

    function securityClicked(){
        $("#hidden__status").val('Login')
        $('.login_render').attr('id', 'render__data');
        $('.others_render').removeAttr('id');
    }
</script>
<script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
@endpush