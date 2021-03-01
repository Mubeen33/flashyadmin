<div class="content-body">
    @include('msg.msg')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <div><h4 class="card-title">Products</h4></div>
                    <div>  
                        
                       <input type="text" wire:model.change="search" placeholder="Search">
                        <select wire:model.change="totalProducts" title="Display row per page">
                            <option value="5" selected="1">Show 5</option>
                            <option value="10">Show 10</option>
                            <option value="15">Show 15</option>
                            <option value="20">Show 20</option>
                            <option value="25">Show 25</option>
                            <option value="30">Show 30</option>  
                        </select>
                        <select wire:model.change="orderBy" title="Display order by">
                            <option value="desc" selected="1">DESC</option>
                            <option value="asc">ASC</option>
                        </select>
                    </div> 
                </div>
                <div class="card-content">  
                    <div class="card-body">
                       
                        <div class="table-responsive">
                            <table  class="table table-striped table-hover mb-0">                                            
                                <thead>
                                    <tr>
                                        <th class="sortAble" sorting-column='id' sorting-order='DESC'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg> 
                                            ID
                                        </th>
                                        <th class="d-none">Vendor</th>
                                        <th class="sortAble" sorting-column='title' sorting-order=''>
                                            Title
                                        </th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>
                                            Submission ID
                                        </th>
                                        <th class="sortAble" sorting-column='product_type' sorting-order=''>
                                            Product Type
                                        </th>
                                        <th class="sortAble" sorting-column='created_at' sorting-order=''>
                                            Date
                                        </th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
   
                                <tbody id="render__data">
                                    @foreach($data as $key=>$content)
     
                                    @if(intval($content->get_vendor->active) === 1)
                                    
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
                                                    <td>{{ $content->submission_id }}</td>
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
                                                        @elseif(intval($content->approved) === 0)
                                                            <span class="badge badge-warning">Unapproved</span>
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
                                            <td>{{ $content->submission_id }}</td>
                                            <td>{{ $content->product_type }}</td>
                                            <td>
                                                  {{ $content->created_at->format('d/m/Y') }}
                                            </td>
                                            <td>
                                                @if(intval($content->approved) === 1 && intval($content->rejected) === 0 && intval($content->disable) === 0)
                                                    <span class="badge badge-success">Approved</span>
                                                @elseif(intval($content->rejected) === 1 && intval($content->approved) === 0 && intval($content->disable) === 0)
                                                    <span class="badge badge-warning">Unapproved</span>
                                                @elseif(intval($content->disable) === 1 && intval($content->approved) === 0 && intval($content->rejected) === 0)
                                                    <span class="badge badge-danger">Disabled</span>
                                                @elseif(intval($content->disable) === 0 && intval($content->approved) === 0 && intval($content->rejected) === 0)
                                                    <span class="badge badge-danger">Unapproved</span>
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
                                  
                                    
                                    
                                    
                                     
                                    
                                    
                                </tbody>
                                
                            </table>
                            
                        </div>
                        <div class="float-right mt-1 ">
                        
                        {{ $data->links() }}
                         </div>
                        
                         
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div> 