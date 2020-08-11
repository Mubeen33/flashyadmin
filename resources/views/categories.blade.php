@extends('layouts.master')
@section('page-title','Categories')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Categories</li>
@endsection    
         
                  
@section('content')            
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">                   
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header col-sm-12 text-right">
                                    <a class="btn btn-success" href="{{ url('/add-category') }}" style="margin-right: 25px;"> Create New Category</a>
                                </div>

                                @if ($message = Session::get('success'))
									<div class="alert alert-success">
										<p>{{ $message }}</p>
									</div>
                            	@endif
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-striped table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category Name</th>
                                                    <th>Order</th>
                                                    <th>Visibility</th>
                                                    <th>Show on Homepage</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $category['id'] }}</td>
                                                    <td>{{ $category['name'] }}</td>
                                                    <td>{{ $category['display_order'] }}</td>
                                                    <td>{{ $category['visibility'] }}</td>
                                                    <td>{{ $category['show_on_homepage'] }}</td>
                                                    <td>
														<div class="dropdown">
															<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 8px 20px;">
																Action
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																<a class="dropdown-item" href="{{ url('edit/'.$category['id']) }}">Edit</a>
																<a class="dropdown-item" href="/{{ $category['id']}}/delete/category">Delete</a>
															</div>
														</div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->
            </div>
@endsection        