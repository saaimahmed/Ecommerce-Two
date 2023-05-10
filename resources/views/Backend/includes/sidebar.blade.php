<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('home') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa  me-2"></i>E-Commerce</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('/') }}admin-assets/img/user.png" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::User()->name }}</h6>
{{--                <span>{{ Auth::User()->role }}</span>--}}
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-users me-2"></i>User Details</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('user-list') }}" class="dropdown-item nav-item nav-link"><i class="fa fa-user-plus"></i>List Of User</a>
                    <a href="" class="dropdown-item nav-item nav-link"><i class="fa fa-user"></i>User Role</a>
                    <a href="" class="dropdown-item"></a>
                </div>
            </div>
            <a href="" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Profile</a>
            <a href="{{ route('manage-category') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Category</a>
            <a href="{{ route('manage-sub-category') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Sub category</a>
            <a href="{{ route('brands.index') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Brand</a>
            <a href="{{ route('units.index') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Unit Module</a>
            <a href="{{ route('products.index') }}" class="nav-item nav-link"><i class="fa-solid fa-plus-minus me-2"></i>Product</a>
            <a href="{{ route('order-manage') }}" class="nav-item nav-link"><i class="fa-solid fa-warehouse me-2"></i>Order Module</a>
            <a href="{{ route('order-report') }}" class="nav-item nav-link"><i class="fa-solid fa-warehouse me-2"></i>Order Report</a>
            <a href="" class="nav-item nav-link"><i class="fa-solid fa-gear me-2"></i>Manage Setting</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Blank Page</a>
                </div>
            </div>
        </div>
    </nav>
</div>
