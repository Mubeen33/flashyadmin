<div class="col-12">
    <div class="card" style="min-height: auto !important">
        <div class="card-header">
            <div class="d-flex">
                <h4 class="card-title">Product Vendors</h4> 
            </div>

            <div><a href="" class="ml-1 btn btn-danger btn-sm">Back</a></div>
        </div>


        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div>
                            @if($ven_product->variation_id !== NULL)
                                @if($ven_product->get_variation->variant_image != NULL)
                                <img identity='Variant Image' src="{{$ven_product->get_variation->variant_image}}">
                                @else
                                    <?php
                                      $productImage = (\App\ProductMedia::where('image_id', $ven_product->get_product->image_id)->first());  
                                    ?>
                                    <img identity='product media case else.' src="{{$productImage->image}}">
                                @endif

                            @else
                                <?php
                                  $productImage = (\App\ProductMedia::where('image_id', $ven_product->get_product->image_id)->first());  
                                ?>
                                <img identity='product media' src="{{$productImage->image}}">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-7">
                        <div>
                            <h4>{{$ven_product->get_product->title}}</h4>
                            <p class="text-justify">{{$ven_product->get_product->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>