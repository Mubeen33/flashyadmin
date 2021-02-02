@extends('layouts.master')
@section('page-title','Custom Fields List')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Custom Fields List</li>
@endsection    
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
@section('content')                                
<div class="content-body">
    @if(session('msg'))
      {!! session('msg') !!}
    @endif
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title">Custom Fields List<a class="btn btn-warning btn-sm" href="{{route('admin.addCustomField.get')}}">Add new</a>
                    </h4>
                    <div>
                        <select id="selected_row_per_page" title="Display row per page">
                            <option value="5" selected="1">All</option>
                            <option value="10">Active</option>
                            <option value="15">Disable</option>
                        </select>
                        <input type="text" id="searchKey__" placeholder="Search">
                        <select id="selected_row_per_page" title="Display row per page">
                            <option value="5" selected="1">Show 5</option>
                            <option value="10">Show 10</option>
                            <option value="15">Show 15</option>
                            <option value="20">Show 20</option>
                            <option value="25">Show 25</option>
                            <option value="30">Show 30</option>
                        </select>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  class="table table-striped table-hover mb-0">                                            <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($customfields) > 0)
                                        @foreach($customfields as $key => $customfield)
                                           <tr>
                                               <td>{{$key+1}}</td>
                                               <td style="text-align: left;">
                                                   @foreach(json_decode($customfield->options) as $element)
                                                        {{ $element->label }}
                                                   @endforeach
                                               </td>
                                               <td >
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
                                               <td>
                                                   <div class="btn-group">
                                                      <div class="dropdown">
                                                          <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                              Actions
                                                          </button>
                                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                                              <a class="dropdown-item" href="{{ route('admin.customFields.edit.get', Crypt::encrypt($customfield->id)) }}">Edit</a>
                                                              <a class="dropdown-item" href="">Selles Report</a>
                                                              <a class="dropdown-item" href="">Transaction Report</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                               </td>
                                           </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" style="text-align: center"><b>NO RESULT FOUND</b>
                                            </td>
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