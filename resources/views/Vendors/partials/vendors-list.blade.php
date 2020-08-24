@foreach($data as $key=>$content)
<tr>
    <th scope="row">{{ $key+1 }}</th>
    <td>{{ $content->first_name }}</td>                                          
    <td>{{ $content->last_name }}</td>
    <td>{{ $content->email }}</td>
    <td>{{ $content->mobile }}</td>
    <td>{{ $content->company_name }}</td>
    <td>{{ $content->created_at->format('d/m/Y') }}</td>
    <td>
        @if($content->active == 0)
            <div class="badge badge-danger">Pending</div>
            @else
            <div class="badge badge-success">Approved</div>
        @endif    
    </td>
    <td>
        <a href="{{ route('admin.vendors.show', Crypt::encrypt($content->id)) }}"><i class="feather icon-eye"></i></a>
    </td>
</tr>
@endforeach
<tr>
    <td>{!! $data->links() !!}</td>
</tr>