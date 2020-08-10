@extends('layouts.master')
@section('page-title','Categories')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Add Category</li>
@endsection    
                            
@section('content')            
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">                   
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-2 pt-3">
                                <div class="card-content">
                                    <div class="row">
                                    	<div class="col-12">
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
											<form action="{{ route('categories.store') }}" method="POST" class="col-12">
												@csrf
												<div class="row">
													<div class="col-12" >
														<div class="form-group">
															<strong>Category Name:</strong>
															<small>(English)</small>
															<input type="text" name="name" class="form-control" placeholder="name">
														</div>
													</div>
													<div class="col-12" >
														<div class="form-group">
															<strong>Category Name:</strong>
															<small>(Deutsch)</small>
															<input type="text" name="name" class="form-control" placeholder="name">
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
															<strong>Slug:</strong>
															<input type="text" name="slug" class="form-control" placeholder="slug">
														</div>
													</div>
													<div class="col-12 text-center">
														<button type="submit" class="btn btn-primary">Submit</button>
													</div>
												</div>
											</form>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
@endsection        