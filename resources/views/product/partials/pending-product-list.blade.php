@foreach($data as $key=>$content)
    @php
        $get_vendor = (\App\Vendor::where('id', $content->vendor_id)->first());
        $get_cat = (\App\Category::where('id', $content->category_id)->first());
        $get_image = (\App\ProductMedia::where('image_id', $content->image_id)->first());
    @endphp
<tr>
    <th scope="row">{{ $key+1 }}</th>
    <td>
        @if($get_vendor)
        {{ $get_vendor->first_name }} {{ $get_vendor->last_name }}
        @endif
    </td>                                          
    <td>{{ $content->title }}</td>
    <td>
        @if($get_cat)
        {{ $get_cat->name }}
        @endif
    </td>
    <td>
        @if($get_image)
        <img src="{{ asset('upload-images/products/'.$get_image->image) }}">
        @endif
    </td>
    <td>{{ $content->made_by }}</td>
    <td>{{ $content->product_type }}</td>
    <td>
          {{ $content->created_at->format('d/m/Y') }}
    </td>
    <td>
        <span class="badge badge-danger">Pending</span>
    </td>
    <td>
        <div class="btn-group">
            <div class="dropdown">
                <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                    <a class="dropdown-item" href="{{ route('admin.productDetails.get', encrypt($content->id)) }}">Show</a>
                    <a onclick="return confirm('Are you sure to approve?')" class="dropdown-item" href="{{ route('admin.productControl.post', ['approve', encrypt($content->id)]) }}">Approve</a>
                    <a onclick="return confirm('Are you sure to disable?')" class="dropdown-item" href="{{ route('admin.productControl.post', ['disable', encrypt($content->id)]) }}">Disable</a>
                </div>
            </div>
        </div>
        
    </td>
</tr>
@endforeach
<tr>
    <td colspan="9">{!! $data->links() !!}</td>
</tr>