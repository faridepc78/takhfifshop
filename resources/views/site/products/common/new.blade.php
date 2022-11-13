<div id="secondary" class="widget-area shop-sidebar" role="complementary">
    <div class="widget widget_techmarket_products_carousel_widget">
        <section id="single-sidebar-carousel" class="section-products-carousel">
            <header class="section-header">
                <h2 class="section-title">محصولات جدید</h2>
                <nav class="custom-slick-nav"></nav>
            </header>

            <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#single-sidebar-carousel .custom-slick-nav&quot;}">
                <div class="container-fluid">
                    <div class="woocommerce columns-1">
                        <div class="products">

                            @if (count($new_products))

                                @foreach($new_products as $value)

                                    <div class="landscape-product-widget product">
                                        <a class="woocommerce-LoopProduct-link" href="{{$value->path()}}">
                                            @if ($value->discount!=null)
                                                <span class="onsale">
																		<span class="woocommerce-Price-amount amount">
																			<span
                                                                                class="woocommerce-Price-currencySymbol"></span>%</span>{{$value->discount}}
																	</span>
                                            @endif

                                            <div class="media">
                                                <img class="wp-post-image" src="{{$value->image->original}}" alt="{{$value->name}}">
                                                <div class="media-body">
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
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                @endforeach

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
