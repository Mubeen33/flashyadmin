@foreach($data as $key=>$content)
    <tr>
        <th scope="row">{{ $key+1 }}</th>     
        <td>{{ $content->button_text }}</td>
        <td><img width="50px" height="50px" style="object-fit: contain;" src="{{ $content->image_lg }}"></td>       
        <td>{{ $content->slider_type }}</td>
        <td>{{ $content->start_time }}</td>
        <td>{{ $content->end_time }}</td>
        <td>
            <div class="btn-group mb-1">
                <div class="dropdown">
                    <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                        <a class="dropdown-item" href="{{ route('admin.sliders.edit', Crypt::encrypt($content->id)) }}">Edit</a>
                        <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="{{ route('admin.slider.delete', Crypt::encrypt($content->id)) }}">Delete</a>
                    </div>
                </div>
            </div>
        </td>
    </tr>
@endforeach
    <tr>
        <td colspan="10">{!! $data->links() !!}</td>
    </tr>