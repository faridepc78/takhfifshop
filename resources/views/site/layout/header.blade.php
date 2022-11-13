<!DOCTYPE html>
<html lang="fa-IR" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('site_title')

    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap.min.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/font-awesome.min.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/font-techmarket.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/slick.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/techmarket-font-awesome.css')}}"
          media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/slick-style.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/animate.min.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/style-rtl.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/orange.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/common/plugins/validation/css/validate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/common/plugins/toast/css/toast.min.css')}}">

    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/common/images/logo/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{asset('assets/common/images/logo/android-chrome-512x512.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"
          href="{{asset('assets/common/images/logo/android-chrome-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/common/images/logo/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/common/images/logo/favicon-16x16.png')}}">
    <link rel="icon" href="{{asset('assets/common/images/logo/favicon.ico')}}" type="image/x-icon">

    @yield('site_css')

</head>

@yield('site_body')

<body class="organic-market page-template-template-homepage-v1 woocommerce-active">
<div id="page" class="hfeed site">

    <header id="masthead" class="site-header header-v1" style="background-image: none;">

        <div class="col-full desktop-only">
            <div class="techmarket-sticky-wrap">
                <div class="row">

                    <div class="site-branding">
                        <a href="{{route('home')}}" class="custom-logo-link" rel="home">
                            <img src="{{asset('assets/common/images/logo/logo.png')}}" alt="logo">
                        </a>
                    </div>

                    <nav id="primary-navigation" class="primary-navigation" aria-label="Primary Navigation" data-nav="flex-menu">
                        <ul id="menu-primary-menu" class="nav yamm">

                            @auth()

                                @if (auth()->user()['role']==\App\Models\User::ADMIN)
                                    <li class="menu-item animate-dropdown">
                                        <a target="_blank" title="پنل مدیریت" href="{{route('dashboard')}}">پنل مدیریت</a>
                                    </li>
                                @endif

                                <li class="menu-item animate-dropdown">
                                    <a target="_blank" title="پنل کاربری" href="{{route('user.profile')}}">پنل کاربری</a>
                                </li>

                            @else

                                <li class="menu-item animate-dropdown">
                                    <a title="ثبت نام" href="{{route('register')}}">ثبت نام</a>
                                </li>

                                <li class="menu-item animate-dropdown">
                                    <a title="ورود" href="{{route('login')}}">ورود</a>
                                </li>

                            @endauth

                                <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                                    <a title="صفحات" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="#">صفحات <span class="caret"></span></a>
                                    <ul role="menu" class=" dropdown-menu">

                                        <li class="menu-item animate-dropdown">
                                            <a title="وبلاگ" href="{{route('blog')}}">وبلاگ</a>
                                        </li>

                                        <li class="menu-item animate-dropdown">
                                            <a title="پرسش و پاسخ ها" href="{{route('faq')}}">پرسش و پاسخ ها</a>
                                        </li>

                                        <li class="menu-item animate-dropdown">
                                            <a title="شرایط و ضوابط" href="{{route('terms-and-conditions')}}">شرایط و ضوابط</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="yamm-fw menu-item menu-item-has-children animate-dropdown dropdown">
                                    <a title="Pages" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="#">دسته بندی ها <span class="caret"></span></a>
                                    <ul role="menu" class=" dropdown-menu">
                                        <li class="menu-item menu-item-object-static_block animate-dropdown">
                                            <div class="yamm-content" style="overflow-y: auto;max-height: 500px">
                                                <div class="tm-mega-menu">

                                                    @if (count($categories))

                                                        @foreach($categories as $value)

                                                            @if (count($value->sub))

                                                                <div class="widget widget_nav_menu">
                                                                    <ul class="menu">
                                                                        <li class="nav-title menu-item">
                                                                            <a style="font-weight: bold;font-size: 18px" href="{{$value->path()}}">{{$value->name}}</a>
                                                                            @if (!empty($value->image->files))
                                                                                <img width="100" height="100" src="{{$value->image->original}}" alt="{{$value->image->original}}">
                                                                            @endif
                                                                        </li>

                                                                        @foreach($value->sub as $item)

                                                                            <li class="menu-item">
                                                                                <a style="font-size: 16px;padding-right: 60px" href="{{$item->path()}}">{{$item->name}}</a>
                                                                                @if (!empty($item->image->files))
                                                                                    <img width="100" height="100" src="{{$value->image->original}}" alt="{{$value->image->original}}">
                                                                                @endif
                                                                            </li>

                                                                            @if (count($item->sub))

                                                                                @foreach($item->sub as $v)

                                                                                    <li class="menu-item">
                                                                                        <a style="padding-right: 100px" href="{{$v->path()}}">{{$v->name}}</a>
                                                                                        @if (!empty($v->image->files))
                                                                                            <img width="100" height="100" src="{{$value->image->original}}" alt="{{$value->image->original}}">
                                                                                        @endif
                                                                                    </li>

                                                                                @endforeach

                                                                            @endif

                                                                        @endforeach

                                                                    </ul>

                                                                </div>

                                                            @endif

                                                        @endforeach

                                                    @endif

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item animate-dropdown">
                                    <a title="درباره ما" href="{{route('about-us')}}">درباره ما</a>
                                </li>

                                <li class="menu-item animate-dropdown">
                                    <a title="تماس با ما" href="{{route('contact-us')}}">تماس با ما</a>
                                </li>

                                <li class="menu-item animate-dropdown">
                                    <a title="استعلام ویژه کارخانجات و شرکت ها" href="{{route('inquiry')}}">استعلام ویژه کارخانجات و شرکت ها</a>
                                </li>

                        </ul>
                    </nav>

                </div>

            </div>

            <div class="row align-items-center">
                <div id="departments-menu" class="dropdown departments-menu">
                    <button class="btn dropdown-toggle btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="tm tm-departments-thin"></i>
                        <span>دسته بندی ها</span>
                    </button>
                    <ul id="menu-departments-menu" class="dropdown-menu yamm departments-menu-dropdown">

                        @if (count($categories))

                            @foreach($categories as $value)

                                @if (count($value->sub))

                                    <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                        <a title="Computers &amp; Laptops" data-toggle="dropdown" class="dropdown-toggle"
                                           aria-haspopup="true" href="{{$value->path()}}">{{$value->name}}<span
                                                class="caret"></span></a>
                                        <ul role="menu" class=" dropdown-menu">
                                            <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                <div class="yamm-content" style="overflow-y: auto;max-height: 500px">

                                                    <div class="row yamm-content-row">

                                                        @foreach($value->sub as $item)

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title"
                                                                                style="font-weight: bold;font-size: 18px"><a
                                                                                    href="{{$item->path()}}">{{$item->name}}</a>
                                                                            </li>

                                                                            @if (count($item->sub))

                                                                                @foreach($item->sub as $v)

                                                                                    <li><a href="{{$v->path()}}">{{$v->name}}</a>
                                                                                    </li>

                                                                                @endforeach

                                                                            @endif

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endforeach

                                                    </div>

                                                </div>

                                            </li>
                                        </ul>
                                    </li>

                                @else

                                    <li class="menu-item menu-item-type-custom animate-dropdown">
                                        <a title="{{$value->name}}" href="{{$value->path()}}">{{$value->name}}</a>
                                    </li>

                                @endif

                            @endforeach

                        @endif

                    </ul>
                </div>

                <form class="navbar-search" method="get" action="{{route('products.search')}}">
                    <label class="sr-only screen-reader-text" for="search">جستجو:</label>
                    <div class="input-group">

                        <input onkeyup="this.value=removeSpaces(this.value)" type="search" id="search"
                               class="form-control search-field product-search-field"
                               dir="rtl" value="{{request()->input('search')}}" name="search"
                               placeholder="جستحوی محصولات (نام،دسته بندی و برند)"/>

                        <div class="input-group-btn input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                                <span class="search-btn">جستجو</span>
                            </button>
                        </div>

                    </div>
                </form>

                <ul id="site-header-cart" class="site-header-cart menu">
                    <li class="animate-dropdown dropdown ">
                        <a class="cart-contents" href="{{route('cart.index')}}" data-toggle="dropdown"
                           title="سبد خرید خود را مشاهده کنید">
                            <i class="tm tm-shopping-bag"></i>
                            <span class="count">{{$basketBuy_count}}</span>
                            <span class="amount">
									<span class="price-label">سبد خرید</span></span>
                        </a>

                        @if ($basketBuy_count>=1)

                            <ul class="dropdown-menu dropdown-menu-mini-cart" style="overflow: scroll;height: 500px">
                                <li>
                                    <div class="widget woocommerce widget_shopping_cart">
                                        <div class="widget_shopping_cart_content">

                                            <ul class="woocommerce-mini-cart cart_list product_list_widget">

                                                @foreach($basketBuy_data as $data)

                                                    @php
                                                        $sum=0
                                                    @endphp

                                                    @foreach($data as $value)

                                                        <li class="woocommerce-mini-cart-item mini_cart_item">

                                                            <a href="{{route('cart.destroy',$value['id'])}}"
                                                               onclick="destroyCartItem(event, {{ $value['id'] }})"
                                                               class="remove" aria-label="این مورد را حذف کنید">×</a>
                                                            <form action="{{ route('cart.destroy', \Vinkla\Hashids\Facades\Hashids::encode($value['id'])) }}"
                                                                  method="post" id="destroy-CartItem-{{ $value['id'] }}">
                                                                @csrf
                                                                @method('delete')
                                                            </form>

                                                            <a href="{{$value['route']}}">
                                                                <img src="{{$value['image']}}"
                                                                     class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                                     alt="{{$value['name']}}">{{$value['name']}}
                                                            </a>
                                                            <span class="quantity">{{$value['count']}} ×
														<span
                                                            class="woocommerce-Price-amount amount">{{number_format($value['price'])}} تومان</span>
													</span>
                                                        </li>

                                                        @php
                                                            $sum+=($value['price']*$value['count']);
                                                        @endphp

                                                    @endforeach

                                                @endforeach

                                            </ul>

                                            <p class="woocommerce-mini-cart__total total">
                                                <strong>جمع کل:</strong>
                                                <span class="woocommerce-Price-amount amount">{{number_format($sum)}} تومان</span>
                                            </p>
                                            <p class="woocommerce-mini-cart__buttons buttons">
                                                <a href="{{route('cart.index')}}" class="button wc-forward">نمایش سبد</a>
                                                <a href="{{route('checkout')}}" class="button checkout wc-forward">صورتحساب</a>
                                            </p>

                                        </div>
                                    </div>
                                </li>
                            </ul>

                @endif

            </div>

        </div>

        <div class="col-full handheld-only">
            <div class="handheld-header">
                <div class="row">
                    <div class="site-branding">
                        <a href="{{route('home')}}" class="custom-logo-link" rel="home">
                            <img src="{{asset('assets/common/images/logo/logo.png')}}" alt="logo">
                        </a>
                    </div>

                </div>

                <div class="techmarket-sticky-wrap">
                    <div class="row">
                        <nav id="handheld-navigation" class="handheld-navigation" aria-label="Handheld Navigation">
                            <button class="btn navbar-toggler" type="button">
                                <i class="tm tm-departments-thin"></i>
                                <span>منو</span>
                            </button>
                            <div class="handheld-navigation-menu">
                                <span class="tmhm-close">Close</span>
                                <ul id="menu-departments-menu-1" class="nav">

                                    @auth()

                                        @if (auth()->user()['role']==\App\Models\User::ADMIN)
                                            <li class="highlight menu-item animate-dropdown">
                                                <a target="_blank" title="پنل مدیریت" href="{{route('dashboard')}}">پنل مدیریت</a>
                                            </li>
                                        @endif

                                        <li class="highlight menu-item animate-dropdown">
                                            <a target="_blank" title="پنل کاربری" href="{{route('user.profile')}}">پنل کاربری</a>
                                        </li>

                                    @else

                                        <li class="highlight menu-item animate-dropdown">
                                            <a title="ثبت نام" href="{{route('register')}}">ثبت نام</a>
                                        </li>

                                        <li class="highlight menu-item animate-dropdown">
                                            <a title="ورود" href="{{route('login')}}">ورود</a>
                                        </li>

                                    @endauth

                                        <li class="highlight menu-item animate-dropdown">
                                            <a title="وبلاگ" href="{{route('blog')}}">وبلاگ</a>
                                        </li>

                                        <li class="highlight menu-item animate-dropdown">
                                            <a title="درباره ما" href="{{route('about-us')}}">درباره ما</a>
                                        </li>

                                        <li class="highlight menu-item animate-dropdown">
                                            <a title="تماس با ما" href="{{route('contact-us')}}">تماس با ما</a>
                                        </li>

                                        <li class="highlight menu-item animate-dropdown">
                                            <a title="استعلام ویژه کارخانجات و شرکت ها" href="{{route('inquiry')}}">استعلام ویژه کارخانجات و شرکت ها</a>
                                        </li>

                                        <li class="highlight menu-item animate-dropdown">
                                            <a title="پرسش و پاسخ ها" href="{{route('faq')}}">پرسش و پاسخ ها</a>
                                        </li>

                                        <li class="highlight menu-item animate-dropdown">
                                            <a title="شرایط و ضوابط" href="{{route('terms-and-conditions')}}">شرایط و ضوابط</a>
                                        </li>

                                    @if (count($categories))

                                        @foreach($categories as $value)

                                            @if (count($value->sub))

                                                <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                                    <a title="{{$value->name}}" data-toggle="dropdown" class="dropdown-toggle"
                                                       aria-haspopup="true"
                                                       href="{{$value->path()}}">{{$value->name}}<span class="caret"></span></a>
                                                    <ul role="menu" class=" dropdown-menu">
                                                        <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                            <div class="yamm-content">

                                                                <div class="row yamm-content-row">

                                                                    @foreach($value->sub as $item)

                                                                        <div class="col-md-6 col-sm-12">
                                                                            <div class="kc-col-container">
                                                                                <div class="kc_text_block">
                                                                                    <ul>
                                                                                        <li class="nav-title" style="font-weight: bold;font-size: 18px"><a href="{{$item->path()}}">{{$item->name}}</a></li>

                                                                                        @if (count($item->sub))

                                                                                            @foreach($item->sub as $v)

                                                                                                <li><a href="{{$v->path()}}">{{$v->name}}</a>
                                                                                                </li>

                                                                                            @endforeach

                                                                                        @endif

                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    @endforeach

                                                                </div>

                                                            </div>

                                                        </li>
                                                    </ul>
                                                </li>

                                            @else

                                                <li class="menu-item animate-dropdown">
                                                    <a title="{{$value->name}}" href="{{$value->path()}}">{{$value->name}}</a>
                                                </li>

                                            @endif

                                        @endforeach

                                    @endif

                                </ul>
                            </div>

                        </nav>

                        <div class="site-search">
                            <div class="widget woocommerce widget_product_search">
                                <form role="search" method="get" class="woocommerce-product-search"
                                      action="{{route('products.search')}}">
                                    <label class="screen-reader-text" for="search">جستجو
                                        برای:</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="search" id="search" class="search-field"
                                           placeholder="جستحوی محصولات (نام،دسته بندی و برند)" value="{{request()->input('search')}}" name="search"/>
                                    <input type="submit" value="Search"/>
                                </form>
                            </div>

                        </div>

                        <a class="handheld-header-cart-link has-icon" href="{{route('cart.index')}}" title="سبد خرید">
                            <i class="tm tm-shopping-bag"></i>
                            <span class="count">{{$basketBuy_count}}</span>
                        </a>
                    </div>

                </div>


            </div>

        </div>

    </header>

    <style>
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }

        .my-float{
            margin-top:16px;
        }
    </style>

    <a href="https://wa.me/+989013503030?text=سلام. وقت بخیر من از طریق سایت تخفیف سنسور با شما ارتباط میگیرم" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
