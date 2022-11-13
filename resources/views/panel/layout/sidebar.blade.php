<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{route('user.profile')}}" class="brand-link">
        <img src="{{asset('assets/common/images/logo/logo.png')}}" alt="Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"
              style="font-size: 11px;font-weight: bold">پنل کاربری تخفیف سنسور</span>
    </a>

    <div class="sidebar">
        <div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('assets/backend/images/laravel.png')}}"
                         class="img-circle elevation-2" alt="Profile">
                </div>
                <div class="info">
                    <a href="{{route('user.profile')}}" class="d-block">{{auth()->user()->getFullNameAttribute()}}</a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a target="_blank" href="{{ route('home') }}"
                           class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                خانه
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.profile') }}"
                           class="nav-link {{ request()->routeIs('user.profile') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                پروفایل
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['user.orders.index',
'user.orders.items']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['user.orders.index',
'user.orders.items']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-first-order"></i>
                            <p>
                                سفارشات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('user.orders.index') }}"
                                   class="nav-link {{ request()->routeIs(['user.orders.index','user.orders.items']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت سفارشات</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['user.transactions.index']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['user.transactions.index']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-exchange"></i>
                            <p>
                                تراکنش ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('user.transactions.index') }}"
                                   class="nav-link {{ request()->routeIs(['user.transactions.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت تراکنش ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">

                        <a href="{{route('logout')}}"
                           class="nav-link">
                            <i class="nav-icon fa fa-close"></i>
                            <p>
                                خروج
                                <i class="fa right"></i>
                            </p>
                        </a>

                    </li>

                </ul>
            </nav>

        </div>
    </div>

</aside>
