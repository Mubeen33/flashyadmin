@extends('layouts.master')
@section('page-title','Brands')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Table</li>
@endsection    

    
@section('content') 
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">                               
            <div class="content-body">
                @if(session('msg'))
                  {!! session('msg') !!}
                @endif
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Brands List</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive ">
                                        <table id="basic-laratable" class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <!-- <th>id</th> -->
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                  <!--   <th>Status</th>
                                                    <th>Actions</th> -->
                                                </tr>
                                            </thead>
                                           
                                        </table>
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
   <script>
    $(document).ready(function(){
        $("#basic-laratable").DataTable({
            serverSide: true,
            ajax: "{{ route('brands.brands') }}",
            columns: [
                { name: 'name' },
                { name: 'description' },
                // { name: 'start_date' },
                // { name: 'salary' },
            ],
        });
    });
</script>             
@endsection
 