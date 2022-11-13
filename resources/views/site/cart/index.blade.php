@section('site_title')
    <title>تخفیف سنسور | سبد خرید</title>
@endsection

@section('site_body')
    <body class="page home page-template-default">
    @endsection

    @include('site.layout.header')

    <div id="content" class="site-content">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="{{route('home')}}">صفحه اصلی</a>
                    <span class="delimiter">
							<i class="tm tm-arrow-left"></i>
						</span>
                    سبد خرید
                </nav>

                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="type-page hentry">
                            <div class="entry-content">
                                <div class="woocommerce">
                                    <div class="card-header">

                                        <form method="post" action="{{route('cart.update')}}"
                                              class="woocommerce-cart-form">

                                            @csrf

                                            <table class="shop_table shop_table_responsive cart">
                                                <thead>
                                                <tr>
                                                    <th class="product-thumbnail">&nbsp;</th>
                                                    <th class="product-name">نام محصول</th>
                                                    <th class="product-price">قیمت</th>
                                                    <th class="product-quantity">تعداد</th>
                                                    <th class="product-subtotal">جمع کل</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @if ($basketBuy_count>=1)

                                                    @foreach($basketBuy_data as $data)

                                                        @php
                                                            $sum=0
                                                        @endphp

                                                        @foreach($data as $value)

                                                            <tr>

                                                                <td class="product-thumbnail">
                                                                    <a href="{{$value['route']}}">
                                                                        <img width="180" height="180"
                                                                             alt="{{$value['name']}}"
                                                                             class="wp-post-image"
                                                                             src="{{$value['image']}}">
                                                                    </a>
                                                                </td>

                                                                <td data-title="{{$value['name']}}"
                                                                    class="product-name">
                                                                    <div class="media cart-item-product-detail">
                                                                        <a href="{{$value['route']}}">
                                                                            <img width="180" height="180"
                                                                                 alt="{{$value['name']}}"
                                                                                 class="wp-post-image"
                                                                                 src="{{$value['image']}}">
                                                                        </a>
                                                                        <div class="media-body align-self-center">
                                                                            <a href="{{$value['route']}}">{{$value['name']}}</a>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td data-title="قیمت" class="product-price">
                                                                    <span class="woocommerce-Price-amount amount">{{number_format($value['price'])}} تومان</span>
                                                                </td>

                                                                <td class="product-quantity" data-title="تعداد">
                                                                    <div class="quantity">
                                                                        <label
                                                                            for="{{\Vinkla\Hashids\Facades\Hashids::encode($value['id'])}}">تعداد</label>
                                                                        <input
                                                                            id="{{\Vinkla\Hashids\Facades\Hashids::encode($value['id'])}}"
                                                                            type="number"
                                                                            name="{{\Vinkla\Hashids\Facades\Hashids::encode($value['id'])}}"
                                                                            max="50" value="{{$value['count']}}"
                                                                            title="تعداد" class="input-text qty text" min="1"
                                                                            size="4">
                                                                    </div>
                                                                </td>

                                                                <td data-title="جمع کل" class="product-subtotal">
                                                                    <span class="woocommerce-Price-amount amount">{{number_format($value['price']*$value['count'])}} تومان</span>
                                                                    <a href="{{route('cart.destroy',$value['id'])}}"
                                                                       onclick="destroyCartItem(event, {{ $value['id'] }})"
                                                                       class="remove" aria-label="این مورد را حذف کنید">×</a>
                                                                    <form
                                                                        action="{{ route('cart.destroy', \Vinkla\Hashids\Facades\Hashids::encode($value['id'])) }}"
                                                                        method="post"
                                                                        id="destroy-CartItem-{{ $value['id'] }}">
                                                                        @csrf
                                                                    </form>
                                                                </td>
                                                            </tr>

                                                            @php
                                                                $sum+=($value['price']*$value['count']);
                                                            @endphp

                                                        @endforeach

                                                    @endforeach

                                                    <tr>
                                                        <td class="actions" colspan="6">
                                                            <button type="submit" class="button">بروزرسانی سبد</button>
                                                        </td>
                                                    </tr>

                                                @else

                                                    <div class="alert alert-danger text-center">سبد خرید خالی است</div>

                                                @endif

                                                </tbody>
                                            </table>

                                        </form>

                                        @if ($basketBuy_count>=1)

                                            <div class="cart-collaterals">
                                                <div class="cart_totals">
                                                    <h2>جمع کل سبد</h2>
                                                    <table class="shop_table_responsive">
                                                        <tbody>
                                                        <tr class="cart-subtotal">
                                                            <th>جمع کل</th>
                                                            <td data-title="جمع کل">
                                                                <span style="font-size: 18px;font-weight: bold"
                                                                      class="woocommerce-Price-amount amount">{{number_format($sum)}} تومان</span>
                                                            </td>
                                                        </tr>
                                                        {{--<tr class="shipping">
                                                            <th>هزینه ارسال</th>
                                                            <td data-title="Shipping">نرخ ثابت</td>
                                                        </tr>--}}
                                                        {{--<tr class="order-total">
                                                            <th>جمع کل سبد</th>
                                                            <td data-title="جمع کل سبد">
                                                                <strong>
                                                                    <span class="woocommerce-Price-amount amount">99 هزار تومان</span>
                                                                </strong>
                                                            </td>
                                                        </tr>--}}
                                                        </tbody>
                                                    </table>

                                                    <div class="wc-proceed-to-checkout">

                                                        <a class="checkout-button button alt wc-forward"
                                                           href="{{route('checkout')}}">
                                                            برو به صورتحساب</a>
                                                        <a class="back-to-shopping" href="{{route('home')}}">برو به صفحه
                                                            اصلی</a>
                                                    </div>

                                                </div>
                                            </div>

                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>

    @include('site.layout.footer')
