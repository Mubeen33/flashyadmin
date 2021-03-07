<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="{{route('home')}}">
                            <div class="brand-logo"></div>
                            @php
                                $adminlogo = \App\AppearanceSetting::where('action' , 'admin_logo')->first();
                            @endphp
                            @if($adminlogo != null)
                            <img src="{{url($adminlogo->path)}}">
                            @else
                            <h3>Admin</h3>
                            @endif
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 warning toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon warning" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <!-- vertical menu content-->
            <div class="shadow-bottom"></div>
            <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item">

                        <a class=" nav-link" href="{{url('/')}}" data-toggle="dropdown">
                            <i class="feather icon-home"></i><span data-i18n="Dashboard">Dashboard</span>
                        </a>

                    </li>
                    <li class=" navigation-header"><span>Apps</span>
                    </li>




                    <li class="nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-package"></i><span data-i18n="Apps">Vendors</span></a>
                        <ul class="menu-content">
                             <li data-menu=""><a class="dropdown-item" href="{{Route('admin.vendors.index')}}" data-toggle="dropdown" data-i18n="Thumb View"><i class="feather icon-circle"></i>Approved</a></li>
                             <li data-menu=""><a class="dropdown-item" href="{{Route('admin.vendors.pending.list')}}" data-toggle="dropdown" data-i18n="Thumb View"><i class="feather icon-circle"></i>Pending</a></li>
                            <!-- <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu">
                                <a class="dropdown-item" href=""><i class="feather icon-circle"></i>Vendors</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.pendingVendors.get')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Pending</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.vendors.index')}}" data-toggle="dropdown" data-i18n="Thumb View"><i class="feather icon-circle"></i>All</a>
                                    </li>
                                </ul>
                            </li> -->
                                <li data-menu=""><a class="dropdown-item" href="{{route('admin.vendor.activities.get')}}"><i class="feather icon-circle"></i>Vendors Activity</a></li>
                                <li data-menu=""><a class="dropdown-item" href="{{route('admin.vendor.bankUpdates.get')}}"><i class="feather icon-circle"></i>Bank Updates
                                    @php
                                        $vendorBankDetailsUpdates = (\App\VendorBankDetailsTempData::where('status', 0)->count());
                                        if($vendorBankDetailsUpdates > 0){
                                            echo "<span class='badge badge-danger ml-2'>".$vendorBankDetailsUpdates."</span>";
                                        }
                                    @endphp

                                </a></li>
                                <li data-menu=""><a class="dropdown-item" href="{{route('admin.vendor.addvendor.get')}}"><i class="feather icon-circle"></i>Add Vendor</a></li>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item" data-menu="dropdown">
                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-layers"></i>
                            <span data-i18n="UI Elements">
                                Deals
                                @php
                                    $vendorsDealRequests = (\App\Deal::where('status', 0)->count());
                                    if($vendorsDealRequests > 0){
                                        echo "<span class='badge badge-danger'>".$vendorsDealRequests."</span>";
                                    }
                                @endphp
                            </span>
                        </a>
                        <ul class="menu-content">
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.vendorDeals.pending.get')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Vendor Deals</a>
                            </li>
                            <!-- <li data-menu=""><a class="dropdown-item" href="{{Route('admin.vendor-deals.index')}}" data-toggle="dropdown" data-i18n="Thumb View"><i class="feather icon-circle"></i>All Deals</a>
                            </li> -->
                            <!-- <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Vendor Deals</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.vendorDeals.pending.get')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Pending Deals</a>
                                    </li>

                                </ul>
                            </li> -->
                        </ul>
                    </li>
                    <li class="nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-package"></i><span data-i18n="Apps">Transaction</span></a>
                        <ul class="menu-content">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu">
                                <a class="dropdown-item" href="{{route('admin.transactions')}}"><i class="feather icon-circle"></i>All Transactions</a>

                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-package"></i><span data-i18n="Apps">Customers</span></a>
                        <ul class="menu-content">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu">
                                <a class="dropdown-item" href="{{route('admin.customers.index')}}"><i class="feather icon-circle"></i>All Customers</a>

                            </li>
                        </ul>
                    </li>



                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Products</a>
                        <ul class="menu-content">
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.category.categorylist')}}" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Categories</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.brands.brandslist')}}" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Brands</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{ Route('admin.variations.variationslist')}}" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Variations</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{ route('admin.customFieldList.get')}}" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Custom Fields</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{ route('admin.productWarranty.get')}}" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Products Warranty</a>
                            </li>
                            <!-- <li data-menu=""><a class="dropdown-item" href="{{route('admin.pendingProducts.get')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Pending</a>
                            </li> -->
                            <li data-menu=""><a class="dropdown-item" href="{{route('admin.allProducts.get')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>All Products</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{route('admin.pendingApproval.get')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Pending Approvals</a></li>
                            <li data-menu=""><a class="dropdown-item" href="{{route('admin.pendingApproval.get')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Auto Approvals</a></li>
                        <!-- <ul class="menu-content">
                            <li ><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Ecommerce"><i class="feather icon-circle"></i>Categories</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.category.categorylist')}}" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Active Categories</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.category.disablecategoryList')}}" data-toggle="dropdown" data-i18n="Details"><i class="feather icon-circle"></i>Disable Categories</a>
                                    </li>
                                </ul>
                            </li>
                            <li ><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Ecommerce"><i class="feather icon-circle"></i>Brands</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.brands.brandslist')}}" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Brands</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.brands.disablebrandslist')}}" data-toggle="dropdown" data-i18n="Details"><i class="feather icon-circle"></i>Disable Brands</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Ecommerce"><i class="feather icon-circle"></i>Variations</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{ Route('admin.variations.variationslist')}}" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Variations</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.variations.disablevariationslist')}}" data-toggle="dropdown" data-i18n="Details"><i class="feather icon-circle"></i>Disable Variations</a>
                                    </li>
                                    {{-- <li data-menu=""><a class="dropdown-item" href="{{Route('variations.addvariationsoption')}}" data-toggle="dropdown" data-i18n="Details"><i class="feather icon-circle"></i>Add Option to Variations</a>
                                    </li> --}}
                                    {{-- <li data-menu=""><a class="dropdown-item" href="{{Route('variations.variationsoptionslist')}}" data-toggle="dropdown" data-i18n="Details"><i class="feather icon-circle"></i>Variations Options</a>
                                    </li> --}}

                                </ul>
                            </li>

                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Ecommerce"><i class="feather icon-circle"></i>Custom Fields</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{ route('admin.customFieldList.get')}}" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Custom Fields</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Ecommerce"><i class="feather icon-circle"></i>Products Warranty</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{ route('admin.productWarranty.get')}}" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Products Warranty</a>
                                    </li>
                                </ul>
                            </li>
                        </ul> -->

                    </ul>
                </li>

                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Content"><i class="feather icon-layout"></i>Reviews</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{ route('admin.product-reviews.index') }}" data-toggle="dropdown" data-i18n="Grid"><i class="feather icon-circle"></i>All</a>
                                    </li>
                                </ul>
                            </li>

                    <li class="nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-shopping-cart"></i><span data-i18n="UI Elements">Orders</span></a>
                        <ul class="menu-content">
                            <li data-menu=""><a class="dropdown-item" href="{{route('admin.orders.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>All Orders</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{route('admin.orders.waybill-request')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>WayBill Orders</a>
                            </li>
                            <!-- <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Orders</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{route('admin.orders.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>All Orders</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="{{route('admin.orders.waybill-request')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>WayBill Orders</a>
                                    </li>
                                </ul>
                            </li> -->

                            <!-- <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Content"><i class="feather icon-layout"></i>More</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="Grid"><i class="feather icon-circle"></i>Add New</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="Typography"><i class="feather icon-circle"></i>All Banners</a>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>


                    <li class="nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-layers"></i><span data-i18n="UI Elements">Apps Features</span></a>
                        <ul class="menu-content">
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.signup-contents.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Signup Content</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.coupons.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Coupons</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.email-templates.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Email Templates</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.popup.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Popups</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.auth-pages.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Auth Pages</a>
                            </li>
                            <!-- <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Signup Content</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.signup-contents.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>View</a>
                                    </li>
                                </ul>
                            </li> -->
                            <!-- <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Coupons</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.coupons.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Coupons List</a>
                                    </li>
                                </ul>
                            </li> -->
                            <!-- <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Email Templates</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.email-templates.create')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Setup</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.email-templates.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Template List</a>
                                    </li>
                                </ul>
                            </li> -->
                            <!-- <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Popup</a>
                                <ul  class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.popup.create')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Add New</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.popup.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Popup List</a>
                                    </li>
                                </ul>
                            </li> -->
                            <!-- <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Auth Pages</a>
                                <ul  class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.auth-pages.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Auth Pages</a>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>


                    <li class="nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-layers"></i><span data-i18n="UI Elements">Application</span></a>
                        <ul  class="menu-content">
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.site-maintenance.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i> Site Maintenance</a>
                            </li>
                            <!-- <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Site Maintenance</a>
                                <ul  class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.site-maintenance.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Maintenance</a>
                                    </li>
                                </ul>
                            </li> -->
                            <!-- <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>More</a>
                                <ul  class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>More</a>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>

                    <li class="nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-layers"></i><span data-i18n="UI Elements">Frontend Settings</span></a>
                        <ul  class="menu-content">
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.sliders.index')}}" data-toggle="dropdown" data-i18n="Thumb View"><i class="feather icon-circle"></i> Sliders</a>
                            </li>
                            <!-- <li class="nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-layers"></i><span data-i18n="UI Elements">Sliders</span></a> -->
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.banners.index')}}" data-toggle="dropdown" data-i18n="Typography"><i class="feather icon-circle"></i>Banners</a>
                            </li>
                        <!-- <ul class="menu-content">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Sliders</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.sliders.create')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Add New</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.sliders.index')}}" data-toggle="dropdown" data-i18n="Thumb View"><i class="feather icon-circle"></i>All Sliders</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Content"><i class="feather icon-layout"></i>Banners</a>
                                <ul class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.banners.index')}}" data-toggle="dropdown" data-i18n="Typography"><i class="feather icon-circle"></i>Home Banners</a>
                                    </li>
                                </ul>
                            </li>
                        </ul> -->
                    </li>
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.logo-settings')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Logo Settings</a>
                            </li>
                            <!-- <li data-menu=""><a class="dropdown-item" href="{{Route('admin.cetegory-settings')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Category Settings</a>
                            </li> -->
                            <li data-menu=""><a class="dropdown-item" href="{{Route('admin.home-settings')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Category Settings</a>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Link Pages</a>
                                <ul  class="menu-content">
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.quicklinks.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Quick Links</a>
                                            </li>
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.company.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Company</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="{{Route('admin.business.index')}}" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>Business</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                   {{--  <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-layers"></i><span data-i18n="UI Elements">UI Elements</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Data List"><i class="feather icon-list"></i>Data List</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="data-list-view.html" data-toggle="dropdown" data-i18n="List View"><i class="feather icon-circle"></i>List View</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="data-thumb-view.html" data-toggle="dropdown" data-i18n="Thumb View"><i class="feather icon-circle"></i>Thumb View</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Content"><i class="feather icon-layout"></i>Content</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="content-grid.html" data-toggle="dropdown" data-i18n="Grid"><i class="feather icon-circle"></i>Grid</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="content-typography.html" data-toggle="dropdown" data-i18n="Typography"><i class="feather icon-circle"></i>Typography</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="content-text-utilities.html" data-toggle="dropdown" data-i18n="Text Utilities"><i class="feather icon-circle"></i>Text Utilities</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="content-syntax-highlighter.html" data-toggle="dropdown" data-i18n="Syntax Highlighter"><i class="feather icon-circle"></i>Syntax Highlighter</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="content-helper-classes.html" data-toggle="dropdown" data-i18n="Helper Classes"><i class="feather icon-circle"></i>Helper Classes</a>
                                    </li>
                                </ul>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="colors.html" data-toggle="dropdown" data-i18n="Colors"><i class="feather icon-droplet"></i>Colors</a>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Cards"><i class="feather icon-credit-card"></i>Cards</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="card-basic.html" data-toggle="dropdown" data-i18n="Basic"><i class="feather icon-circle"></i>Basic</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="card-advance.html" data-toggle="dropdown" data-i18n="Advance"><i class="feather icon-circle"></i>Advance</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="card-statistics.html" data-toggle="dropdown" data-i18n="Statistics"><i class="feather icon-circle"></i>Statistics</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="card-analytics.html" data-toggle="dropdown" data-i18n="Analytics"><i class="feather icon-circle"></i>Analytics</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="card-actions.html" data-toggle="dropdown" data-i18n="Card Actions"><i class="feather icon-circle"></i>Card Actions</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Icons"><i class="feather icon-eye"></i>Icons</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown" data-i18n="Feather"><i class="feather icon-circle"></i>Feather</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown" data-i18n="Font Awesome"><i class="feather icon-circle"></i>Font Awesome</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Components"><i class="feather icon-briefcase"></i>Components</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="component-alerts.html" data-toggle="dropdown" data-i18n="Alerts"><i class="feather icon-circle"></i>Alerts</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-buttons-basic.html" data-toggle="dropdown" data-i18n="Buttons"><i class="feather icon-circle"></i>Buttons</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-breadcrumbs.html" data-toggle="dropdown" data-i18n="Breadcrumbs"><i class="feather icon-circle"></i>Breadcrumbs</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-carousel.html" data-toggle="dropdown" data-i18n="Carousel"><i class="feather icon-circle"></i>Carousel</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-collapse.html" data-toggle="dropdown" data-i18n="Collapse"><i class="feather icon-circle"></i>Collapse</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-dropdowns.html" data-toggle="dropdown" data-i18n="Dropdowns"><i class="feather icon-circle"></i>Dropdowns</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-list-group.html" data-toggle="dropdown" data-i18n="List Group"><i class="feather icon-circle"></i>List Group</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-modals.html" data-toggle="dropdown" data-i18n="Modals"><i class="feather icon-circle"></i>Modals</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-pagination.html" data-toggle="dropdown" data-i18n="Pagination"><i class="feather icon-circle"></i>Pagination</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-navs-component.html" data-toggle="dropdown" data-i18n="Navs Component"><i class="feather icon-circle"></i>Navs Component</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-navbar.html" data-toggle="dropdown" data-i18n="Navbar"><i class="feather icon-circle"></i>Navbar</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-tabs-component.html" data-toggle="dropdown" data-i18n="Tabs Component"><i class="feather icon-circle"></i>Tabs Component</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-pills-component.html" data-toggle="dropdown" data-i18n="Pills Component"><i class="feather icon-circle"></i>Pills Component</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-tooltips.html" data-toggle="dropdown" data-i18n="Tooltips"><i class="feather icon-circle"></i>Tooltips</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-popovers.html" data-toggle="dropdown" data-i18n="Popovers"><i class="feather icon-circle"></i>Popovers</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-badges.html" data-toggle="dropdown" data-i18n="Badges"><i class="feather icon-circle"></i>Badges</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-pill-badges.html" data-toggle="dropdown" data-i18n="Pill Badges"><i class="feather icon-circle"></i>Pill Badges</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-progress.html" data-toggle="dropdown" data-i18n="Progress"><i class="feather icon-circle"></i>Progress</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-media-objects.html" data-toggle="dropdown" data-i18n=""><i class="feather icon-circle"></i>Media Objects</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-spinner.html" data-toggle="dropdown" data-i18n="Spinner"><i class="feather icon-circle"></i>Spinner</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="component-bs-toast.html" data-toggle="dropdown" data-i18n="Toasts"><i class="feather icon-circle"></i>Toasts</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Extra Components"><i class="feather icon-box"></i>Extra Components</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="ex-component-avatar.html" data-toggle="dropdown" data-i18n="Avatar"><i class="feather icon-circle"></i>Avatar</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ex-component-chips.html" data-toggle="dropdown" data-i18n="Chips"><i class="feather icon-circle"></i>Chips</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ex-component-divider.html" data-toggle="dropdown" data-i18n="Divider"><i class="feather icon-circle"></i>Divider</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Extensions"><i class="feather icon-box"></i>Extensions</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-sweet-alerts.html" data-toggle="dropdown" data-i18n="Sweet Alert"><i class="feather icon-circle"></i>Sweet Alert</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-toastr.html" data-toggle="dropdown" data-i18n="Toastr"><i class="feather icon-circle"></i>Toastr</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-noui-slider.html" data-toggle="dropdown" data-i18n="NoUi Slider"><i class="feather icon-circle"></i>NoUi Slider</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-file-uploader.html" data-toggle="dropdown" data-i18n="File Uploader"><i class="feather icon-circle"></i>File Uploader</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-quill-editor.html" data-toggle="dropdown" data-i18n="Quill Editor"><i class="feather icon-circle"></i>Quill Editor</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-drag-drop.html" data-toggle="dropdown" data-i18n="Drag &amp; Drop"><i class="feather icon-circle"></i>Drag &amp; Drop</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-tour.html" data-toggle="dropdown" data-i18n="Tour"><i class="feather icon-circle"></i>Tour</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-clipboard.html" data-toggle="dropdown" data-i18n="Clipboard"><i class="feather icon-circle"></i>Clipboard</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-plyr.html" data-toggle="dropdown" data-i18n="Media Player"><i class="feather icon-circle"></i>Media Player</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-context-menu.html" data-toggle="dropdown" data-i18n="Context Menu"><i class="feather icon-circle"></i>Context Menu</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-swiper.html" data-toggle="dropdown" data-i18n="swiper"><i class="feather icon-smartphone"></i>swiper</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="ext-component-i18n.html" data-toggle="dropdown" data-i18n="l18n"><i class="feather icon-circle"></i>l18n</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-edit-2"></i><span data-i18n="Forms &amp; Tables">Forms &amp; Tables</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Form Elements"><i class="feather icon-copy"></i>Form Elements</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="form-select.html" data-toggle="dropdown" data-i18n="Select"><i class="feather icon-circle"></i>Select</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="form-switch.html" data-toggle="dropdown" data-i18n="Switch"><i class="feather icon-circle"></i>Switch</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="form-checkbox.html" data-toggle="dropdown" data-i18n="Checkbox"><i class="feather icon-circle"></i>Checkbox</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="form-radio.html" data-toggle="dropdown" data-i18n="Radio"><i class="feather icon-circle"></i>Radio</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="form-inputs.html" data-toggle="dropdown" data-i18n="Input"><i class="feather icon-circle"></i>Input</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="form-input-groups.html" data-toggle="dropdown" data-i18n="Input Groups"><i class="feather icon-circle"></i>Input Groups</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="form-number-input.html" data-toggle="dropdown" data-i18n="Number Input"><i class="feather icon-circle"></i>Number Input</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="form-textarea.html" data-toggle="dropdown" data-i18n="Textarea"><i class="feather icon-circle"></i>Textarea</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="form-date-time-picker.html" data-toggle="dropdown" data-i18n="Date &amp; Time Picker"><i class="feather icon-circle"></i>Date &amp; Time Picker</a>
                                    </li>
                                </ul>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="form-layout.html" data-toggle="dropdown" data-i18n="Form Layout"><i class="feather icon-box"></i>Form Layout</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="form-wizard.html" data-toggle="dropdown" data-i18n="Form Wizard"><i class="feather icon-package"></i>Form Wizard</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="form-validation.html" data-toggle="dropdown" data-i18n="Form Validation"><i class="feather icon-check-circle"></i>Form Validation</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="table.html" data-toggle="dropdown" data-i18n="Table"><i class="feather icon-server"></i>Table</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="table-datatable.html" data-toggle="dropdown" data-i18n="Datatable"><i class="feather icon-grid"></i>Datatable</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="table-ag-grid.html" data-toggle="dropdown" data-i18n="agGrid Table"><i class="feather icon-grid"></i>agGrid Table</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-file"></i><span data-i18n="Pages">Pages</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item" href="page-user-profile.html" data-toggle="dropdown" data-i18n="Profile"><i class="feather icon-user"></i>Profile</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="page-account-settings.html" data-toggle="dropdown" data-i18n="Account Settings"><i class="feather icon-settings"></i>Account Settings</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="page-faq.html" data-toggle="dropdown" data-i18n="FAQ"><i class="feather icon-help-circle"></i>FAQ</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="page-knowledge-base.html" data-toggle="dropdown" data-i18n="Knowledge Base"><i class="feather icon-info"></i>Knowledge Base</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="page-search.html" data-toggle="dropdown" data-i18n="Search"><i class="feather icon-search"></i>Search</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="page-invoice.html" data-toggle="dropdown" data-i18n="Invoice"><i class="feather icon-file"></i>Invoice</a>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Authentication"><i class="feather icon-unlock"></i>Authentication</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="auth-login.html" data-toggle="dropdown" data-i18n="Login"><i class="feather icon-circle"></i>Login</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="auth-register.html" data-toggle="dropdown" data-i18n="Register"><i class="feather icon-circle"></i>Register</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="auth-forgot-password.html" data-toggle="dropdown" data-i18n="Forgot Password"><i class="feather icon-circle"></i>Forgot Password</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="auth-reset-password.html" data-toggle="dropdown" data-i18n="Reset Password"><i class="feather icon-circle"></i>Reset Password</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="auth-lock-screen.html" data-toggle="dropdown" data-i18n="Lock Screen"><i class="feather icon-circle"></i>Lock Screen</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Miscellaneous"><i class="feather icon-file-text"></i>Miscellaneous</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="page-coming-soon.html" data-toggle="dropdown" data-i18n="Coming Soon"><i class="feather icon-circle"></i>Coming Soon</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="error-404.html" data-toggle="dropdown" data-i18n="404"><i class="feather icon-circle"></i>Error 404</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="error-500.html" data-toggle="dropdown" data-i18n="500"><i class="feather icon-circle"></i>Error 500</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="page-not-authorized.html" data-toggle="dropdown" data-i18n="Not Authorized"><i class="feather icon-circle"></i>Not Authorized</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="page-maintenance.html" data-toggle="dropdown" data-i18n="Maintenance"><i class="feather icon-circle"></i>Maintenance</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-bar-chart-2"></i><span data-i18n="Charts &amp; Maps">Charts &amp; Maps</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Charts"><i class="feather icon-pie-chart"></i>Charts</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="chart-apex.html" data-toggle="dropdown" data-i18n="Apex"><i class="feather icon-circle"></i>Apex</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="chart-chartjs.html" data-toggle="dropdown" data-i18n="Chartjs"><i class="feather icon-circle"></i>Chartjs</a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item" href="chart-echarts.html" data-toggle="dropdown" data-i18n="Echarts"><i class="feather icon-circle"></i>Echarts</a>
                                    </li>
                                </ul>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="maps-google.html" data-toggle="dropdown" data-i18n="Google Maps"><i class="feather icon-map"></i>Google Maps</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-more-horizontal"></i><span data-i18n="Others">Others</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Menu Levels"><i class="feather icon-menu"></i>Menu Levels</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="Second Level"><i class="feather icon-circle"></i>Second Level</a>
                                    </li>
                                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Second Level"><i class="feather icon-circle"></i>Second Level</a>
                                        <ul class="dropdown-menu">
                                            <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="Third Level"><i class="feather icon-circle"></i>Third Level</a>
                                            </li>
                                            <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown" data-i18n="Third Level"><i class="feather icon-circle"></i>Third Level</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="disabled" data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown" data-i18n="Disabled Menu"><i class="feather icon-eye-off"></i>Disabled Menu</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation" data-toggle="dropdown" data-i18n="Documentation"><i class="feather icon-folder"></i>Documentation</a>
                            </li>
                            <li data-menu=""><a class="dropdown-item" href="https://pixinvent.ticksy.com/" data-toggle="dropdown" data-i18n="Raise Support"><i class="feather icon-life-buoy"></i>Raise Support</a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </div>

    </div>
