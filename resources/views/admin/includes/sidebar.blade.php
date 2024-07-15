@php
    $user = Auth::user();
@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL::to('/admin/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ URL::to('/admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Modules
    </div>

    @if (
        $user->can('role.create') ||
            $user->can('role.view') ||
            $user->can('role.edit') ||
            $user->can('role.delete') ||
            $user->can('user.view') ||
            $user->can('user.create'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole"
                aria-expanded="true" aria-controls="collapseRole">
                <i class="fas fa-fw fa-tasks"></i>
                <span>
                    User & roles
                </span>
            </a>
            <div id="collapseRole"
                class="collapse {{ in_array(URL::current(), [URL::to('/admin/roles'), URL::to('/admin/create-role'), URL::to('/admin/edit-role'), URL::to('/admin/users'), URL::to('/admin/create-user'), URL::to('/admin/edit-user')]) ? 'show' : '' }}"
                aria-labelledby="collapseRole" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if ($user->can('role.view'))
                        <a class="collapse-item {{ in_array(URL::current(), [URL::to('/admin/roles'), URL::to('/admin/edit-role')]) ? 'active' : '' }}"
                            href="{{ URL::to('/admin/roles') }}">Manage Roles</a>
                    @endif
                    @if ($user->can('role.create'))
                        <a class="collapse-item {{ URL::current() == URL::to('/admin/create-role') ? 'active' : '' }}"
                            href="{{ URL::to('/admin/create-role') }}">New Role</a>
                    @endif

                    @if ($user->can('user.view'))
                        <a class="collapse-item {{ in_array(URL::current(), [URL::to('/admin/users'), URL::to('/admin/edit-user')]) ? 'active' : '' }}"
                            href="{{ URL::to('/admin/users') }}">Manage Users</a>
                    @endif

                    @if ($user->can('user.create'))
                        <a class="collapse-item {{ URL::current() == URL::to('/admin/create-user') ? 'active' : '' }}"
                            href="{{ URL::to('/admin/create-user') }}">New User</a>
                    @endif
                </div>
            </div>
        </li>
    @endif

    @if (
        $user->can('category.create') ||
            $user->can('category.view') ||
            $user->can('category.edit') ||
            $user->can('category.delete'))
        <!-- Nav Item - Category -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
                aria-expanded="true" aria-controls="collapseCategory">
                <i class="fas fa-fw fa-th"></i>
                <span>Category</span>
            </a>
            <div id="collapseCategory"
                class="collapse {{ in_array(URL::current(), [URL::to('/admin/getAllCategories'), URL::to('/admin/create-category'), URL::to('/admin/edit-category')]) ? 'show' : '' }}"
                aria-labelledby="collapseCategory" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if ($user->can('category.view'))
                        <a class="collapse-item {{ in_array(URL::current(), [URL::to('/admin/getAllCategories'), URL::to('/admin/edit-category')]) ? 'active' : '' }}"
                            href="{{ URL::to('/admin/getAllCategories') }}">Manage Categories</a>
                    @endif
                    @if ($user->can('category.create'))
                        <a class="collapse-item {{ URL::current() == URL::to('/admin/create-category') ? 'active' : '' }}"
                            href="{{ URL::to('/admin/create-category') }}">New Category</a>
                    @endif
                </div>
            </div>
        </li>
    @endif
    @if (
        $user->can('subCategory.create') ||
            $user->can('subCategory.view') ||
            $user->can('subCategory.edit') ||
            $user->can('subCategory.delete'))
        <!-- Nav Item - Category -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubCategory"
                aria-expanded="true" aria-controls="collapseSubCategory">
                <i class="fas fa-fw fa-th"></i>
                <span>Sub-Category</span>
            </a>
            <div id="collapseSubCategory"
                class="collapse {{ in_array(URL::current(), [URL::to('/admin/getAllSubCategories'), URL::to('/admin/create-subCategory'), URL::to('/admin/edit-subCategory')]) ? 'show' : '' }}"
                aria-labelledby="collapseSubCategory" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if ($user->can('subCategory.view'))
                        <a class="collapse-item {{ in_array(URL::current(), [URL::to('/admin/getAllSubCategories'), URL::to('/admin/edit-subCategory')]) ? 'active' : '' }}"
                            href="{{ URL::to('/admin/getAllSubCategories') }}">Manage Sub-Categories</a>
                    @endif
                    @if ($user->can('subCategory.create'))
                        <a class="collapse-item {{ URL::current() == URL::to('/admin/create-subCategory') ? 'active' : '' }}"
                            href="{{ URL::to('/admin/create-subCategory') }}">New Sub-Category</a>
                    @endif
                </div>
            </div>
        </li>
    @endif
    @if (
        $user->can('product.create') ||
            $user->can('product.view') ||
            $user->can('product.edit') ||
            $user->can('product.delete'))
        <!-- Nav Item - Category -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
                aria-expanded="true" aria-controls="collapseProduct">
                <i class="fas fa-fw fa-th"></i>
                <span>Product</span>
            </a>
            <div id="collapseProduct"
                class="collapse {{ in_array(URL::current(), [URL::to('/admin/getAllProducts'), URL::to('/admin/create-product'), URL::to('/admin/edit-product')]) ? 'show' : '' }}"
                aria-labelledby="collapseProduct" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if ($user->can('product.view'))
                        <a class="collapse-item {{ in_array(URL::current(), [URL::to('/admin/getAllProducts'), URL::to('/admin/edit-product')]) ? 'active' : '' }}"
                            href="{{ URL::to('/admin/getAllProducts') }}">Manage Products</a>
                    @endif
                    @if ($user->can('product.create'))
                        <a class="collapse-item {{ URL::current() == URL::to('/admin/create-product') ? 'active' : '' }}"
                            href="{{ URL::to('/admin/create-product') }}">New Product</a>
                    @endif
                </div>
            </div>
        </li>
    @endif
    @if ($user->can('transaction.view'))
        <!-- Nav Item - Category -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaction"
                aria-expanded="true" aria-controls="collapseTransaction">
                <i class="fas fa-fw fa-th"></i>
                <span>Transaction</span>
            </a>
            <div id="collapseTransaction"
                class="collapse {{ in_array(URL::current(), [URL::to('/admin/getAllTransactions')]) ? 'show' : '' }}"
                aria-labelledby="collapseTransaction" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if ($user->can('transaction.view'))
                        <a class="collapse-item {{ in_array(URL::current(), [URL::to('/admin/getAllTransactions')]) ? 'active' : '' }}"
                            href="{{ URL::to('/admin/getAllTransactions') }}">Manage Transaction</a>
                    @endif
                </div>
            </div>
        </li>
    @endif

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
