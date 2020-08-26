@foreach($brands as $brand)
    <tr>
        <th scope="row">{{$brand->id}}</th>
        <td>{{$brand->name}}</td>                                          
        <td>{{$brand->description}}</td>
        <td>
            @if($brand->active=='N')
                <div class="badge badge-danger">Disable</div>
            @endif    
        </td>
        <td>
            <a href="{{url('brand-active', encrypt($brand->id))}}"><i class="feather icon-check"></i></a>
        </td>
    </tr>
@endforeach
 <tr>
     <td colspan="5">{{ $brands->links() }}</td>
 </tr>