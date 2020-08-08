@extends('layouts.master')
@section('page-title','Add Category')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Category</li>
@endsection    
                            
@section('content')

            <div class="content-body">
                <!-- account setting page starts -->
                <section id="page-account-settings">
                    <div class="row">
                   
                    <div class="col-lg-10 col-md-12 card">
                            <div class="box box-primary">
                                
                                <div class="box-header with-border">
                                    <div class="left">
                                        
                                    
                                </div><!-- /.box-header -->

                                <!-- form start -->
                                <form action="h/vendor/create-category" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    @csrf

                                <input type="hidden" name="parent_id" value="0">

                                <div class="box-body">
                                

                                        <div class="form-group">
                                            <label>Category Name (English)</label>
                                            <input type="text" class="form-control" name="name_lang_1" placeholder="Category Name" maxlength="255" required="">
                                        </div>
                                       
                                    
                                    <div class="form-group">
                                        <label class="control-label">Slug						<small>(If you leave it blank, it will be generated automatically.)</small>
                                        </label>
                                        <input type="text" class="form-control" name="slug_lang" placeholder="Slug">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Title (Meta Tag)</label>
                                        <input type="text" class="form-control" name="title_meta_tag" placeholder="Title (Meta Tag)" value="">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Description (Meta Tag)</label>
                                        <input type="text" class="form-control" name="description" placeholder="Description (Meta Tag)" value="">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Keywords (Meta Tag)</label>
                                        <input type="text" class="form-control" name="keywords" placeholder="Keywords (Meta Tag)" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Order</label>
                                        <input type="number" class="form-control" name="category_order" placeholder="Order" value="" min="1" max="99999" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Homepage Order</label>
                                        <input type="number" class="form-control" name="homepage_order" placeholder="Homepage Order" value="" min="1" max="99999" required="">
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-sm-3">
                                        <label>Parent Category</label>
                                        <select class="form-control" name="parent_id[]" onchange="get_subcategories(this.value, 0);" required="">
                                            <option value="0">None</option>
                                                                        <option value="1">Clothing</option>
                                                                        <option value="2">Shoes</option>
                                                                        <option value="3">Home &amp; Living</option>
                                                                        <option value="4">Jewelry &amp; Accessories</option>
                                                                        <option value="5">Toys &amp; Entertainment</option>
                                                                        <option value="6">Graphics &amp; Photos</option>
                                                                        <option value="7">Video &amp; Audio</option>
                                                                        <option value="8">Web Templates  &amp; Code</option>
                                                                </select>
                                        <div id="subcategories_container"></div>
                                    </div>
                                   
                                   
                                    
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12">
                                                <label>Visibility</label>
                                            </div>
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="customRadio" id="customRadio1" checked="">
                                                            <label class="custom-control-label" for="customRadio1">Yes</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="customRadio" id="customRadio2">
                                                            <label class="custom-control-label" for="customRadio2">No</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12">
                                                <label>Show on Homepage</label>
                                            </div>
                                          
                                           
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="customRadio" id="customRadio1" checked="">
                                                            <label class="custom-control-label" for="customRadio1">Yes</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="customRadio" id="customRadio2">
                                                            <label class="custom-control-label" for="customRadio2">No</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                
                                            </ul>
                                       
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12">
                                                <label>Show Category Image on the Navigation</label>
                                            </div>
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="customRadio" id="customRadio5" checked="">
                                                            <label class="custom-control-label" for="customRadio1">Yes</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                <li class="d-inline-block mr-2">
                                                    <fieldset>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="customRadio" id="customRadio2">
                                                            <label class="custom-control-label" for="customRadio2">No</label>
                                                        </div>
                                                    </fieldset>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Image</label>
                                        <div class="display-block">
                                            <a class="btn btn-primary btn-sm btn-file-upload">
                                                Select Image							<input type="file" id="Multifileupload" name="file" size="40" accept=".png, .jpg, .jpeg, .gif">
                                            </a>
                                        </div>

                                        <div id="MultidvPreview" class="image-preview"></div>
                                    </div>

                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary pull-right">Add Category</button>
                                </div>
                                <!-- /.box-footer -->
                                </form><!-- form end -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->

      
@endsection      
