@section('site_title')
    <title>تخفیف سنسور | جدید ترین محصولات</title>
@endsection

@section('site_body')
    <body class="woocommerce-active full-width">
    @endsection

    @include('site.layout.header')

    <div id="content" class="site-content" tabindex="-1">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="{{route('home')}}">صفحه اصلی</a>
                    <span class="delimiter">
							<i class="tm tm-arrow-left"></i>
						</span>جدید ترین محصولات
                </nav>

                <div id="primary" class="content-area">
                    <main id="main" class="site-main">

                        <div class="tab-content">
                            <div id="grid" class="tab-pane active" role="tabpanel">
                                <div class="woocommerce columns-7">
                                    <div class="products">

                                        @if (count($products))

                                            @foreach($products as $value)

                                                <div class="product">
                                                    <a href="{{$value->path()}}"
                                                       class="woocommerce-LoopProduct-link">
                                                        @if ($value->discount!=null)
                                                            <span class="onsale">
																		<span class="woocommerce-Price-amount amount">
																			<span
                                                                                class="woocommerce-Price-currencySymbol"></span>%</span>{{$value->discount}}
																	</span>
                                                        @endif
                                                        <img src="{{$value->image->original}}"
                                                             width="224"
                                                             height="197" class="wp-post-image" alt="{{$value->name}}">
                                                        <span class="price">
																		<ins>
																			<span
                                                                                class="amount">{{number_format($value->finalPrice())}} تومان</span>
																		</ins>
                                                            @if ($value->discount!=null)
                                                                <br>
                                                                <del>
																	<span
                                                                        class="amount">{{number_format($value->price)}} تومان</span>
                                                                </del>
                                                            @endif
																	</span>

                                                        <h2 class="woocommerce-loop-product__title">{{$value->name}}</h2>
                                                    </a>
                                                    <div class="hover-area">
                                                        <a class="button add_to_cart_button" href="{{route('cart.add',[\Vinkla\Hashids\Facades\Hashids::encode($value->id),\Vinkla\Hashids\Facades\Hashids::encode(1)])}}"
                                                           rel="nofollow">افزودن به سبد</a>
                                                    </div>
                                                </div>

                                            @endforeach

                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="shop-control-bar-bottom">
                            <nav class="woocommerce-pagination text-center justify-content-center">
                                <ul class="page-numbers">
                                    <div class="pagination mt-3">
                                        {!! $products->links() !!}
                                    </div>
                                </ul>
                            </nav>
                        </div>

                    </main>
                </div>
            </div>
        </div>
    </div>

    @include('site.layout.footer')
