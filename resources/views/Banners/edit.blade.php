@extends('layouts.master')
@section('page-title','Banner Edit')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Edit Banner</li>
@endsection    
@section('content')
    @include('msg.msg')  

            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Banner</h4>
                                <div>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#bannerIntroModal">Banner Intro.</button>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{ route('admin.banners.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="primary_banner mb-1">
                                                        <label class="d-block">* Primary Banner Image</label>
                                                        <br>
                                                        @if($data !== NULL)
                                                        <img src="{{$data->primary_image}}" width="180px" height="90px">
                                                        @else
                                                        <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="180px" height="90px">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-12">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" name="title" placeholder="Title" class="form-control" value="@if($data !== NULL){{$data->title}}@endif">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>link</label>
                                                        <input type="url" name="link" placeholder="Link" value="@if($data !== NULL){{$data->link}}@endif" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Primary Image</label>
                                                        <input type="file" name="primary_image" class="form-control">
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
                                                        @if($data !== NULL)
                                                            @if($data->secondary != NULL)
                                                                <img src="{{$data->secondary}}" width="180px" height="90px">
                                                                @else
                                                                <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="180px" height="90px">
                                                            @endif
                                                                
                                                            @else
                                                               <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="180px" height="90px"> 
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-12">
                                                    <div class="form-group">
                                                        <label>Secondary Title</label>
                                                        <input type="text" name="title" placeholder="Title" class="form-control" value="@if($data !== NULL){{$data->title}}@endif">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Secondary link</label>
                                                        <input type="url" name="link" placeholder="Link" value="@if($data !== NULL){{$data->link}}@endif" class="form-control">
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="form-group">
                                                                <label>Start Time</label>
                                                                <input is-required='true' type="date" name="start_time" class="form-control" value="@if($data !== NULL){{$data->start_time}}@endif">
                                                                <small class="place-error--msg text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="form-group">
                                                                <label>End Time</label>
                                                                <input is-required='true' type="date" name="end_time" class="form-control" value="@if($data !== NULL){{$data->end_time}}@endif">    
                                                                <small class="place-error--msg text-danger"></small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Secondary Image</label>
                                                        <input type="file" name="secondary_image" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="form-group text-right">
                                            <button class="btn btn-warning" type="submit">Update</button>
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
    $("#banner--form-").on('submit', function(e){
        formClientSideValidation(e, "banner--form-", 'no');
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush