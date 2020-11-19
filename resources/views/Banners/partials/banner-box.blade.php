<div class="col-12">
   <div class="card" style="min-height: max-content !important">
      <div class="card-header">
         <h4 class="card-title">
            Banner Box
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
                      @if($banner_box && $banner_box->primary_image != NULL)
                        <img src="{{ $banner_box->primary_image }}" width="196px" height="160px">
                        @else
                          <img src="/upload-images/banners/default/banner_box_487_379.png" width="196px" height="160px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_box && $banner_box->title !== NULL)
                      <small class="d-block">Title : {{$banner_box->title}}</small>
                      @endif
                      @if($banner_box && $banner_box->title !== NULL)
                      <small class="d-block">URL : {{$banner_box->link}}</small>
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_box && $banner_box->secondary_image != NULL)
                        <img src="{{ $banner_box->secondary_image }}" width="196px" height="160px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_box && $banner_box->secondary_title !== NULL)
                      <small class="d-block">Title : {{$banner_box->secondary_title}}</small>
                      @endif

                      @if($banner_box && $banner_box->secondary_link !== NULL)
                      <small class="d-block">URL : {{$banner_box->secondary_link}}</small>
                      @endif

                      @if($banner_box && $banner_box->secondary_start_time !== NULL && $banner_box->secondary_end_time)
                      <small class="d-block">Start Time : {{$banner_box->secondary_start_time}}</small>
                      <small class="d-block">End Time : {{$banner_box->secondary_end_time}}</small>
                      @endif
                    </td>
                    <td width="5%">
                      @if($banner_box)
                      <a href="{{route('admin.editBannerWithID.get', encrypt($banner_box->id))}}" class="btn btn-warning btn-sm">Edit</a>
                      @else
                        {{--add banner--}}
                      <a href="{{route('admin.editBanner.get', ['Banner_Box', 0])}}" class="btn btn-warning btn-sm">Edit</a>
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
