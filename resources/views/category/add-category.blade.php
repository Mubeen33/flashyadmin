@extends('layouts.master')
@section('page-title','Add Category')
@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
@endsection    
@section('content')         
            <div class="content-body">
               
                <section id="basic-horizontal-layouts">
                    <form action="{{url('add-category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row match-height">
                            
                            <div class="col-md-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Add Category</b></h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Category Name</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="name"  class="form-control" name="name" placeholder="Catgory Name" required="">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Slug</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="slug"  class="form-control" name="slug" placeholder="Slug" required="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Title(meta tag)</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="title"  class="form-control" name="title" placeholder="Meta title" required="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Descripation(meta tag)</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="desc"  class="form-control" name="desc" placeholder="Meta descripation" required="">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Keywords(meta tag)</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="keyword"  class="form-control" name="keyword" placeholder="Meta Keywords" required="">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Order</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="number" min="1" value="1" id="order"  class="form-control" name="order" placeholder="Order" required="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Homepage order</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="number" min="1" value="1" id="home_order"  class="form-control" name="home_order" placeholder="homepage order" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Parent Category</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select class="form-control" name="parent_id[]" onchange="get_subcategories(this.value, 0);" required>
>
                                                                      <option value="">None</option>
                                                                      @foreach ($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option> 
                                                                      @endforeach
                                                                  </select>
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
                                                                    <input type="number" min="1" value="1" id="commission"  class="form-control" name="commission" placeholder="Order" required="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row basic-radio">
                                                                <div class="col-md-4 ">
                                                                    <span>Visibilty</span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <fieldset>
                                                                        <label>
                                                                            <input type="radio" name="visiblity" value="1" checked>
                                                                            Yes
                                                                        </label>
                                                                    </fieldset>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <fieldset>
                                                                        <label>
                                                                            <input type="radio" name="visiblity" value="0" checked>
                                                                            No
                                                                        </label>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>show on Homepage</span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <fieldset>
                                                                        <label>
                                                                            <input type="radio" name="home_visiblity" value="1" checked>
                                                                            Yes
                                                                        </label>
                                                                    </fieldset>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <fieldset>
                                                                        <label>
                                                                            <input type="radio" name="home_visiblity" value="0" checked>
                                                                            No
                                                                        </label>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Show Category on navigation</span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <fieldset>
                                                                        <label>
                                                                            <input type="radio" name="image_visiblity"  value="1" checked>
                                                                            Yes
                                                                        </label>
                                                                    </fieldset>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <fieldset>
                                                                        <label>
                                                                            <input type="radio" name="image_visiblity" value="0" checked>
                                                                            No
                                                                        </label>
                                                                    </fieldset>
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

//Image Preview Function

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
// End Image Preview

// function for subcategories 

    function get_subcategories(category_id,data_select_id){

        // commission on categoru base.

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
