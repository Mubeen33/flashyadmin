@extends('layouts.master')
@section('page-title','Add User')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">User</li>
@endsection    
                            
@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="col-md-8 card" style="padding:20px;">
<form method="post" action="{{route('user')}}" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="exampleInputEmail1">UserName</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" required>
    
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mobile</label>
    <input type="number" name="mobile" class="form-control" id="exampleInputPassword1" placeholder="Mobile Number" required>
  </div>
  <div class="form-group">
        <label for="exampleInputEmail1">Role</label>
            <select name="role_id" class="browser-default custom-select">
                <option value=''>Select role</option>
                <option value="1">Admin</option>
                <option value="0">Manager</option>
            </select>
</div>
  <div class="form-group">
        <label for="exampleInputEmail1">Visibility</label>
            <select name="visibility" class="browser-default custom-select">
                <option selected>Select status</option>
                <option value="1">Active</option>
                <option value="0">In-Active</option>
            </select>
</div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection