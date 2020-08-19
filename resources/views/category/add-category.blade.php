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
                                                                    <input type="text" id="order"  class="form-control" name="order" placeholder="Order" required="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Homepage order</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="home_order"  class="form-control" name="home_order" placeholder="homepage order" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Parent Category</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select name="cat_id" id="cat_id" class="form-control" onchange="myFunction(this.value)">
                                                                      <option value="null">None</option>
                                                                      @foreach ($categories as $item)
                                                                  <option value="{{$item->id}}">{{$item->name}}</option> 
                                                                      @endforeach
                                                                  </select>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-12" id="subdiv" style="display: none">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">

                                                                </div>
                                                                <div class="col-md-8">
                                                                    
                                                              <select name="subcat" id="subcat" class="form-control" onchange="myChild(this.value)">
                                                                    
                                                                  </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12" id="childdiv" style="display: none">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">

                                                                </div>
                                                                <div class="col-md-8">
                                                                    
                                                              <select name="childcat" id="childcat" class="form-control">
                                                            
                                                            </select>
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
                                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                    </div>
                                                                    <span><img id="previewImg" width="100"></span>
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
             
        




 function myFunction(val) {
 var parent_id=val;

 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  
});

  $.ajax({
 type : "POST",
 url  :'get_child',
 data: {
 parent_id: parent_id,
 _token: '{{ csrf_token() }}'
  },
     success: function(data)
     {
        $("#subdiv").show();
        $element = $("#subcat");
        $element.empty();
        $element.append("<option value='null'>None</option>");
        $(data).each(function(){
          $element.append("<option value='"+ this.id +"'>"+ this.name +"</option>");
        });

          
     }
            });
}
    


function myChild(val)
{
 var parent_id=val;
 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  
});

  $.ajax({
    type : "POST",
    url  :'get_child',
    data: {
 parent_id: parent_id,
 _token: '{{ csrf_token() }}'
  },
     success: function(data)
     {
        $("#childdiv").show();
        $element = $("#childcat");
      
        $element.empty();
        $element.append("<option value='null'>None</option>");
        $(data).each(function(){
          $element.append("<option value='"+ this.id +"'>"+ this.name +"</option>");
        });

          
     }
            });
}            
     

            </script>
@endsection       
