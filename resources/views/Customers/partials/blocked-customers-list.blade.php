@foreach($data as $key=>$content)
    <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td>{{ $content->first_name }}</td>                                          
        <td>{{ $content->last_name }}</td>
        <td>{{ $content->email }}</td>
        <td>{{ $content->phone }}</td>
        <td>{{ $content->created_at->format('d/m/Y') }}</td>
        <td>{{ $content->updated_at->format('d/m/Y') }}</td>
        <td>
            <div class="btn-group mb-1">
                <div class="dropdown">
                    <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                        <a class="dropdown-item" href="{{ route('admin.showBlockCustomer.get', Crypt::encrypt($content->id)) }}">Show</a>
                        <a onclick="return confirm('Are you sure?')" class="dropdown-item" href="{{ route('admin.unblockCustomer', Crypt::encrypt($content->id)) }}">Unblock</a>
                    </div>
                </div>
            </div>
            
        </td>
    </tr>
@endforeach
    <tr>
        <td colspan="7">{!! $data->links() !!}</td>
    </tr>