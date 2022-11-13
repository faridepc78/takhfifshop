<section class="section-hot-new-arrivals section-products-carousel-tabs techmarket-tabs">
    <div class="section-products-carousel-tabs-wrap">
        <header class="section-header">
            <a target="_blank" href="{{route('products.most-sale')}}"><h2 class="section-title">پرفروش ترین محصولات</h2></a>
        </header>

        <div class="tab-content">
            <div id="tab-59f89f08825d50" class="tab-pane active" role="tabpanel">
                <div class="products-carousel" data-ride="tm-slick-carousel"
                     data-wrap=".products"
                     data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                    <div class="container-fluid">
                        <div class="woocommerce">
                            <div class="products">

                                @if (count($mostSales_products))

                                    @foreach($mostSales_products as $value)

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
            </div>
        </div>

    </div>

</section>
