@extends('layouts.master')
@section('page-title','Edit Variations')
@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
@endsection    
@section('content')         
            <div class="content-body">
               
                <section id="basic-horizontal-layouts">
                    <form action="{{url('update-variation')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Edit Variation</b></h4>
                                    </div>
                                    <input type="hidden" name="id" value="{{$variant->id}}">
                                    <div class="card-content">
                                        <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="variation_name" value="{{ $variant->variation_name }}" class="form-control" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Image Approval</span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" value="1" {{ $image_approval == 1 ? 'checked' : '' }} name="image_approval" id="customRadio1">
                                                                        <label class="custom-control-label" for="customRadio1">Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" value="0" {{ $image_approval == 0 ? 'checked' : '' }} name="image_approval" id="customRadio2">
                                                                        <label class="custom-control-label" for="customRadio2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>SKU Approval</span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" {{ $variant->sku_approval == 1 ? 'checked' : '' }} value="1" name="sku_approval" id="customRadio3">
                                                                        <label class="custom-control-label" for="customRadio3">Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" {{ $variant->sku_approval == 0 ? 'checked' : '' }} value="0" name="sku_approval" id="customRadio4">
                                                                        <label class="custom-control-label" for="customRadio4">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Text Field</span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" {{ $variant->is_text == 1 ? 'checked' : '' }} value="1" name="is_text" id="customRadio5">
                                                                        <label class="custom-control-label" for="customRadio5">Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" {{ $variant->is_text == 0 ? 'checked' : '' }} value="0" name="is_text" id="customRadio6">
                                                                        <label class="custom-control-label" for="customRadio6">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Select</span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" {{ $variant->is_select == 1 ? 'checked' : '' }} value="1" name="is_select" id="customRadio7">
                                                                        <label class="custom-control-label" for="customRadio7">Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" {{ $variant->is_select == 0 ? 'checked' : '' }} value="0" name="is_select" id="customRadio8">
                                                                        <label class="custom-control-label" for="customRadio8">No</label>
                                                                    </div>
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
<script>

    function get_subcategories(category_id, data_select_id) {

        //reset subcategories
        $('.subcategory-select').each(function () {
            if (parseInt($(this).attr('data-select-id')) > parseInt(data_select_id)) {
                $(this).remove();
            }
        });
        

        $.ajax({

            headers: {
                 'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
                 },
            method  : 'POST',
            url     : "{{url('get_subcategories')}}/"+category_id,
            data    : {"_token": "{{ csrf_token() }}","category_id":category_id},
            success : function(subcategories){

                // console.log(subcategories);
                if (category_id == null) {

                    return false;
                }else{

                    $('#subcategories_container').append(subcategories);
                }
                
            }
        });  
    }
    
</script>            
@endsection       
