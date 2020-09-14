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
                        <img src="{{ $top_right_banner_1->image }}" width="100%">
                        @else
                          <img src="/upload-images/banners/default/top_right_banner_390_193.jpg" width="196px" height="97px">
                      @endif
                    </td>
                    <td width="40%">
                      @if($top_right_banner_1 && $top_right_banner_1->secondary_image != NULL)
                        <img src="{{ $top_right_banner_1->image }}" width="100%">
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