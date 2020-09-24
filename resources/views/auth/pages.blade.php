@extends('layouts.master')
@section('page-title','Vendors Auth')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border: 1px solid red
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Auth Pages</li>
@endsection 
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div><h4 class="card-title">Auth Pages</h4></div>
                                <div>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addAuthPageContent">
                                        Add
                                    </button>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SN.</th>
                                                    <th>Type</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Created at</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @if(!$data->isEmpty())
                                                   @foreach($data as $key=>$content)
                                                       <tr>
                                                         <td>{{$key+1}}</td>
                                                         <td>{{$content->type}}</td>
                                                         <td>{{$content->title}}</td>
                                                         <td>{{$content->description}}</td>
                                                         <td><img src="{{$content->image}}" width="150px" height="80px"></td>
                                                         <td>{{$content->created_at->format(env('GENERAL_DATE_FORMAT'))}}</td>
                                                         <td>
                                                           <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalEdit-{{$content->id}}">
                                                              Edit
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="ModalEdit-{{$content->id}}" tabindex="-1" aria-labelledby="ModalEditlabel-{{$content->id}}" aria-hidden="true">
                                                              <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="ModalEditlabel-{{$content->id}}">Edit</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body" style="text-align: left !important;">
                                                                    <form class="form--edit" id="myForm___{{$content->id}}" action="{{ route('admin.auth-pages.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label>Type</label>
                                                                            <select is-required='true' onclick="removeErrorLevels($(this), 'input')" name="type" class="form-control">
                                                                                  @if($content->type === "AdminAuth")
                                                                                  <option value="AdminAuth"  selected>Admin Auth Page</option>
                                                                                  @endif

                                                                                  @if($content->type === "VendorAuth")
                                                                                  <option value="VendorAuth"  selected >Vendor Auth Page</option>
                                                                                  @endif
                                                                            </select>
                                                                            <small class="place-error--msg text-danger"></small>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Title</label>
                                                                            <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" name="title" placeholder="Title" class="form-control" value="{{ $content->title }}">
                                                                            <small class="place-error--msg text-danger"></small>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Description</label>
                                                                            <input type="text" name="description" placeholder="Description" class="form-control" value="{{ $content->description }}" maxlength="100">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Image <small>(Size: Width=400px and Height=230px)</small></label>
                                                                            <input id="image_input-{{$content->id}}" onchange="previewFile('image_input-{{$content->id}}', 'image_preview-{{$content->id}}')"  type="file" name="image" class="form-control" accept="image/*">
                                                                            <div id="image_preview-{{$content->id}}" class="d-none mt-1">
                                                                                <img src="" width="" width="180px" height="90px">
                                                                                <button type="button" title="Remove this image" onclick="removePreviewFile('image_preview-{{$content->id}}', 'image_input-{{$content->id}}')" class="btn btn-sm btn-danger">X</button>
                                                                            </div>
                                                                            <small class="place-error--msg text-danger"></small>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button class="btn btn-warning btn-sm" type="submit">Update</button>
                                                                        </div>
                                                                    </form>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                         </td>
                                                       </tr>
                                                   @endforeach

                                               @else
                                                <tr>
                                                  <td colspan="6">No Data Found</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



<!-- Modal -->
<div class="modal fade" id="addAuthPageContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Auth Page Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add__form" action="{{ route('admin.auth-pages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Type</label>
                <select is-required='true' onclick="removeErrorLevels($(this), 'input')" name="type" class="form-control">
                    <option value="">Choose One</option>
                    <option value="AdminAuth">Admin Auth Page</option>
                    <option value="VendorAuth">Vendor Auth Page</option>
                </select>
                <small class="place-error--msg text-danger"></small>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
                <small class="place-error--msg text-danger"></small>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" placeholder="Description" class="form-control" value="{{ old('description') }}" maxlength="100">
            </div>
            <div class="form-group">
                <label>Image <small>(Size: Width=400px and Height=230px)</small></label>
                <input id="image_input" onchange="previewFile('image_input', 'image_preview')" is-required='true' onclick="removeErrorLevels($(this), 'input')" type="file" name="image" class="form-control" accept="image/*">
                <div id="image_preview" class="d-none mt-1">
                    <img src="" width="" width="180px" height="90px">
                    <button type="button" title="Remove this image" onclick="removePreviewFile('image_preview', 'image_input')" class="btn btn-sm btn-danger">X</button>
                </div>
                <small class="place-error--msg text-danger"></small>
            </div>
            <div class="form-group">
                <button class="btn btn-warning btn-sm" type="submit">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    //Image Preview
    function previewFile(inputID, previewID){
        $("#"+inputID).siblings('.place-error--msg').html("")
        
        var _URL = window.URL || window.webkitURL;
        //var file = $("inputID[type=file]").get(0).files[0];
        var file = $("#"+inputID).get(0).files[0];
           img = new Image();
           var imgwidth = 0;
           var imgheight = 0;
           var requiredWidth = 400;
           var requiredHeight = 230;
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
   $("#add__form").on('submit', function(e){
       formClientSideValidation(e, "add__form", 'no');
   })

   //form validate for multiple 
   $(".form--edit").on('submit', function(e){
       formClientSideValidation(e, $(this).attr('id'), 'no');
   })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush