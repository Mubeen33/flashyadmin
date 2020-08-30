@foreach($data as $single)
    @foreach($single as $key=>$content)
        <!-- run one tme -->
        @if($key == 0)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $content->get_vendor->first_name }}</td>                                          
            <td>{{ $content->get_vendor->last_name }}</td>
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
                <a class="btn btn-primary btn-sm" title="View All Activity of {{ $content->get_vendor->first_name }}" href="{{ route('admin.vendor.activity.get', Crypt::encrypt($content->vendor_id)) }}"><i class="feather icon-eye"></i></a>
            </td>
        </tr>
        @endif
    @endforeach
    @endforeach

    <tr>
        <td colspan="7">{!! $data->links() !!}</td>
    </tr>