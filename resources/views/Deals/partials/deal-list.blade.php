@foreach($data as $key=>$content)
    <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td>{{ $content->get_vendor->first_name }}</td>                                          
        <td>{{ $content->get_vendor->email }}</td>
        <td>{{ (\Str::words($content->get_product->title, 4)) }}</td>
        <td>{{ $content->price }}</td>
        <td>{{ $content->quantity }}</td>
        <td>{{ $content->start_time }}</td>
        <td>{{ $content->end_time }}</td>
        <td>{{ $content->created_at->format('d/m/Y') }}</td>
        <td>
            @if($content->status == 0)
                <div class="badge badge-danger">Pending</div>
                @else
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
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#dealDetailsModal-{{$content->id}}">
                          Show
                        </a>
                    </div>
                </div>
            </div>
            
        </td>
    </tr>
    @endforeach
    <tr>
        <td colspan="11">{!! $data->links() !!}</td>
    </tr>


    <tr>
       <td colspan="9">
           @foreach($data as $key=>$content)
            <!-- Modal -->
            <div class="modal fade" id="dealDetailsModal-{{$content->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$content->id}}" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{$content->id}}">Deal Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    @include('Deals.partials.deal-details')
                  </div>
                </div>
              </div>
            </div>
            @endforeach
       </td> 
    </tr>
    