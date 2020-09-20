@extends('layouts.master')
@section('page-title','Custom Fields List')
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
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Warranty</th>
                                                    <th>Category Name</th>
                                                    {{--<th>Status</th> --}}
                                                    {{-- <th>Actions</th> --}}
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