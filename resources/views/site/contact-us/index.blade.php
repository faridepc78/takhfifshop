@section('site_title')
    <title>تخفیف سنسور | تماس با ما</title>
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
                    تماس با ما
                </nav>

                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="type-page hentry">
                            <header class="entry-header">
                                <div class="page-header-caption">
                                    <h1 class="entry-title">تماس با ما</h1>
                                </div>
                            </header>

                            <div class="entry-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-block">
                                            <h2 class="contact-page-title">نوشتن یک پیام</h2>
                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                سطرآنچنان که لازم است</p>
                                        </div>

                                        <div class="contact-form">
                                            <div role="form" class="wpcf7" id="wpcf7-f425-o1" lang="en-US" dir="ltr">

                                                <form id="contact_us_form" class="wpcf7-form" method="post"
                                                      action="{{route('contact-us')}}">

                                                    @csrf

                                                    @guest()

                                                        <div class="form-group row">

                                                            <div class="col-xs-12 col-md-4">
                                                                <label for="mobile">تلفن همراه
                                                                    <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <br>
                                                                <span class="wpcf7-form-control-wrap first-name">
																	<input onkeyup="this.value=removeSpaces(this.value)"
                                                                           type="text"
                                                                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text @error('mobile') is-invalid @enderror"
                                                                           value="{{old('mobile')}}" name="mobile"
                                                                           autocomplete="mobile" autofocus
                                                                           id="mobile">

                                                                @error('mobile')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </span>
                                                            </div>

                                                            <div class="col-xs-12 col-md-4">
                                                                <label for="l_name">نام خانوادگی
                                                                    <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <br>
                                                                <span class="wpcf7-form-control-wrap first-name">
																	<input onkeyup="this.value=removeSpaces(this.value)"
                                                                           type="text"
                                                                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text @error('l_name') is-invalid @enderror"
                                                                           value="{{old('l_name')}}" name="l_name"
                                                                           autocomplete="l_name" autofocus
                                                                           id="l_name">

                                                                @error('l_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </span>
                                                            </div>

                                                            <div class="col-xs-12 col-md-4">
                                                                <label for="f_name">نام
                                                                    <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <br>
                                                                <span class="wpcf7-form-control-wrap first-name">
																	<input onkeyup="this.value=removeSpaces(this.value)"
                                                                           type="text"
                                                                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text @error('f_name') is-invalid @enderror"
                                                                           value="{{old('f_name')}}" name="f_name"
                                                                           autocomplete="f_name" autofocus
                                                                           id="f_name">

                                                                @error('f_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </span>
                                                            </div>

                                                        </div>

                                                    @endguest

                                                    <div class="form-group">
                                                        <label for="subject">
                                                            موضوع
                                                            <abbr title="required" class="required">*</abbr>
                                                        </label>
                                                        <br>
                                                        <span class="wpcf7-form-control-wrap subject">
																<input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                                                       class="wpcf7-form-control wpcf7-text input-text @error('subject') is-invalid @enderror"
                                                                       value="{{old('subject')}}" name="subject" id="subject" autocomplete="subject" autofocus>

                                                                @error('subject')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
															</span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="text">
                                                            پیام
                                                            <abbr title="required" class="required">*</abbr>
                                                        </label>
                                                        <br>
                                                        <span class="wpcf7-form-control-wrap your-message">
																<textarea onkeyup="this.value=removeSpaces(this.value)" style="resize: vertical"
                                                                          class="wpcf7-form-control wpcf7-textarea @error('subject') is-invalid @enderror"
                                                                          rows="10" cols="40"
                                                                          name="text" id="text" autocomplete="text" autofocus>{{old('text')}}</textarea>

                                                            @error('text')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </span>
                                                    </div>

                                                    <div class="form-group clearfix">
                                                        <p>
                                                            <input type="submit" value="ارسال پیام"
                                                                   class="wpcf7-form-control wpcf7-submit"/>
                                                        </p>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 store-info store-info-v2">
{{--                                        <div style="text-align: center;height: 350px;"> <img src="../Content/Images/Main/loader.gif" style="width: 20%; margin: auto;">--}}
{{--                                        <div id="map" class="map map-home leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" style="width: 100%; height: 350px; border: 1px solid rgb(239, 239, 239) !important; position: relative;" tabindex="0"><div style="text-align: center;height: 350px;" "=""> <img src="../Content/Images/Main/loader.gif" style="width: 20%; margin: auto;"> </div><table style="height: 100%; margin: auto;"> <tbody><tr>  </tr> </tbody></table><div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 8px, 0px);"><div class="leaflet-pane leaflet-tile-pane"><div class="leaflet-layer " style="z-index: 1; opacity: 1;"><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 18; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt="" role="presentation" src="https://b.tile.openstreetmap.org/16/42647/26627.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(224px, -106px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://c.tile.openstreetmap.org/16/42647/26628.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(224px, 150px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/16/42646/26627.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-32px, -106px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://c.tile.openstreetmap.org/16/42648/26627.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(480px, -106px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://b.tile.openstreetmap.org/16/42646/26628.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-32px, 150px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/16/42648/26628.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(480px, 150px, 0px); opacity: 1;"></div></div></div><div class="leaflet-pane leaflet-shadow-pane"><img src="../Content/Images/Markers/marker-shadow.png" class="leaflet-marker-shadow leaflet-zoom-animated" alt="" style="margin-left: -30px; margin-top: -60px; width: 60px; height: 60px; transform: translate3d(276px, 174px, 0px);"></div><div class="leaflet-pane leaflet-overlay-pane"></div><div class="leaflet-pane leaflet-marker-pane"><img src="../Content/Images/Markers/Main.png" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="" tabindex="0" style="margin-left: -40px; margin-top: -50px; width: 50px; height: 50px; transform: translate3d(276px, 174px, 0px); z-index: 174;"></div><div class="leaflet-pane leaflet-tooltip-pane"></div><div class="leaflet-pane leaflet-popup-pane"><div class="leaflet-popup  leaflet-zoom-animated" style="opacity: 1; transform: translate3d(262px, 139px, 0px); bottom: -7px; left: -171px;"><div class="leaflet-popup-content-wrapper"><div class="leaflet-popup-content" style="width: 301px;"><strong>تخفیف سنسور</strong><br><br>سایر یزد بخش مرکزی ، شهر شاهدیه، محله (گردفرامرز) بخشی ، خیابان تلاش ، خیابان دست آورد ، پلاک 0 ، طبقه همکف<br><br>003535219910</div></div><div class="leaflet-popup-tip-container"><div class="leaflet-popup-tip"></div></div><a class="leaflet-popup-close-button" href="#close">×</a></div></div><div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(1.09177e+07px, 6.81678e+06px, 0px) scale(32768);"></div></div><div class="leaflet-control-container"><div class="leaflet-top leaflet-left"><div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in">+</a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out">−</a></div></div><div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-left"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control"><a href="http://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> | © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors</div></div></div></div>--}}
{{--                                    </div>--}}
{{--                                        <div class="google-map">--}}
{{--                                            <iframe height="288" allowfullscreen="" style="border:0"--}}
{{--                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481.593303940039!2d-0.15470444843858283!3d51.53901886611164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ae62edd5771%3A0x27f2d823e2be0249!2sPrincess+Rd%2C+London+NW1+8JR%2C+UK!5e0!3m2!1sen!2s!4v1458827996435"></iframe>--}}
{{--                                        </div>--}}

                                        <div class="kc-elm kc-css-773435 kc_text_block">
                                            <h2 class="contact-page-title">آدرس فروشگاه محلی ما</h2>
                                            <p>سایر یزد بخش مرکزی ، شهر شاهدیه، محله (گردفرامرز) بخشی ، خیابان تلاش ، خیابان دست آورد ، پلاک 0 ، طبقه همکف
                                                <br>
                                                <br> تلفن تماس 3030 350 901 98+
                                                <br>
                                                <br> ایمیل: <a href="mailto:alirezanasrollahi.1991[at]gmail.com">alirezanasrollahi.1991[at]gmail.com</a>
                                            </p>
                                            <h3>ساعات کاری</h3>
                                            <p class="operation-hours">9 الی 17</p>
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

    <script type="text/javascript">

        $(document).ready(function () {

            $('#contact_us_form').validate({

                rules: {
                    f_name: {
                        required: true
                    },

                    l_name: {
                        required: true
                    },

                    mobile: {
                        required: true,
                        checkMobile: true
                    },

                    subject: {
                        required: true
                    },

                    text: {
                        required: true
                    }
                },

                messages: {
                    f_name: {
                        required: "لطفا نام را وارد کنید"
                    },

                    l_name: {
                        required: "لطفا نام خانوادگی را وارد کنید"
                    },

                    mobile: {
                        required: "لطفا تلفن همراه را وارد کنید",
                        checkMobile: "لطفا تلفن همراه را صحیح وارد کنید"
                    },

                    subject: {
                        required: "لطفا موضوع را وارد کنید"
                    },

                    text: {
                        required: "لطفا پیام را وارد کنید"
                    }
                }

            });

        });

    </script>
