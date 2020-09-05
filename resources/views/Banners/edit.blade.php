@extends('layouts.master')
@section('page-title','Banners')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">{{ $data->type }}</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit {{ $data->type }}</h4>
                                <div>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bannerIntroModal">Banner Intro.</button>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{ route('admin.banners.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="type" value="{{$data->type }}">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $data->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label>link</label>
                                            <input type="url" name="link" placeholder="Link" value="{{ $data->link }}" class="form-control">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Order</label>
                                                    <input type="number" name="order_no" placeholder="Order" class="form-control" value="{{ $data->order_no }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Start Time</label>
                                                    <input type="date" name="start_time" class="form-control" value="{{ $data->start_time }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>End Time</label>
                                                    <input type="date" name="end_time" class="form-control" value="{{ $data->end_time }}">    
                                                </div>
                                            </div>
                                        </div>

                                        @if($data->type === 'Ads-Banner')
                                        <div class="form-group">
                                            <label>Choose Position</label>
                                            <select name="ads_banner_position" class="form-control">
                                                <option value="">Choose One</option>
                                                <option value="Banner-Groups" @if($data->ads_banner_position === "Banner-Groups") selected @endif>Banner Groups (Size: 530 * 285)</option>
                                                <option value="Banner-Long" @if($data->ads_banner_position === "Banner-Long") selected @endif>Banner Long (Size: 1090 * 245)</option>
                                                <option value="Banner-Short" @if($data->ads_banner_position === "Banner-Short") selected @endif>Banner Short (Size: 530 * 245)</option>
                                                <option value="Banner-Box" @if($data->ads_banner_position === "Banner-Box") selected @endif>Banner Box (Size: 487 * 379)</option>
                                            </select>
                                        </div>
                                        @else
                                        <input type="hidden" name="ads_banner_position" value="">
                                        @endif
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <label>Image</label>
                                                    <input type="file" onchange="previewFile('image_lg_input', 'previewImg_lg', 'previewImg_lg_current');" id="image_lg_input" name="image_lg" class="d-none" accept="image/*">
                                                    <br>
                                                    <button class="btn btn-success" type="button" 
                                                        onclick="document.getElementById('image_lg_input').click()" 
                                                    >Image</button>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div id="previewImg_lg_current" >
                                                        <label>Current Image</label>
                                                        <br>
                                                        <img src="{{ $data->image_lg }}" width="150px" height="90px">
                                                    </div>
                                                    <div class="d-none" id="previewImg_lg">
                                                        <img width="150px" height="90px" src="">
                                                        <button type="button" title="Remove this image" onclick="removePreviewFile('previewImg_lg', 'previewImg_lg_current', 'image_lg_input')" class="btn btn-sm btn-danger">X</button>
                                                    </div>
                                                </div>
                                            </div>
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


            <!-- Modal -->
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
@endpush