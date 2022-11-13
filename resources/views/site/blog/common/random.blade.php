@if (count($random_posts))

    <div class="widget techmarket_posts_carousel_widget">
        <section class="section-posts-carousel" id="sidebar-posts-carousel">
            <header class="section-header">
                <h2 class="section-title">پست های تصادفی</h2>
                <div class="custom-slick-nav"></div>
            </header>

            <div class="post-item-carousel" data-ride="tm-slick-carousel" data-wrap=".posts" data-slick="{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#sidebar-posts-carousel .custom-slick-nav&quot;}">
                <div class="posts">

                    @foreach($random_posts as $value)

                        <div class="post-item">
                            <a href="{{$value->path()}}" class="post-thumbnail">
                                <div class="post-thumbnail">
                                    <img width="270" height="270" alt="{{$value->name}}" class="attachment-techmarket-blog-carousel wp-post-image" src="{{$value->image->original}}">
                                </div>
                            </a>
                            <div class="post-content">
                                <a href="{{$value->path()}}" class="post-name" tabindex="-1">{{$value->name}}</a>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>
    </div>

@endif
