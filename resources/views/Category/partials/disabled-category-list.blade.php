@if(count($categories) > 0)
    @foreach ($categories as $key=>$item)
       <tr>
       <td>{{($key+1)}}</td>
       <td>{{$item->name}}</td>
        <td>{{$item->slug}}</td>
        <td>{{$item->title_meta_tag}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->keywords}}</td>
        <td>{{$item->category_order}}</td>
        <td>
        @if ($item->visiblity == 1)
        <div class="fonticon-wrap"> <div class="badge badge-success"><i class="fa fa-eye fa-x"></i></div> </div>  
        @else
        <div class="fonticon-wrap"> <div class="badge badge-danger"><i class="fa fa-eye-slash"></i></div> </div>    
        @endif
    </td>
    <td>
        @if ($item->home_visiblity == 0)
        <div class="badge badge-danger"><strong>No</strong></div>  
        @else
        <div class="badge badge-success"><strong>Yes</strong></div> 
        @endif
    </td>
        <td> 
            <a href="{{route('admin.categoryActive.post', $item->id)}}"><i class="feather icon-check"></i></a>
        </td>
    </tr>
    @endforeach
    <tr>
        <td colspan="10">{!! $categories->links() !!}</td>
    </tr>

     @else  
     <tr colspan="10">
        <td>No Record found </td>
     </tr>
     @endif
