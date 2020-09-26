<div class="col-12">
   <div class="card" style="min-height: max-content !important">
      <div class="card-header">
         <h4 class="card-title">
            Banner Short
         </h4>
      </div>
      <div class="card-content">
         <div class="card-body">
            <div class="table-responsive">
              <table class="table" style="text-align: left !important;">
                <thead>
                  <tr>
                    <th>Order No.</th>
                    <th>Primary</th>
                    <th></th>
                    <th>Secondary</th>
                    <th></th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="5%">#</td>
                    <td width="20%">
                      @if($banner_short && $banner_short->primary_image != NULL)
                        <img src="{{ $banner_short->primary_image }}" width="196px" height="97px">
                        @else
                          <img src="/upload-images/banners/default/banner_short_530_245.png" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_short && $banner_short->title !== NULL)
                      <small class="d-block">Title : {{$banner_short->title}}</small>
                      @endif
                      @if($banner_short && $banner_short->link !== NULL)
                      <small class="d-block">URL : {{$banner_short->link}}</small>
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_short && $banner_short->secondary_image !== NULL)
                        <img src="{{ $banner_short->secondary_image }}" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_short && $banner_short->secondary_title !== NULL)
                      <small class="d-block">Title : {{$banner_short->secondary_title}}</small>
                      @endif
                      @if($banner_short && $banner_short->secondary_link !== NULL)
                      <small class="d-block">URL : {{$banner_short->secondary_link}}</small>
                      @endif
                      
                      @if($banner_short && $banner_short->secondary_start_time !== NULL && $banner_short->secondary_end_time)
                      <small class="d-block">Start Time : {{$banner_short->secondary_start_time}}</small>
                      <small class="d-block">End Time : {{$banner_short->secondary_end_time}}</small>
                      @endif
                    </td>
                    <td width="5%">
                      @if($banner_short)
                      <a href="{{route('admin.editBannerWithID.get', encrypt($banner_short->id))}}" class="btn btn-warning btn-sm">Edit</a>
                      @else
                        {{--add banner--}}
                      <a href="{{route('admin.editBanner.get', ['Banner_Short', 0])}}" class="btn btn-warning btn-sm">Edit</a>
                      @endif
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
         </div>

      </div>
   </div>
</div>
