@extends('layouts.master')
@section('page-title','Edit Slider')
@push('styles')
<style type="text/css">
    .border-danger-alert{
        border:1px solid red;
    }
</style>
@endpush


@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Slider Edit</li>
@endsection    
@section('content')
    @include('msg.msg')                             
            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Slider Edit</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form id="slider__form" action="{{ route('admin.sliders.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input onclick="removeErrorLevels($(this), 'input')" type="text" name="title" placeholder="Title" class="form-control" value="{{ $data->title }}">
                                            <small class="place-error--msg"></small>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea onclick="removeErrorLevels($(this), 'input')" name="description" class="form-control" placeholder="Description" rows="5" cols="10">{{ $data->description }}</textarea>
                                            <small class="place-error--msg"></small>
                                        </div>
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input onclick="removeErrorLevels($(this), 'input')" type="text" name="link" placeholder="Link" class="form-control" value="{{ $data->link }}">
                                            <small class="place-error--msg"></small>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Order</label>
                                                    <input onclick="removeErrorLevels($(this), 'input')" type="number" name="order_no" placeholder="Order" class="form-control" value="{{ $data->order_no }}">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Text</label>
                                                    <input onclick="removeErrorLevels($(this), 'input')" type="text" name="button_text" placeholder="Button Text" class="form-control" value="{{ $data->button_text }}">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Text Color</label>
                                                    <input onclick="removeErrorLevels($(this), 'input')" type="color" name="text_color" placeholder="Text Color" class="form-control" value="{{ $data->text_color }}">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Color</label>
                                                    <input onclick="removeErrorLevels($(this), 'input')" type="color" name="button_color" placeholder="Button Color" class="form-control" value="{{ $data->button_color }}">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Text Color</label>
                                                    <input onclick="removeErrorLevels($(this), 'input')" type="color" name="button_text_color" placeholder="Button Text Color" class="form-control" value="{{ $data->button_text_color }}">
                                                    <small class="place-error--msg"></small>
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
                                                        <select onclick="removeErrorLevels($(this), 'input')" class="form-control" name="title_animation">
                                                            <option value="fadeInUp">fadeInUp</option>
                                                        </select>
                                                        <small class="place-error--msg"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <select onclick="removeErrorLevels($(this), 'input')" class="form-control" name="description_animation">
                                                            <option value="fadeInUp">fadeInUp</option>
                                                        </select>
                                                        <small class="place-error--msg"></small>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <label>Button</label>
                                                        <select onclick="removeErrorLevels($(this), 'input')" class="form-control" name="button_animation">
                                                            <option value="fadeInUp">fadeInUp</option>
                                                        </select>
                                                        <small class="place-error--msg"></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <label>New Image (Size: 1230 * 445)</label>
                                                        <input onchange="previewFile('image_lg_input', 'previewImg_lg', 'previewImg_lg_current');" type="file" id="image_lg_input" name="image_lg" class="d-none" accept="image/*">
                                                        <br>
                                                        <button class="btn btn-success" type="button" 
                                                            onclick="document.getElementById('image_lg_input').click()" 
                                                        >Image</button>
                                                        <small class="place-error--msg"></small>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12">
                                                        <div id="previewImg_lg_current">
                                                            <label>Current Image</label>
                                                            <br>
                                                            <img src="{{ $data->image_lg }}" width="100px" height="100px">
                                                        </div>
                                                        <div class="d-none" id="previewImg_lg">
                                                            <img class="preview--file" width="200px" height="100px" src="">
                                                            <button type="button" title="Remove this image" onclick="removePreviewFile('previewImg_lg', 'previewImg_lg_current', 'image_lg_input')" class="btn btn-sm btn-danger">X</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <label>New Image for mobile (Size: 600 * 300)</label>
                                                        <input onchange="previewFile('image_sm_input', 'previewImg_sm', 'previewImg_sm_current');" type="file" id="image_sm_input" name="image_sm" class="d-none" accept="image/*">
                                                        <br>
                                                        <button class="btn btn-success" type="button" 
                                                            onclick="document.getElementById('image_sm_input').click()" 
                                                        >Image</button>
                                                        <small class="place-error--msg"></small>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12">
                                                        <div id="previewImg_sm_current" >
                                                            <label>Current Image</label>
                                                            <br>
                                                            <img src="{{ $data->image_sm }}" width="100px" height="100px">
                                                        </div>
                                                        <div class="d-none" id="previewImg_sm">
                                                            <img class="preview--file" width="150px" height="80px" src="">
                                                            <button type="button" title="Remove this image" onclick="removePreviewFile('previewImg_sm', 'previewImg_sm_current', 'image_sm_input')" class="btn btn-sm btn-danger">X</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <label>Slider Type</label>
                                                        <select is-required='true' onclick="removeErrorLevels($(this), 'input')" class="form-control" name="slider_type">
                                                            <option value="Product" @if($data->slider_type) === "Product" ) selected @endif>Product Slider</option>
                                                            <option value="Deal" @if($data->slider_type === "Deal" ) selected @endif>Deal Slider</option>
                                                        </select>
                                                        <small class="place-error--msg text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="date" name="start_time" class="form-control" value="{{ $data->start_time }}">
                                                        <small class="place-error--msg text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                     <div class="form-group">
                                                        <label>End Time</label>
                                                        <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="date" name="end_time" class="form-control" value="{{ $data->end_time }}">    
                                                        <small class="place-error--msg text-danger"></small>
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



@push('scripts')
<script type="text/javascript">

    function previewFile(inputID, previewID, currentID){
        var file = $("#"+inputID).get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#"+previewID+' img').attr("src", reader.result);
                $("#"+previewID).removeClass("d-none");
                $("#"+currentID).addClass("d-none");
            }
 
            reader.readAsDataURL(file);
        }
    }

    function removePreviewFile(imageID, show, input){
        $("#"+imageID).addClass('d-none')
        $("#"+imageID+" img").attr('src', '')
        $("#"+show).removeClass('d-none')
        $("#"+input).val('')
    }
</script>



<script type="text/javascript">
    $("#slider__form").on('submit', function(e){
        formClientSideValidation(e, "slider__form", 'yes');
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush