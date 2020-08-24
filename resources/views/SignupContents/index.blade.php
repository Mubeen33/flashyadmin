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
                                        <table class="table">
                                            <tr>
                                                <th>Heading</th>
                                                <td>{{ $data->heading }}</td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>{{ $data->description }}</td>
                                            </tr>
                                            <tr>
                                                <th>Text Lines</th>
                                                <td>
                                                    @if($data->text_lines != NULL)
                                                     @php
                                                        $lines = explode('##', $data->text_lines);
                                                        foreach($lines as $line){
                                                            echo "<p class='m-0'>".$line."</p>";
                                                        }
                                                     @endphp
                                                    @endif
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
                    <form action="{{ route('admin.signup-contents.store') }}" method="POST">
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
                            <label>Text Lines</label>
                            <small class="text-danger">(Please Seperate multiple line using ## (double hash))</small>
                            <textarea cols="5" rows="5" class="form-control" name="text_lines">@if($data){{ $data->text_lines }}@endif</textarea>
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