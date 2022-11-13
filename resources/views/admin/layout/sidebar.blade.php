<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('assets/common/images/logo/logo.png')}}" alt="Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"
              style="font-size: 11px;font-weight: bold">پنل مدیریت تخفیف سنسور</span>
    </a>

    <div class="sidebar">
        <div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('assets/backend/images/laravel.png')}}"
                         class="img-circle elevation-2" alt="Profile">
                </div>
                <div class="info">
                    <a href="{{route('profile')}}" class="d-block">{{auth()->user()->getFullNameAttribute()}}</a>
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
                        <a href="{{ route('dashboard') }}"
                           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('profile') }}"
                           class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                پروفایل
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['categories.index',
'categories.create',
'categories.show',
'categories.edit',
'categories.index_show']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['categories.index',
'categories.create',
'categories.show',
'categories.edit',
'categories.index_show']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                دسته بندی ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}"
                                   class="nav-link {{ request()->routeIs(['categories.index','categories.show']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت دسته بندی ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('categories.create') }}"
                                   class="nav-link {{ request()->routeIs('categories.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد دسته بندی ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('categories.index_show') }}"
                                   class="nav-link {{ request()->routeIs(['categories.index_show']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p style="font-size: 12px;font-weight: bold">مدیریت دسته بندی های نمایشی</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['sliders.index',
'sliders.create',
'sliders.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['sliders.index',
'sliders.create',
'sliders.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-sliders"></i>
                            <p>
                                اسلایدر ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('sliders.index') }}"
                                   class="nav-link {{ request()->routeIs(['sliders.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت اسلایدر ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('sliders.create') }}"
                                   class="nav-link {{ request()->routeIs('sliders.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد اسلایدر ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['banners.index',
'banners.create',
'banners.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['banners.index',
'banners.create',
'banners.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-picture-o"></i>
                            <p>
                                بنر ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('banners.index') }}"
                                   class="nav-link {{ request()->routeIs(['banners.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت بنر ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('banners.create') }}"
                                   class="nav-link {{ request()->routeIs('banners.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد بنر ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['brands.index',
'brands.create',
'brands.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['brands.index',
'brands.create',
'brands.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-apple"></i>
                            <p>
                                برند ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('brands.index') }}"
                                   class="nav-link {{ request()->routeIs(['brands.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت برند ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('brands.create') }}"
                                   class="nav-link {{ request()->routeIs('brands.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد برند ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['users.index',
'users.create',
'users.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['users.index',
'users.create',
'users.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                کاربران
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                   class="nav-link {{ request()->routeIs(['users.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت کاربران</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('users.create') }}"
                                   class="nav-link {{ request()->routeIs('users.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد کاربران</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['blacklists.index',
'blacklists.create',
'blacklists.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['blacklists.index',
'blacklists.create',
'blacklists.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-lock"></i>
                            <p>
                                کاربران لیست سیاه
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('blacklists.index') }}"
                                   class="nav-link {{ request()->routeIs(['blacklists.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p style="font-size: 14px">مدیریت کاربران لیست سیاه</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('blacklists.create') }}"
                                   class="nav-link {{ request()->routeIs('blacklists.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p style="font-size: 14px">ایجاد کاربران لیست سیاه</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['excel_media.index',
'excel_media.create',
'excel_media.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['excel_media.index',
'excel_media.create',
'excel_media.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-file"></i>
                            <p>
                                اکسل مدیا
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('excel_media.index') }}"
                                   class="nav-link {{ request()->routeIs(['excel_media.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p style="font-size: 14px">مدیریت اکسل مدیا</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('excel_media.create') }}"
                                   class="nav-link {{ request()->routeIs('excel_media.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p style="font-size: 14px">ایجاد اکسل مدیا</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['products.index',
'products.create',
'products.edit',
'products.import_page',
'groups.index',
'groups.create',
'groups.products']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['products.index',
'products.create',
'products.edit',
'products.import_page',
'groups.index',
'groups.create',
'groups.products']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>
                                محصولات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('products.index') }}"
                                   class="nav-link {{ request()->routeIs(['products.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت محصولات</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('products.create') }}"
                                   class="nav-link {{ request()->routeIs('products.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد محصولات</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('groups.index') }}"
                                   class="nav-link {{ request()->routeIs(['groups.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت گروه ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('groups.create') }}"
                                   class="nav-link {{ request()->routeIs('groups.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد گروه ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('products.import_page') }}"
                                   class="nav-link {{ request()->routeIs('products.import_page') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایمپورت فایل محصولات</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['posts.index',
'posts.create',
'posts.edit',
'postsCategories.index',
'postsCategories.create',
'postsCategories.edit',
'post_media_index']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['posts.index',
'posts.create',
'posts.edit',
'postsCategories.index',
'postsCategories.create',
'postsCategories.edit',
'post_media_index']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-paper-plane"></i>
                            <p>
                                پست ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('postsCategories.index')}}"
                                   class="nav-link {{ request()->routeIs(['postsCategories.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت دسته بندی ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('postsCategories.create')}}"
                                   class="nav-link {{ request()->routeIs(['postsCategories.create']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد دسته بندی ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('posts.index') }}"
                                   class="nav-link {{ request()->routeIs(['posts.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت پست ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('posts.create') }}"
                                   class="nav-link {{ request()->routeIs('posts.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد پست ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['contacts.index',
'contacts.single']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['contacts.index',
'contacts.single']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-phone"></i>
                            <p>
                                تماس ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('contacts.index') }}"
                                   class="nav-link {{ request()->routeIs(['contacts.index','contacts.single']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت تماس ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['inquiries.index',
'inquiries.single']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['inquiries.index',
'inquiries.single']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-circle"></i>
                            <p>
                                استعلام ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('inquiries.index') }}"
                                   class="nav-link {{ request()->routeIs(['inquiries.index','inquiries.single']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت استعلام ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['orders.index',
'orders.pending',
'orders.items',
'orders.update_items']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['orders.index',
'orders.pending',
'orders.items',
'orders.update_items']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-first-order"></i>
                            <p>
                                سفارشات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li style="font-size: 14px" class="nav-item">
                                <a href="{{ route('orders.pending') }}"
                                   class="nav-link {{ request()->routeIs(['orders.pending']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت سفارشات تایید نشده</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('orders.index') }}"
                                   class="nav-link {{ request()->routeIs(['orders.index','orders.items']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت سفارشات</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['transactions.index']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['transactions.index']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-exchange"></i>
                            <p>
                                تراکنش ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('transactions.index') }}"
                                   class="nav-link {{ request()->routeIs(['transactions.index']) ? 'active' : '' }}">
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
