@extends('layouts.master')
@section('page-title','Add Variations')
@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
@endsection    
@section('content')         
            <div class="content-body">
               
                <section id="basic-horizontal-layouts">
                    <form action="{{url('add-brand')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row match-height">
                                
                                <div class="col-10"></div>
                                <button class="btn btn-primary"><a href="{{Route('brands.brandslist')}}" style="text-decoration: none;color: #fff">Variations</a></button>    
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Add Variation</b></h4>
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
                                                                    <select class="form-control" name="parent_id[]" onchange="get_subcategories(this.value, 0);" required>
                                                                        <option>none</option>
                                                                        @foreach($parentCategory as $category)
                                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endforeach    
                                                                    </select>
                                                                    <div id="subcategories_container"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="variation_name" class="form-control" required="">
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
<script>

    function get_subcategories(category_id, data_select_id) {

        //reset subcategories
        $('.subcategory-select').each(function () {
            if (parseInt($(this).attr('data-select-id')) > parseInt(data_select_id)) {
                $(this).remove();
            }
        });
        if (category_id == 0) {
            return false;
        }

        $.ajax({

            headers: {
                 'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
                 },
            method  : 'POST',
            url     : "{{url('get_subcategories')}}/"+category_id,
            data    : {"_token": "{{ csrf_token() }}","category_id":category_id},
            success : function(subcategories){

                
                var subcategories = subcategories.substring(1, subcategories.length-1);
                console.log(subcategories);
                
                var subcategories_array = [];
                for (i = 0; i < subcategories.length; i++) {
                    if (subcategories[i].parent_id == category_id) {
                        subcategories_array.push(subcategories[i]);
                    }
                }   

                if (subcategories_array.length > 0) {

                    var date = new Date();
                    var new_data_select_id = date.getTime();
                    var select_tag = '<select class="form-control subcategory-select" data-select-id="' + new_data_select_id + '" name="parent_id[]" onchange="get_subcategories(this.value,' + new_data_select_id + ');">' +
                        '<option value="">none</option>';
                    for (i = 0; i < subcategories_array.length; i++) {
                        select_tag += '<option value="' + subcategories_array[i].id + '">' + subcategories_array[i].name + '</option>';
                    }
                    select_tag += '</select>';
                    $('#subcategories_container').append(select_tag);
                }
            }
        });
        
        
        
    }
    
</script>