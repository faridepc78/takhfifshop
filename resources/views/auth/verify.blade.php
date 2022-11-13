@section('site_title')
    <title>تخفیف سنسور | فعالسازی حساب کاربری</title>
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
						</span>فعال سازی حساب کاربری
            </nav>

            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="customer-login-form">

                                    <div id="customer_login"
                                         class="u-columns col2-set d-flex justify-content-center align-items-center">

                                        <div class="u-column2 col-2">
                                            <h2>فعال سازی حساب کاربری</h2>

                                            <form class="login" id="verify_form" method="post"
                                                  action="{{route('verify')}}">

                                                @csrf

                                                <p class="form-row form-row-wide">
                                                    <label for="active_code">کد فعالسازی حساب کاربری
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input maxlength="6" onkeyup="this.value=removeSpaces(this.value)" type="text"
                                                           value="{{old('active_code')}}" autocomplete="active_code" autofocus
                                                           id="active_code" name="active_code"
                                                           class="woocommerce-Input woocommerce-Input--text input-text @error('active_code') is-invalid @enderror">

                                                    @error('active_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </p>

                                                <p class="form-row">
                                                    <input class="woocommerce-Button button" type="submit" value="ارسال" name="verify">
                                                </p>

                                                <br>
                                                <br>

                                                <p class="form-row">
                                                    <input id="resend_status" class="woocommerce-Input woocommerce-Input--text input-text text-center" type="hidden" readonly>
                                                </p>

                                            </form>

                                            <div id="resend_form" style="display: none">
                                                <form style="margin-top: -20px !important;"
                                                      class="login-box animated fade-in-up center-block"
                                                      method="post" action="{{route('resend')}}">

                                                    @csrf

                                                    <button id="btn_submit" style="background-color: #0c91e5" type="submit">درخواست
                                                        ارسال مجدد
                                                    </button>

                                                </form>
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

@section('site_js')
    <script type="text/javascript" src='{{asset('assets/frontend/plugins/moment-js/js/moment.js')}}'></script>
@endsection

@include('site.layout.footer')

<script type="text/javascript">

    $(function () {
        setInterval(function () {
            var resend_active_code = {{$resend_active_code}};
            var resend_status = $('#resend_status');

            utxtimes = moment.utc().format('YYYY-MM-DD HH:mm:ss');
            var localTime = moment.utc(utxtimes).toDate();
            localTime = moment(localTime).format('YYYY-MM-DD HH:mm:ss');
            tms = moment(localTime).format("X");
            $('#timestamp').text(tms);

            var seconds = resend_active_code - tms;

            if (seconds > 0) {
                resend_status.prop('type', 'text');
                resend_status.val('درخواست ارسال مجدد (' + seconds + ' ثانیه)');
            } else {
                resend_status.remove();
                showResendActiveCodeForm();
            }

        }, 1000);

        function showResendActiveCodeForm() {
            $('#resend_form').css('display', 'block');
        }
    });
</script>

<script type="text/javascript">

    $(document).ready(function () {

        $('#verify_form').validate({

            rules: {
                active_code: {
                    required: true,
                    number:true,
                    maxlength: 6
                }
            },

            messages: {
                active_code: {
                    required: "لطفا کد فعالسازی را وارد کنید",
                    number:"کد فعالسازی عدد است",
                    maxlength: "کد فعالسازی 6 رقمی است"
                }
            }

        });

    });

</script>
