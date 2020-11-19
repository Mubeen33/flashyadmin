<div class="col-lg-12 col-md-12">
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        @include('product.partials.product_vendors.vendors')
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @include('product.partials.product_vendors.assing-to-vendors')
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        @include('product.partials.product_vendors.last-one')
      </div>
    </div>
</div>