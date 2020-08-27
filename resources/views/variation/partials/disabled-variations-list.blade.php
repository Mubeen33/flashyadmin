@if(count($variations) > 0)
    @foreach($variations as $key => $variation)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$variation->variation_name}}</td>
            <td>
                @php
                     $categoryName = \App\Category::where('id',$variation->category_id)->value('name');
                @endphp
                {{ $categoryName }}
            </td>
            <td>
                @if($variation->image_approval==1)
                    <div class="badge badge-primary">Yes</div>
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
                <a href="{{url('variation-active', encrypt($variation->id))}}"><i class="feather icon-check"></i></a>
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