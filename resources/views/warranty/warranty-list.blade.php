@extends('layouts.master')
@section('page-title','Warranty List')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Warranty List</li>
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
                                <h4 class="card-title">Warranty List<a class="btn btn-warning btn-sm" href="{{route('admin.addProductsWarranty.get')}}">Add new</a></h4>
                                
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table  class="table table-striped table-hover mb-0">                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Warranty</th>
                                                    <th>Category Name</th>
                                                    {{--<th>Status</th> --}}
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($productWarranty) > 0)
                                                    @foreach($productWarranty as $key => $productWarranty)
                                                       <tr>
                                                           <td>{{$key+1}}</td>
                                                           <td>
                                                               {{$productWarranty->warranty}}
                                                           </td>
                                                           <td>
                                                               @php
                                                                    $categoryName = \App\Category::where('id',$productWarranty->category_id)->value('name');
                                                                @endphp
                                                                {{ $categoryName }}
                                                           </td>
                                                           <td>
                                                               <div class="btn-group mb-1">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Actions
                                                                        </button>
                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                                                            <a class="dropdown-item" href="{{ route('admin.warranty.edit.get', Crypt::encrypt($productWarranty->id)) }}">Edit</a>
                                                                            <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="{{ route('admin.warranty.delete', Crypt::encrypt($productWarranty->id)) }}">Delete</a>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection