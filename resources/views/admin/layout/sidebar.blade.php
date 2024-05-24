<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark mt-4">
            <span class="logo-sm text-white">
                <h4>Pocket</h4>
            </span>
            <span class="logo-lg">
                <h4>Pocket</h4>
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light mt-4">
            <span class="logo-sm">
                {{-- <img src="assets/images/logo-sm.png" alt="" height="22"> --}}
              
            </span>
            <span class="logo-lg">
                <img width="150px" src="https://pizzapitsa.fi/frontend/assets/images/logo/2%20pizza%20logo-02.png" alt="">
               
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user" src="{{asset('backend')}}/images/users/avatar-1.jpg" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome Anna!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
            <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
            <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>            
                @can('product-management')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                            <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Product Management</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="nav-link">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('sizes.index') }}" class="nav-link">Size</a>
                                </li>
                                <li class="nav-item d-none">
                                    <a href="{{ route('nutritions.index') }}" class="nav-link">Nutrition</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('optiontitles.index') }}" class="nav-link">Option Title</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('topings.index') }}" class="nav-link" data-key="t-nestable-list">Topings</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}" class="nav-link" data-key="t-nestable-list">Products</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#orderManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                            <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Order Management</span>
                        </a>
                        <div class="collapse menu-dropdown" id="orderManagement">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('orders.index') }}" class="nav-link">Orders</a>
                                </li>                         
                            </ul>
                        </div>
                    </li>
                @can('settings')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarCouponUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                            <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Settings</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarCouponUI">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('coupons.index') }}" class="nav-link">Coupons</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('delivery_charges.index') }}" class="nav-link">Delivery Charge</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('currency.index') }}" class="nav-link">Currency</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('schedule.index') }}" class="nav-link">Shop Time Schedule</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('location.index') }}" class="nav-link">Location(Long&Lat)</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('user-management')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarAuthorizition" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuthorizition">
                            <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Authorizition</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAuthorizition">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('permission.index') }}" class="nav-link" data-key="t-nestable-list">Permissions</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('role.index') }}" class="nav-link" data-key="t-nestable-list">Roles</a>
                                </li>                           
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">Users</a>
                                </li>                          
                            </ul>
                        </div>
                    </li>  
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
