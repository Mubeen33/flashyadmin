<!-- Modal -->
<div class="modal fade" id="addTopRightsBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Top Rights Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" value="Banners_Top_Right">
            <div class="form-group">
                <label>Order No.</label>
                <select name="order_no" class="form-control">
                    <option value="">Choose One</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="form-group">
                <label>Banner Image</label>
                <input onchange="previewFile('imageInput_banner_right', 'imagePreview_banner_right');" id="imageInput_banner_right" type="file" name="image" class="form-control" accept="image/*">
                <span style="font-size: 12px" class="text-danger d-block">Banner Size : width=390px, height=193px</span>
                <div>
                    <br>
                    <img class="preview--file d-none" id="imagePreview_banner_right" width="150px" height="80px" src="">
                </div>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label>link</label>
                <input type="url" name="link" placeholder="Link" value="{{ old('link') }}" class="form-control">
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Start Time</label>
                            <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="date" name="start_time" class="form-control" value="{{ old('start_time') }}">
                            <small class="place-error--msg text-danger"></small>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>End Time</label>
                            <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="date" name="end_time" class="form-control" value="{{ old('end_time') }}">    
                            <small class="place-error--msg text-danger"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-warning">Add</button>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>






<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h4 class="card-title">
            Banners Top Right
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addTopRightsBanner">
            Add
            </button>
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
                    <th>Secondary</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="10%">1</td>
                    <td width="40%">
                      @if($top_right_banner_1 && $top_right_banner_1->primary_image != NULL)
                        <img src="{{ $top_right_banner_1->primary_image }}" width="100%">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="40%">
                      @if($top_right_banner_1 && $top_right_banner_1->secondary_image != NULL)
                        <img src="{{ $top_right_banner_1->secondary_image }}" width="100%">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="10%">
                      <a href="" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                  </tr>

                  <tr>
                    <td width="10%">2</td>
                    <td width="40%">
                      @if($top_right_banner_2 && $top_right_banner_2->primary_image != NULL)
                        <img src="{{ $top_right_banner_2->primary_image }}" width="100%">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="40%">
                      @if($top_right_banner_2 && $top_right_banner_2->secondary_image != NULL)
                        <img src="{{ $top_right_banner_2->secondary_image }}" width="100%">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="10%">
                      <a href="" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                  </tr>

                  <tr>
                    <td width="10%">3</td>
                    <td width="40%">
                      @if($top_right_banner_3 && $top_right_banner_3->primary_image != NULL)
                        <img src="{{ $top_right_banner_3->primary_image }}" width="100%">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="40%">
                      @if($top_right_banner_3 && $top_right_banner_3->secondary_image != NULL)
                        <img src="{{ $top_right_banner_3->secondary_image }}" width="100%">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="10%">
                      <a href="" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="row">
               
               <div class="col-lg-4">
                  <div style="border: 1px solid #ddd;padding: 5px">
                     <div class="text-center mb-1">
                        <small class="d-block pb-1">Order No. 1</small>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                     </div>
                     
                  </div>
               </div>
               
               @if($top_right_banner_2 && $top_right_banner_2->image != NULL)
               <div class="col-lg-4">
                  <div style="border: 1px solid #ddd;padding: 5px">
                     <div class="text-center mb-1">
                        <small class="d-block pb-1">Order No. 2</small>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                     </div>
                     <img src="{{ $top_right_banner_2->image }}" width="100%">
                  </div>
               </div>
               @endif
               @if($top_right_banner_3 && $top_right_banner_3->image != NULL)
               <div class="col-lg-4">
                  <div style="border: 1px solid #ddd;padding: 5px">
                     <div class="text-center mb-1">
                        <small class="d-block pb-1">Order No. 3</small>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                     </div>
                     <img src="{{ $top_right_banner_3->image }}" width="100%">
                  </div>
               </div>
               @endif
            </div>
         </div>
      </div>
   </div>
</div>
@push('scripts')
<script type="text/javascript">
   function previewFile(inputID, previewID){
       var file = $("#"+inputID).get(0).files[0];
   
       if(file){
           var reader = new FileReader();
   
           reader.onload = function(){
               $("#"+previewID).attr("src", reader.result);
               $("#"+previewID).removeClass("d-none");
           }
   
           reader.readAsDataURL(file);
       }
   }
</script>
@endpush