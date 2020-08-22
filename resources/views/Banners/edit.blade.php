@extends('layouts.master')
@section('page-title','Banners')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">{{ $data->type }}</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit {{ $data->type }}</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{ route('admin.banners.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="type" value="{{$data->type }}">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $data->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label>link</label>
                                            <input type="url" name="link" placeholder="Link" value="{{ $data->link }}" class="form-control">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Order</label>
                                                    <input type="number" name="order_no" placeholder="Order" class="form-control" value="{{ $data->order_no }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Start Time</label>
                                                    <input type="date" name="start_time" required="1" class="form-control" value="{{ $data->start_time }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>End Time</label>
                                                    <input type="date" name="end_time" required="1" class="form-control" value="{{ $data->end_time }}">    
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <label>Image (Size: @if($data->type == "Banner") {{ '390*193' }} @elseif($data->type == "Ads-Banner") {{ '530*285' }} @else {{'Invalid Access'}} @endif)</label>
                                                    <input type="file" id="image_lg_input" name="image_lg" class="d-none" accept="image/*">
                                                    <br>
                                                    <button class="btn btn-success" type="button" 
                                                        onclick="document.getElementById('image_lg_input').click()" 
                                                    >Image</button>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <label>Current Image</label>
                                                    <br>
                                                    <img src="{{ $data->image_lg }}" width="150px" height="120px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection