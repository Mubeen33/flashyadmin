@push('styles')
<style type="text/css">
    .no_border_tbl tr td{
        border: none;
        padding: 3px
    }
</style>
@endpush
<div class="col-12">
    <div class="card" style="min-height: auto !important">
        <div class="card-header"></div>

        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table class="table no_border_tbl" style="text-align: left !important">
                            <tr>
                                <td width="30%">Total Vendors</td>
                                <td>{{count($total_vendors)}}</td>
                            </tr>
                            <tr>
                                <td width="30%">Active Vendors</td>
                                <td>{{count($total_active_vendors)}}</td>
                            </tr>
                            <tr>
                                <td width="30%">Total QTY Sold</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="30%">Total Sales</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>