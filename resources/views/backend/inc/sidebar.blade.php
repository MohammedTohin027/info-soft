
@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
{{-- @dd($prefix) --}}
{{-- @dd($route) --}}

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('public/backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ !empty(Auth::user()->image) ? url('public/upload/profile_images/' . Auth::user()->image) : url('public/upload/avater_1.png') }}"
                    style="width: 40px; height: 40px; border-redius: 50%" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="{{ route('profile.view') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview @yield('manage-user')">
                    <a href="#" class="nav-link @yield('manage-user')">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.view') }}" class="nav-link @yield('view-user')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item has-treeview @yield('manage-profile')">
                    <a href="#" class="nav-link @yield('manage-profile')">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Profile
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('profile.view') }}" class="nav-link @yield('view-profile')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Profile</p>
                            </a>
                            <a href="{{ route('change.password') }}" class="nav-link @yield('change-password')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>

                    </ul>
                </li> --}}
                <li class="nav-item has-treeview {{ ($prefix == 'admin/profiles') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Profile
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('profile.view') }}" class="nav-link {{ ($route == 'profile.view') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Profile</p>
                            </a>
                            <a href="{{ route('change.password') }}" class="nav-link {{ ($route == 'change.password') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ ($prefix == 'admin/divisions') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Division
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('division.view') }}" class="nav-link {{ ($route == 'division.view') || ($route == 'division.create') || ($route == 'division.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Division</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- district --}}
                <li class="nav-item has-treeview {{ ($prefix == 'admin/districts') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage District
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('district.view') }}" class="nav-link {{ ($route == 'district.view') || ($route == 'district.create') || ($route == 'district.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View District</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- upazila --}}
                <li class="nav-item has-treeview {{ ($prefix == 'admin/upazilas') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Upazila
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('upazila.view') }}" class="nav-link {{ ($route == 'upazila.view') || ($route == 'upazila.create') || ($route == 'upazila.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Upazila</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- union --}}
                <li class="nav-item has-treeview {{ ($prefix == 'admin/unions') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Union
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('union.view') }}" class="nav-link {{ ($route == 'union.view') || ($route == 'union.create') || ($route == 'union.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Union</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- word no --}}
                <li class="nav-item has-treeview {{ ($prefix == 'admin/ward-no') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Ward No
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ward-no.view') }}" class="nav-link {{ ($route == 'ward-no.view') || ($route == 'ward-no.create') || ($route == 'ward-no.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View ward No</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- village --}}
                <li class="nav-item has-treeview {{ ($prefix == 'admin/villages') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Village
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('village.view') }}" class="nav-link {{ ($route == 'village.view') || ($route == 'village.create') || ($route == 'village.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Village</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
