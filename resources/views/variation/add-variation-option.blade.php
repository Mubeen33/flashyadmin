@extends('layouts.master')
@section('page-title','Add Variations')
@section('breadcrumbs')
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Add Variations</a></li>
@endsection    
@section('content')         
            <div class="content-body">
               
                <section id="basic-horizontal-layouts">
                    <form action="{{route('admin.addVaritaionOption.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                                                    <span>Select Variation</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select class="form-control" name="variation_id" required>
                                                                        <option selected="">Select Variation</option>
                                                                        @foreach($variations as $variation)
                                                                            <option value="{{$variation->id}}">{{$variation->variation_name}}</option>
                                                                        @endforeach    
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12" id="form">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Option Name</span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" name="option_name[]" class="form-control">
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
<script>

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
@endsection       
