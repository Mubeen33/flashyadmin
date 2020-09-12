@extends('layouts.master')
@section('page-title','Add CustomFeilds')

@push('styles')
<style type="text/css">
    .border-danger-alert{
        border:1px solid red;
    }
</style>
@endpush

@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Custom Feilds</a></li>
@endsection    
@section('content')
    @include('msg.msg')
            <div class="content-body">
                <section id="basic-horizontal-layouts">
                    <form id="addCustomFields_from" action="{{route('admin.addCustomField.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row match-height">
                                   
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Add Custom Fields</b><button type="button" class="btn btn-sm btn-warning" style="left: 15px;position: relative;"><a href="{{route('admin.customFieldList.get')}}" style="text-decoration: none;color: #fff">Custom Fields</a></button> </h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Parent Category</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select onclick="removeErrorLevels($(this), 'input')" class="form-control" name="parent_id[]" onchange="get_subcategories(this.value, 0);">
                                                                        <option value="">none</option>
                                                                        @foreach($parentCategory as $category)
                                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endforeach    
                                                                    </select>
                                                                    <small class="place-error--msg"></small>
                                                                    <div id="subcategories_container"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-8" id="form">
                                                            
                                                        </div>
                                                        <div class="col-4">
                                                            <ul class="list-group">
                                                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('text')">{{__('Text Input')}}</li>
                                                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('select')">{{__('Select')}}</li>
                                                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('multi-select')">{{__('Multiple Select')}}</li>
                                                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('radio')">{{__('Radio')}}</li>
                                                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('file')">{{__('File')}}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-11"></div>
                                                            <button class="btn btn-warning" type="submit">Submit</button>
                                                        
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
            url     : "{{url('admin/get_subcategories')}}/"+category_id,
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
<script type="text/javascript">

        var i = 0;

        function add_customer_choice_options(em){
            var j = $(em).closest('.form-group').find('.option').val();
            var str = '<div class="row form-group">'
                            +'<div class="col-sm-6 col-sm-offset-4">'
                                +'<input class="form-control" type="text" name="options_'+j+'[]" value="" required>'
                            +'</div>'
                            +'<div class="col-sm-2"> <span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                            +'</div>'
                        +'</div>'
            $(em).parent().find('.customer_choice_options_types_wrap_child').append(str);
        }
        function delete_choice_clearfix(em){
            $(em).parent().parent().remove();
        }
        function appenddToForm(type){
            //$('#form').removeClass('seller_form_border');
            if(type == 'text'){
                var str = '<div class="row form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                                +'<input type="hidden" name="type[]" value="text">'
                                +'<div class="col-lg-3">'
                                    +'<label class="control-label">Text</label>'
                                +'</div>'
                                +'<div class="col-lg-7">'
                                    +'<input class="form-control" type="text" name="label[]" placeholder="Label">'
                                +'</div>'
                                +'<div class="col-lg-2">'
                                    +'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                                +'</div>'
                            +'</div>';
                $('#form').append(str);
            }
            else if (type == 'select') {
                i++;
                var str = '<div class="row form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                                +'<input type="hidden" name="type[]" value="select"><input type="hidden" name="option[]" class="option" value="'+i+'">'
                                +'<div class="col-lg-3">'
                                    +'<label class="control-label">Select</label>'
                                +'</div>'
                                +'<div class="col-lg-7">'
                                    +'<input class="form-control" type="text" name="label[]" placeholder="Select Label" style="margin-bottom:10px">'
                                    +'<div class="customer_choice_options_types_wrap_child">'

                                    +'</div>'
                                    +'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
                                +'</div>'
                                +'<div class="col-lg-2">'
                                    +'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                                +'</div>'
                            +'</div>';
                $('#form').append(str);
            }
            else if (type == 'multi-select') {
                i++;
                var str = '<div class="row form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                                +'<input type="hidden" name="type[]" value="multi_select"><input type="hidden" name="option[]" class="option" value="'+i+'">'
                                +'<div class="col-lg-3">'
                                    +'<label class="control-label">Multiple select</label>'
                                +'</div>'
                                +'<div class="col-lg-7">'
                                    +'<input class="form-control" type="text" name="label[]" placeholder="Multiple Select Label" style="margin-bottom:10px">'
                                    +'<div class="customer_choice_options_types_wrap_child">'

                                    +'</div>'
                                    +'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
                                +'</div>'
                                +'<div class="col-lg-2">'
                                    +'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                                +'</div>'
                            +'</div>';
                $('#form').append(str);
            }
            else if (type == 'radio') {
                i++;
                var str = '<div class="row form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                                +'<input type="hidden" name="type[]" value="radio"><input type="hidden" name="option[]" class="option" value="'+i+'">'
                                +'<div class="col-lg-3">'
                                    +'<label class="control-label">Radio</label>'
                                +'</div>'
                                +'<div class="col-lg-7">'
                                    +'<input class="form-control" type="text" name="label[]" placeholder="Radio Label" style="margin-bottom:10px">'
                                    +'<div class="customer_choice_options_types_wrap_child">'

                                    +'</div>'
                                    +'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
                                +'</div>'
                                +'<div class="col-lg-2">'
                                    +'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                                +'</div>'
                            +'</div>';
                $('#form').append(str);
            }
            else if (type == 'file') {
                var str = '<div class="row form-group" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                                +'<input type="hidden" name="type[]" value="file">'
                                +'<div class="col-lg-3">'
                                    +'<label class="control-label">File</label>'
                                +'</div>'
                                +'<div class="col-lg-7">'
                                    +'<input class="form-control" type="text" name="label[]" placeholder="Label">'
                                +'</div>'
                                +'<div class="col-lg-2">'
                                    +'<span class="btn btn-icon btn-circle icon-lg fa fa-times" onclick="delete_choice_clearfix(this)"></span>'
                                +'</div>'
                            +'</div>';
                $('#form').append(str);
            }
        }
</script>  
<script type="text/javascript">
    $("#addCustomFields_from").on('submit', function(e){
        formClientSideValidation(e, "addCustomFields_from", 'no');
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush  
