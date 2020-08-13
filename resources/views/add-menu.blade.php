@extends('layouts.master')
@section('page-title','Add Menu')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Menu</li>
@endsection    
                            
@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<form method="post" action="{{route('menu')}}" enctype="multipart/form-data">
@csrf
<div class="form-group">
        <label for="exampleInputEmail1">Select Parent</label>
            <select name="parent" class="browser-default custom-select" >
                <option value=''>Menu parent</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Menu Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter menu" required>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">URL</label>
    <input type="text" name="url" class="form-control" id="exampleInputPassword1" placeholder="URL" required>
  </div>
  <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
            <select name="visibility" class="browser-default custom-select">
                <option selected>Select status</option>
                <option value="1">Active</option>
                <option value="0">In-Active</option>
            </select>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Sort Order</label>
    <input type="number" name="order" class="form-control" id="exampleInputPassword1" placeholder="Order" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection