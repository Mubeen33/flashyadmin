@if(isset($product_vendors))

@if(!$product_vendors->isEmpty())
    @foreach($product_vendors as $key=>$ven_product)
    <tr>
        <td>{{$ven_product->get_vendor->id}}</td>
        <td>{{$ven_product->get_vendor->first_name}} {{$ven_product->get_vendor->last_name}}</td>
        <td>{{$ven_product->get_vendor->email}}</td>
        <td>{{$ven_product->quantity}}</td>
        <td>{{$ven_product->price}}</td>
        <td>{{$ven_product->mk_price}}</td>
        <td>{{$ven_product->dispatched_days}}</td>
        <td>
            <select class="btn btn-info btn-sm">
                <option value="1" @if(intval($ven_product->active) === 1) selected @endif>Active</option>
                <option value="0" @if(intval($ven_product->active) === 0) selected @endif>Inactive</option>
            </select>
        </td>
    </tr>
    @endforeach

    <tr>
        <td colspan="8">{!! $product_vendors->links() !!}</td>
    </tr>

    @else
        <tr>
            <td colspan="8">No Vendors Available</td>
        </tr>
@endif


@endif