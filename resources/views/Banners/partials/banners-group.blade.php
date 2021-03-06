<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h4 class="card-title">
            Banners Group
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
                    <td width="5%">1</td>
                    <td width="20%">
                      @if($banner_group_1 && $banner_group_1->primary_image != NULL)
                        <img src="{{ $banner_group_1->primary_image }}" width="196px" height="97px">
                        @else
                          <img src="/upload-images/banners/default/banner_groups_530_285.png" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_group_1 && $banner_group_1->title !== NULL)
                      <small class="d-block">Title : {{$banner_group_1->title}}</small>
                      @endif
                      @if($banner_group_1 && $banner_group_1->link !== NULL)
                      <small class="d-block">URL : {{$banner_group_1->link}}</small>
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_group_1 && $banner_group_1->secondary_image !== NULL)
                        <img src="{{ $banner_group_1->secondary_image }}" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_group_1 && $banner_group_1->secondary_title !== NULL)
                      <small class="d-block">Title : {{$banner_group_1->secondary_title}}</small>
                      @endif
                      @if($banner_group_1 && $banner_group_1->secondary_link !== NULL)
                      <small class="d-block">URL : {{$banner_group_1->secondary_link}}</small>
                      @endif

                      @if($banner_group_1 && $banner_group_1->secondary_start_time !== NULL && $banner_group_1->secondary_end_time)
                      <small class="d-block">Start Time : {{$banner_group_1->secondary_start_time}}</small>
                      <small class="d-block">End Time : {{$banner_group_1->secondary_end_time}}</small>
                      @endif
                    </td>
                    <td width="5%">
                      @if($banner_group_1)
                      <a id="add" href="{{route('admin.editBannerWithID.get', encrypt($banner_group_1->id))}}" class="btn btn-warning btn-sm">Edit</a>
                      @else
                        {{--add banner--}}
                      <a href="{{route('admin.editBanner.get', ['Banners_Group', 1])}}" class="btn btn-warning btn-sm">Edit</a>
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td width="5%">2</td>
                    <td width="20%">
                      @if($banner_group_2 && $banner_group_2->primary_image != NULL)
                        <img src="{{ $banner_group_2->primary_image }}" width="196px" height="97px">
                        @else
                          <img src="/upload-images/banners/default/banner_groups_530_285.png" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_group_2 && $banner_group_2->title !== NULL)
                      <small class="d-block">Title : {{$banner_group_2->title}}</small>
                      @endif
                      @if($banner_group_2 && $banner_group_2->link !== NULL)
                      <small class="d-block">URL : {{$banner_group_2->link}}</small>
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_group_2 && $banner_group_2->secondary_image !== NULL)
                        <img src="{{ $banner_group_2->secondary_image }}" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_group_2 &&  $banner_group_2->secondary_title !== NULL)
                      <small class="d-block">Title : {{$banner_group_2->secondary_title}}</small>
                      @endif

                      @if($banner_group_2 &&  $banner_group_2->secondary_link !== NULL)
                      <small class="d-block">URL : {{$banner_group_2->secondary_link}}</small>
                      @endif

                      @if($banner_group_2 &&  $banner_group_2->secondary_start_time !== NULL && $banner_group_2->secondary_end_time)
                      <small class="d-block">Start Time : {{$banner_group_2->secondary_start_time}}</small>
                      <small class="d-block">End Time : {{$banner_group_2->secondary_end_time}}</small>
                      @endif
                    </td>
                    <td width="5%">
                      @if($banner_group_2)
                      <a id="add" href="{{route('admin.editBannerWithID.get', encrypt($banner_group_2->id))}}" class="btn btn-warning btn-sm">Edit</a>
                      @else
                        {{--add banner--}}
                      <a href="{{route('admin.editBanner.get', ['Banners_Group', 2])}}" class="btn btn-warning btn-sm">Edit</a>
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td width="5%">3</td>
                    <td width="20%">
                      @if($banner_group_3 && $banner_group_3->primary_image != NULL)
                        <img src="{{ $banner_group_3->primary_image }}" width="196px" height="97px">
                        @else
                          <img src="/upload-images/banners/default/banner_groups_530_285.png" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_group_3 && $banner_group_3->title !== NULL)
                      <small class="d-block">Title : {{$banner_group_3->title}}</small>
                      @endif
                      @if($banner_group_3 && $banner_group_3->link !== NULL)
                      <small class="d-block">URL : {{$banner_group_3->link}}</small>
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_group_3 && $banner_group_3->secondary_image !== NULL)
                        <img src="{{ $banner_group_3->secondary_image }}" width="100%">
                      @endif
                    </td>
                    <td width="20%">
                      @if($banner_group_3 && $banner_group_3->secondary_title !== NULL)
                      <small class="d-block">Title : {{$banner_group_3->secondary_title}}</small>
                      @endif

                      @if($banner_group_3 && $banner_group_3->secondary_link !== NULL)
                      <small class="d-block">URL : {{$banner_group_3->secondary_link}}</small>
                      @endif

                      @if($banner_group_3 && $banner_group_3->secondary_start_time !== NULL && $banner_group_3->secondary_end_time)
                      <small class="d-block">Start Time : {{$banner_group_3->secondary_start_time}}</small>
                      <small class="d-block">End Time : {{$banner_group_3->secondary_end_time}}</small>
                      @endif
                    </td>
                    <td width="5%">
                      @if($banner_group_3)
                      <a id="add" href="{{route('admin.editBannerWithID.get', encrypt($banner_group_3->id))}}" class="btn btn-warning btn-sm">Edit</a>
                      @else
                        {{--add banner--}}
                      <a href="{{route('admin.editBanner.get', ['Banners_Group', 3])}}" class="btn btn-warning btn-sm">Edit</a>
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
