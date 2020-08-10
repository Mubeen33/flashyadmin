<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Vuexy</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                	<a href="javascript:void(0)">
                		Dashboard
                	</a>
                </li>
				<li class=" nav-item">
                   	<a href="javascript:void(0)">
                   		<i class="feather icon-home"></i>
                   		<span class="menu-title" data-i18n="Products">Products</span>
						<!--<span class="badge badge badge-warning badge-pill float-right mr-2">2</span>-->
					</a>
                    <ul class="menu-content">
                        <li>
                        	<a href="{{ url('products') }}">
								<i class="feather icon-circle"></i>
                       			<span class="menu-item" data-i18n="All Products">All Products</span>
							</a>
                        </li>
                        <li>
                        	<a href="{{ url('add-product') }}">
								<i class="feather icon-circle"></i>
                       			<span class="menu-item" data-i18n="Add New">Add New</span>
							</a>
                        </li>
                        <li>
                        	<a href="{{ url('categories') }}">
								<i class="feather icon-circle"></i>
                       			<span class="menu-item" data-i18n="Categories">Categoriess</span>
							</a>
                        </li>
                        <li>
                        	<a href="{{ url('custom-field') }}">
								<i class="feather icon-circle"></i>
                       			<span class="menu-item" data-i18n="Custom Fields">Custom Fields</span>
							</a>
                        </li>
                    </ul>
                </li>
                <li class="navigation-header">
                	<span>Apps</span>
                </li>
            </ul>
        </div>
    </div>