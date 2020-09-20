@foreach($data as $key=>$content)
@if(intval($content->get_vendor->active) === 1 && intval($content->approved) === 0)


    <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td>
            {{ $content->get_vendor->first_name }} {{ $content->get_vendor->last_name }}
        </td>                                          
        <td>{{ $content->title }}</td>
        <td>
            {{ $content->get_category->name }}
        </td>
        <td>
            @if(!$content->get_images->isEmpty())
            @foreach($content->get_images as $key=>$image)
                @if($key == 0)
                <img src="{{ $image->image }}" width="80px" height="50px">
                @endif
            @endforeach
            @endif
        </td>
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
                        <a  class="dropdown-item" href="{{route('admin.productControl.post', encrypt($content->id))}}">Approve</a>
                        <a  class="dropdown-item" href="{{route('admin.productVendor.get', encrypt($content->id))}}">Product Vendor</a>
                        <a onclick="return confirm('Are you sure to disable?')" class="dropdown-item" href="{{ route('admin.disableProduct.post', encrypt($content->id)) }}">Disable</a>
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
