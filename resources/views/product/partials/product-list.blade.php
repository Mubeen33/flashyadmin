@foreach($data as $key=>$content)

@if(intval($content->get_vendor->active) === 1 && intval($content->approved) === 1)

    @if(!$content->get_product_variations->isEmpty())
        @foreach($content->get_product_variations as $v_key=>$variation)
            @if(intval($variation->active) === 1)
            <tr>
                <th scope="row">@if($v_key == 0){{ $key+1 }}@endif</th>
                <td class="d-none">
                    {{ $content->get_vendor->first_name }} {{ $content->get_vendor->last_name }}
                </td>                                          
                <td>
                    {{ $content->title }} {{" | ".$variation->first_variation_value}}
                    @if($variation->second_variation_value !== NULL)
                    {{" - ".$variation->second_variation_value}}
                    @endif
                </td>
                <td>
                    {{ $content->get_category->name }}
                </td>
                <td>
                    @if($variation->variant_image === NULL)
                        @if(!$content->get_images->isEmpty())
                        @foreach($content->get_images as $key=>$image)
                            @if($key == 0)
                            <img src="{{ $image->image }}" width="80px" height="50px">
                            @endif
                        @endforeach
                        @endif
                    @else
                        <img src="{{ $variation->variant_image }}" width="80px" height="50px">
                    @endif
                </td>
                <td><input type="checkbox" class="export_chk" value="{{$content->id}}"></td>
                <td>{{ $content->product_type }}</td>
                <td>
                    {{ $content->created_at->format('d/m/Y') }}
                </td>
                <td>
                    @if(intval($content->approved) === 1 && intval($content->rejected) === 0 && intval($content->disable) === 0)
                        <span class="badge badge-success">Approved</span>
                    @elseif(intval($content->rejected) === 1 && intval($content->approved) === 0 && intval($content->disable) === 0)
                        <span class="badge badge-warning">Rejected</span>
                    @elseif(intval($content->disable) === 1 && intval($content->approved) === 0 && intval($content->rejected) === 0)
                        <span class="badge badge-danger">Disabled</span>
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                <a class="dropdown-item" href="{{ route('admin.productDetails.get', encrypt($content->id)) }}">Show</a>
                                <!-- <a  class="dropdown-item" href="{{route('admin.productControl.post', encrypt($content->id))}}">Approve</a> -->
                                @if(!$content->get_vendor_products->isEmpty())
                                  <?php 
                                    $get_variation_id = NULL;
                                    foreach ($content->get_vendor_products as $key5 => $ven_prod) {
                                        if ($ven_prod->variation_id != NULL) {
                                            $get_variation_id  = $ven_prod->variation_id;
                                        }
                                    }
                                  ?>
                                @endif

                                @if($get_variation_id !== NULL)
                                    <a  class="dropdown-item" href="{{route('admin.productVendors.get', [encrypt($content->id), $get_variation_id])}}">Product Vendors</a>
                                @else
                                    {{-- "No_Vendor_Products_Found_With_This_Variation_ID" --}}
                                    <a  class="dropdown-item" href="{{route('admin.productVendors.get', [encrypt($content->id), 'NO'])}}">Product Vendors</a>
                                    
                                @endif
                                
                                <a onclick="return confirm('Are you sure to disable?')" class="dropdown-item" href="{{ route('admin.disableProduct.post', encrypt($content->id)) }}">Disable</a>
                            </div>
                        </div>
                    </div>
                    
                </td>
            </tr>
            @endif
        @endforeach

    @else
    
    <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td class="d-none">
            {{ $content->get_vendor->first_name }} {{ $content->get_vendor->last_name }}
        </td>                                          
        <td>{{ $content->title }}</td>
        <td>
            {{ $content->get_category->name }}
        </td>
        <td>
            @if(!$content->get_images->isEmpty())
            @foreach($content->get_images as $key=>$image)
                @if($key == 0)
                <img src="{{ $image->image }}" width="80px" height="50px">
                @endif
            @endforeach
            @endif
        </td>
        <td><input type="checkbox" class="export_chk" value="{{$content->id}}"></td>
        <td>{{ $content->product_type }}</td>
        <td>
              {{ $content->created_at->format('d/m/Y') }}
        </td>
        <td>
            @if(intval($content->approved) === 1 && intval($content->rejected) === 0 && intval($content->disable) === 0)
                <span class="badge badge-success">Approved</span>
            @elseif(intval($content->rejected) === 1 && intval($content->approved) === 0 && intval($content->disable) === 0)
                <span class="badge badge-warning">Rejected</span>
            @elseif(intval($content->disable) === 1 && intval($content->approved) === 0 && intval($content->rejected) === 0)
                <span class="badge badge-danger">Disabled</span>
            @endif
        </td>
        <td>
            <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                        <a class="dropdown-item" href="{{ route('admin.productDetails.get', encrypt($content->id)) }}">Show</a>
                        <!-- <a  class="dropdown-item" href="{{route('admin.productControl.post', encrypt($content->id))}}">Approve</a> -->
                        <a  class="dropdown-item" href="{{route('admin.productVendors.get', encrypt($content->id))}}">Product Vendors</a>
                        <a onclick="return confirm('Are you sure to disable?')" class="dropdown-item" href="{{ route('admin.disableProduct.post', encrypt($content->id)) }}">Disable</a>
                    </div>
                </div>
            </div>
            
        </td>
    </tr>
    @endif




@endif



@endforeach
<tr>
    <td colspan="9">{!! $data->links() !!}</td>
</tr>



@push('scripts')
<script type="text/javascript">
    $(".export_chk").on("click", function(){
        if ($(this).prop('checked') === true) {
              let productID = $(this).val()

              if (isNaN(productID)) {
                alert("SORRY - Invalid Access")
              }else{
                //check value is exists or not
                let getVal = $("#expertForm #setProductID").val()
                if (getVal !== "") {
                  var arryval = getVal.split(',');
                  if ($.inArray(productID, arryval) != -1)
                  {
                    //exist
                    return false;
                  }
                }

                //set value
                if (!$("#expertForm #setProductID").val()) {
                  $("#expertForm #setProductID").val(productID)
                }else{
                  let currentValue = $("#expertForm #setProductID").val()
                  $("#expertForm #setProductID").val(currentValue+","+productID)
                }
                
              }
        }else{
            //remove
           let productID = $(this).val()
          if (isNaN(productID)) {
            alert('SORRY - Invalid Request.')
          }else{
              let getVal = $("#expertForm #setProductID").val()
              var arryval = getVal.split(',');

              let newArray = arryval.filter(function(elem){
                 return elem != productID; 
              });
              //console.log(newArray)
              $("#expertForm #setProductID").val(newArray.toString())
          } 
        }
    })
</script>
@endpush

