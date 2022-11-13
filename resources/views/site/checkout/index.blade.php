@section('site_title')
    <title>تخفیف سنسور | صورتحساب</title>
@endsection

@section('site_body')
    <body class="woocommerce-active page-template-default woocommerce-checkout woocommerce-page can-uppercase">
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
                    صورتحساب
                </nav>

                <div class="content-area" id="primary">
                    <main class="site-main" id="main">
                        <div class="type-page hentry">
                            <div class="entry-content">
                                <div class="woocommerce">

                                    <form id="order_form" action="{{route('checkout')}}"
                                          class="checkout woocommerce-checkout" method="post">

                                        @csrf

                                        <div id="customer_details" class="col2-set">
                                            <div class="col-1">
                                                <div class="woocommerce-billing-fields">
                                                    <h3>فرم صورت حساب</h3>
                                                    <div class="woocommerce-billing-fields__field-wrapper-outer">
                                                        <div class="woocommerce-billing-fields__field-wrapper">

                                                            <div class="clear"></div>

                                                            <p class="form-row form-row-last">
                                                                <label for="province_id">استان
                                                                    <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <select
                                                                    class="state_select select2-hidden-accessible @error('province_id') is-invalid @enderror"
                                                                    id="province_id" name="province_id">
                                                                    <option selected disabled value="">لطفا استان را
                                                                        انتخاب کنید
                                                                    </option>

                                                                    @if (count($provinces))

                                                                        @foreach($provinces as $value)

                                                                            <option @if ($value->id==old('province_id'))
                                                                                    selected="selected"
                                                                                    @endif value="{{$value['id']}}">{{$value['name']}}</option>

                                                                        @endforeach

                                                                    @endif

                                                                </select>

                                                                @error('province_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </p>

                                                            <p class="form-row form-row-last">
                                                                <label for="city_id">شهر
                                                                    <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <select
                                                                    class="state_select select2-hidden-accessible @error('city_id') is-invalid @enderror"
                                                                    id="city_id" name="city_id">
                                                                    <option selected disabled value="">لطفا شهر را
                                                                        انتخاب کنید
                                                                    </option>

                                                                </select>

                                                                @error('city_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </p>

                                                            <p class="form-row form-row-wide">
                                                                <label for="address">آدرس
                                                                    <abbr title="required" class="required">*</abbr>
                                                                </label>

                                                                <textarea onkeyup="this.value=removeSpaces(this.value)"
                                                                          style="resize: vertical"
                                                                          class="wpcf7-form-control wpcf7-textarea @error('address') is-invalid @enderror"
                                                                          rows="5"
                                                                          name="address" id="address"
                                                                          autocomplete="address"
                                                                          autofocus>{{old('address')}}</textarea>

                                                                @error('address')
                                                                <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </p>

                                                            <p class="form-row form-row-last">
                                                                <label for="phone">تلفن ثابت
                                                                    <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <input onkeyup="this.value=removeSpaces(this.value)"
                                                                       type="number" value="{{ old('phone') }}"
                                                                       id="phone" name="phone"
                                                                       class="input-text @error('phone') is-invalid @enderror"
                                                                       autocomplete="phone" autofocus>

                                                                @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if (count($basketBuy_data))

                                            <div class="woocommerce-checkout-review-order" id="order_review">
                                                <div class="order-review-wrapper">
                                                    <h3 class="order_review_heading">سفارشات شما</h3>
                                                    <table class="shop_table woocommerce-checkout-review-order-table">

                                                        <thead>
                                                        <tr>
                                                            <th class="product-name">محصول</th>
                                                            <th class="product-total">جمع کل</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>

                                                            @foreach($basketBuy_data as $data)

                                                                @php
                                                                    $sum=0
                                                                @endphp

                                                                @foreach($data as $value)

                                                                    <tr class="cart_item">
                                                                        <td class="product-name">
                                                                            <strong
                                                                                class="product-quantity">{{$value['count']}}
                                                                                ×</strong> {{$value['name']}}
                                                                        </td>
                                                                        <td class="product-total">
                                                            <span
                                                                class="woocommerce-Price-amount amount">{{number_format($value['price'])}} تومان</span>
                                                                        </td>
                                                                    </tr>

                                                                    @php
                                                                        $sum+=($value['price']*$value['count']);
                                                                    @endphp

                                                                @endforeach

                                                            @endforeach

                                                        </tbody>

                                                        <tfoot>

                                                        <tr class="cart-subtotal">
                                                            <th>جمع کل</th>
                                                            <td>
                                                            <span
                                                                class="woocommerce-Price-amount amount">{{number_format($sum)}} تومان</span>
                                                            </td>
                                                        </tr>

                                                        </tfoot>
                                                    </table>

                                                    <div class="woocommerce-checkout-payment" id="payment">
                                                        <div class="form-row place-order">
                                                            <p class="form-row terms wc-terms-and-conditions woocommerce-validated">
                                                                <label
                                                                    class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                                    <input type="checkbox" id="terms" name="terms"
                                                                           class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox">
                                                                    <span><a class="woocommerce-terms-and-conditions-link"
                                                                             href="{{route('terms-and-conditions')}}">شرایط و ضوابط</a> را مطالعه و قبول دارم</span>
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input type="hidden" value="1" name="terms-field">
                                                            </p>
                                                            <input type="submit" class="button wc-forward text-center" value="تأیید سفارش">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        @endif

                                    </form>
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

            let province_id = $('#province_id');
            let city_id = $('#city_id');

            province_id.on('change', function () {

                let province_id_value = $(this).val();

                $.ajax({
                    url: '{{route('ajax.getCities')}}',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        province_id: province_id_value
                    },
                    dataType: 'json',
                    success: function (result) {
                        if (result.status != undefined) {
                            if (result.status == 'success') {
                                city_id.empty().append("<option selected disabled value=''>لطفا شهر را انتخاب کنید</option>");
                                $.each(result.cities,function (key,value){
                                    city_id.append($("<option></option>")
                                        .attr("value", value['id'])
                                        .text(value['name']));
                                })
                            } else {
                                toastr['error']('خطایی رخ داده است', 'پیام');
                            }
                        } else {
                            toastr['error']('خطایی رخ داده است', 'پیام');
                        }
                    }, error: function (response) {
                        toastr['error']('خطایی رخ داده است', 'پیام');
                    }
                });

            });

            $('#order_form').validate({

                rules: {
                    province_id: {
                        required: true
                    },

                    city_id: {
                        required: true
                    },

                    address: {
                        required: true
                    },

                    phone: {
                        required: true
                    },

                    terms: {
                        required: true
                    }
                },

                messages: {
                    province_id: {
                        required: "لطفا استان را وارد کنید"
                    },

                    city_id: {
                        required: "لطفا شهر را وارد کنید"
                    },

                    address: {
                        required: "لطفا آدرس را وارد کنید"
                    },

                    phone: {
                        required: "لطفا تلفن ثابت را وارد کنید"
                    },

                    terms: {
                        required: "لطفا قوانین را بپذیرید"
                    }
                }

            });

        });

    </script>
