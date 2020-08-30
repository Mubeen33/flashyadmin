@foreach($data as $key=>$content)
  <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $content->get_vendor->first_name }}</td>                                          
      <td>{{ $content->get_vendor->last_name }}</td>
      <td>{{ $content->get_vendor->email }}</td>
      <td>{{ $content->bank_name }}</td>
      <td>{{ $content->created_at->format('d/m/Y H:i') }}</td>
      <td>

          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" 
              data-target="#viewDetails-{{$content->id}}">
            <i class="feather icon-eye"></i>
          </button>

          <!-- Modal -->
          <div class="modal fade" id="viewDetails-{{$content->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @include('Vendors.partials.bank-details-update-request')
                </div>
              </div>
            </div>
          </div>
          
      </td>
  </tr>
@endforeach

  <tr>
    <td colspan="7">{!! $data->links() !!}</td>
  </tr>