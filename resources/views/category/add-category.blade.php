@extends('layouts.master')
@section('page-title','Add Category')

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
                    <form id="formWithFile__" action="{{url('add-category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row match-height">
                            
                            <div class="col-md-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Add Category</b></h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            @include('msg.msg')
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Category Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input onclick="removeErrorLevels($(this), 'input')" type="text" id="name"  class="form-control" name="name" placeholder="Category Name" value="{{ old('name') }}">
                                                                    <small class="place-error--msg"></small>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Slug</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input onclick="removeErrorLevels($(this), 'input')" type="text" id="slug"  class="form-control" name="slug" placeholder="Slug"  value="{{ old('slug') }}">
                                                                    <small class="place-error--msg"></small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Title(meta tag)</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input onclick="removeErrorLevels($(this), 'input')" type="text" id="title"  class="form-control" name="title" placeholder="Meta title"  value="{{ old('title') }}">
                                                                    <small class="place-error--msg"></small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Descripation(meta tag)</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input onclick="removeErrorLevels($(this), 'input')" type="text" id="desc"  class="form-control" name="desc" placeholder="Meta descripation"  value="{{ old('desc') }}">
                                                                    <small class="place-error--msg"></small>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Keywords(meta tag)</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input onclick="removeErrorLevels($(this), 'input')" type="text" id="keyword"  class="form-control" name="keyword" placeholder="Meta Keywords"  value="{{ old('keyword') }}">
                                                                    <small class="place-error--msg"></small>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Order</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input onclick="removeErrorLevels($(this), 'input')" type="number" min="1" value="1" id="order"  class="form-control" name="order" placeholder="Order"  value="{{ old('order') }}">
                                                                    <small class="place-error--msg"></small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Homepage order</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input onclick="removeErrorLevels($(this), 'input')" type="number" min="1" value="1" id="home_order"  class="form-control" name="home_order" placeholder="homepage order">
                                                                    <small class="place-error--msg"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Parent Category</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select onclick="removeErrorLevels($(this), 'input')" class="form-control" name="parent_id[]" onchange="get_subcategories(this.value, 0);">
>
                                                                      <option value="">None</option>
                                                                      @foreach ($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option> 
                                                                      @endforeach
                                                                  </select>
                                                                  <small class="place-error--msg"></small>
                                                                  <div id="subcategories_container"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12" id="scommission">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span id="label_commission">Category Commission</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input onclick="removeErrorLevels($(this), 'input')" type="number" min="1" value="1" id="commission"  class="form-control" name="commission" placeholder="Order">
                                                                    <small class="place-error--msg"></small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                       <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Visibilty</span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input onclick="removeErrorLevels($(this), 'input')" type="radio" class="custom-control-input" value="1"  name="visiblity" id="customRadio6" checked="1">
                                                                        <label class="custom-control-label" for="customRadio6">Yes</label>
                                                                        <small class="place-error--msg"></small>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input onclick="removeErrorLevels($(this), 'input')" type="radio" class="custom-control-input" value="0"  name="visiblity" id="customRadio5">
                                                                        <label class="custom-control-label" for="customRadio5">No</label>
                                                                        <small class="place-error--msg"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>show on Homepage</span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input onclick="removeErrorLevels($(this), 'input')" type="radio" class="custom-control-input" value="1"  name="home_visiblity" id="customRadio4" checked="1">
                                                                        <label class="custom-control-label" for="customRadio4">Yes</label>
                                                                        <small class="place-error--msg"></small>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input onclick="removeErrorLevels($(this), 'input')" type="radio" class="custom-control-input" value="0"  name="home_visiblity" id="customRadio3">
                                                                        <label class="custom-control-label" for="customRadio3">No</label>
                                                                        <small class="place-error--msg"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Show Category on navigation</span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input onclick="removeErrorLevels($(this), 'input')" type="radio" class="custom-control-input" value="1"  name="image_visiblity" id="customRadio1" checked="1">
                                                                        <label class="custom-control-label" for="customRadio1">Yes</label>
                                                                        <small class="place-error--msg"></small>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-radio">
                                                                        <input onclick="removeErrorLevels($(this), 'input')" type="radio" class="custom-control-input" value="0"  name="image_visiblity" id="customRadio2">
                                                                        <label class="custom-control-label" for="customRadio2">No</label>
                                                                        <small class="place-error--msg"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Category Image</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="custom-file">
                                                                        <input type="file" onchange="previewFile(this);" name="image" class="custom-file-input" id="inputGroupFile01">
                                                                        <label id="custom--img-input" onclick="removeErrorLevels($(this), 'id__')" class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                        <small>Image Size 170px * 170px</small>
                                                                        <br>
                                                                        <small class="place-error--msg"></small>
                                                                    </div>
                                                                    <span><img id="previewImg" width="100" src=""></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-9"></div>
                                                        <div class="col-md-3">
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

<script>

// function for subcategories 

    function get_subcategories(category_id,data_select_id){

        // commission on category base.

            getCommission(category_id);

        // end comission

        //reset subcategories

        $('.subcategory-select').each(function () {
            if (parseInt($(this).attr('data-select-id')) > parseInt(data_select_id)) {
                $(this).remove();
            }
        });
        // ajax function for subcategories 
            if (category_id == null) {

                return false;
            }
            else{

                $.ajax({

                    headers: {
                         'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
                         },
                    method  : 'POST',
                    url     : "{{url('get_subcategories')}}/"+category_id,
                    data    : {"_token": "{{ csrf_token() }}","category_id":category_id},
                    success : function(subcategories){

                        // console.log(subcategories);
                       $('#subcategories_container').append(subcategories); 
                        
                    }
                });
            }          

    }

//  commission function 
    
    function getCommission(category_id){

        $.ajax({

            headers: {
                 'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
                 },
            method  : 'POST',
            url     : "{{url('get_categories_commission')}}/"+category_id,
            data    : {"_token": "{{ csrf_token() }}","category_id":category_id},
            success : function(commission){

                // console.log(commission);

                    if (category_id == null) {

                        return false;
                    }else{

                        $('#label_commission').html('Default Category Commission<span class="text text-danger">(You can edit it.)</span>');
                        $('#commission').val(commission);

                    }
                    
                  
                
                
            }
        });
    } 
</script>
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
        $("#formWithFile__").on('submit', function(e){
            e.preventDefault()
            let formID = "formWithFile__";
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