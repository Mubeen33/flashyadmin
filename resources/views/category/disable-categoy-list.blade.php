@extends('layouts.master')
@section('page-title','Disable Brands')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Disable Categories</li>
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
                                <h4 class="card-title">Categories List</h4>
                                <a href="{{url('add-category')}}"><button type="button" class="btn btn-primary" style="float:right;" ><i class="fa fa-plus">Add Category</i></button></a>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive ">
                                        <table  class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Keyword</th>
                                                    <th>order</th>
                                                    <th>Home order</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           <tbody>
                                            @if(count($categories) > 0)
                                        @foreach ($categories as $item)
                                           <tr>
                                               
                                           <td>{{$item->name}}</td>
                                            <td>{{$item->slug}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->desc}}</td>
                                            <td>{{$item->keyword}}</td>
                                            <td>{{$item->order}}</td>
                                            <td>{{$item->home_order}}</td>
                                            <td> <div class="btn-group dropdown mr-1 mb-1">
                                                <button type="button" class="btn btn-primary">Action</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{url('category-edit')}}/{{$item->id}}">Edit</a>
                                                <a class="dropdown-item" href="{{url('category-active')}}/{{$item->id}}">Active</a>
                                                </div>
                                            </div></td>
                                        </tr>
                                        @endforeach
                                        @else  
                                        <tr colspan="7">
                                              
                                           <td>No Record found </td>
                                        </tr>
                                        @endif
                                        
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