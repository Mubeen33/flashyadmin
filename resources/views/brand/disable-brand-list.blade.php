@extends('layouts.master')
@section('page-title','Disable Brands')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Table</li>
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
                                <h4 class="card-title">Disable Brands List</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($brands as $brand)
                                                    <tr>
                                                        <th scope="row">{{$brand->id}}</th>
                                                        <td>{{$brand->name}}</td>                                          
                                                        <td>{{$brand->description}}</td>
                                                        <td>
                                                            @if($brand->active=='N')
                                                                <div class="badge badge-danger">Disable</div>
                                                            @endif    
                                                        </td>
                                                        <td>
                                                            <a href="{{url('brand-active', encrypt($brand->id))}}"><i class="feather icon-check"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $brands->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection