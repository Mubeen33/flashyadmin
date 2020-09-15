@extends('layouts.master')
@section('page-title','Banner Edit')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border: 1px solid red
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Edit Banner</li>
@endsection    
@section('content')
    @include('msg.msg')

        @php
            $image_w = NULL;
            $image_h = NULL;
            $image_w_current = NULL;
            $image_h_current = NULL;
            $bannerSize = "";
            $defaultImage = NULL;
         
            if($data->type === "Banners_Top_Right"){
                $image_w = 390;
                $image_h = 193;
                $bannerSize = "Size : 390*193";

                $image_w_current = "197px";
                $image_h_current = "97px";
                $defaultImage = "<img src='/upload-images/banners/default/top_right_banner_390_193.jpg' width='197px' height='97px'>";
            }elseif($data->type === "Banners_Group"){
                $bannerSize = "Size : 530*285";
                $image_w = 530;
                $image_h = 285;

                $image_w_current = "197px";
                $image_h_current = "97px";
                $defaultImage = "<img src='/upload-images/banners/default/banner_groups_530_285.png' width='197px' height='110px'>";
            }elseif($data->type === "Banner_Long"){
                $bannerSize = "Size : 1090*245";
                $image_w = 1090;
                $image_h = 245;

                $image_w_current = "160px";
                $image_h_current = "75px";
                $defaultImage = "<img src='/upload-images/banners/default/banner_long_1090_245.png' width='197px' height='75px'>";
            }elseif($data->type === "Banner_Short"){
                $bannerSize = "Size : 530*245";
                $image_w = 530;
                $image_h = 245;

                $image_w_current = "197px";
                $image_h_current = "97px";
                $defaultImage = "<img src='/upload-images/banners/default/banner_short_530_245.png' width='197px' height='97px'>";
            }elseif($data->type === "Banner_Box"){
                $bannerSize = "Size : 487*379";
                $image_w = 487;
                $image_h = 379;
                
                $image_w_current = "160px";
                $image_h_current = "140px";
                $defaultImage = "<img src='/upload-images/banners/default/banner_box_487_379.png' width='197px' height='160px'>";
            }else{
                $bannerSize = "Invalid Sizes";
            }
            
        @endphp

            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Banner</h4>
                                <div>
                                    <a href="{{ route('admin.banners.index') }}" class="btn btn-danger btn-sm">Back</a>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#bannerIntroModal">Banner Intro.</button>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form id="banner__form" action="{{ route('admin.banners.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <input type="hidden" id="imageWidth" value="{{$image_w}}">
                                        <input type="hidden" id="imageHeight" value="{{$image_h}}">
                                        
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="primary_banner mb-1">
                                                        <label class="d-block">* Primary Banner Image</label>
                                                        <br>
                                                        <img src="{{$data->primary_image}}" width="{{$image_w_current}}" height="{{$image_h_current}}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-12">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" name="title" placeholder="Title" class="form-control" value="{{$data->title}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>link</label>
                                                        <input type="url" name="link" placeholder="Link" value="{{$data->link}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Primary Image ({{$bannerSize}})</label>
                                                        <input onclick="removeErrorLevels($(this), 'input')" onchange="previewFile('primary_image_input', 'primary_image_preview')" id="primary_image_input" type="file" name="primary_image" class="form-control" accept="image/*">
                                                        <div id="primary_image_preview" class="d-none mt-1">
                                                            <img src="" width="" width="180px" height="90px">
                                                            <button type="button" title="Remove this image" onclick="removePreviewFile('primary_image_preview', 'primary_image_input')" class="btn btn-sm btn-danger">X</button>
                                                        </div>
                                                        <small class="place-error--msg text-danger"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="border-top: 1px solid #ddd; padding-top: 30px;">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="secondary_banner mb-1">
                                                        <label class="d-block">Secondary Banner Image (Optional)</label>
                                                        <br>
                                                            @if($data->secondary_image != NULL)
                                                                <img src="{{$data->secondary_image}}" width="{{$image_w_current}}" height="{{$image_h_current}}">
                                                                @else
                                                                <?php echo $defaultImage;?>
                                                            @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-12">
                                                    <div class="form-group">
                                                        <label>Secondary Title</label>
                                                        <input type="text" name="title" placeholder="Title" class="form-control" value="{{$data->secondary_title}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Secondary link</label>
                                                        <input type="url" name="link" placeholder="Link" value="{{$data->secondary_link}}" class="form-control">
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="form-group">
                                                                <label>Start Time</label>
                                                                @php
                                                                    $start_time = NULL;
                                                                    $end_time = NULL;
                                                                    if($data->secondary_image != NULL && $data->secondary_start_time != NULL){
                                                                        $start_time = date('Y-m-d\TH:i', strtotime($data->secondary_start_time));
                                                                    }
                                                                    if($data->secondary_image != NULL && $data->secondary_end_time != NULL){
                                                                        $end_time = date('Y-m-d\TH:i', strtotime($data->secondary_end_time));
                                                                    }
                                                                @endphp
                                                                <input onclick="removeErrorLevels($(this), 'input')" class="form-control" type="datetime-local" id="start_time"
                                                                   name="start_time" value="{{$start_time}}"> 
                                                                <small class="place-error--msg text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="form-group">
                                                                <label>End Time</label>
                                                                <input onclick="removeErrorLevels($(this), 'input')" class="form-control" type="datetime-local" id="end_time"
                                                                   name="end_time" value="{{$end_time}}"> 
                                                                <small class="place-error--msg text-danger"></small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Secondary Image ({{$bannerSize}})</label>
                                                        <input onclick="removeErrorLevels($(this), 'input')" onchange="previewFile('secondary_image_input', 'secondary_image_preview')" id="secondary_image_input" type="file" name="secondary_image" class="form-control" accept="image/*">
                                                        <div id="secondary_image_preview" class="d-none mt-1">
                                                            <img src="" width="" width="180px" height="90px">
                                                            <button type="button" title="Remove this image" onclick="removePreviewFile('secondary_image_preview', 'secondary_image_input')" class="btn btn-sm btn-danger">X</button>
                                                        </div>
                                                        <small class="place-error--msg text-danger"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="form-group text-right">
                                            <button class="f_btn__submit btn btn-warning" type="submit">Update</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <!-- Modal banner info -->
        <div class="modal fade" id="bannerIntroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img src="{{ asset('app-assets/images/banners-position-intro.png') }}" width="100%">
              </div>
            </div>
          </div>
        </div>
@endsection



@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $(".f_btn__submit").attr('disabled',true)
        $("#banner__form").on("change", function(){
           $(".f_btn__submit").attr('disabled',false)
        })
    })

    //Image Preview
    function previewFile(inputID, previewID){
        $("#"+inputID).siblings('.place-error--msg').html("")
        var imageWidth = $("#imageWidth").val()
        var imageHeight = $("#imageHeight").val()
        
        var _URL = window.URL || window.webkitURL;
        //var file = $("inputID[type=file]").get(0).files[0];
        var file = $("#"+inputID).get(0).files[0];
           img = new Image();
           var imgwidth = 0;
           var imgheight = 0;
           var requiredWidth = imageWidth;
           var requiredHeight = imageHeight;
           img.src = _URL.createObjectURL(file);
              img.onload = function() {
               imgwidth = this.width;
               imgheight = this.height;
           
        if(parseInt(imgwidth) === parseInt(requiredWidth) && parseInt(imgheight) === parseInt(requiredHeight)){
            $("#"+inputID).removeClass("border-danger-alert")
            
            if(file){
                var reader = new FileReader();
     
                reader.onload = function(){
                    $("#"+previewID+' img').attr("src", reader.result);
                    $("#"+previewID).removeClass("d-none");
                }
     
                reader.readAsDataURL(file);
            }
        }
        else{

            $("#"+inputID).val("")
            $("#"+inputID).addClass("border-danger-alert")
            $("#"+inputID).siblings('.place-error--msg').html("SORRY - Image Size must be "+requiredWidth+"*"+requiredHeight)
        }
      }  
    }
// End Image Preview


    function removePreviewFile(previewID, inputID){
        $("#"+previewID).addClass('d-none')
        $("#"+previewID+" img").attr('src', '')
        $("#"+inputID).val('')
        $("#"+inputID).removeClass("border-danger-alert")
        $("#"+inputID).siblings('.place-error--msg').html("")
    }
</script>


<script type="text/javascript">
    $("#banner__form").on('submit', function(e){
        //extra
        if ($("input[name=secondary_image]").val() != "") {
            if (!$("input[name=start_time]").val()) {
                e.preventDefault()
                $("input[name=start_time]").addClass('border-danger-alert');
                $("input[name=start_time]").siblings('.place-error--msg').html("This filed is required.");
            }

            if (!$("input[name=end_time]").val()) {
                e.preventDefault()
                $("input[name=end_time]").addClass('border-danger-alert');
                $("input[name=end_time]").siblings('.place-error--msg').html("This filed is required.");
            }
        }
        formClientSideValidation(e, "banner__form", 'yes');
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush
