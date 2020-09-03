@extends('layouts.master')
@section('page-title','Popup Edit')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border:1px solid red;
    }
</style>
@endpush


@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Popup Edit</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Popup</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form id="popup___form" action="{{ route('admin.popup.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Popup Name</label>
                                            <input onclick="removeErrorLevels($(this), 'input')" type="text" name="name" placeholder="Name" class="form-control" value="{{ $data->name }}">
                                            <p><small>Name just an unique identifier.</small></p>
                                            <small class="place-error--msg"></small>
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input onclick="removeErrorLevels($(this), 'input')" type="text" name="title" placeholder="Title" class="form-control" value="{{ $data->title }}">
                                            <small class="place-error--msg"></small>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" onclick="removeErrorLevels($(this), 'input')" name="description" placeholder="Short Description" class="form-control" value="{{ $data->description }}">
                                            <small class="place-error--msg"></small>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Text</label>
                                                    <input type="text" onclick="removeErrorLevels($(this), 'input')" name="button_text" placeholder="Button Text" class="form-control" value="{{ $data->button_text }}">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Backgroun</label>
                                                    <input type="color" onclick="removeErrorLevels($(this), 'input')" name="button_background" placeholder="Button Backgroun" class="form-control" value="{{ $data->button_background }}">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Text Color</label>
                                                    <input type="color" onclick="removeErrorLevels($(this), 'input')" name="button_text_color" placeholder="Button Text Color" class="form-control" value="{{ $data->button_text_color }}">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Link</label>
                                                    <input type="text" onclick="removeErrorLevels($(this), 'input')" name="button_link" placeholder="Button Link" class="form-control" value="{{ $data->button_link }}">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Popup Background Image (Size: 830 * 398)</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="custom-file">
                                                        <input type="file" onchange="previewFile(this);" name="popup_background_image" class="custom-file-input" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        <small class="place-error--msg"></small>
                                                    </div>
                                                    <span><img id="previewImg" width="100" src="{{$data->popup_background_image}}"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <input onclick="removeErrorLevels($(this), 'input')" type="date" name="start_time" class="form-control" value="{{$data->start_time}}">
                                                        <small class="place-error--msg"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <input onclick="removeErrorLevels($(this), 'input')" type="date" name="end_time" class="form-control" value="{{$data->end_time}}">    
                                                        <small class="place-error--msg"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>URL List (Please enter full URL)</label>
                                            <textarea onclick="removeErrorLevels($(this), 'input')" class="form-control" rows="5" cols="5" name="url_list">{{$data->url_list}}</textarea>
                                            <p style="font-size: 12px">Please seperate each url using ##, (Double Hash & Comma) (Ex. https://www.flashybuy.com ##, https://www.flashybuy.com/vendors ##, https://www.flashybuy.com/customers)</p>
                                            <small class="place-error--msg"></small>
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


@push('scripts')
<script type="text/javascript">

    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $("#popup___form").on('submit', function(e){
            e.preventDefault()
            let formID = "popup___form";
            let form = $(this);
            let url = form.attr('action');
            let type = form.attr('method');
            let form_data = form.serialize();
            formSubmitWithFile(formID, url, type, form_data);
        })
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush