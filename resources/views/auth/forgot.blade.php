@section('site_title')
    <title>تخفیف سنسور | بازیابی رمز عبور</title>
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
						</span>بازیابی رمز عبور
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
                                            <h2>بازیابی رمز عبور</h2>

                                            <form class="login" id="forgot_form" method="post"
                                                  action="{{route('forgot')}}">

                                                @csrf

                                                <p class="form-row form-row-wide">
                                                    <label for="mobile">تلفن همراه
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                                           value="{{old('mobile')}}" autocomplete="mobile" autofocus
                                                           id="mobile" name="mobile"
                                                           class="woocommerce-Input woocommerce-Input--text input-text @error('mobile') is-invalid @enderror">

                                                    @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </p>

                                                <p class="form-row">
                                                    <input class="woocommerce-Button button" type="submit" value="ارسال">
                                                </p>

                                            </form>

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

<script type="text/javascript">

    $(document).ready(function () {

        $('#forgot_form').validate({

            rules: {
                mobile: {
                    required: true,
                    checkMobile: true
                }
            },

            messages: {
                mobile: {
                    required: "لطفا تلفن همراه را وارد کنید",
                    checkMobile: "لطفا تلفن همراه را صحیح وارد کنید"
                }
            }

        });

    });

</script>
