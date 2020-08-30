@extends('layouts.master')
@section('page-title','Pending Deals')

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
    <li class="breadcrumb-item active">Pending Deals</li>
@endsection 
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div><h4 class="card-title">Pending Deals</h4></div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Created at</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody id="render__data">
                                                @foreach($data as $key=>$content)
                                                    <tr>
                                                        <th scope="row">{{ $key+1 }}</th>
                                                        <td>{{ $content->get_vendor->first_name." ".$content->get_vendor->last_name }}</td>                                          
                                                        <td>{{ $content->get_vendor->email }}</td>
                                                        <td>{{ $content->get_product->title }}</td>
                                                        <td>{{ $content->price }}</td>
                                                        <td>{{ $content->quantity }}</td>
                                                        <td>{{ $content->start_date }}</td>
                                                        <td>{{ $content->end_date }}</td>
                                                        <td>{{ $content->created_at->format('d/m/Y') }}</td>
                                                        <td>
                                                            @if($content->status == 0)
                                                                <div class="badge badge-danger">Pending</div>
                                                            @endif    
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mb-1">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Actions
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                                                        <a onclick="return confirm('Are you sure?')" class="dropdown-item" href="{{ route('admin.vendor.deal.approve', Crypt::encrypt($content->id)) }}">Approve</a>
                                                                        <a class="dropdown-item" href="">Reject</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="9">{!! $data->links() !!}</td>
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

@push('scripts')
<script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
@endpush