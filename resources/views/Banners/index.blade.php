@extends('layouts.master')
@section('page-title','Vendors')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">{{ $pageTitle }}</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">

                    
                                    
                                    @include('Banners.partials.top-right-banners')
                                    @include('Banners.partials.top-right-banners')
                                

                </div>
            </div>
@endsection