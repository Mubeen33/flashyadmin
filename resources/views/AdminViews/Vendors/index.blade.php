@extends('layouts.master')
@section('page-title','Vendors')
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
                            <div class="card-header">
                                <h4 class="card-title">Vendors List</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SR</th>
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
                                            <tbody>
                                                @foreach($data as $key=>$content)
                                                    <tr>
                                                        <th scope="row">{{ $key+1 }}</th>
                                                        <td>{{ $content->first_name }}</td>                                          
                                                        <td>{{ $content->last_name }}</td>
                                                        <td>{{ $content->email }}</td>
                                                        <td>{{ $content->mobile }}</td>
                                                        <td>{{ $content->company_name }}</td>
                                                        <td>{{ $content->created_at->format('d/m/Y') }}</td>
                                                        <td>
                                                            @if($content->active == 0)
                                                                <div class="badge badge-danger">Pending</div>
                                                                @else
                                                                <div class="badge badge-success">Approved</div>
                                                            @endif    
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.vendors.show', $content->id) }}"><i class="feather icon-eye"></i></a>
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