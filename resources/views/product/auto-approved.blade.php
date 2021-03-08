@extends('layouts.master')
@section('page-title','Products')

@push('styles')
<style type="text/css">
    #searchKey__,
    #selected_row_per_page,
    #hidden__id,
    #hidden__status,
    #selected_row_status{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Auto Approved Products</li>
@endsection
@section('content')

     @livewire('product.auto-approved')

@endsection
