@if(count($variations) > 0)
    @foreach($variations as $key => $variation)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$variation->variation_name}}</td>
            
            <td>
                @if($variation->image_approval==1)
                    <div class="badge badge-warning">Yes</div>
                @else
                    <div class="badge badge-dark">No</div>
                @endif    
            </td>
            <td>
                @if($variation->active==0)
                    <div class="badge badge-danger">Disable</div>
                @endif    
            </td>
            <td>
                <a href="{{route('admin.variationActive.post', encrypt($variation->id))}}"><i class="feather icon-check"></i></a>
            </td>
        </tr>
    @endforeach

        <tr>
            <td colspan="5">{{ $variations->links() }}</td>
        </tr>
@else
    <tr>
        <td colspan="5" style="text-align: center"><b>NO RESULT FOUND</b></td>
    </tr>
@endif