@if(count($categories) > 0)
    @foreach ($categories as $key=>$item)
       <tr>
        <td>{{ $key+1 }}</td>   
        <td><b>{{ $item->getParentsNames() }}</b></td>
        <td>{{$item->commission}}%</td>
        <td>{{$item->category_order}}</td>
        <td>
        @if ($item->visibility == 1)
        <div class="fonticon-wrap"> <div class="badge badge-success">&nbsp;&nbsp;<i class="fa fa-eye fa-x"></i>&nbsp;&nbsp;</div> </div>  
        @else
        <div class="fonticon-wrap"> <div class="badge badge-danger">&nbsp;&nbsp;<i class="fa fa-eye-slash"></i>&nbsp;&nbsp;</div> </div>    
        @endif
    </td>
    <td>
        @if ($item->show_on_homepage == 0)
        <div class="badge badge-danger"><strong>NO</strong></div>  
        @else
        <div class="badge badge-success"><strong>YES</strong></div> 
        @endif
    </td>
        <td> 
            <div class="btn-group mb-1">
                <div class="dropdown">
                    <button class="btn btn-primary btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                        <a class="dropdown-item" href="{{url('category-edit')}}/{{encrypt($item->id)}}">Edit</a>
                        <a class="dropdown-item" href="{{url('category-disable')}}/{{$item->id}}">Disable</a>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    @endforeach
        <tr>
            <td colspan="7">{!! $categories->links() !!}</td>
        </tr>

     @else  
     <tr colspan="7">
           
        <td>No Record found </td>
     </tr>
@endif