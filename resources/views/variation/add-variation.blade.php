@extends('layouts.master')
@section('page-title','Add Variations')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border:1px solid red;
    }
</style>
@endpush

@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Add Variation</a></li>
@endsection    
@section('content')         
            <div class="content-body">
               
                <section id="basic-horizontal-layouts">
                    <form id="addVariationForm_" action="{{route('admin.addVariaton.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div>
                                            <h4 class="card-title"><b>Add Variation</b></h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary btn-sm" href="{{Route('admin.variations.variationslist')}}">Variations</a>
                                        </div>
                                    </div>
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
                                                                    <input onclick="removeErrorLevels($(this), 'input')" type="text" name="variation_name" class="form-control">
                                                                    <small class="place-error--msg"></small>
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
                                                                        <input onclick="removeErrorLevels($(this), 'input')" type="radio" class="custom-control-input" value="1" name="image_approval" id="customRadio1">
                                                                        <label class="custom-control-label" for="customRadio1">Yes</label>
                                                                        <br>
                                                                        <small class="place-error--msg"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input onclick="removeErrorLevels($(this), 'input')" type="radio" class="custom-control-input" value="0" name="image_approval" id="customRadio2">
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
                                                                        <input type="radio" class="custom-control-input" value="1" name="sku_approval" id="customRadio3">
                                                                        <label class="custom-control-label" for="customRadio3">Yes</label>
                                                                        <small class="place-error--msg"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" value="0" name="sku_approval" id="customRadio4">
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
                                                                        <input type="radio" class="custom-control-input" value="1" name="is_text" id="customRadi10">
                                                                        <label class="custom-control-label" for="customRadi10">Yes</label>
                                                                        <small class="place-error--msg"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" value="0" name="is_text" id="customRadio5">
                                                                        <label class="custom-control-label" for="customRadio5">No</label>
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
                                                                        <input type="radio" class="custom-control-input" value="1" name="is_select" id="customRadio7">
                                                                        <label class="custom-control-label" for="customRadio7">Yes</label>
                                                                        <small class="place-error--msg"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input" value="0" name="is_select" id="customRadio8">
                                                                        <label class="custom-control-label" for="customRadio8">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-header">
                                                            <div>
                                                                <h4 class="card-title"><b>Add Option in This variant</b></h4><br><br>
                                                            </div>
                                                        </div>        
                                                        <div class="col-12" id="form">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Option Name</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" name="option_name[]" class="form-control" required="">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <button class="btn btn-warning" type="button" onclick="appenddToForm('text')">Add new Option</button>
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
{{-- <script>

    function get_subcategories(category_id, data_select_id) {

        //reset subcategories
        $('.subcategory-select').each(function () {
            if (parseInt($(this).attr('data-select-id')) > parseInt(data_select_id)) {
                $(this).remove();
            }
        });
        
    // ajax function for subcategories

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
    
</script>  --}}

@endsection


@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $("#addVariationForm_").on('submit', function(e){
            e.preventDefault()
            let formID = "addVariationForm_";
            let form = $(this);
            let url = form.attr('action');
            let type = form.attr('method');
            let form_data = form.serialize();
            formSubmitWithFile(formID, url, type, form_data);
        })
    });

    // Append new rows
        function appenddToForm(type){

        if(type == 'text'){
                var str = '<div class="form-group row">'
                                +'<div class="col-md-4">'
                                    +'<span>Option Name</span>'
                                +'</div>'
                                +'<div class="col-md-6">'
                                    +'<input type="text" name="option_name[]" class="form-control" required="">'
                                +'</div>'    
                                +'<div class="col-md-1">'
                                    +'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                                +'</div>'
                            +'</div>';
                $('#form').append(str);
            }
    }

    function delete_choice_clearfix(em){
        $(em).parent().parent().remove();
    }
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush
