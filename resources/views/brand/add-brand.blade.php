@extends('layouts.master')
@section('page-title','Add Brand')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border:1px solid red;
    }
</style>
@endpush

@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Add Brand</a></li>
@endsection    
@section('content')
        @include('msg.msg')       
            <div class="content-body">
               
                <section id="basic-horizontal-layouts">
                    <form id="brandAddForm_" action="{{route('admin.brands.addbrand')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header justify-content-between">
                                        <div>
                                            <h4 class="card-title"><b>Add Brands</b></h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary btn-sm" href="{{Route('admin.brands.brandslist')}}">Brands</a>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Brand Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="text" id="first-name"  class="form-control" name="name" placeholder="Brand Name">
                                                                    <small class="place-error--msg text-danger"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Description</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <textarea class="form-control" name="description"></textarea>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Brand Image</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="custom-file">
                                                                        <input is-required='true' type="file" onchange="previewFile(this);" name="image" class="custom-file-input" id="inputGroupFile01">
                                                                        <label id="custom-image-upload" onclick="removeErrorLevels($(this), 'id__')" class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                        <br>
                                                                        <small class="place-error--msg text-danger"></small>
                                                                    </div>
                                                                    <span><img class="preview--file" id="previewImg" width="100"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-11"></div>
                                                        
                                                            <button class="btn btn-primary" type="submit">Submit</button>
                                                        
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>    
                </section>

            </div>
@endsection


@push('scripts')   
<script>
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
    $("#brandAddForm_").on('submit', function(e){
        formClientSideValidation(e, "brandAddForm_", 'no');
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush