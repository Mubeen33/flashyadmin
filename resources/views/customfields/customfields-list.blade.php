@extends('layouts.master')
@section('page-title','Custom Fields List')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Custom Fields List</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @if(session('msg'))
                  {!! session('msg') !!}
                @endif
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="row">
                            <div class="col offset-10">
                                <a class="btn btn-warning" href="{{route('admin.addCustomField.get')}}">Add new</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Custom Fields List</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Category Name</th>
                                                    <th>Status</th>
                                                    {{-- <th>Actions</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($customfields) > 0)
                                                    @foreach($customfields as $key => $customfield)
                                                       <tr>
                                                           <td>{{$key+1}}</td>
                                                           <td>
                                                               @foreach(json_decode($customfield->options) as $element)
                                                                    {{ $element->label }}
                                                               @endforeach
                                                           </td>
                                                           <td>
                                                               @php
                                                                    $categoryName = \App\Category::where('id',$customfield->category_id)->value('name');
                                                                @endphp
                                                                {{ $categoryName }}
                                                           </td>
                                                           <td>
                                                               @if($customfield->active==1)
                                                                    <div class="badge badge-success">Active</div>
                                                                @endif
                                                           </td>
                                                       </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="5" style="text-align: center"><b>NO RESULT FOUND</b></td>
                                                    </tr>
                                                @endif    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection