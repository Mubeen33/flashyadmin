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
                                <button class="btn btn-primary"><a href="{{Route('variations.addvariation')}}" style="text-decoration: none;color: #fff">Add new</a></button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Variations List</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Category Name</th>
                                                    <th>Image Approval</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($variations) > 0)
                                                    @foreach($variations as $key => $variation)
                                                        <tr>
                                                            <th scope="row">{{$key+1}}</th>
                                                            <td>{{$variation->variation_name}}</td>
                                                            <td>
                                                                @php
                                                                     $categoryName = \App\Category::where('id',$variation->category_id)->value('name');
                                                                @endphp
                                                                {{ $categoryName }}
                                                            </td>
                                                            <td>
                                                                @if($variation->image_approval==1)
                                                                    <div class="badge badge-primary">Yes</div>
                                                                @else
                                                                    <div class="badge badge-dark">No</div>
                                                                @endif    
                                                            </td>
                                                            <td>
                                                                @if($variation->active==1)
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
                                                                        <a class="dropdown-item" href="{{url('variation-edit', encrypt($variation->id))}}">Edit</a>
                                                                        <a class="dropdown-item" href="{{url('variation-disable', encrypt($variation->id))}}">Disable</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="5" style="text-align: center"><b>NO RESULT FOUND</b></td>
                                                    </tr>
                                                @endif    
                                            </tbody>
                                        </table>
                                        {{ $variations->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection