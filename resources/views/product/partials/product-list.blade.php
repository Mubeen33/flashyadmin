@foreach($data as $key=>$content)
    @php
        $get_vendor = (\App\Vendor::where('id', $content->vendor_id)->first());
        $get_cat = (\App\Category::where('id', $content->category_id)->first());
        $get_image = (\App\ProductMedia::where('image_id', $content->image_id)->first());
    @endphp

@if($get_vendor->active == 1)
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
        <img src="{{ $get_image->image }}" width="80px" height="50px">
        @endif
    </td>
    <td>{{ $content->made_by }}</td>
    <td>{{ $content->product_type }}</td>
    <td>
          {{ $content->created_at->format('d/m/Y') }}
    </td>
    <td>
        @if(intval($content->approved) === 0)
            <span class="badge badge-danger">Pending</span>
        @elseif(intval($content->approved) === 1)
            <span class="badge badge-success">Approved</span>
        @elseif(intval($content->rejected) === 1)
            <span class="badge badge-warning">Rejected</span>
        @elseif(intval($content->disable) === 1)
            <span class="badge badge-danger">Disabled</span>
        @endif
    </td>
    <td>
        <div class="btn-group">
            <div class="dropdown">
                <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                    <a class="dropdown-item" href="{{ route('admin.productDetails.get', encrypt($content->id)) }}">Show</a>
                    <a  class="dropdown-item" href="{{route('admin.productControl.post', encrypt($content->id))}}">Approve</a>
                    <a onclick="return confirm('Are you sure to disable?')" class="dropdown-item" href="{{ route('admin.productControl.post', ['disable', encrypt($content->id)]) }}">Disable</a>
                </div>
            </div>
        </div>
        
    </td>
</tr>
@endif
@endforeach
<tr>
    <td colspan="9">{!! $data->links() !!}</td>
</tr>