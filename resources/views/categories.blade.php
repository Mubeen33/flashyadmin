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
                                                    <td><i class="fa fa-circle font-small-3 text-success mr-50"></i>{{ $category->name }}</td>
                                                    <td class="p-1">
                                                        <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Vinnie Mostowy" class="avatar pull-up">
                                                                <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="30" width="30">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Elicia Rieske" class="avatar pull-up">
                                                                <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Julee Rossignol" class="avatar pull-up">
                                                                <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar" height="30" width="30">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Darcey Nooner" class="avatar pull-up">
                                                                <img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>Anniston, Alabama</td>
                                                    <td>
                                                        <span>130 km</span>
                                                        <div class="progress progress-bar-success mt-1 mb-0">
                                                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>14:58 26/07/2018</td>
                                                    <td>28/07/2018</td>
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