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
                                    
                                    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="type" value="{{$type}}">
                                        <input type="hidden" name="order_no" value="{{$orderNo}}">
                                        
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="primary_banner mb-1">
                                                        <label class="d-block">* Primary Banner Image</label>
                                                        <br>
                                                        <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="180px" height="90px">
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-12">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" name="title" placeholder="Title" class="form-control" value="{{old('title')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>link</label>
                                                        <input type="url" name="link" placeholder="Link" value="{{old('link')}}" class="form-control">
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
                                                        <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="180px" height="90px"> 
                                                    </div>
                                                </div>

                                                <div class="col-lg-8 col-md-12">
                                                    <div class="form-group">
                                                        <label>Secondary Title</label>
                                                        <input type="text" name="secondary_title" placeholder="Title" class="form-control" value="{{old('secondary_title')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Secondary link</label>
                                                        <input type="url" name="secondary_link" placeholder="Link" value="{{ old('secondary_link') }}" class="form-control">
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="form-group">
                                                                <label>Start time</label>
                                                               <input class="form-control" type="datetime-local" id="start_time"
                                                                   name="start_time" placeholder="2018-06-12T19:30"> 
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="form-group">
                                                                <label>End time</label>
                                                               <input class="form-control" type="datetime-local" id="end_time"
                                                                   name="end_time" placeholder="2018-06-12T19:30"> 
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



{{--

<input class="form-control" type="datetime-local" id="start_time"
                                                                   name="start_time" value="2018-06-12T19:30"
                                                                   min="2018-06-07T00:00" max="2018-06-14T00:00"> 

--}}