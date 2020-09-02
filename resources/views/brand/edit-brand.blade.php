@extends('layouts.master')
@section('page-title','Edit Brand')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border:1px solid red;
    }
</style>
@endpush

@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
@endsection    
@section('content')         
            <div class="content-body">
               
                <section id="basic-horizontal-layouts">
                    <form id="brandAddForm_" action="{{url('update-brand')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Edit Brands</b></h4>
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
                                                                <input type="hidden" name="id" value="{{$brand->id}}">
                                                                <div class="col-md-8">
                                                                    <input onclick="removeErrorLevels($(this), 'input')" type="text" id="first-name" value="{{$brand->name}}"  class="form-control" name="name" placeholder="Brand Name">
                                                                    <small class="place-error--msg"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Description</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <textarea onclick="removeErrorLevels($(this), 'input')" class="form-control" name="description">{{$brand->description}}</textarea>
                                                                    <small class="place-error--msg"></small>
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
                                                                        <input type="file" onchange="previewFile(this);" name="image" class="custom-file-input" id="inputGroupFile01">
                                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                    </div>
                                                                    <span><img id="previewImg" width="100" src="{{$brand->image}}"></span>
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
    $(document).ready(function(){
        $("#brandAddForm_").on('submit', function(e){
            e.preventDefault()
            let formID = "brandAddForm_";
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