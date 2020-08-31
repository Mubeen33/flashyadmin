@foreach($loginActivities as $key=>$content)
    <tr>
        <th scope="row">{{ $key+1 }}</th>

            @php
                $activities_array = (json_decode($content->activities, true));
                    foreach($activities_array as $key=>$value){
                        echo "<td>".$value."</td>";
                    }
            @endphp

        
        <td>{{ $content->is_loogedIn }}</td>
        <td>
            <form action="{{ route('admin.vendor.activityDelete.post') }}" method="POST">
                @csrf
                <input type="hidden" name="vendorID" value="{{ Crypt::encrypt($content->vendor_id) }}">
                <input type="hidden" name="activityID" value="{{ Crypt::encrypt($content->id) }}">
                <button onclick="return confirm('Are you sure to DELETE?')" type="submit" class="btn btn-danger btn-sm" title="Delete this record"><i class="feather icon-delete"></i></button>
            </form>
        </td>
    </tr>

@endforeach

    <tr>
        <td colspan="7">{!! $loginActivities->links() !!}</td>
    </tr>