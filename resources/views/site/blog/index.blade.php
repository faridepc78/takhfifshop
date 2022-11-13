@section('site_title')
    <title>تخفیف سنسور | وبلاگ</title>
@endsection

@section('site_body')
    <body class="right-sidebar blog-grid">
@endsection

@include('site.layout.header')

    <div id="content" class="site-content">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="{{route('home')}}">صفحه اصلی</a>
                    <span class="delimiter">
							<i class="fa fa-angle-left"></i>
						</span>
                    وبلاگ
                </nav>

                <div id="primary" class="content-area">

                    <main id="main" class="site-main">

                        @if (count($posts))

                            @foreach($posts as $value)

                                <article class="post format-image hentry">
                                    <div class="media-attachment">
                                        <div class="post-thumbnail">
                                            <a href="{{$value->path()}}">
                                                <img alt="{{$value->name}}" class="wp-post-image" src="{{$value->image->original}}">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="content-body">
                                        <header class="entry-header">

                                            <h1 class="entry-title">
                                                <a rel="bookmark" href="{{$value->path()}}">{{$value->name}}</a>
                                            </h1>

                                            <div class="entry-meta">

											<span class="cat-links">
												<a href="{{$value->category->path()}}" rel="category tag">{{$value->category->name}}</a>
											</span>

                                            <span class="posted-on">
													<time class="entry-date published">{{\Morilog\Jalali\CalendarUtils::strftime('l j F Y',$value->created_at)}}</time>
											</span>

                                            </div>

                                        </header>

                                        <div class="entry-content">
                                            <p>{!! Str::limit($value->text) !!}</p>
                                        </div>

                                        <div class="post-readmore">
                                            <a class="btn btn-primary" href="{{$value->path()}}">بیشتر بخوانید</a>
                                        </div>

                                        {{--<span class="comments-link">
										<a href="blog-single#comments.html">نوشتن یک دیدگاه</a>
									    </span>--}}

                                    </div>
                                </article>

                            @endforeach

                        @endif

                        <nav class="navigation pagination text-center justify-content-center" id="post-navigation">
                            <div class="nav-links text-center">
                                <ul class="page-numbers">
                                    <div class="pagination mt-3">
                                        {!! $posts->links() !!}
                                    </div>
                                </ul>
                            </div>
                        </nav>
                    </main>

                </div>


                <div id="secondary" class="sidebar-blog widget-area" role="complementary">

                    @include('site.blog.common.search')

                    @include('site.blog.common.categories')

                    @include('site.blog.common.random')

                </div>

            </div>

        </div>

    </div>

    @include('site.layout.footer')
