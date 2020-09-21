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

   $total_product_variants = (\App\ProductVariation::where('product_id', decrypt($product_id)))->get();
   $total_active_product_variants = (\App\ProductVariation::where(['product_id'=>decrypt($product_id), 'active'=>1]))->get();
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
                                <td width="30%">Total Variations</td>
                                <td>{{count($total_product_variants)}}</td>
                            </tr>
                            <tr>
                                <td width="30%">Active Variations</td>
                                <td>{{count($total_active_product_variants)}}</td>
                            </tr>
                        </table>

                        <table class="table no_border_tbl tbl_center">
                            <thead>
                                <tr>
                                    <th>Variation ID</th>
                                    <th>Variation Status</th>
                                    <th>First Variantion Value</th>
                                    <th>Second Variantion  Value</th>
                                    <th>Active Vendors</th>
                                    <th>Inactive Vendors</th>
                                    <th>Total Vendors</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($total_product_variants as $key => $variant) {
                                        $vendor_products_total = (\App\VendorProduct::where('variation_id', $variant->id)->count());
                                        $vendor_products_active = (\App\VendorProduct::where(['variation_id'=>$variant->id, 'active'=>1])->count());
                                        $vendor_products_inactive = (\App\VendorProduct::where(['variation_id'=>$variant->id, 'active'=>0])->count());
                                        echo "<tr>";
                                            echo "<td>".$variant->id."</td>";
                                            
                                            if ($variant->active == 1) {
                                                echo "<td>Active</td>";
                                            }else{
                                                echo "<td>Inactive</td>";
                                            }
                                            echo "<td>".$variant->first_variation_value."</td>";
                                            echo "<td>".$variant->second_variation_value."</td>";
                                            echo "<td>".$vendor_products_active."</td>";
                                            echo "<td>".$vendor_products_inactive."</td>";
                                            echo "<td>".$vendor_products_total."</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>