@extends('layouts.master')
@section('page-title','Variations')
@push('styles')
<style type="text/css">
    #searchKey__,
    #selected_row_per_page{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
    }
</style>
@endpush


@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Variations</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @if(session('msg'))
                  {!! session('msg') !!}
                @endif
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div class="d-flex">
                                    <h4 class="card-title mr-1">Variatons Options List</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SR#</th>
                                                    <th>Option Name</th>
                                                    <th>Variant Name</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="render__data">
                                                @if(count($Options) > 0)
                                                @foreach($Options as $key => $option)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$option->option_name}}</td>
                                                        <td>
                                                            @php
                                                                $optionName = \App\VariationOption::where('id',$option->option_id)->value('option_name');
                                                            @endphp
                                                            {{ $optionName }}
                                                        </td>
                                                        <td>
                                                             @if($option->active==1)
                                                                    <div class="badge badge-success">Active</div>
                                                                @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mb-1">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-primary btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Actions
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                                                        <a class="dropdown-item" href="{{route('admin.optionEdit.get', encrypt($option->id))}}">Edit</a>
                                                                        <a class="dropdown-item" href="{{route('admin.optionDelete.post', encrypt($option->id))}}">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
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
