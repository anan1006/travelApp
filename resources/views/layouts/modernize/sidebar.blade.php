<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/dashboard" class="text-nowrap logo-img mx-auto mt-3">
                <img src="{{ asset('img/logodark.png') }}" width="100" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/" aria-expanded="false">
                        <span>
                            <i class="ti ti-device-desktop"></i>
                        </span>
                        <span class="hide-menu">Landing Page</span>
                    </a>
                </li>
                @if (!auth()->user()->hasRole('user'))
                    <li class="sidebar-item">
                        <a class="sidebar-link {{ Request::is('discover/*') ? 'active' : '' }}" href="/discover"
                            aria-expanded="false">
                            <span>
                                <i class="ti ti-compass"></i>
                            </span>
                            <span class="hide-menu">Discover</span>
                        </a>
                    </li>
                @endif
                {{-- Tour Menu --}}
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Tour</span>
                </li>
                @if (!auth()->user()->hasRole('user'))
                    <li class="sidebar-item">
                        <a class="sidebar-link {{ Request::is('rencana-tour/*') ? 'active' : '' }}"
                            href="{{ route('tourPlan') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-list-details"></i>
                            </span>
                            <span class="hide-menu">Kelola Rencana Tour</span>
                        </a>
                    </li>
                @endif
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('daftar-rencana-tour/*') ? 'active' : '' }}"
                        href="{{ route('rencanaTourList') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-mountain"></i>
                        </span>
                        <span class="hide-menu">Daftar Rencana Tour</span>
                    </a>
                </li>
                {{-- User Menu --}}
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Users</span>
                </li>
                @if (!auth()->user()->hasRole('user'))
                    <li class="sidebar-item">
                        <a class="sidebar-link {{ Request::is('user-list/*') ? 'active' : '' }}"
                            href="{{ route('userList') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user-circle"></i>
                            </span>
                            <span class="hide-menu">Kelola User</span>
                        </a>
                    </li>
                @endif
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('order/*') ? 'active' : '' }}" href="{{ route('order') }}"
                        aria-expanded="false">
                        <span>
                            <i class="ti ti-credit-card"></i>
                        </span>
                        <span class="hide-menu">Order</span>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
