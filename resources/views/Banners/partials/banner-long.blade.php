<div class="col-12">
   <div class="card" style="min-height: max-content !important">
      <div class="card-header">
         <h4 class="card-title">
            Banner Long
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
                      @if($banner_long && $banner_long->primary_image != NULL)
                        <img src="{{ $banner_long->primary_image }}" width="196px" height="75px">
                        @else
                          <img src="/upload-images/banners/default/banner_long_1090_245.png" width="196px" height="75px">
                      @endif
                    </td>
                    <td width="20%">
                      <small class="d-block">Title : This is test title</small>
                      <small class="d-block">URL : https://www.facebook.com</small>
                    </td>
                    <td width="20%">
                      @if($banner_long && $banner_long->secondary_image != NULL)
                        <img src="{{ $banner_long->secondary_image }}" width="196px" height="75px">
                        @else
                          <img src="/upload-images/banners/default/banner_long_1090_245.png" width="196px" height="75px">
                      @endif
                    </td>
                    <td width="20%">
                      <small class="d-block">Title : This is test title</small>
                      <small class="d-block">URL : https://www.facebook.com</small>
                    </td>
                    <td width="5%">
                      @if($banner_long)
                      <a href="{{route('admin.editBannerWithID.get', encrypt($banner_long->id))}}" class="btn btn-warning btn-sm">Edit</a>
                      @else
                        {{--add banner--}}
                      <a href="{{route('admin.editBanner.get', ['Banner_Long', 0])}}" class="btn btn-warning btn-sm">Edit</a>
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
