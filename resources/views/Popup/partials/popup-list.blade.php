@foreach($data as $key=>$content)
    <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td>{{ $content->name }}</td>                                          
        <td>{{ $content->title }}</td>
        <td>{{ $content->description }}</td>
        <td>{{ $content->button_text }}</td>
        <td><img width="50px" height="50px" src="{{ $content->popup_background_image }}"></td>
        <td>{{ $content->start_time }}</td>
        <td>{{ $content->end_time }}</td>
        <td>
            <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                        <a class="dropdown-item" href="{{ route('admin.popup.edit', Crypt::encrypt($content->id)) }}">Edit</a>
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