@extends('layouts.master')
@section('page-title','Popup Create')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border:1px solid red;
    }
</style>
@endpush


@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Popup Create</li>
@endsection    
@section('content')                                
            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New Popup</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    @include('msg.msg')
                                    <form id="popup___form" action="{{ route('admin.popup.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Popup Name</label>
                                            <input onclick="removeErrorLevels($(this), 'input')" type="text" name="name" placeholder="Name" class="form-control">
                                            <p><small>Name just an unique identifier.</small></p>
                                            <small class="place-error--msg"></small>
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input onclick="removeErrorLevels($(this), 'input')" type="text" name="title" placeholder="Title" class="form-control">
                                            <small class="place-error--msg"></small>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" onclick="removeErrorLevels($(this), 'input')" name="description" placeholder="Short Description" class="form-control">
                                            <small class="place-error--msg"></small>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Text</label>
                                                    <input type="text" onclick="removeErrorLevels($(this), 'input')" name="button_text" placeholder="Button Text" class="form-control">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Backgroun</label>
                                                    <input type="color" onclick="removeErrorLevels($(this), 'input')" name="button_background" placeholder="Button Backgroun" class="form-control">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Text Color</label>
                                                    <input type="color" onclick="removeErrorLevels($(this), 'input')" name="button_text_color" placeholder="Button Text Color" class="form-control">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <label>Button Link</label>
                                                    <input type="text" onclick="removeErrorLevels($(this), 'input')" name="button_link" placeholder="Button Link" class="form-control">
                                                    <small class="place-error--msg"></small>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <label>Popup Background Image (Size: 830 * 398)</label>
                                                    <input onchange="previewFile('popup_background_image', 'popup_background_image_preview');" type="file" id="popup_background_image" name="popup_background_image" class="d-none" accept="image/*">
                                                    <br>
                                                    <button class="btn btn-success" type="button" 
                                                        onclick="document.getElementById('popup_background_image').click()" 
                                                    >Image</button>
                                                    <div>
                                                        <br>
                                                        <span><img class="d-none preview--file" id="popup_background_image_preview" width="200px" height="100px" src=""></span>
                                                    </div>
                                                    <small class="place-error--msg"></small>
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <input onclick="removeErrorLevels($(this), 'input')" type="date" name="start_time" class="form-control">
                                                        <small class="place-error--msg"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <input onclick="removeErrorLevels($(this), 'input')" type="date" name="end_time" class="form-control">    
                                                        <small class="place-error--msg"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>URL List (Please enter full URL)</label>
                                            <textarea onclick="removeErrorLevels($(this), 'input')" class="form-control" rows="5" cols="5" name="url_list"></textarea>
                                            <p style="font-size: 12px">Please seperate each url using ##, (Double Hash & Comma) (Ex. https://www.flashybuy.com ##, https://www.flashybuy.com/vendors ##, https://www.flashybuy.com/customers)</p>
                                            <small class="place-error--msg"></small>
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


@push('scripts')
<script type="text/javascript">

    function previewFile(inputID, previewID){
        var file = $("#"+inputID).get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#"+previewID).attr("src", reader.result);
                $("#"+previewID).removeClass("d-none");
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