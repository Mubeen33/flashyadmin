@extends('layouts.master')
@section('page-title','Product Details')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Products Details</li>
@endsection 
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex"><h4 class="card-title">Products Details</h4> 
                                    @if($data->approved == 0 && $data->disable == 0)
                                    <a onclick="return confirm('Are you sure?')" class="btn btn-success btn-sm ml-1" href="{{ route('admin.productControl.post', ['approve', encrypt($data->id)]) }}">Approve Now</a>   
                                    @elseif($data->disable == 1)
                                    <a onclick="return confirm('Are you sure?')" class="btn btn-success btn-sm ml-1" href="{{ route('admin.productControl.post', ['enable', encrypt($data->id)]) }}">Enable Now</a>   
                                    @endif
                                </div>
                                <div><a href="{{ route('admin.pendingProducts.get') }}" class="ml-1 btn btn-danger btn-sm">Back</a></div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: left !important;">
                                            <tbody>
                                                @php
                                                    $get_vendor = (\App\Vendor::where('id', $data->vendor_id)->first());
                                                    $get_cat = (\App\Category::where('id', $data->category_id)->first());
                                                    $get_images = (\App\ProductMedia::where('image_id', $data->image_id)->get());
                                                @endphp
                                                <tr>
                                                    <th>Status</th>
                                                    <td>
                                                        @if($data->approved == 0 && $data->disable == 0)
                                                            <span class="badge badge-danger">Pending</span>
                                                            @elseif($data->disable == 1)
                                                            <span class="badge badge-warning">Disabled</span>
                                                            @else
                                                            <span class="badge badge-success">Approved</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Vendor</th>
                                                    <td>{{ $get_vendor->first_name }} {{ $get_vendor->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>{{ $data->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Category</th>
                                                    <td>{{ $get_cat->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td>{{ $data->description }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Images</th>
                                                    <td>
                                                        @foreach($get_images as $key=>$image)
                                                            <img src="/{{ $image->image }}" width="100px" class="m-1">
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Made By</th>
                                                    <td>
                                                       {{ $data->made_by }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>What is it?</th>
                                                    <td>
                                                       {{ $data->what_is_it }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Made Date</th>
                                                    <td>
                                                       {{ $data->made_date }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Renewal</th>
                                                    <td>
                                                       {{ $data->renewal }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Product Type</th>
                                                    <td>
                                                       {{ $data->product_type }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>SKU</th>
                                                    <td>
                                                       {{ $data->sku }}
                                                    </td>
                                                </tr>

                                                @if($data->video_link != NULL)
                                                <tr>
                                                    <th>Video</th>
                                                    <td>
                                                        <video width="250" height="200" controls>
                                                          <source src="{{ $data->video_link }}">
                                                        </video>
                                                    </td>
                                                </tr>
                                                @endif

                                                <tr>
                                                    <th>Created at</th>
                                                    <td>
                                                        {{ $data->created_at->format('d/m/Y') }}
                                                    </td>
                                                </tr>
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