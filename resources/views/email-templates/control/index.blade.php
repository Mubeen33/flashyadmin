@extends('layouts.master')
@section('page-title','Email Templates')

@push('styles')
<style type="text/css">
    #searchKey__{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Email Templates</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Email Template List</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Template</th>
                                                    <th>Created at</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key=>$content)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $content->template }}</td>
                                                    <td>{{ $content->created_at->format('d/m/Y') }}</td>
                                                    <td>
                                                        <div class="btn-group mb-1">
                                                            <div class="dropdown">
                                                                <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                                                    <a class="dropdown-item" href="{{ route('admin.email-templates.show', Crypt::encrypt($content->id)) }}">Preview</a>
                                                                    <a class="dropdown-item" href="">Delete</a>
                                                                </div>
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
                </div>
            </div>
@endsection
