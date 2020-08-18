@extends('layouts.master')
@section('page-title','Vendors')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Sliders</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sliders List</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Link</th>
                                                    <th>Order No</th>
                                                    <th>Button Text</th>
                                                    <th>Text Color</th>
                                                    <th>Button Color</th>
                                                    <th>Button Text Color</th>
                                                    <th>Title Animation</th>
                                                    <th>Des. Animation</th>
                                                    <th>Button Animation</th>
                                                    <th>Image lg</th>
                                                    <th>Image sm</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key=>$content)
                                                    <tr>
                                                        <th scope="row">{{ $key+1 }}</th>
                                                        <td>{{ $content->title }}</td>                                          
                                                        <td>{{ $content->description }}</td>
                                                        <td>{{ $content->link }}</td>
                                                        <td>{{ $content->order_no }}</td>
                                                        <td>{{ $content->button_text }}</td>
                                                        <td>{{ $content->text_color }}</td>
                                                        <td>{{ $content->button_color }}</td>
                                                        <td>{{ $content->button_text_color }}</td>
                                                        <td>{{ $content->title_animation }}</td>
                                                        <td>{{ $content->description_animation }}</td>
                                                        <td>{{ $content->button_animation }}</td>
                                                        <td><img width="50px" height="50px" src="{{ asset('upload-images/sliders/'.$content->image_lg) }}"></td>
                                                        <td><img width="50px" height="50px" src="{{ asset('upload-images/sliders/'.$content->image_sm) }}"></td>
                                                        <td>
                                                            <a href="{{ route('admin.sliders.edit', Crypt::encrypt($content->id)) }}"><i class="feather icon-edit"></i></a>
                                                            <a onclick="return confirm('Are you sure?')" href="{{ route('admin.slider.delete', Crypt::encrypt($content->id)) }}"><i class="feather icon-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {!! $data->render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection