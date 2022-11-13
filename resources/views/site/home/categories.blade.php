@if (count($show_categories))

    @foreach($show_categories as $value)

        <section class="section-landscape-products-carousel 4-column-landscape-carousel"
                 id="landscape-products-carousel">
            <header class="section-header">
                <h2 class="section-title">{{$value->category->name}}</h2>
                <nav class="custom-slick-nav"></nav>
            </header>
            <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products"
                 data-slick="{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:2,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#landscape-products-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}}]}">
                <div class="container-fluid">
                    <div class="woocommerce columns-5">
                        <div class="products">

                            @if (count($value->category->getProducts()))

                                @foreach($value->category->getProducts() as $item)

                                    <div class="landscape-product product">
                                        <a class="woocommerce-LoopProduct-link"
                                           href="{{$item->path()}}">
                                            @if ($item->discount!=null)
                                                <span class="onsale">
																		<span class="woocommerce-Price-amount amount">
																			<span
                                                                                class="woocommerce-Price-currencySymbol"></span>%</span>{{$item->discount}}
																	</span>
                                            @endif
                                            <div class="media">
                                                <img class="wp-post-image"
                                                     src="{{$item->image->original}}" alt="{{$item->name}}">
                                                <div class="media-body">
																<span class="price">
																		<ins>
																			<span
                                                                                class="amount">{{number_format($item->finalPrice())}} تومان</span>
																		</ins>
                                                            @if ($item->discount!=null)
                                                                        <br>
                                                                        <del>
																	<span
                                                                        class="amount">{{number_format($item->price)}} تومان</span>
                                                                </del>
                                                                    @endif
																	</span>
                                                    <h2 class="woocommerce-loop-product__title">{{$item->name}}</h2>
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

    @endforeach

@endif
