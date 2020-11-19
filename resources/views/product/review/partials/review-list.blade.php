@foreach($data as $key=>$review)
<tr>
    <td scope="row">{{ $key+1 }}</td>
    <td>
        {{ $review->get_customer->first_name." ".$review->get_customer->last_name }}
    </td>
    <td>
        {{ $review->get_customer->gender }}
    </td>                                         
    <td>
        @if(intval($review->star) === 1)
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
        @elseif(intval($review->star) === 2)
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
        @elseif(intval($review->star) === 3)
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
        @elseif(intval($review->star) === 4)
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
        @elseif(intval($review->star) === 5)
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
            <img style='width:20px; display: inline-block;' src='/assets/svg/full_star.svg'>
        @else
            <span>Wrong</span>
        @endif
    </td>
    <td>{{ $review->comment }}</td>
    <td>{{ date(env('GENERAL_DATE_FORMAT'), strtotime($review->created_at)) }}</td>
    <td>
        <div class="btn-group">
            <div class="dropdown">
                <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                    <a class="dropdown-item" href="">Some actions</a>
                </div>
            </div>
        </div>
        
    </td>
</tr>
@endforeach


