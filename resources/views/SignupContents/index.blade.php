@extends('layouts.master')
@section('page-title','Signup Contents')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border:1px solid red;
    }
</style>
<style>
    .btn-file {
position: relative;
overflow: hidden;
}
.btn-file input[type=file] {
position: absolute;
top: 0;
right: 0;
min-width: 100%;
min-height: 100%;
font-size: 100px;
text-align: right;
filter: alpha(opacity=0);
opacity: 0;
outline: none;
background: white;
cursor: inherit;
display: block;
}

#img-upload{
width: 100%;
}
</style>
<style>
    .cardimg {
box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
transition: 0.3s;
width: 40%;
border-radius: 5px;
}

.cardimg:hover {
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
border-radius: 5px 5px 0 0;
}
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Signup Contents</li>
@endsection    
@section('content')  
    @include('msg.msg')                              
            <div class="content-body">
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
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateData">
                                            Update
                                        </button>

                                        <div class="row">
                                            <div class="col-lg-7">
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
                                                            @if($data->text_line_two_icon != NULL)
                                                            <img src="{{$data->text_line_two_icon}}" width="70px" height="70px">
                                                            @endif
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
                                                            @if($data->text_line_three_icon != NULL)
                                                            <img src="{{$data->text_line_three_icon}}" width="70px" height="70px">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="col-lg-5">
                                                <div class="text-center">
                                                    <h6>Signup Page Banner</h6>
                                                    @if($data->banner == NULL)
                                                        <small>No Banner</small>
                                                    @else
                                                        <img src="{{$data->banner}}" width="250px" height="80px">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @else
                                        <p><small>You have not set signup contents</small></p>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateData">
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
                    <form id="myForm__" action="{{ route('admin.signup-contents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Heading</label>
                            <input onclick="removeErrorLevels($(this), 'input')" is-required='true' type="text" name="heading" value="@if($data){{$data->heading}}@endif" placeholder="Heading" class="form-control">
                            <small class="place-error--msg text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" value="@if($data){{$data->description}}@endif" placeholder="Description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Text Line One</label>
                            <input onclick="removeErrorLevels($(this), 'input')" is-required='true' type="text" name="text_line_one" class="form-control" value="@if($data){{$data->text_line_one}}@endif" placeholder="Text Line One">
                            <small class="place-error--msg text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Text Line One Icon (Width 40px & height 40px)</label>
                           
                            <small class="place-error--msg text-danger"></small>
                           
                            <div class="form-group">
                                
                                <div id="input-group1" class="input-group ">
                                    <span class="input-group-btn">
                                        <span id="btn-file1" class="btn btn-warning  waves-effect waves-light btn-file">
                                            Browse<input  id="imgInp1" onclick="removeErrorLevels($(this), 'input')" @if(!$data) is-required='true' @endif type="file" name="text_line_one_icon" class="form-control" accept="image/*">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" style="margin-left: -2%;" readonly>
                                </div>
                                <div style="text-align: left;">
                                 <img style="max-width: 14%; margin-top: 2%;" class="cardimg" id='img-upload1'/>
                                 </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Text Line Two</label>
                            <input type="text" name="text_line_two" class="form-control" value="@if($data){{$data->text_line_two}}@endif" placeholder="Text Line Two">
                        </div>
                        <div class="form-group">
                            <label>Text Line Two Icon  (Width 40px & height 40px)</label>
                         
                            <div class="form-group">
                                
                                <div id="input-group2" class="input-group ">
                                    <span class="input-group-btn">
                                        <span id="btn-file2" class="btn btn-warning  waves-effect waves-light btn-file">
                                            Browse<input  id="imgInp2"  type="file" name="text_line_two_icon" class="form-control" accept="image/*">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" style="margin-left: -2%;" readonly>
                                </div>
                                <div style="text-align: left;">
                                 <img style="max-width: 14%; margin-top: 2%;" class="cardimg" id='img-upload2'/>
                                 </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Text Line Three</label>
                            <input type="text" name="text_line_three" class="form-control" value="@if($data){{$data->text_line_three}}@endif" placeholder="Text Line Three">
                        </div>
                        <div class="form-group">
                            <label>Text Line Three Icon  (Width 40px & height 40px)</label>
                          
                            <div class="form-group">
                                
                                <div id="input-group3" class="input-group ">
                                    <span class="input-group-btn">
                                        <span id="btn-file3" class="btn btn-warning  waves-effect waves-light btn-file">
                                            Browse<input  id="imgInp3"  type="file" name="text_line_three_icon" class="form-control" accept="image/*">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" style="margin-left: -2%;" readonly>
                                </div>
                                <div style="text-align: left;">
                                 <img style="max-width: 14%; margin-top: 2%;" class="cardimg" id='img-upload3'/>
                                 </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Signup Page Banner (Width:662px & Height:185px)</label>
                           
                            <div class="form-group">
                                
                                <div id="input-group4" class="input-group ">
                                    <span class="input-group-btn">
                                        <span id="btn-file4" class="btn btn-warning  waves-effect waves-light btn-file">
                                            Browse<input  id="imgInp4"  type="file" name="banner" class="form-control" accept="image/*">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" style="margin-left: -2%;" readonly>
                                </div>
                                <div style="text-align: left;">
                                 <img style="max-width: 40%; margin-top: 2%;" class="cardimg" id='img-upload4'/>
                                 </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                     </form>
                  </div>
                </div>
              </div>
            </div>

@endsection

@push('scripts')
<script type="text/javascript">
    $("#myForm__").on('submit', function(e){
        formClientSideValidation(e, "myForm__", 'yes');
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bannerfileuploader.js') }}"></script>

@endpush