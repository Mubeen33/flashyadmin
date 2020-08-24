@extends('layouts.master')
@section('page-title','Brands')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Brands</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @if(session('msg'))
                  {!! session('msg') !!}
                @endif
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="row">
                            <div class="col offset-10">
                                <button class="btn btn-primary"><a href="{{Route('brands.addbrand')}}" style="text-decoration: none;color: #fff">Add new</a></button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Brands List</h4>
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
                                                            @if($brand->active=='Y')
                                                                <div class="badge badge-success">Active</div>
                                                            @endif    
                                                        </td>
                                                        <td>
                                                            
                                                            <div class="btn-group mb-1">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Actions
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                                                        <a class="dropdown-item" href="{{url('brand-edit', encrypt($brand->id))}}">Edit</a>
                                                                        <a class="dropdown-item" href="{{url('brand-disable', encrypt($brand->id))}}">Disable</a>
                                                                    </div>
                                                                </div>
                                                            </div>
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