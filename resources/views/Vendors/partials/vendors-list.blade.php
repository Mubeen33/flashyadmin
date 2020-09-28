@foreach($data as $key=>$content)
<tr>
    <th scope="row">{{ $key+1 }}</th>
    <td>{{ $content->first_name }}</td>                                          
    <td>{{ $content->last_name }}</td>
    <td>{{ $content->email }}</td>
    <td>{{ $content->mobile }}</td>
    <td>{{ $content->company_name }}</td>
    <td>{{ $content->created_at->format(env('GENERAL_DATE_FORMAT')) }}</td>
    <td>
        @if(intval($content->active) === 1)
            <div class="badge badge-success">Approved</div>
        @endif    
    </td>
    <td>
        <div class="btn-group">
            <div class="dropdown">
                <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                    <a class="dropdown-item" href="{{ route('admin.vendors.show', encrypt($content->id)) }}">View Details</a>
                    <a class="dropdown-item" href="{{ route('admin.vendorProducts.get', encrypt($content->id)) }}">Inventory Report</a>
                    <a class="dropdown-item" href="">Orders Report</a>
                    <a class="dropdown-item" href="">Selles Report</a>
                    <a class="dropdown-item" href="">Transaction Report</a>
                </div>
            </div>
        </div>
        
    </td>
</tr>
@endforeach
<tr>
    <td colspan="9">{!! $data->links() !!}</td>
</tr>