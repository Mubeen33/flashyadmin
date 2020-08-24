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
                                                    <th id="sortByID"><span id="sortByID_span" sorting-order='DESC'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg></span> Id</th>
                                                    <th id="sortByFirstName"><span id="sortByFirstName_span" sorting-order=''></span> First Name</th>
                                                    <th id="sortByLastName"><span id="sortByLastName_span" sorting-order=''></span> Last Name</th>
                                                    <th id="sortByEmail"><span id="sortByEmail_span" sorting-order=''></span> Email</th>
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
                                        <input type="hidden" id="hidden__page_number" value="1">
                                        <input type="hidden" id="hidden__sort_by" value="id">
                                        <input type="hidden" id="hidden__sorting_order" value="DESC">
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
            $("#hidden__page_number").val(pageNumber)
            let sort_by = $("#hidden__sort_by").val()
            let sorting_order = $("#hidden__sorting_order").val()
            fetch_data(pageNumber, searchKey, sort_by, sorting_order);
        })
        //live search with pagination
        $(document).on("keyup", "#searchVendors", function(){
            let searchKey = ($(this).val())
            let pageNumber = 1;
            let sort_by = $("#hidden__sort_by").val()
            let sorting_order = $("#hidden__sorting_order").val()
            fetch_data(pageNumber, searchKey, sort_by, sorting_order);
        })
    })


    //fetch data
    function fetch_data(pageNumber, searchKey, sortBy, sortingOrder){
        $.ajax({
            url:"/ajax-pagination/fetch?page="+pageNumber+"&search_key="+searchKey+"&sort_by="+sortBy+"&sorting_order="+sortingOrder,
            method:'GET',
            cache:false,
            success:function(response){
                $("#render__data").html(response)
            }
        })
    }



    //sorting management
    $(document).on('click','#sortByID', function(){
        $("#sortByFirstName_span").html('')
        $("#sortByLastName_span").html('')
        $("#sortByEmail_span").html('')

        $("#sortByFirstName_span").attr('sorting-order', '')
        $("#sortByLastName_span").attr('sorting-order', '')
        $("#sortByEmail_span").attr('sorting-order', '')

        let setSortingOrder = "";
        let sort_order = $("#sortByID_span").attr('sorting-order')
        if (sort_order == '') {
            setSortingOrder = 'DESC';
            $("#sortByID_span").attr('sorting-order', 'DESC')
            $("#sortByID_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg>')
        }else if (sort_order == "DESC") {
            setSortingOrder = 'ASC';
            $("#sortByID_span").attr('sorting-order', 'ASC')
            $("#sortByID_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M4.646 9.646a.5.5 0 0 1 .708 0L8 12.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/> <path fill-rule="evenodd" d="M8 2.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V3a.5.5 0 0 1 .5-.5z"/> </svg>')
        }else {
            setSortingOrder = 'DESC';
            $("#sortByID_span").attr('sorting-order', 'DESC')
            $("#sortByID_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg>') 
        }
        //call data
        $("#hidden__sort_by").val('id')
        $("#hidden__sorting_order").val(setSortingOrder)
        let searchKey = $("#searchVendors").val()
        let pageNumber = $("#hidden__page_number").val()
        fetch_data(pageNumber, searchKey, 'id', setSortingOrder)
    })

    $(document).on('click','#sortByFirstName', function(){
        $("#sortByID_span").html('')
        $("#sortByLastName_span").html('')
        $("#sortByEmail_span").html('')

        $("#sortByID_span").attr('sorting-order', '')
        $("#sortByLastName_span").attr('sorting-order', '')
        $("#sortByEmail_span").attr('sorting-order', '')

        let setSortingOrder = "";
        let sort_order = $("#sortByFirstName_span").attr('sorting-order')
        if (sort_order == '') {
            setSortingOrder = 'DESC';
            $("#sortByFirstName_span").attr('sorting-order', 'DESC')
            $("#sortByFirstName_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg>')
        }else if (sort_order == "DESC") {
            setSortingOrder = 'ASC';
            $("#sortByFirstName_span").attr('sorting-order', 'ASC')
            $("#sortByFirstName_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M4.646 9.646a.5.5 0 0 1 .708 0L8 12.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/> <path fill-rule="evenodd" d="M8 2.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V3a.5.5 0 0 1 .5-.5z"/> </svg>')
        }else {
            setSortingOrder = 'DESC';
            $("#sortByFirstName_span").attr('sorting-order', 'DESC')
            $("#sortByFirstName_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg>') 
        }
        //call data
        $("#hidden__sort_by").val('first_name')
        $("#hidden__sorting_order").val(setSortingOrder)
        let searchKey = $("#searchVendors").val()
        let pageNumber = $("#hidden__page_number").val()
        fetch_data(pageNumber, searchKey, 'first_name', setSortingOrder)
    })

    $(document).on('click','#sortByLastName', function(){
        $("#sortByID_span").html('')
        $("#sortByFirstName_span").html('')
        $("#sortByEmail_span").html('')

        $("#sortByID_span").attr('sorting-order', '')
        $("#sortByFirstName_span").attr('sorting-order', '')
        $("#sortByEmail_span").attr('sorting-order', '')

        let setSortingOrder = "";
        let sort_order = $("#sortByLastName_span").attr('sorting-order')
        if (sort_order == '') {
            setSortingOrder = 'DESC';
            $("#sortByLastName_span").attr('sorting-order', 'DESC')
            $("#sortByLastName_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg>')
        }else if (sort_order == "DESC") {
            setSortingOrder = 'ASC';
            $("#sortByLastName_span").attr('sorting-order', 'ASC')
            $("#sortByLastName_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M4.646 9.646a.5.5 0 0 1 .708 0L8 12.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/> <path fill-rule="evenodd" d="M8 2.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V3a.5.5 0 0 1 .5-.5z"/> </svg>')
        }else {
            setSortingOrder = 'DESC';
            $("#sortByLastName_span").attr('sorting-order', 'DESC')
            $("#sortByLastName_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg>') 
        }
        //call data
        $("#hidden__sort_by").val('last_name')
        $("#hidden__sorting_order").val(setSortingOrder)
        let searchKey = $("#searchVendors").val()
        let pageNumber = $("#hidden__page_number").val()
        fetch_data(pageNumber, searchKey, 'last_name', setSortingOrder)
    })

    $(document).on('click','#sortByEmail', function(){
        $("#sortByID_span").html('')
        $("#sortByFirstName_span").html('')
        $("#sortByLastName_span").html('')

        $("#sortByID_span").attr('sorting-order', '')
        $("#sortByFirstName_span").attr('sorting-order', '')
        $("#sortByLastName_span").attr('sorting-order', '')

        let setSortingOrder = "";
        let sort_order = $("#sortByEmail_span").attr('sorting-order')
        if (sort_order == '') {
            setSortingOrder = 'DESC';
            $("#sortByEmail_span").attr('sorting-order', 'DESC')
            $("#sortByEmail_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg>')
        }else if (sort_order == "DESC") {
            setSortingOrder = 'ASC';
            $("#sortByEmail_span").attr('sorting-order', 'ASC')
            $("#sortByEmail_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M4.646 9.646a.5.5 0 0 1 .708 0L8 12.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/> <path fill-rule="evenodd" d="M8 2.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V3a.5.5 0 0 1 .5-.5z"/> </svg>')
        }else {
            setSortingOrder = 'DESC';
            $("#sortByEmail_span").attr('sorting-order', 'DESC')
            $("#sortByEmail_span").html('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg>') 
        }
        //call data
        $("#hidden__sort_by").val('email')
        $("#hidden__sorting_order").val(setSortingOrder)
        let searchKey = $("#searchVendors").val()
        let pageNumber = $("#hidden__page_number").val()
        fetch_data(pageNumber, searchKey, 'email', setSortingOrder)
    })
</script>
@endpush