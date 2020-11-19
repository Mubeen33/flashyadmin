<div class="card" style="min-height: auto !important">
    <div class="card-header"></div>

    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <input type="text" class="searchKey__" placeholder="Search">
                    </div>
                    <div class="responsive-table">
                        <table class="table" id="productVendorAssignTBL">
                            <thead>
                                <th>Ven. ID</th>
                                <th>Ven. Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Company</th>
                                <th>Signup Date</th>
                                <th>Assing</th>
                            </thead>
                            <tbody>
                                @include('product.partials.product_vendors.partials.vendor-assign-list', ['vendors'=>$vendors])
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
