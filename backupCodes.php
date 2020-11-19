@foreach($data as $key=>$content)
    <tr>
        <th scope="row">{{ $key+1 }}</th>                                          
        <td>{{ $content->get_product->title }}</td>
        <td>
            <?php
                //get category
                $categroy = (\App\Category::where('id', $content->get_product->category_id)->first());
                if ($categroy) {
                    echo $categroy->name;
                }else{
                    echo "<span title='The associated category not found.'>N\A</span>";
                }
            ?>
        </td>
        <td>
            <?php
                //get product image
                $product_image = (\App\ProductMedia::where('image_id', $content->get_product->image_id)->first());
                if ($product_image) {
                    echo "<img src='".$product_image->image."' width='80px' height='50px'>";
                }else{
                    echo "<span title='No Product Image Available'>N\A</span>";
                }
            ?>
        </td>
        <td>{{ $content->get_product->product_type }}</td>
        <td>{{ $content->get_product->sku }}</td>
        <td>{{ $content->quantity }}</td>
        <td>{{ $content->mk_price }}</td>
        <td>{{ $content->price }}</td>
        <td>{{ $content->dispatched_days }}</td>
        <td>
            {{ $content->created_at->format(env('GENERAL_DATE_FORMAT')) }}
        </td>
        <td>
            @if(intval($content->active) === 1)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">Inactive</span>>
            @endif
        </td>
        <td>
            <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                        
                    </div>
                </div>
            </div>
            
        </td>
    </tr>


@endforeach
<tr>
    <td colspan="9">{!! $data->links() !!}</td>
</tr>
