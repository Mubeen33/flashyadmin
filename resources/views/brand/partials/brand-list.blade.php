@foreach($brands as $brand)
    <tr>
        <th scope="row">{{$brand->id}}</th>
        <td>{{$brand->name}}</td>                                          
        <td>{{$brand->description}}</td>
        <td>
            @if($brand->active=='Y')
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
                        <a class="dropdown-item" href="{{route('admin.brandEdit.get', encrypt($brand->id))}}">Edit</a>
                        <a class="dropdown-item" href="{{route('admin.disabledBrand.single', encrypt($brand->id))}}">Disable</a>
                    </div>
                </div>
            </div>
        </td>
    </tr>
@endforeach
    <tr>
        <td colspan="5">{{ $brands->links() }}</td>
    </tr>