@foreach($othersActivities as $key=>$content)
    <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td>{{ $content->activityName }}</td>
        <td>
            @php
                $activities_array = (json_decode($content->activities, true));
                echo "<div class='vendors-activity-details'>";
                    foreach($activities_array as $key=>$value){
                        $key = str_replace('_', ' ', $key);
                        echo "<p>".ucwords($key)." : ".$value."</p>";
                    }
                echo "</div>";
            @endphp
        </td>
        <td>{{ $content->created_at->format('d/m/Y H:i') }}</td>
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
        <td colspan="7">{!! $othersActivities->links() !!}</td>
    </tr>