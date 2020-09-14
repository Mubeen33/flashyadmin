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
                        <img src="{{ $banner_box->primary_image }}" width="196px" height="97px">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      <small class="d-block">Title : This is test title</small>
                      <small class="d-block">URL : https://www.facebook.com</small>
                    </td>
                    <td width="20%">
                      @if($banner_box && $banner_box->secondary_image != NULL)
                        <img src="{{ $banner_box->secondary_image }}" width="196px" height="97px">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      <small class="d-block">Title : This is test title</small>
                      <small class="d-block">URL : https://www.facebook.com</small>
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
