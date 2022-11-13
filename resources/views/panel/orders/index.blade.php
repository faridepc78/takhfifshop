@section('panel_title')
    <title>پنل کاربری تخفیف سنسور | سفارشات</title>
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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('user.orders.index')}}">مدیریت
                                سفارشات</a></li>
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
                            <h3 class="card-title mb-3">مدیریت سفارشات</h3>

                            <div class="card-tools">
                                <form id="filterForm" method="get"
                                      action="{{route('user.orders.index')}}">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input readonly id="search" value="{{request()->input('search')}}" type="text"
                                               name="search"
                                               class="form-control float-right"
                                               placeholder="جستجو بر اساس تاریخ">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <a href="{{route('user.orders.index','status='.\App\Models\Order::ACCEPT)}}"
                               class="btn btn-success">تایید شده</a>

                            <a href="{{route('user.orders.index','status='.\App\Models\Order::PENDING)}}"
                               class="btn btn-warning">برسی نشده</a>

                            <a href="{{route('user.orders.index','type='.\App\Models\Order::PAID)}}"
                               class="btn btn-info">پرداخت شده</a>

                            <a href="{{route('user.orders.index','type='.\App\Models\Order::UNPAID)}}"
                               class="btn btn-danger">پرداخت نشده</a>

                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>تلفن همراه</th>
                                    <th>تلفن ثابت</th>
                                    <th>استان</th>
                                    <th>شهر</th>
                                    <th>کد</th>
                                    <th>تاریخ</th>
                                    <th>آدرس</th>
                                    <th>محصولات</th>
                                    <th>وضعیت</th>
                                    <th>نوع</th>
                                    <th>پیام مدیریت</th>
                                    <th>قیمت(تومان)</th>
                                    <th>پرداخت</th>
                                </tr>

                                @if(count($orders))

                                    @foreach($orders as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->user->fullName}}</td>
                                            <td>{{$value->user->mobile}}</td>
                                            <td>{{$value->phone}}</td>
                                            <td>{{$value->province->name}}</td>
                                            <td>{{$value->city->name}}</td>
                                            <td>{{$value->code}}</td>
                                            <td>{{\Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($value['created_at']))}}</td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#orderAddress{{$value['id']}}">
                                                    <i class="fa fa-eye text-success"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{route('user.orders.items',$value->id)}}">
                                                    <i class="fa fa-database text-success"></i>
                                                </a>
                                            </td>
                                            <td>@lang($value['status'])</td>
                                            <td>@lang($value['type'])</td>

                                            @if ($value['message']!=null)
                                                <td>
                                                    <a href="javascript:void(0)" data-toggle="modal"
                                                       data-target="#orderMessage{{$value['id']}}">
                                                        <i class="fa fa-eye text-success"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td><i class="fa fa-close"></i></td>
                                            @endif

                                            <td>{{number_format($value->Price())}}</td>

                                            @if ($value['status']==\App\Models\Order::ACCEPT && $value['type']==\App\Models\Order::UNPAID)
                                                <td>
                                                    <form method="get" action="{{route('payment.choice',\App\Helpers\EncryptDecrypt::my_encrypt($value['id'],env('PAYMENT_TOKEN')))}}">
                                                        <button class="btn btn-success" type="submit"><i
                                                                class="fa fa-check text-warning"></i></button>
                                                    </form>
                                                </td>
                                            @else
                                                <td><i class="fa fa-close"></i></td>
                                            @endif
                                        </tr>

                                        <div class="modal fade mt-lg-5"
                                             id="orderAddress{{$value['id']}}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h6 class="modal-title">
                                                            آدرس سفارش
                                                            ({{$value->user->fullName}})
                                                            با کد
                                                            {{$value['code']}}
                                                        </h6>

                                                        <a style="color: red;cursor: pointer"
                                                           data-dismiss="modal" aria-label="Close">
                                                            <i style="color: red" class="fa fa-close"></i>
                                                        </a>

                                                    </div>

                                                    <div class="modal-body">

                                                        <textarea readonly class="form-control" rows="5"
                                                                  style="resize: vertical">{{$value['address']}}</textarea>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="modal fade mt-lg-5"
                                             id="orderMessage{{$value['id']}}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h6 class="modal-title">
                                                            پیام مدیریت برای سفارش
                                                            ({{$value->user->fullName}})
                                                            با کد
                                                            {{$value['code']}}
                                                        </h6>

                                                        <a style="color: red;cursor: pointer"
                                                           data-dismiss="modal" aria-label="Close">
                                                            <i style="color: red" class="fa fa-close"></i>
                                                        </a>

                                                    </div>

                                                    <div class="modal-body">

                                                        <textarea readonly class="form-control" rows="5"
                                                                  style="resize: vertical">{{$value['message']}}</textarea>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                @else

                                    <div class="alert alert-danger text-center">
                                        <p>اطلاعات این بخش ثبت نشده است</p>
                                    </div>

                                @endif

                            </table>

                        </div>

                        <div class="pagination mt-3">
                            {!! $orders->withQueryString()->links() !!}
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

    $("#search").persianDatepicker({formatDate: "YYYY-0M-0D"});

    $('#filterForm').on('submit', function (e) {
        e.preventDefault();
        var base_url = window.location.href;
        var route = "{{route('user.orders.index')}}";
        var search = $('#search').val();

        if (search.length !== 0) {
            if (base_url.indexOf('?' + 'search' + '=') != -1 || base_url.indexOf('&' + 'search' + '=') != -1) {
                var new_url = replaceUrlParam(base_url, 'search', search);
                window.location.href = removeURLParameter(new_url, 'page');
            } else {
                if (base_url === route) {
                    this.submit();
                } else {
                    var new_url = base_url + '&search=' + search;
                    window.location.href = removeURLParameter(new_url, 'page');
                }
            }
        }

    })

</script>
