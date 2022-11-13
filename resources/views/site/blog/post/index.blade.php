@section('site_title')
    <title>تخفیف سنسور | پست ({{$post->name}})</title>
@endsection


@section('site_body')
    <body class="right-sidebar single single-post">
    @endsection

    @include('site.layout.header')

    <div id="content" class="site-content">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="{{route('home')}}">صفحه اصلی</a>
                    <span class="delimiter">
							<i class="tm tm-arrow-left"></i>
						</span>پست ({{$post->name}})
                </nav>

                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <article class="post format-image">
                            <div class="media-attachment">
                                <div class="post-thumbnail">
                                    <img width="1433" height="560" alt="{{$post->name}}" class="wp-post-image"
                                         src="{{$post->image->original}}">
                                </div>
                            </div>
                            <header class="entry-header">
                                <h1 class="entry-title">{{$post->name}}
                                    <span class="comments-link">
											<a href="#comments">3</a>
										</span>
                                </h1>

                                <div class="entry-meta">
										<span class="cat-links">
											<a rel="category tag" href="#">{{$post->category->name}}</a>
										</span>

                                    <span class="posted-on">
                                        <time datetime="2017-03-23T08:06:09+00:00" class="entry-date published">{{\Morilog\Jalali\CalendarUtils::strftime('l j F Y',$post->created_at)}}</time>
                                    </span>

                                </div>

                            </header>

                            <div class="entry-content" itemprop="articleBody">
                                {!! $post->text !!}
                            </div>

                        </article>

                        {{--<div id="comments" class="comments-area">
                            <h2 class="comments-title"> 3 دیدگاه</h2>
                            <ol class="commentlist">
                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                    <div class="comment_container">
                                        <img width="100" height="100" class="avatar avatar-100 photo"
                                             src="assets/images/blog/author.jpg" alt="">
                                        <div class="comment-text">
                                            <div class="meta">
                                                <strong class="woocommerce-review__author" itemprop="author">فلان فلانی
                                                    نسب</strong>
                                                <time datetime="2017-03-23T08:06:09+00:00"
                                                      class="woocommerce-review__published-date">24 مرداد 1398
                                                </time>
                                            </div>
                                            <div class="comment-content">
                                                <div class="description">
                                                    <p>خوبه</p>
                                                </div>
                                                <div class="reply">
                                                    <a class="comment-edit-link" href="#">ویرایش</a>
                                                    <a href="#respond" class="comment-reply-link"
                                                       rel="nofollow">پاسخ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                    <div class="comment_container">
                                        <img width="100" height="100" class="avatar avatar-100 photo"
                                             src="assets/images/blog/author.jpg" alt="">
                                        <div class="comment-text">
                                            <div class="meta">
                                                <strong class="woocommerce-review__author" itemprop="author">فلان فلانی
                                                    نسب</strong>
                                                <time datetime="2017-03-23T08:06:09+00:00"
                                                      class="woocommerce-review__published-date">24 مرداد 1398
                                                </time>
                                            </div>
                                            <div class="comment-content">
                                                <div class="description">
                                                    <p>عالیه</p>
                                                </div>
                                                <div class="reply">
                                                    <a class="comment-edit-link" href="#">ویرایش</a>
                                                    <a href="#respond" class="comment-reply-link"
                                                       rel="nofollow">پاسخ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                    <div class="comment_container">
                                        <img width="100" height="100" class="avatar avatar-100 photo"
                                             src="assets/images/blog/author.jpg" alt="">
                                        <div class="comment-text">
                                            <div class="meta">
                                                <strong class="woocommerce-review__author" itemprop="author">فلان فلانی
                                                    نسب</strong>
                                                <time datetime="2017-03-23T08:06:09+00:00"
                                                      class="woocommerce-review__published-date">24 مرداد 1398
                                                </time>
                                            </div>
                                            <div class="comment-content">
                                                <div class="description">
                                                    <p>محشره</p>
                                                </div>
                                                <div class="reply">
                                                    <a class="comment-edit-link" href="#">ویرایش</a>
                                                    <a href="#respond" class="comment-reply-link"
                                                       rel="nofollow">پاسخ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>

                            <div class="comment-respond" id="respond">
                                <h3 class="comment-reply-title" id="reply-title">نوشتن یک دیدگاه</h3>
                                <form novalidate="" class="comment-form" id="commentform" method="post" action="#">
                                    <p class="comment-notes">
                                        <span id="email-notes">آدرس ایمیل شما منتشر نخواهد شد.</span> قسمت های مورد نیاز
                                        علامت گذاری شده اند
                                        <span class="required">*</span>
                                    </p>
                                    <p class="comment-form-comment">
                                        <label for="comment">دیدگاه</label>
                                        <textarea required="required" maxlength="65525" rows="8" cols="45"
                                                  name="comment" id="comment"></textarea>
                                    </p>
                                    <p class="comment-form-author">
                                        <label for="author">نام
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" required="required" aria-required="true" maxlength="245"
                                               size="30" value="" name="author" id="author">
                                    </p>
                                    <p class="comment-form-email">
                                        <label for="email">ایمیل
                                            <span class="required">*</span>
                                        </label>
                                        <input type="email" required="required" aria-required="true"
                                               aria-describedby="email-notes" maxlength="100" size="30" value=""
                                               name="email" id="email">
                                    </p>
                                    <p class="comment-form-url">
                                        <label for="url">وب سایت</label>
                                        <input type="url" maxlength="200" size="30" value="" name="url" id="url">
                                    </p>
                                    <p class="form-submit">
                                        <input type="submit" value="ارسال دیدگاه" class="submit">
                                    </p>
                                </form>
                            </div>

                        </div>--}}

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
