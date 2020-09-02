<div class="form-group">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            
            <table class="table" style="text-align: left !important;">
                <tr>
                    <th colspan="2"><h4>About Deal</h4></th>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $content->price }}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $content->quantity }}</td>
                </tr>
                <tr>
                    <th>Start Time</th>
                    <td>{{ $content->start_time }}</td>
                </tr>
                <tr>
                    <th>End Time</th>
                    <td>{{ $content->end_time }}</td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{ $content->created_at->format('d/m/Y') }}</td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 col-md-12">
            <table class="table" style="text-align: left !important;">
                <tr>
                    <th colspan="2"><h4>About Product</h4></th>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $content->get_product->title }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $content->get_product->price }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    @php
                        $getCat = (\App\Category::where('id', $content->get_product->cat_id)->first());
                    @endphp
                    <td>@if($getCat){{ $getCat->name }}@endif</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $content->get_product->description }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><img src="{{ $content->get_product->image }}" width="100px" height="90px"></td>
                </tr>
                <tr>
                    <th>More...</th>
                </tr>
            </table>
        </div>
    </div>
</div>



<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <table class="table" style="text-align: left !important;">
                <tr>
                    <th><h4>Vendor Details</h4></th>
                </tr>
                <tr>
                    <th>First Name</th>
                    <th>{{ $content->get_vendor->first_name }}</th>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <th>{{ $content->get_vendor->last_name }}</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>{{ $content->get_vendor->email }}</th>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <th>{{ $content->get_vendor->mobile }}</th>
                </tr>
                <tr>
                    <th>Account Status</th>
                    <th>
                        @if($content->get_vendor->active == 0)
                            <span class="badge badge-danger">Pending</span>
                            @else
                            <span class="badge badge-success">Approved</span>
                        @endif
                    </th>
                </tr>
                <tr>
                    <th>Joining Date</th>
                    <th>{{ $content->get_vendor->created_at->format('d/n/Y') }}</th>
                </tr>
            </table>
        </div>
    </div>
</div>


@if($content->status == 0)
<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" onclick="return confirm('Are you sure?')" href="{{ route('admin.vendor.deal.approve', Crypt::encrypt($content->id)) }}">Approve</a>
        </div>
    </div>
</div>
@endif