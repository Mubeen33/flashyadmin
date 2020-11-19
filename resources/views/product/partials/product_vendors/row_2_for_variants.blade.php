@push('styles')
<style type="text/css">
    .no_border_tbl tr th,
    .no_border_tbl tr td{
        border: none;
        padding: 3px;
    }
    .tbl_center tr th,
    .tbl_center tr td{
        text-align: center !important;
    }
</style>
@endpush

<?php
    $product_variation = NULL;
    $active_variation_uses = 0;
    $inactive_variation_uses = 0;

    if ($variationID !== "NO") {
        $product_variation = (\App\ProductVariation::where('id', $variationID))->first();
        $active_variation_uses = (\App\VendorProduct::where(['variation_id'=>$variationID, 'active'=>1]))->count();
        $inactive_variation_uses = (\App\VendorProduct::where(['variation_id'=>$variationID, 'active'=>0]))->count();
    }
   
?>

<div class="col-12">
    <div class="card" style="min-height: auto !important">
        <div class="card-header"></div>

        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table class="table no_border_tbl" style="text-align: left !important">
                            <tr>
                                <td width="30%" title="This number represents how many vendor products uses this variaton actively.">Variations Uses Active</td>
                                <td>{{$active_variation_uses}}</td>
                            </tr>
                            <tr>
                                <td width="30%" title="This number represents how many vendor products are not using this variaton but not active.">Variations Uses Inactive</td>
                                <td>{{$inactive_variation_uses}}</td>
                            </tr>
                            <tr>
                                <td width="30%" title="This number represents how many vendors was sold this product">Total Vendors</td>
                                <td>{{count($total_vendors)}}</td>
                            </tr>
                            <tr>
                                <td width="30%" title="This number represents how many vendors are selling this product actively still.">Active Vendors</td>
                                <td>{{count($total_active_vendors)}}</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>