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
                                <div class="card-header">
                                    <h4 class="mb-0">Categories</h4>
                                </div>


                               <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('categories.create') }}" style="float: right; margin-right: 25px;"> Create New Category</a>
                                </div> 

                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category Name</th>
                                                    <th>Parent Category</th>
                                                    <th>Order</th>
                                                    <th>Visibility</th>
                                                    <th>Show on Homepage</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->parent_name }}</td>
                                                    <td>{{ $category->display_order }}</td>
                                                    <td>{{ $category->visibility }}</td>
                                                    <td>{{ $category->  show_on_homepage }}</td>
                                                    <td><a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a></td>
                                                </tr>
                                                @endforeach
                                               
                                                {!! $categories->links() !!}
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