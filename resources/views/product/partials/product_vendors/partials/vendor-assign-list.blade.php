@if(isset($vendors))
    @if(!$vendors->isEmpty())
        @foreach($vendors as $key=>$vendor)
        <tr>
            <td>{{$vendor->id}}</td>
            <td>{{$vendor->first_name}} {{$vendor->last_name}}</td>
            <td>{{$vendor->email}}</td>
            <td>{{$vendor->mobile}}</td>
            <td>{{$vendor->company_name}}</td>
            <td>{{$vendor->created_at->format(env("GENERAL_DATE_FORMAT"))}}</td>
            <td>
                <button class="btn btn-warning btn-sm">Assign</button>
            </td>
        </tr>
        @endforeach

        <tr>
            <td colspan="8">{!! $vendors->links() !!}</td>
        </tr>

        @else
            <tr>
                <td colspan="8">No Active Vendors Found</td>
            </tr>
    @endif
@endif