@extends('layouts.master')
@section('page-title','Vendors')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">@if(Request::is('banners/create')) {{ 'Banner' }} @else {{ 'Ads Banner' }} @endif Create</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New @if(Request::is('banners/create')) {{ 'Banner' }} @else {{ 'Ads Banner' }} @endif</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="type" value="@if($pageTitle === 'Banner'){{'Banner'}}@elseif($pageTitle === 'Ads-Banner'){{'Ads-Banner'}}@else{{'Invalid'}}@endif">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>link</label>
                                            <input type="url" name="link" placeholder="Link" value="{{ old('link') }}" class="form-control">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Order</label>
                                                    <input type="number" name="order_no" placeholder="Order" class="form-control" value="{{ old('order_no') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Start Time</label>
                                                    <input type="date" name="start_time" required="1" class="form-control" value="{{ old('start_time') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>End Time</label>
                                                    <input type="date" name="end_time" required="1" class="form-control" value="{{ old('end_time') }}">    
                                                </div>
                                            </div>
                                        </div>

                                        @if($pageTitle === 'Ads-Banner')
                                        <div class="form-group">
                                            <label>Choose Position</label>
                                            <select name="ads_banner_position" class="form-control">
                                                <option value="">Choose One</option>
                                                <option value="Banner-Groups">Banner Groups (Size: 530 * 285)</option>
                                                <option value="Banner-Long">Banner Long (Size: 1090 * 245)</option>
                                                <option value="Banner-Short">Banner Short (Size: 530 * 245)</option>
                                                <option value="Banner-Box">Banner Box (Size: 487 * 379)</option>
                                            </select>
                                        </div>
                                        @else
                                        <input type="hidden" name="ads_banner_position" value="">
                                        @endif
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <label>Image (Size: width 390 & height 193)</label>
                                                    <input type="file" id="image_lg_input" name="image_lg" class="d-none" accept="image/*">
                                                    <br>
                                                    <button class="btn btn-success" type="button" 
                                                        onclick="document.getElementById('image_lg_input').click()" 
                                                    >Image</button>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Add</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection