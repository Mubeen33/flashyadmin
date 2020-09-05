@if(count($variations) > 0)
@foreach($variations as $key => $variation)
    <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$variation->variation_name}}</td>
        <td>
            @if($variation->image_approval==1)
                <div class="badge badge-primary">Yes</div>
            @else
                <div class="badge badge-dark">No</div>
            @endif    
        </td>
        <td><button class="btn btn-sm btn-warning"><a href="{{url('variations-options-list')}}/{{encrypt($variation->id)}}" style="color: black">View Options</a></button></td>
        <td>
            @if($variation->active==1)
                <div class="badge badge-success">Active</div>
            @endif    
        </td>
        <td>
            
            <div class="btn-group mb-1">
            <div class="dropdown">
                <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                    <a class="dropdown-item" href="{{route('admin.variationEdit.get', encrypt($variation->id))}}">Edit</a>
                    <a class="dropdown-item" href="{{route('admin.variationDisable.post', encrypt($variation->id))}}">Disable</a>
                </div>
            </div>
        </div>
        </td>
    </tr>
@endforeach
    <tr>
        <td colspan="6">{{ $variations->links() }}</td>
    </tr>

@else
<tr>
    <td colspan="6" style="text-align: center"><b>NO RESULT FOUND</b></td>
</tr>
@endif