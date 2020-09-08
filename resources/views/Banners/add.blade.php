@extends('layouts.master')
@section('page-title','Banners')

@push('styles')
<style type="text/css">
    .border-danger-alert{
      border:1px solid red;
   }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">@if(Request::is('banners/create')) {{ 'Banner' }} @else {{ 'Ads Banner' }} @endif Create</li>
@endsection    
@section('content')

@include('msg.msg')

            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div>
                                    <h4 class="card-title">Add New @if(Request::is('banners/create')) {{ 'Banner' }} @else {{ 'Ads Banner' }} @endif</h4>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bannerIntroModal">Banner Intro.</button>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form id="banner--form-" action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="type" value="@if($pageTitle === 'Banner'){{'Banner'}}@elseif($pageTitle === 'Ads-Banner'){{'Ads-Banner'}}@else{{'Invalid'}}@endif">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>link</label>
                                            <input type="url" name="link" placeholder="Link" value="{{ old('link') }}" class="form-control">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Order</label>
                                                    <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="number" name="order_no" placeholder="Order" class="form-control" value="{{ old('order_no') }}">
                                                    <small class="place-error--msg text-danger"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Start Time</label>
                                                    <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="date" name="start_time" class="form-control" value="{{ old('start_time') }}">
                                                    <small class="place-error--msg text-danger"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>End Time</label>
                                                    <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="date" name="end_time" class="form-control" value="{{ old('end_time') }}">    
                                                    <small class="place-error--msg text-danger"></small>
                                                </div>
                                            </div>
                                        </div>

                                        @if($pageTitle === 'Ads-Banner')
                                        <div class="form-group">
                                            <label>Choose Position</label>
                                            <select is-required='true' onclick="removeErrorLevels($(this), 'input')" name="ads_banner_position" class="form-control">
                                                <option value="">Choose One</option>
                                                <option value="Banner-Groups">Banner Groups (Size: 530 * 285)</option>
                                                <option value="Banner-Long">Banner Long (Size: 1090 * 245)</option>
                                                <option value="Banner-Short">Banner Short (Size: 530 * 245)</option>
                                                <option value="Banner-Box">Banner Box (Size: 487 * 379)</option>
                                            </select>
                                            <small class="place-error--msg text-danger"></small>
                                        </div>
                                        @else
                                        <input type="hidden" name="ads_banner_position" value="">
                                        @endif
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <label>Image (Size: width 390 & height 193)</label>
                                                    <input is-required='true' onchange="previewFile('image_lg_input', 'previewImg_lg');" type="file" id="image_lg_input" name="image_lg" class="d-none" accept="image/*">
                                                    <br>
                                                    <button class="btn btn-success" type="button" 
                                                        onclick="document.getElementById('image_lg_input').click()" 
                                                    >Image</button>
                                                    <br>
                                                    <div>
                                                        <br>
                                                        <span><img class="preview--file d-none" id="previewImg_lg" width="150px" height="80px" src=""></span>
                                                    </div>
                                                    <small class="place-error--msg text-danger"></small>
                                                </div>
                                            </div>
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
    $("#banner--form-").on('submit', function(e){
        formClientSideValidation(e, "banner--form-", 'no');
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush