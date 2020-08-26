@extends('layouts.master')
@section('page-title','Vendors')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Signup Contents</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Signup Contents</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    @if($data)
                                    <div>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateData">
                                            Update
                                        </button>
                                        <table class="table" style="text-align: left !important;">
                                            <tr>
                                                <th>Heading</th>
                                                <td>{{ $data->heading }}</td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>{{ $data->description }}</td>
                                            </tr>
                                            <tr>
                                                <th>Text Line One</th>
                                                <td>
                                                    {{ $data->text_line_one }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Text Line One Icon</th>
                                                <td>
                                                    <img src="{{$data->text_line_one_icon}}" width="70px" height="70px">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Text Line Two</th>
                                                <td>
                                                    {{ $data->text_line_two }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Text Line Two Icon</th>
                                                <td>
                                                    <img src="{{$data->text_line_two_icon}}" width="70px" height="70px">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Text Line Three</th>
                                                <td>
                                                    {{ $data->text_line_three }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Text Line Three Icon</th>
                                                <td>
                                                    <img src="{{$data->text_line_three_icon}}" width="70px" height="70px">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    @else
                                        <p><small>You have not set signup contents</small></p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateData">
                                            Set Content
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="updateData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Singup Contents</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('admin.signup-contents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Heading</label>
                            <input type="text" name="heading" value="@if($data){{$data->heading}}@endif" placeholder="Heading" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" value="@if($data){{$data->description}}@endif" placeholder="Description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Text Line One</label>
                            <input type="text" name="text_line_one" class="form-control" value="{{ $data->text_line_one }}" placeholder="Text Line One">
                        </div>
                        <div class="form-group">
                            <label>Text Line One Icon (Width 40px & height 40px)</label>
                            <input type="file" name="text_line_one_icon" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label>Text Line Two</label>
                            <input type="text" name="text_line_two" class="form-control" value="{{ $data->text_line_two }}" placeholder="Text Line Two">
                        </div>
                        <div class="form-group">
                            <label>Text Line Two Icon  (Width 40px & height 40px)</label>
                            <input type="file" name="text_line_two_icon" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label>Text Line Three</label>
                            <input type="text" name="text_line_three" class="form-control" value="{{ $data->text_line_three }}" placeholder="Text Line Three">
                        </div>
                        <div class="form-group">
                            <label>Text Line Three Icon  (Width 40px & height 40px)</label>
                            <input type="file" name="text_line_three_icon" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                     </form>
                  </div>
                </div>
              </div>
            </div>
@endsection