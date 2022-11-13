@section('site_title')
    <title>تخفیف سنسور | ثبت نام</title>
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
						</span>ثبت نام
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
                                            <h2>ثبت نام در سایت</h2>

                                            <form class="register" id="register_form" method="post"
                                                  action="{{route('register')}}">

                                                @csrf

                                                <p class="form-row form-row-wide">
                                                    <label for="f_name">نام
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                                           value="{{old('f_name')}}" autocomplete="f_name" autofocus id="f_name" name="f_name"
                                                           class="woocommerce-Input woocommerce-Input--text input-text @error('f_name') is-invalid @enderror">

                                                    @error('f_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </p>

                                                <p class="form-row form-row-wide mt-4">
                                                    <label for="l_name">نام خانوادگی
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                                           value="{{old('l_name')}}" autocomplete="l_name" autofocus id="l_name" name="l_name"
                                                           class="woocommerce-Input woocommerce-Input--text input-text @error('l_name') is-invalid @enderror">

                                                    @error('l_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </p>

                                                <p class="form-row form-row-wide mt-4">
                                                    <label for="mobile">تلفن همراه
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                                           value="{{old('mobile')}}" autocomplete="mobile" autofocus id="mobile" name="mobile"
                                                           class="woocommerce-Input woocommerce-Input--text input-text @error('mobile') is-invalid @enderror">

                                                    @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </p>

                                                <p class="form-row">
                                                    <input name="register" type="submit" class="woocommerce-Button button"
                                                           value="ثبت نام"/>
                                                </p>

                                                <div class="register-benefits">
                                                    <h3>در جهت ثبت نام در سایت شما قادرید :</h3>
                                                    <ul>
                                                        <li>تسریع در روند پرداخت محصولاتی منتخبی</li>
                                                        <li>سفارشات خود را براحتی رهگیری کنید</li>
                                                        <li>تاریخچه خریدهای خود را بررسی کنید</li>
                                                    </ul>
                                                </div>

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

        $('#register_form').validate({

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
                }
            }

        });

    });

</script>
