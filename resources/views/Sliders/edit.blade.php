@extends('layouts.master')
@section('page-title','Vendors')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Slider Edit</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Slider Edit</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{ route('admin.sliders.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $data->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" placeholder="Description" rows="5" cols="10">{{ $data->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" name="link" placeholder="Link" class="form-control" value="{{ $data->link }}">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Order</label>
                                                    <input type="number" name="order_no" placeholder="Order" class="form-control" value="{{ $data->order_no }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Text</label>
                                                    <input type="text" name="button_text" placeholder="Button Text" class="form-control" value="{{ $data->button_text }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Text Color</label>
                                                    <input type="color" name="text_color" placeholder="Text Color" class="form-control" value="{{ $data->text_color }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Color</label>
                                                    <input type="color" name="button_color" placeholder="Button Color" class="form-control" value="{{ $data->button_color }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Text Color</label>
                                                    <input type="color" name="button_text_color" placeholder="Button Text Color" class="form-control" value="{{ $data->button_text_color }}">
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

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <label>New Image (Size: 1920 * 600)</label>
                                                        <input type="file" id="image_lg_input" name="image_lg" class="d-none" accept="image/*" required="1">
                                                        <br>
                                                        <button class="btn btn-success" type="button" 
                                                            onclick="document.getElementById('image_lg_input').click()" 
                                                        >Image</button>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12">
                                                        <label>Current Image</label>
                                                        <br>
                                                        <img src="{{ asset('upload-images/sliders/'.$data->image_lg) }}" width="100px" height="100px">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <label>New Image for mobile (Size: 1920 * 600)</label>
                                                        <input type="file" id="image_sm_input" name="image_sm" class="d-none" accept="image/*" required="1">
                                                        <br>
                                                        <button class="btn btn-success" type="button" 
                                                            onclick="document.getElementById('image_sm_input').click()" 
                                                        >Image</button>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12">
                                                        <label>Current Image</label>
                                                        <br>
                                                        <img src="{{ asset('upload-images/sliders/'.$data->image_sm) }}" width="100px" height="100px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">UPDATE</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection