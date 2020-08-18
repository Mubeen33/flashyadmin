@extends('layouts.master')
@section('page-title','Edit Brand')
@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
@endsection    
@section('content')         
            <div class="content-body">
               
                <section id="basic-horizontal-layouts">
                    <form action="{{url('update-category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row match-height">
                            
                            <div class="col-md-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><b>Edit Category</b></h4>
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
                                                                    <input type="hidden" id="name"  class="form-control" name="id" value="{{$categories->id}}" required="">
                                                                <input type="text" id="name"  class="form-control" name="name" value="{{$categories->name}}" required="">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Slug</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="slug"  class="form-control" name="slug" value="{{$categories->slug}}" required="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Title(meta tag)</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="title"  class="form-control" name="title" value="{{$categories->title}}" required="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Descripation(meta tag)</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="desc"  class="form-control" name="desc" value="{{$categories->desc}}" required="">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Keywords(meta tag)</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="keyword"  class="form-control" name="keyword" value="{{$categories->keyword}}" required="">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Order</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="order"  class="form-control" name="order" value="{{$categories->order}}" required="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Homepage order</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="home_order"  class="form-control" name="home_order" value="{{$categories->home_order}}" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Parent Category</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="parent_id"  class="form-control" name="parent_id" value="{{$categories->parent_id}}" required="">
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
                                                                    <span><img id="previewImg" width="100"></span>
                                                                    <input type="hidden" id="image"  class="form-control" name="image" value="{{$categories->photo}}" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
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
@endsection       
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