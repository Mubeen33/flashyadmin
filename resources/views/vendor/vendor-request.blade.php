@extends('layouts.master')
@section('page-title','Vendor Request')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item active">Table</li>
@endsection    
@section('content')                                
            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Vendor Request</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Mobile</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($vendorRequest as $vendor)
                                                    <tr>
                                                        <th scope="row">{{$vendor->id}}</th>
                                                        <td>{{$vendor->first_name}} {{ $vendor->last_name }}</td>
                                                        <td>{{$vendor->email}}</td>
                                                        <td>{{$vendor->phone}}</td>
                                                        <td>{{$vendor->mobile}}</td>
                                                        <td>
                                                            @if($vendor->active==0)
                                                                <div class="badge badge-danger">Pending</div>
                                                            @endif    
                                                        </td>
                                                        <td>
                                                            <a href="{{url('vendor-approve', encrypt($vendor->id))}}"><i class="feather icon-check"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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