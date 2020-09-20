<div class="card" style="min-height: auto !important">
    <div class="card-header"></div>

    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <input type="text" search-in="" class="searchKey__" placeholder="Search">
                    </div>
                    <div class="responsive-table">
                        <table class="table" id="productVendorsTBL">
                            <thead>
                                <th>Ven. ID</th>
                                <th>Ven. Name</th>
                                <th>Email</th>
                                <th>Available QTY</th>
                                <th>Selling Price</th>
                                <th>MK Price</th>
                                <th>Delivery</th>
                                <th>Status</th>
                            </thead>
                            <tbody id="render__data">
                                @include('product.partials.product_vendors.partials.product-vendors-list', ['product_vendors'=>$product_vendors])
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
@endpush
