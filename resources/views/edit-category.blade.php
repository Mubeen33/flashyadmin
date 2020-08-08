@extends('layouts.master')
@section('page-title','Categories')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Edit Category</li>
@endsection    
                            
@section('content')            
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">                   
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Edit Category</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                                        
                        <form action="{{ route('categories.update',$category->id) }}" method="POST">
                            @csrf
							 @method('PUT')
  
         <div class="row" style="width:250px; margin-left:25%;">
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Category Name:</strong>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" placeholder="slug">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
       
    </form>
                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
@endsection        