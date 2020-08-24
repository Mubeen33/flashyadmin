@extends('layouts.master')
@section('page-title','Vendors')

@push('styles')
<style type="text/css">
    #searchVendors{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
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
                                    <input type="text" name="searchVendors" id="searchVendors">
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SN.</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Company Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody id="render__data">
                                                @include('Vendors.partials.vendors-list')
                                            </tbody>
                                            
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scritps')
<script type="text/javascript">
    $(document).ready(function(){
        //pagination only
        $(document).on('click', '.pagination li a', function(e){
            e.preventDefault()
            let pageNumber = ($(this).attr('href')).split('page=')[1]
            let searchKey = $("#searchVendors").val()
            fetch_data(pageNumber, searchKey);
        })
        //live search with pagination
        $(document).on("keyup", "#searchVendors", function(){
            let searchKey = ($(this).val())
            let pageNumber = 1;
            fetch_data(pageNumber, searchKey);
        })
    })

    //fetch data
    function fetch_data(pageNumber, searchKey){
        $.ajax({
            url:"/ajax-pagination/fetch?page="+pageNumber+"&search_key="+searchKey,
            method:'GET',
            cache:false,
            success:function(response){
                $("#render__data").html(response)
            }
        })
    }
</script>
@endpush