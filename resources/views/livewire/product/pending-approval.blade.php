<div class="content-body">
    @include('msg.msg')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <div><h4 class="card-title">Pending Approvals</h4></div>
                    <div>  
                      
                       <input type="text" wire:model.change="search" placeholder="Search">
                        <select wire:model.change="perpage" title="Display row per page">
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
                                        <th class="sortAble" sorting-column='created_at' sorting-order=''>
                                            Submission Date
                                        </th>
                                        <th class="">Seller Name</th>
                                        <th class="">Seller ID</th>
                                        <th class="sortAble" sorting-column='title' sorting-order=''>
                                            Title
                                        </th>
                                       
                                        <th>Image</th>
                                        <th>
                                            Submission ID 
                                        </th>
                                        
                                       
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
   
                                <tbody id="render__data">
                                    @foreach($data as $key=>$content)
     
                                    @if(intval($content->get_vendor->active) === 1)
                                    
                                       
                                           
                                        <tr>
                                            <td>
                                                {{ $content->created_at->format('d/m/Y') }}
                                          </td>
                                            <td >
                                                {{ $content->get_vendor->first_name }} {{ $content->get_vendor->last_name }}
                                            </td>
                                            <td >
                                                {{ $content->get_vendor->id }} 
                                            </td>                                          
                                            <td>{{ $content->title }}</td>
                                            
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
                                             <a  href="{{ route('admin.viewProductDetails', encrypt($content->id)) }}">View</a>
                                            </td>
                                        </tr>
                                       
                                    
                                    
                                    
                                    
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