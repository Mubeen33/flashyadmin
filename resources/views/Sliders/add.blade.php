@extends('layouts.master')
@section('page-title','Vendors')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Slider Create</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New Slider</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" placeholder="Description" rows="5" cols="10">{{ old('description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" name="link" placeholder="Link" class="form-control" value="{{ old('link') }}">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Order</label>
                                                    <input type="number" name="order_no" placeholder="Order" class="form-control" value="{{ old('order_no') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Text</label>
                                                    <input type="text" name="button_text" placeholder="Button Text" class="form-control" value="{{ old('button_text') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Text Color</label>
                                                    <input type="color" name="text_color" placeholder="Text Color" class="form-control" value="{{ old('text_color') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Color</label>
                                                    <input type="color" name="button_color" placeholder="Button Color" class="form-control" value="{{ old('button_color') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Text Color</label>
                                                    <input type="color" name="button_text_color" placeholder="Button Text Color" class="form-control" value="{{ old('button_text_color') }}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div>
                                                <label>Animations</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <select class="form-control" name="title_animation">
                                                            <option value="fadeInUp">fadeInUp</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <select class="form-control" name="description_animation">
                                                            <option value="fadeInUp">fadeInUp</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <label>Button</label>
                                                        <select class="form-control" name="button_animation">
                                                            <option value="fadeInUp">fadeInUp</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <label>Image (Size: 1230 * 445)</label>
                                                    <input type="file" id="image_lg_input" name="image_lg" class="d-none" accept="image/*" required="1">
                                                    <br>
                                                    <button class="btn btn-success" type="button" 
                                                        onclick="document.getElementById('image_lg_input').click()" 
                                                    >Image</button>
                                                </div>

                                                <div class="col-lg-6 col-md-12">
                                                    <label>Image for mobile (Size: 600 * 300)</label>
                                                    <input type="file" id="image_sm_input" name="image_sm" class="d-none" accept="image/*" required="1">
                                                    <br>
                                                    <button class="btn btn-success" type="button" 
                                                        onclick="document.getElementById('image_sm_input').click()" 
                                                    >Image</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <input type="date" name="start_time" required="1" class="form-control" value="{{ old('start_time') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <input type="date" name="end_time" required="1" class="form-control" value="{{ old('end_time') }}">    
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12"></div>
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