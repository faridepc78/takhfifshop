@section('site_title')
    <title>تخفیف سنسور | محصول ({{$product->name}})</title>
@endsection


@section('site_body')
    <body class="woocommerce-active single-product full-width normal">
    @endsection

    @include('site.layout.header')

    <div id="content" class="site-content" tabindex="-1">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="{{route('home')}}">صفحه اصلی</a>
                    <span class="delimiter">
							<i class="tm tm-arrow-left"></i>
						</span>محصول ({{$product->name}})
                </nav>

                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="product product-type-simple">
                            <div class="single-product-wrapper">
                                <div class="product-images-wrapper thumb-count-4">

                                    @if ($product->discount!=null)
                                        <span class="onsale">
																		<span class="woocommerce-Price-amount amount">
																			<span
                                                                                class="woocommerce-Price-currencySymbol"></span>%</span>{{$product->discount}}
																	</span>
                                    @endif

                                    <div id="techmarket-single-product-gallery"
                                         class="techmarket-single-product-gallery techmarket-single-product-gallery--with-images techmarket-single-product-gallery--columns-4 images"
                                         data-columns="4">
                                        <div class="techmarket-single-product-gallery-images"
                                             data-ride="tm-slick-carousel"
                                             data-wrap=".woocommerce-product-gallery__wrapper"
                                             data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .techmarket-single-product-gallery-thumbnails__wrapper&quot;}">

                                            <div
                                                class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                                data-columns="4">
                                                <figure class="woocommerce-product-gallery__wrapper ">

                                                    <div data-thumb="{{$product->image->original}}"
                                                         class="woocommerce-product-gallery__image">
                                                            <img width="600" height="600"
                                                                 src="{{$product->image->original}}"
                                                                 class="attachment-shop_single size-shop_single wp-post-image"
                                                                 alt="">
                                                    </div>

                                                    @if (count($product->gallery))

                                                        @foreach($product->gallery as $value)

                                                            <div data-thumb="{{$value->image->original}}"
                                                                 class="woocommerce-product-gallery__image">
                                                                    <img width="600" height="600"
                                                                         src="{{$value->image->original}}"
                                                                         class="attachment-shop_single size-shop_single" alt="">
                                                            </div>

                                                        @endforeach

                                                    @endif

                                                </figure>
                                            </div>
                                        </div>

                                        <div class="techmarket-single-product-gallery-thumbnails"
                                             data-ride="tm-slick-carousel"
                                             data-wrap=".techmarket-single-product-gallery-thumbnails__wrapper"
                                             data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .woocommerce-product-gallery__wrapper&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:765,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;horizontal&quot;:true,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:4}}]}">
                                            <figure class="techmarket-single-product-gallery-thumbnails__wrapper">

                                                @if (count($product->gallery))

                                                    <figure data-thumb="{{$product->image->original}}"
                                                            class="techmarket-wc-product-gallery__image">
                                                        <img width="180" height="180"
                                                             src="{{$product->image->original}}"
                                                             class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                             alt="">
                                                    </figure>

                                                    @foreach($product->gallery as $value)

                                                        <figure data-thumb="{{$value->image->original}}"
                                                                class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180"
                                                                 src="{{$value->image->original}}"
                                                                 class="attachment-shop_thumbnail size-shop_thumbnail" alt="">
                                                        </figure>

                                                    @endforeach

                                                @endif

                                            </figure>
                                        </div>
                                    </div>
                                </div>

                                <div class="summary entry-summary">
                                    <div class="single-product-header">
                                        <h1 class="product_title entry-title">{{$product->name}}</h1>
                                        @if (!empty($product->pdf->files))
                                            <a href="{{$product->pdf->original}}" class="text text-success"><p>دانلود پی دی اف</p></a>
                                        @endif
                                    </div>

                                    <div class="single-product-meta">
                                        <div class="brand">
                                            <a href="{{$product->brand->path()}}">
                                                <img alt="{{$product->brand->name}}"
                                                     src="{{$product->brand->image->original}}">
                                            </a>
                                        </div>
                                        <div class="cat-and-sku">
												<span class="posted_in categories">
													<a rel="tag"
                                                       href="{{$product->category->path()}}">{{$product->category->name}}</a>
												</span>
                                        </div>
                                        <div class="product-label">

                                        </div>
                                    </div>

                                    {{--<div class="rating-and-sharing-wrapper">
                                        <div class="woocommerce-product-rating">
                                            <a rel="nofollow" class="woocommerce-review-link" href="#reviews">(<span
                                                    class="count">1</span> دیدگاه مشتریان)</a>
                                        </div>
                                    </div>--}}

                                    <div class="product-actions-wrapper">
                                        <div class="product-actions">
                                            <p class="price">
                                                @if ($product->discount!=null)
                                                    <del>
                                                    <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">{{number_format($product->price)}} تومان</span></span>
                                                    </del>
                                                @endif
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">{{number_format($product->finalPrice())}} تومان</span></span>
                                                </ins>
                                            </p>

                                            <form action="{{route('cart.addOrUpdate')}}" method="post" class="cart">
                                                @csrf
                                                <div class="quantity">
                                                    <label for="count">تعداد</label>
                                                    <input max="50" type="number" size="4" class="input-text qty text" title="تعداد"
                                                           value="1" name="count" id="count">
                                                    <input type="hidden" value="{{\Vinkla\Hashids\Facades\Hashids::encode($product['id'])}}" name="product_id">
                                                </div>
                                                <button class="single_add_to_cart_button button alt" type="submit">افزودن به سبد
                                                </button>
                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="tm-related-products-carousel section-products-carousel"
                                 id="tm-related-products-carousel" data-ride="tm-slick-carousel" data-wrap=".products"
                                 data-slick="{&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#tm-related-products-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                <section class="related">
                                    <header class="section-header">
                                        <h2 class="section-title">محصولات مرتبط</h2>
                                        <nav class="custom-slick-nav"></nav>
                                    </header>

                                    <div class="products">

                                        @if (count($related_products))

                                            @foreach($related_products as $value)

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
                                </section>
                            </div>

                            <div class="woocommerce-tabs wc-tabs-wrapper">
                                <ul role="tablist" class="nav tabs wc-tabs">
                                    {{--<li class="nav-item description_tab">
                                        <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-description"
                                           href="#tab-description">توضیحات</a>
                                    </li>--}}

                                    {{--<li class="nav-item specification_tab">
                                        <a class="nav-link" data-toggle="tab" role="tab"
                                           aria-controls="tab-specification" href="#tab-specification">مشخصات فنی</a>
                                    </li>--}}

                                    {{--<li class="nav-item reviews_tab">
                                        <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-reviews"
                                           href="#tab-reviews">دیدگاه کاربران (1)</a>
                                    </li>--}}
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane panel wc-tab active" id="tab-description" role="tabpanel">
                                        <h2>توضیحات</h2>
                                        {!! $product->text !!}
                                    </div>

                                    {{--<div class="tab-pane" id="tab-specification" role="tabpanel">
                                        <div class="tm-shop-attributes-detail like-column columns-3">
                                            <h3 class="tm-attributes-title">مشخصات اولیه</h3>
                                            <table class="shop_attributes">
                                                <tbody>
                                                <tr>
                                                    <th>برند</th>
                                                    <td>
                                                        <p><a href="#" rel="tag">گلکسی</a></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>رده امیتازدهی</th>
                                                    <td>
                                                        <p><a href="#" rel="tag">A+</a></p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <!-- /.shop_attributes -->
                                            <h3 class="tm-attributes-title">صفحه نمایش</h3>
                                            <table class="shop_attributes">
                                                <tbody>
                                                <tr>
                                                    <th>اندازه صفحه نمایش</th>
                                                    <td>40″</td>
                                                </tr>
                                                <tr>
                                                    <th>نسبت ابعاد</th>
                                                    <td>16:9</td>
                                                </tr>
                                                <tr>
                                                    <th>حالت سه بعدی</th>
                                                    <td>ندارد</td>
                                                </tr>
                                                <tr>
                                                    <th>کیفیت صفحه نمایش</th>
                                                    <td>1080p</td>
                                                </tr>
                                                <tr>
                                                    <th>پنل</th>
                                                    <td>LED</td>
                                                </tr>
                                                <tr>
                                                    <th>تنظیم کننده</th>
                                                    <td>ATSC/Clear QAM</td>
                                                </tr>
                                                <tr>
                                                    <th>پردازنده</th>
                                                    <td>120Hz</td>
                                                </tr>
                                                <tr>
                                                    <th>پردازنده</th>
                                                    <td>120Hz</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <!-- /.shop_attributes -->
                                            <h3 class="tm-attributes-title">اتصالات</h3>
                                            <table class="shop_attributes">
                                                <tbody>
                                                <tr>
                                                    <th>HDMI</th>
                                                    <td>2 In</td>
                                                </tr>
                                                <tr>
                                                    <th>صدای دیجیتال</th>
                                                    <td>1 نوری خارج</td>
                                                </tr>
                                                <tr>
                                                    <th>سایر اتصالات</th>
                                                    <td>1 x RF In</td>
                                                    <td>1 x Audio Out (Mini Jack)</td>
                                                    <td>1 x RS232C</td>
                                                </tr>
                                                <tr>
                                                    <th>LAN</th>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <th>کامپوزیت A/V</th>
                                                    <td>1 In</td>
                                                </tr>
                                                <tr>
                                                    <th>USB</th>
                                                    <td>2</td>
                                                </tr>
                                                <tr>
                                                    <th>کامپوزیت</th>
                                                    <td>1 in
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <!-- /.shop_attributes -->
                                        </div>
                                        <!-- /.tm-shop-attributes-detail -->
                                    </div>--}}

                                    {{--<div class="tab-pane" id="tab-reviews" role="tabpanel">
                                        <div class="techmarket-advanced-reviews" id="reviews">
                                            <div class="advanced-review row">
                                                <div class="advanced-review-rating">
                                                    <h2 class="based-title">دیدگاه کاربران (1)</h2>
                                                    <div class="avg-rating">
                                                        <span class="avg-rating-number">5.0</span>
                                                        <div title="" class="star-rating">
                                                            <span style="width:100%"></span>
                                                        </div>
                                                    </div>
                                                    <!-- /.avg-rating -->
                                                    <div class="rating-histogram">
                                                        <div class="rating-bar">
                                                            <div title="" class="star-rating">
                                                                <span style="width:100%"></span>
                                                            </div>
                                                            <div class="rating-count">1</div>
                                                            <div class="rating-percentage-bar">
                                                                <span class="rating-percentage"
                                                                      style="width:100%"></span>
                                                            </div>
                                                        </div>
                                                        <div class="rating-bar">
                                                            <div title="" class="star-rating">
                                                                <span style="width:80%"></span>
                                                            </div>
                                                            <div class="rating-count zero">0</div>
                                                            <div class="rating-percentage-bar">
                                                                <span class="rating-percentage" style="width:0%"></span>
                                                            </div>
                                                        </div>
                                                        <div class="rating-bar">
                                                            <div title="" class="star-rating">
                                                                <span style="width:60%"></span>
                                                            </div>
                                                            <div class="rating-count zero">0</div>
                                                            <div class="rating-percentage-bar">
                                                                <span class="rating-percentage" style="width:0%"></span>
                                                            </div>
                                                        </div>
                                                        <div class="rating-bar">
                                                            <div title="" class="star-rating">
                                                                <span style="width:40%"></span>
                                                            </div>
                                                            <div class="rating-count zero">0</div>
                                                            <div class="rating-percentage-bar">
                                                                <span class="rating-percentage" style="width:0%"></span>
                                                            </div>
                                                        </div>
                                                        <div class="rating-bar">
                                                            <div title="" class="star-rating">
                                                                <span style="width:20%"></span>
                                                            </div>
                                                            <div class="rating-count zero">0</div>
                                                            <div class="rating-percentage-bar">
                                                                <span class="rating-percentage" style="width:0%"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.rating-histogram -->
                                                </div>
                                                <!-- /.advanced-review-rating -->
                                                <div class="advanced-review-comment">
                                                    <div id="review_form_wrapper">
                                                        <div id="review_form">
                                                            <div class="comment-respond" id="respond">
                                                                <h3 class="comment-reply-title" id="reply-title">افزودن
                                                                    یک دیدگاه</h3>
                                                                <form novalidate="" class="comment-form"
                                                                      id="commentform" method="post" action="#">
                                                                    <div class="comment-form-rating">
                                                                        <label>امتیاز شما</label>
                                                                        <p class="stars">
                                                                            <span><a href="#" class="star-1">1</a><a
                                                                                    href="#" class="star-2">2</a><a
                                                                                    href="#" class="star-3">3</a><a
                                                                                    href="#" class="star-4">4</a><a
                                                                                    href="#" class="star-5">5</a></span>
                                                                        </p>
                                                                    </div>
                                                                    <p class="comment-form-comment">
                                                                        <label for="comment">دیدگاه شما</label>
                                                                        <textarea aria-required="true" rows="8"
                                                                                  cols="45" name="comment"
                                                                                  id="comment"></textarea>
                                                                    </p>
                                                                    <p class="comment-form-author">
                                                                        <label for="author">نام شما
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <input type="text" aria-required="true"
                                                                               size="30" value="" name="author"
                                                                               id="author">
                                                                    </p>
                                                                    <p class="comment-form-email">
                                                                        <label for="email">ایمیل شما
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <input type="text" aria-required="true"
                                                                               size="30" value="" name="email"
                                                                               id="email">
                                                                    </p>
                                                                    <p class="form-submit">
                                                                        <input type="submit" value="افزودن دیدگاه"
                                                                               class="submit" id="submit" name="submit">
                                                                        <input type="hidden" id="comment_post_ID"
                                                                               value="185" name="comment_post_ID">
                                                                        <input type="hidden" value="0"
                                                                               id="comment_parent"
                                                                               name="comment_parent">
                                                                    </p>
                                                                </form>
                                                                <!-- /.comment-form -->
                                                            </div>
                                                            <!-- /.comment-respond -->
                                                        </div>
                                                        <!-- /#review_form -->
                                                    </div>
                                                    <!-- /#review_form_wrapper -->
                                                </div>
                                                <!-- /.advanced-review-comment -->
                                            </div>
                                            <!-- /.advanced-review -->
                                            <div id="comments">
                                                <ol class="commentlist">
                                                    <li id="li-comment-83"
                                                        class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                                        <div class="comment_container" id="comment-83">
                                                            <div class="comment-text">
                                                                <div class="star-rating">
																		<span style="width:100%">امتیازدهی
																			<strong
                                                                                class="rating">5</strong> از 5</span>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong itemprop="author"
                                                                            class="woocommerce-review__author">فلان
                                                                        فلانی نسب</strong>
                                                                    <span
                                                                        class="woocommerce-review__dash">&ndash;</span>
                                                                    <time datetime="2017-06-21T08:05:40+00:00"
                                                                          itemprop="datePublished"
                                                                          class="woocommerce-review__published-date">21
                                                                        مرداد 1398
                                                                    </time>
                                                                </p>
                                                                <div class="description">
                                                                    <p>محشره پیشنهاد خرید میدم البته تو شگفت انگیز</p>
                                                                </div>
                                                                <!-- /.description -->
                                                            </div>
                                                            <!-- /.comment-text -->
                                                        </div>
                                                        <!-- /.comment_container -->
                                                    </li>
                                                    <!-- /.comment -->
                                                </ol>
                                                <!-- /.commentlist -->
                                            </div>
                                            <!-- /#comments -->
                                        </div>
                                        <!-- /.techmarket-advanced-reviews -->
                                    </div>--}}
                                </div>
                            </div>

                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>

    @include('site.layout.footer')
