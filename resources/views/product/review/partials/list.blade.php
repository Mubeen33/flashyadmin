@foreach($data as $key=>$content)  
    <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td>
            {{ $content->get_product->title }}
        </td>                                          
        <td>
            <?php
                $category = (\App\Category::where('id', $content->get_product->category_id)->first());
                if ($category) {
                    echo $category->name;
                }else{
                    echo "<span title='The associated category not found!'>N/A</span>";
                }
            ?>
        </td>
        <td>
            <?php
                $product_image = (\App\ProductMedia::where('image_id', $content->get_product->image_id)->first());
                if ($product_image) {
                   echo "<img src='".$product_image->image."' width='80px' height='50px'>";
                }else{
                    echo "<span title='Product Image Not Found'>N/A</span>";
                }
            ?>
        </td>
        <td>{{ $content->get_product->product_type }}</td>
        <td>
              {{ $content->get_product->created_at->format(env('GENERAL_DATE_FORMAT')) }}
        </td>
        <td>
            @if(intval($content->get_product->approved) === 1)
                <span class="badge badge-success">Approved</span>
            @elseif(intval($content->get_product->disable) === 1)
                <span class="badge badge-danger">Disabled</span>
                @else
                <span class="badge badge-danger">Wrong</span>
            @endif
        </td>
        <td>
            {{ $content->get_customer->first_name." ".$content->get_customer->last_name }}
        </td>
        <td>
            <?php
                $averateRatings = number_format(($content->total_star/$content->total_review), 2);
                echo "<span title='Total Reviews'>".$content->total_review." || </span>";
                echo "<span title='Average Ratings'>".$averateRatings."</span>";
                echo "<br>";
            ?>
            @include('rating_stars.rating_stars', ['averateRatings'=>$averateRatings])
        </td>
        <td>
            <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                        <a class="dropdown-item" href="{{ route('admin.productDetails.get', encrypt($content->id)) }}">Show</a>
                    </div>
                </div>
            </div>
            
        </td>
    </tr>


@endforeach
<tr>
    <td colspan="9">{!! $data->links() !!}</td>
</tr>

