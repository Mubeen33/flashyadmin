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
                                <h4 class="card-title">Categories List</h4>
                                <a href="{{url('add-category')}}"><button type="button" class="btn btn-primary" style="float:right;" ><i class="fa fa-plus">Add Category</i></button></a>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive ">
                                        <table  class="table table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Keyword</th>
                                                    <th>order</th>
                                                    <th>Visibilty</th>
                                                    <th>Show on Homepage</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           <tbody>
                                            @if(count($categories) > 0)
                                        @foreach ($categories as $item)
                                           <tr>
                                               
                                           <td>{{$item->name}}</td>
                                            <td>{{$item->slug}}</td>
                                            <td>{{$item->title_meta_tag}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->keywords}}</td>
                                            <td>{{$item->category_order}}</td>
                                            <td>
                                            @if ($item->visiblity == 1)
                                            <div class="fonticon-wrap"> <div class="badge badge-success"><i class="fa fa-eye fa-x"></i></div> </div>  
                                            @else
                                            <div class="fonticon-wrap"> <div class="badge badge-danger"><i class="fa fa-eye-slash"></i></div> </div>    
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->home_visiblity == 0)
                                            <div class="badge badge-danger"><strong>No</strong></div>  
                                            @else
                                            <div class="badge badge-success"><strong>Yes</strong></div> 
                                            @endif
                                        </td>
                                            <td> 
                                                <a href="{{url('category-active')}}/{{$item->id}}"><i class="feather icon-check"></i></a>
                                            </td>
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
 