@section('panel_title')
    <title>پنل کاربری تخفیف سنسور | انتخاب درگاه پرداخت</title>
@endsection

@include('panel.layout.header')

@include('panel.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('user.orders.index')}}">مدیریت
                                سفارشات</a></li>
                        <li class="breadcrumb-item active">انتخاب درگاه پرداخت</li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-3">انتخاب درگاه پرداخت</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>درگاه پرداخت سامان</th>
                                    <th>درگاه پرداخت سپهر</th>
                                </tr>

                                <tr>
                                    <td>
                                        <form method="post" action="{{route('payment.request')}}">
                                            @csrf
                                            <input type="hidden" name="payment_token"
                                                   value="{{\App\Helpers\EncryptDecrypt::my_encrypt(env('SAMAN_TOKEN'),env('PAYMENT_TOKEN'))}}">
                                            <input type="hidden" name="order_id"
                                                   value="{{\App\Helpers\EncryptDecrypt::my_encrypt($order_id,env('PAYMENT_TOKEN'))}}">
                                            <button class="btn" type="submit">
                                                <img src="{{asset('assets/common/images/saman.jfif')}}" alt="saman">
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <form method="post" action="{{route('payment.request')}}">
                                            @csrf
                                            <input type="hidden" name="payment_token"
                                                   value="{{\App\Helpers\EncryptDecrypt::my_encrypt(env('SEPEHR_TOKEN'),env('PAYMENT_TOKEN'))}}">
                                            <input type="hidden" name="order_id"
                                                   value="{{\App\Helpers\EncryptDecrypt::my_encrypt($order_id,env('PAYMENT_TOKEN'))}}">
                                            <button class="btn" type="submit">
                                                <img src="{{asset('assets/common/images/sepehr.jfif')}}" alt="sepehr">
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('panel.layout.footer')
