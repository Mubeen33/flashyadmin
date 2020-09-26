<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h4 class="card-title">
            Banners Top Right
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
                      @if($top_right_banner_1 && $top_right_banner_1->primary_image != NULL)
                        <img src="{{ $top_right_banner_1->primary_image }}" width="196px" height="97px">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($top_right_banner_1 && $top_right_banner_1->title !== NULL)
                      <small class="d-block">Title : {{$top_right_banner_1->title}}</small>
                      @endif
                      @if($top_right_banner_1 && $top_right_banner_1->title !== NULL)
                      <small class="d-block">URL : {{$top_right_banner_1->link}}</small>
                      @endif
                    </td>
                    <td width="20%">
                      @if($top_right_banner_1 && $top_right_banner_1->secondary_image !== NULL)
                        <img src="{{ $top_right_banner_1->secondary_image }}" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($top_right_banner_1 && $top_right_banner_1->secondary_title !== NULL)
                      <small class="d-block">Title : {{$top_right_banner_1->secondary_title}}</small>
                      @endif

                      @if($top_right_banner_1 && $top_right_banner_1->secondary_link !== NULL)
                      <small class="d-block">URL : {{$top_right_banner_1->secondary_link}}</small>
                      @endif

                      @if($top_right_banner_1 && $top_right_banner_1->secondary_start_time !== NULL && $top_right_banner_1->secondary_end_time)
                      <small class="d-block">Start Time : {{$top_right_banner_1->secondary_start_time}}</small>
                      <small class="d-block">End Time : {{$top_right_banner_1->secondary_end_time}}</small>
                      @endif
                    </td>
                    <td width="5%">
                      @if($top_right_banner_1)
                      <a id="add" href="{{route('admin.editBannerWithID.get', encrypt($top_right_banner_1->id))}}" class="btn btn-warning btn-sm">Edit</a>
                      @else
                        {{--add banner--}}
                      <a href="{{route('admin.editBanner.get', ['Banners_Top_Right', 1])}}" class="btn btn-warning btn-sm">Edit</a>
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td width="5%">2</td>
                    <td width="20%">
                      @if($top_right_banner_2 && $top_right_banner_2->primary_image != NULL)
                        <img src="{{ $top_right_banner_2->primary_image }}" width="196px" height="97px">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($top_right_banner_2 && $top_right_banner_2->title !== NULL)
                      <small class="d-block">Title : {{$top_right_banner_2->title}}</small>
                      @endif
                      @if($top_right_banner_2 && $top_right_banner_2->title !== NULL)
                      <small class="d-block">URL : {{$top_right_banner_2->link}}</small>
                      @endif
                    </td>
                    <td width="20%">
                      @if($top_right_banner_2 && $top_right_banner_2->secondary_image !== NULL)
                        <img src="{{ $top_right_banner_2->secondary_image }}" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      @if($top_right_banner_2 && $top_right_banner_2->secondary_title !== NULL)
                      <small class="d-block">Title : {{$top_right_banner_2->secondary_title}}</small>
                      @endif

                      @if($top_right_banner_2 && $top_right_banner_2->secondary_link !== NULL)
                      <small class="d-block">URL : {{$top_right_banner_2->secondary_link}}</small>
                      @endif

                      @if($top_right_banner_2 && $top_right_banner_2->secondary_start_time !== NULL && $top_right_banner_2->secondary_end_time)
                      <small class="d-block">Start Time : {{$top_right_banner_2->secondary_start_time}}</small>
                      <small class="d-block">End Time : {{$top_right_banner_2->secondary_end_time}}</small>
                      @endif
                    </td>
                    <td width="5%">
                      @if($top_right_banner_2)
                      <a id="add" href="{{route('admin.editBannerWithID.get', encrypt($top_right_banner_2->id))}}" class="btn btn-warning btn-sm">Edit</a>
                      @else
                        {{--add banner--}}
                      <a href="{{route('admin.editBanner.get', ['Banners_Top_Right', 2])}}" class="btn btn-warning btn-sm">Edit</a>
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td width="5%">3</td>
                    <td width="20%">
                      @if($top_right_banner_3 && $top_right_banner_3->primary_image != NULL)
                        <img src="{{ $top_right_banner_3->primary_image }}" width="196px" height="97px">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      <small class="d-block">Title : This is test title</small>
                      <small class="d-block">URL : https://www.facebook.com</small>
                    </td>
                    <td width="20%">
                      @if($top_right_banner_3 && $top_right_banner_3->secondary_image != NULL)
                        <img src="{{ $top_right_banner_3->secondary_image }}" width="196px" height="97px">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="20%">
                      <small class="d-block">Title : This is test title</small>
                      <small class="d-block">URL : https://www.facebook.com</small>
                    </td>
                    <td width="5%">
                      @if($top_right_banner_3)
                      <a id="add" href="{{route('admin.editBannerWithID.get', encrypt($top_right_banner_3->id))}}" class="btn btn-warning btn-sm">Edit</a>
                      @else
                        {{--add banner--}}
                      <a href="{{route('admin.editBanner.get', ['Banners_Top_Right', 3])}}" class="btn btn-warning btn-sm">Edit</a>
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
