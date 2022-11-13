@section('panel_title')
    <title>پنل کاربری تخفیف سنسور | تراکنش ها</title>
@endsection

@section('panel_css')
    <link type="text/css" rel="stylesheet"
          href="{{asset('assets/backend/plugins/persianDatepicker/css/persianDatepicker-default.css')}}">
@endsection

@include('panel.layout.header')

@include('panel.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('user.transactions.index')}}">مدیریت
                                تراکنش ها</a></li>
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
                            <h3 class="card-title mb-3">مدیریت تراکنش ها</h3>

                            <div class="card-tools">

                                <form id="dateForm" method="get"
                                      action="{{route('user.transactions.index')}}">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input readonly id="date" value="{{request()->input('date')}}" type="text"
                                               name="date"
                                               class="form-control float-right"
                                               placeholder="جستجو بر اساس تاریخ">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <br>

                                <form id="tokenForm" method="get"
                                      action="{{route('user.transactions.index')}}">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input onkeyup="this.value=removeSpaces(this.value)" id="token"
                                               value="{{request()->input('token')}}" type="text"
                                               name="token"
                                               class="form-control float-right"
                                               placeholder="جستجو بر اساس توکن">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <a href="{{route('user.transactions.index','status='.\App\Models\Transaction::S_SUCCESS)}}"
                               class="btn btn-success">موفق</a>

                            <a href="{{route('user.transactions.index','status='.\App\Models\Transaction::S_CANCEL)}}"
                               class="btn btn-warning">در حال تراکنش</a>

                            <a href="{{route('user.transactions.index','status='.\App\Models\Transaction::S_PENDING)}}"
                               class="btn btn-info">کنسل شده</a>

                            <a href="{{route('user.transactions.index','status='.\App\Models\Transaction::S_FAIL)}}"
                               class="btn btn-danger">ناموفق</a>

                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>توکن</th>
                                    <th>کاربر</th>
                                    <th>کد سفارش</th>
                                    <th>مبلغ(تومان)</th>
                                    <th>شناسه بانک</th>
                                    <th>تاریخ</th>
                                    <th>وضعیت</th>
                                </tr>

                                @if(count($transactions))

                                    @foreach($transactions as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->payment_id}}</td>
                                            <td>{{$value->user->fullName}}</td>
                                            <td>{{$value->order->code}}</td>
                                            <td>{{number_format($value->paid)}}</td>
                                            <td>{{$value->transaction()}}</td>
                                            <td>{{\Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($value['created_at']))}}</td>
                                            <td>@lang($value['status'])</td>
                                        </tr>

                                    @endforeach

                                @else

                                    <div class="alert alert-danger text-center">
                                        <p>اطلاعات این بخش ثبت نشده است</p>
                                    </div>

                                @endif

                            </table>

                        </div>

                        <div class="pagination mt-3">
                            {!! $transactions->withQueryString()->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@section('panel_js')
    <script type="text/javascript"
            src="{{asset('assets/backend/plugins/persianDatepicker/js/persianDatepicker.min.js')}}"></script>
@endsection

@include('panel.layout.footer')

<script type="text/javascript">

    $("#date").persianDatepicker({formatDate: "YYYY-0M-0D"});

    $('#dateForm').on('submit', function (e) {
        e.preventDefault();
        var base_url = '{{cleanExtraQueryString(['token'],null,'user.transactions.index')}}';
        var route = "{{route('user.transactions.index')}}";
        var date = $('#date').val();

        if (date.length !== 0) {

            if (base_url.indexOf('?' + 'date' + '=') != -1 || base_url.indexOf('&' + 'date' + '=') != -1) {
                var new_url = replaceUrlParam(base_url, 'date', date);
                window.location.href = removeURLParameter(new_url, 'page');
            } else {
                if (base_url === route) {
                    this.submit();
                } else {
                    var new_url = base_url + '&date=' + date;
                    window.location.href = removeURLParameter(new_url, 'page');
                }
            }

        }

    })

    $('#tokenForm').on('submit', function (e) {
        e.preventDefault();
        var base_url = '{{cleanExtraQueryString(['date'],null,'user.transactions.index')}}';
        var route = "{{route('user.transactions.index')}}";
        var token = $('#token').val();

        if (token.length !== 0) {

            if (base_url.indexOf('?' + 'token' + '=') != -1 || base_url.indexOf('&' + 'token' + '=') != -1) {
                var new_url = replaceUrlParam(base_url, 'token', token);
                window.location.href = removeURLParameter(new_url, 'page');
            } else {
                if (base_url === route) {
                    this.submit();
                } else {
                    var new_url = base_url + '&token=' + token;
                    window.location.href = removeURLParameter(new_url, 'page');
                }
            }

        }

    })

</script>
