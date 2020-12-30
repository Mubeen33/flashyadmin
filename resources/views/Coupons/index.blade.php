@extends('layouts.master')
@section('page-title','Vendors')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Coupons Management</li>
@endsection    
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Coupons List</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table  class="table table-striped table-hover mb-0">                                            <thead>
                                                <tr>
                                                    <th>SN.</th>
                                                    <th>Image</th>
                                                    <th>Created at</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $key=>$content)
                                                    <tr>
                                                        <th scope="row">{{ $key+1 }}</th>
                                                        <td><img src="{{$content->image}}" width="100px"></td>
                                                        <td>{{ $content->created_at->format('d/m/Y') }}</td>
                                                        <td>
                                                            @if($content->status == 0)
                                                                <span class="badge badge-danger" style="cursor:pointer"
                                                                    onclick="if(confirm('Are you sure to Active?')){document.getElementById('actionFrom-{{$content->id}}').submit()}" 
                                                                >Inactive</span>
                                                                <form action="{{ route('admin.coupon.activeInactive.post') }}" id="actionFrom-{{$content->id}}" class="d-none" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $content->id }}">
                                                                    <input type="hidden" name="status" value="1">
                                                                </form>
                                                                @else
                                                                <span class="badge badge-success" style="cursor:pointer" 
                                                                    onclick="if(confirm('Are you sure to Inactive?')){document.getElementById('actionFrom-{{$content->id}}').submit()}" 
                                                                >Active</span>
                                                                <form action="{{ route('admin.coupon.activeInactive.post') }}" id="actionFrom-{{$content->id}}" class="d-none" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $content->id }}">
                                                                    <input type="hidden" name="status" value="0">
                                                                </form>
                                                            @endif    
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateModal-{{$content->id}}">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="updateModal-{{$content->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$content->id}}" aria-hidden="true">
                                                              <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel{{$content->id}}">Update Coupon</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    <form action="{{ route('admin.coupons.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>New Coupon</label>
                                                                                    <input type="file" name="coupon_image" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>Current Coupon</label>
                                                                                    <br>
                                                                                    <img src="{{$content->image}}" width="100px">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-warning">Update</button>
                                                                        </div>
                                                                     </form>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <a onclick="return confirm('Are you sure?')" href="{{ route('admin.coupon.delete', Crypt::encrypt($content->id)) }}" class="btn btn-danger btn-sm">
                                                                <i class="feather icon-delete"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {!! $data->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            

@endsection