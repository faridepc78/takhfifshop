@section('site_title')
    <title>تخفیف سنسور | پرسش و پاسخ ها</title>
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
                    پرسش و پاسخ ها
                </nav>


                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="type-page hentry">
                            <header class="entry-header">
                                <div class="page-header-caption">
                                    <h1 class="entry-title">پرسش و پاسخ ها</h1>
{{--                                    <p class="entry-subtitle">این جزئیات آخرین بار در 18 فوریه 2016 اصلاح شد.</p>--}}
                                </div>
                            </header>

                            <div class="entry-content">
                                <h2 class="kc_title faq-page-title">روند ارسال مرسوله</h2>
                                <div class="row faq-first-row">
                                    <div class="col-md-6">
                                        <div class="text-block">
                                            <h3 class="faq-title">چه تعداد روشهای ارسال مرسوله وجود دارد؟</h3>
                                            <div class="text-content">
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="text-block">
                                            <h3 class="faq-title">چه تعداد روشهای ارسال مرسوله وجود دارد؟</h3>
                                            <div class="text-content">
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row faq-second-row">
                                    <div class="col-md-6">
                                        <div class="text-block">
                                            <h3 class="faq-title">چگونه می توانم سفارش خود را پیگیری کنم؟</h3>
                                            <div class="text-content">
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="text-block">
                                            <h3 class="faq-title">آیا برای سفارش نیاز به حساب کاربری دارم؟</h3>
                                            <div class="text-content">
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <h2 class="faq-title-v2">پرسش و پاسخ بخش دوم</h2>
                                <div class="faq-subtitle">این جزئیات آخرین بار در تاریخ 01 ژوئن 2017 اصلاح شد.</div>
                                <div id="accordion" class="faq-accordion-wrap" role="tablist" aria-multiselectable="true">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="icon"></i>
                                                    چه تعداد روشهای ارسال مرسوله وجود دارد؟
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="card-block">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingTwo">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    چه مدت طول می کشد تا مرسوله را تحویل بگیرم؟
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="card-block">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingThree">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <i class="icon"></i>
                                                    چگونه می توانم سفارش خود را پیگیری کنم؟
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="card-block">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingFour">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    <i class="icon"></i>
                                                    چگونه می توانم سفارش دهم؟
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                                            <div class="card-block">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingFive">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                    <i class="icon"></i>
                                                    در صورت داشتن هرگونه سؤال چگونه باید با آنها تماس بگیرم؟
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
                                            <div class="card-block">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد
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
