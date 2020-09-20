@foreach($data as $key=>$content)

@if(intval($content->get_vendor->active) === 1 && intval($content->approved) === 1)

    @if(!$content->get_product_variations->isEmpty())
        
        @foreach($content->get_product_variations as $v_key=>$variation)
            <tr>
                <th scope="row">@if($v_key == 0){{ $key+1 }}@endif</th>
                <td class="d-none">
                    {{ $content->get_vendor->first_name }} {{ $content->get_vendor->last_name }}
                </td>                                          
                <td>
                    {{ $content->title }} {{", ".$variation->first_variation_value}}
                    @if($variation->second_variation_value !== NULL)
                    {{", ".$variation->second_variation_value}}
                    @endif
                </td>
                <td>
                    {{ $content->get_category->name }}
                </td>
                <td>
                    @if(!$content->get_images->isEmpty())
                    @foreach($content->get_images as $key=>$image)
                        @if($key == 0)
                        <img src="{{ $image }}" width="80px" height="50px">
                        @endif
                    @endforeach
                    @endif
                </td>
                <td>{{ $content->product_type }}</td>
                <td>
                      {{ $content->created_at->format('d/m/Y') }}
                </td>
                <td>
                    @if(intval($content->approved) === 1 && intval($content->rejected) === 0 && intval($content->disable) === 0)
                        <span class="badge badge-success">Approved</span>
                    @elseif(intval($content->rejected) === 1 && intval($content->approved) === 0 && intval($content->disable) === 0)
                        <span class="badge badge-warning">Rejected</span>
                    @elseif(intval($content->disable) === 1 && intval($content->approved) === 0 && intval($content->rejected) === 0)
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
                                <!-- <a  class="dropdown-item" href="{{route('admin.productControl.post', encrypt($content->id))}}">Approve</a> -->
                                <a  class="dropdown-item" href="{{route('admin.productVendor.get', encrypt($content->id))}}">Product Vendor</a>
                                <a onclick="return confirm('Are you sure to disable?')" class="dropdown-item" href="{{ route('admin.disableProduct.post', encrypt($content->id)) }}">Disable</a>
                            </div>
                        </div>
                    </div>
                    
                </td>
            </tr>
        @endforeach

    @else
    
    <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td class="d-none">
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
                <img src="{{ $image }}" width="80px" height="50px">
                @endif
            @endforeach
            @endif
        </td>
        <td>{{ $content->product_type }}</td>
        <td>
              {{ $content->created_at->format('d/m/Y') }}
        </td>
        <td>
            @if(intval($content->approved) === 1 && intval($content->rejected) === 0 && intval($content->disable) === 0)
                <span class="badge badge-success">Approved</span>
            @elseif(intval($content->rejected) === 1 && intval($content->approved) === 0 && intval($content->disable) === 0)
                <span class="badge badge-warning">Rejected</span>
            @elseif(intval($content->disable) === 1 && intval($content->approved) === 0 && intval($content->rejected) === 0)
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
                        <!-- <a  class="dropdown-item" href="{{route('admin.productControl.post', encrypt($content->id))}}">Approve</a> -->
                        <a  class="dropdown-item" href="{{route('admin.productVendor.get', encrypt($content->id))}}">Product Vendor</a>
                        <a onclick="return confirm('Are you sure to disable?')" class="dropdown-item" href="{{ route('admin.disableProduct.post', encrypt($content->id)) }}">Disable</a>
                    </div>
                </div>
            </div>
            
        </td>
    </tr>
    @endif




@endif



@endforeach
<tr>
    <td colspan="9">{!! $data->links() !!}</td>
</tr>
