@section('site_title')
    <title>تخفیف سنسور | درباره ما</title>
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
                درباره ما
            </nav>

            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <header class="entry-header">
                            <div class="page-featured-image">
                                <img width="1920" height="1391" alt="about-us" class="attachment-full size-full wp-post-image"
                                     src="{{asset('assets/frontend/images/about-header.jpg')}}">
                            </div>
                            <div class="page-header-caption">
                                <h1 class="entry-title">درباره ما</h1>
                                <p class="entry-subtitle">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                    که لازم است </p>
                            </div>
                        </header>


                        <div class="entry-content">
                            <div class="about-features row">
                                <div class="col-md-4">
                                    <div class="text-block">
                                        <h2 class="align-top">دقیقا تخصص ما چیه!؟</h2>
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-block">
                                        <h2 class="align-top">چشم انداز ما</h2>
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="text-block">
                                        <h2 class="align-top">تاریخچه کار ما</h2>
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row accordion-block">
                                <div class="text-boxes col-sm-7">
                                    <div class="row first-row">
                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">تخصص ما دقیقا چیه</h3>
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی
                                                    در شصت و سه درصد گذشته</p>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">چشم انداز ما</h3>
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی
                                                    در شصت و سه درصد گذشته</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">تخصص ما دقیقا چیه</h3>
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی
                                                    در شصت و سه درصد گذشته</p>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">چشم انداز ما</h3>
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی
                                                    در شصت و سه درصد گذشته</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="about-accordion col-sm-5">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <h3 class="about-accordion-title">پرسش و پاسخ ها</h3>
                                            <div id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapseOne" aria-expanded="true"
                                                               aria-controls="collapseOne">
                                                                <i class="fa-icon"></i>
                                                                پشتیبانی 24/7
                                                            </a>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseOne" class="collapse show" role="tabpanel"
                                                         aria-labelledby="headingOne">
                                                        <div class="card-block">
                                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                            با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
                                                            و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                            کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingTwo">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse"
                                                               data-parent="#accordion" href="#collapseTwo"
                                                               aria-expanded="true" aria-controls="collapseTwo">
                                                                <i class="fa-icon"></i>
                                                                بهترین کیفیت محصولات
                                                            </a>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseTwo" class="collapse" role="tabpanel"
                                                         aria-labelledby="headingTwo">
                                                        <div class="card-block">
                                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                            با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
                                                            و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                            کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingThree">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse"
                                                               data-parent="#accordion" href="#collapseThree"
                                                               aria-expanded="true" aria-controls="collapseThree">
                                                                <i class="fa-icon"></i>
                                                                سریع ترین روند ارسال کالا
                                                            </a>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseThree" class="collapse" role="tabpanel"
                                                         aria-labelledby="headingThree">
                                                        <div class="card-block">
                                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                            با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
                                                            و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                            کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingFour">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse"
                                                               data-parent="#accordion" href="#collapseFour"
                                                               aria-expanded="true" aria-controls="collapseFour">
                                                                <i class="fa-icon"></i>
                                                                خدمات مشتریان
                                                            </a>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseFour" class="collapse" role="tabpanel"
                                                         aria-labelledby="headingFour">
                                                        <div class="card-block">
                                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                            با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
                                                            و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                            کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingFive">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse"
                                                               data-parent="#accordion" href="#collapseFive"
                                                               aria-expanded="true" aria-controls="collapseFive">
                                                                <i class="fa-icon"></i>
                                                                بیش از ده هزار نفر هوادار
                                                            </a>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseFive" class="collapse" role="tabpanel"
                                                         aria-labelledby="headingFive">
                                                        <div class="card-block">
                                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                                            با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
                                                            و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                            کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
