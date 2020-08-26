@extends('layouts.master')
@section('page-title','Vendors')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">{{ $pageTitle }}</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $pageTitle }} List</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SN.</th>
                                                    <th>Title</th>
                                                    <th>Link</th>
                                                    <th>Order No.</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Image</th>
                                                    @if($pageTitle === "Ads-Banners")
                                                    <th>Position</th>
                                                    @endif
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key=>$content)
                                                    <tr>
                                                        <th scope="row">{{ $key+1 }}</th>
                                                        <td>{{ $content->title }}</td>                                          
                                                        <td>{{ $content->link }}</td>
                                                        <td>{{ $content->order_no }}</td>
                                                        <td>{{ $content->start_time }}</td>
                                                        <td>{{ $content->end_time }}</td>
                                                        <td><img width="50px" height="50px" src="{{ $content->image_lg }}"></td>
                                                        
                                                        @if($pageTitle === "Ads-Banners")
                                                            <td>{{ $content->ads_banner_position }}</td>
                                                        @endif
                                                        <td>
                                                            <div class="btn-group mb-1">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Actions
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                                                        <a class="dropdown-item" href="{{ route('admin.banners.edit', Crypt::encrypt($content->id)) }}">Edit</a>
                                                                        <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="{{ route('admin.banner.delete', Crypt::encrypt($content->id)) }}">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {!! $data->render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection