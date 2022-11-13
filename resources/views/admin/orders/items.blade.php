@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | سفارشات</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('orders.items',$order->id)}}">محصولات
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

                        <form id="checkGroups" method="post">

                            @csrf

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-bordered text-center">

                                    <tr>
                                        <th>ردیف</th>
                                        <th><input type="checkbox" id="selectall"/></th>
                                        <th>نام</th>
                                        <th>قیمت</th>
                                        <th>تعداد</th>
                                        <th>تعداد موجودی</th>
                                        <th>وضعیت</th>
                                        <th>ویرایش</th>
                                    </tr>

                                    @if(count($items))

                                        @foreach($items as $key=>$value)

                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    <input type="checkbox" class="singlechkbox" name="id[]"
                                                           value="{{$value->id}}"/>
                                                </td>
                                                <td>{{$value->product->name}}</td>
                                                <td>{{number_format($value->price)}}</td>
                                                <td>{{number_format($value->count)}}</td>
                                                <td>{{number_format($value->product->count)}}</td>
                                                {!! $value->status() !!}
                                                <td>
                                                    <a target="_blank" href="{{route('orders.update_items',$value->id)}}">
                                                        <i class="fa fa-edit text-primary"></i>
                                                    </a>
                                                </td>
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

                            <div class="card-footer">
                                <button data-message="آیا از موجود کردن گروهی اطمینان دارید ؟"
                                        id="{{route('orders.update_items.status',[\App\Models\OrderItem::AVAILABLE])}}" type="submit" class="btn btn-success">موجود
                                    کردن گروهی
                                </button>
                                <button data-message="آیا از ناموجود گروهی اطمینان دارید ؟"
                                        id="{{route('orders.update_items.status',[\App\Models\OrderItem::UNAVAILABLE])}}" type="submit" class="btn btn-danger">
                                    ناموجود کردن گروهی
                                </button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">

    jQuery(function ($) {
        $('body').on('click', '#selectall', function () {
            $('.singlechkbox').prop('checked', this.checked);
        });

        $('body').on('click', '.singlechkbox', function () {
            if ($('.singlechkbox').length == $('.singlechkbox:checked').length) {
                $('#selectall').prop('checked', true);
            } else {
                $("#selectall").prop('checked', false);
            }

        });
    });

    var checkGroups = $('#checkGroups');

    checkGroups.on('submit', function (e) {
        e.preventDefault();

        if ($('.singlechkbox:checked').length >= 1) {
            var route = $(this).find("button[type=submit]:focus").attr('id');
            var message = $(this).find("button[type=submit]:focus").attr('data-message');
            Swal.fire({
                title: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(10,132,16)',
                cancelButtonColor: 'rgb(221, 51, 51)',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر'
            }).then((result) => {
                if (result.isConfirmed) {
                    checkGroups.attr('action', route);
                    this.submit();
                }
            })
        } else {
            toastr['warning']('حداقل یک آیتم را انتخاب کنید', 'پیام');
        }
    });

</script>
