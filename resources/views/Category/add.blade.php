@extends('layouts.master')
@section('page-title','Vendors')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Category Create</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New Category</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" name="category_name" placeholder="Name" class="form-control" value="{{ old('category_name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Slug <small>(If you leave it blank, it will automatically generate.)</small></label>
                                            <input type="text" name="slug" placeholder="Slug" class="form-control" value="{{ old('slug') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Title (Meta Title)</label>
                                            <input type="text" name="meta_title" placeholder="Meta Title" class="form-control" value="{{ old('meta_title') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Description (Meta Description)</label>
                                            <input type="text" name="meta_description" placeholder="Meta Description" class="form-control" value="{{ old('meta_description') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Keywords (Meta Keywords)</label>
                                            <input type="text" name="meta_keywords" placeholder="Meta Description" class="form-control" value="{{ old('meta_keywords') }}">
                                            <small>Multiplse Keywords Seperate with comma(,)</small>
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
                                                    <label>Homepage Order</label>
                                                    <input type="text" name="homepage_order" placeholder="Homepage Order" class="form-control" value="{{ old('homepage_order') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select name="parent_category" class="form-control">
                                                <option value="">Choose One</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-12">
                                                    <label>Visibility</label>
                                                </div>
                                                <div class="col-lg-9 col-md-12">
                                                    <input type="radio" name="visibility" value="1"> <span>Show</span>&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="visibility" value="0"> <span>Hide</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-12">
                                                    <label>Show on Homepage</label>
                                                </div>
                                                <div class="col-lg-9 col-md-12">
                                                    <input type="radio" name="show_on_homepage" value="1"> <span>Yes</span>&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="show_on_homepage" value="0"> <span>No</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-12">
                                                    <label>Show Category Image on The Navigation</label>
                                                </div>
                                                <div class="col-lg-9 col-md-12">
                                                    <input type="radio" name="show_cat_img_on_nav" value="1"> <span>Yes</span>&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="show_cat_img_on_nav" value="0"> <span>No</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <br>
                                            <input type="file" id="img_input" name="image" accept="image/*" class="d-none">
                                            <button class="btn btn-success" type="button" 
                                                onclick="document.getElementById('img_input').click()";
                                            >Select Image</button>
                                        </div>


                                        
                                        <div class="form-group text-right">
                                            <button class="btn btn-primary" type="submit">Add Category</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection