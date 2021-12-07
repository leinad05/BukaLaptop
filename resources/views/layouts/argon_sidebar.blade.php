<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                {{-- <img src="{{ asset('../assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="..."> --}}
                <h1>Buka Laptop</h1>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">View Frontend</span>
                        </a>
                    </li>
                    @can('access-permission-HR')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hr.index') }}">
                            <i class="ni ni-circle-08 text-info"></i>
                            <span class="nav-link-text">Human Resource Management</span>
                        </a>
                    </li>
                    @endcan
                </ul>

                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">List of</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('products.index') }}">
                            <i class="ni ni-laptop"></i>
                            <span class="nav-link-text">Products</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('categories.index') }}">
                            <i class="ni ni-bullet-list-67"></i>
                            <span class="nav-link-text">Categories</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('brands.index') }}">
                            <i class="ni ni-shop"></i>
                            <span class="nav-link-text">Brands</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('transactions.index') }}">
                            <i class="ni ni-chart-bar-32"></i>
                            <span class="nav-link-text">Transactions</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</nav>
