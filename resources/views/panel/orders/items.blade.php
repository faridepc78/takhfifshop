@section('panel_title')
    <title>پنل کاربری تخفیف سنسور | سفارشات</title>
@endsection

@include('panel.layout.header')

@include('panel.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('user.orders.items',$order->id)}}">محصولات
                                سفارش ({{$order->code}}-{{$order->user->fullName}})</a></li>
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
                            <h3 class="card-title">محصولات سفارش ({{$order->code}}-{{$order->user->fullName}})</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>قیمت</th>
                                    <th>تعداد</th>
                                    <th>وضعیت</th>
                                </tr>

                                @if(count($items))

                                    @foreach($items as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->product->name}}</td>
                                            <td>{{number_format($value->price)}}</td>
                                            <td>{{number_format($value->count)}}</td>
                                            {!! $value->status() !!}
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
                            {!! $items->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('panel.layout.footer')
