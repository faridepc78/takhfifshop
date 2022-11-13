@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | محصولات</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('products.index')}}">مدیریت
                                محصولات</a></li>
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
                            <h3 class="card-title mb-3">مدیریت محصولات</h3>

                            <div class="card-tools">
                                <form id="filterForm" method="get" action="{{route('products.index')}}">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input onkeyup="this.value=removeSpaces(this.value)" id="search"
                                               value="{{request()->input('search')}}" type="text"
                                               name="search"
                                               class="form-control float-right"
                                               placeholder="جستجو بر اساس نام و دسته بندی و برند">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <br>

                                <form id="paginateForm" method="get" action="{{route('products.index')}}">
                                    <div class="input-group input-group-sm" style="width: 300px;">

                                        <select class="form-control" name="paginate" id="paginate">
                                            <option disabled selected value="">تعداد صفحه بندی را مشخص کنید
                                            </option>

                                            <option @if (request()->input('paginate')==10)
                                                    selected
                                                    @endif value="10">10
                                            </option>

                                            <option @if (request()->input('paginate')==15)
                                                    selected
                                                    @endif value="15">15
                                            </option>

                                            <option @if (request()->input('paginate')==20)
                                                    selected
                                                    @endif value="20">20
                                            </option>

                                            <option @if (request()->input('paginate')==25)
                                                    selected
                                                    @endif value="25">25
                                            </option>

                                            <option @if (request()->input('paginate')==30)
                                                    selected
                                                    @endif value="30">30
                                            </option>

                                            <option @if (request()->input('paginate')==40)
                                                    selected
                                                    @endif value="40">40
                                            </option>

                                            <option @if (request()->input('paginate')==50)
                                                    selected
                                                    @endif value="50">50
                                            </option>

                                            <option @if (request()->input('paginate')==100)
                                                    selected
                                                    @endif value="100">100
                                            </option>
                                        </select>

                                    </div>
                                </form>
                            </div>

                            <a href="{{route('products.index',['status='.\App\Models\Product::ACTIVE])}}"
                               class="btn btn-success">@lang(\App\Models\Product::ACTIVE)</a>

                            <a href="{{route('products.index',['status='.\App\Models\Product::INACTIVE])}}"
                               class="btn btn-danger">@lang(\App\Models\Product::INACTIVE)</a>
                        </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-bordered text-center">

                                    <tr>
                                        <th>ردیف</th>
                                        <th><input type="checkbox" id="selectall"/></th>
                                        <th>نام</th>
                                        <th>اسلاگ</th>
                                        <th>دسته بندی</th>
                                        <th>برند</th>
                                        <th>قیمت</th>
                                        <th>تخفیف</th>
                                        <th>تعداد</th>
                                        <th>تصویر</th>
                                        <th>وضعیت</th>
                                        <th>مدیا</th>
                                        <th>گالری</th>
                                        <th>ویرایش</th>
                                        <th>حذف</th>
                                    </tr>

                                    @if(count($products))

                                        @foreach($products as $key=>$value)

                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    <input type="checkbox" class="singlechkbox" name="id[]"
                                                           value="{{$value->id}}"/>
                                                </td>
                                                <td>{{$value->name}}</td>
                                                <td>{{$value->slug}}</td>
                                                <td>{{$value->category->name}}</td>
                                                <td>{{$value->brand->name}}</td>
                                                <td>{{number_format($value->price)}}</td>
                                                <td>{{$value->discount}}</td>
                                                <td>{{number_format($value->count)}}</td>
                                                <td>
                                                    <img width="50" height="50" src="{{$value->image->original}}"
                                                         alt="{{$value->image->original}}">
                                                </td>

                                                {!! $value->status() !!}
                                                <td>
                                                    <a target="_blank"
                                                       href="{{route('product_media_index',$value->id)}}">
                                                        <i class="fa fa-image text-success"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a target="_blank"
                                                       href="{{route('product_gallery_index',$value->id)}}">
                                                        <i class="fa fa-image text-success"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a target="_blank" href="{{route('products.edit',$value->id)}}">
                                                        <i class="fa fa-edit text-primary"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('products.destroy', $value->id) }}"
                                                       onclick="destroyProduct(event, {{ $value->id }})"><i
                                                            class="fa fa-remove text-danger"></i></a>
                                                    <form action="{{ route('products.destroy', $value->id) }}"
                                                          method="post" id="destroy-Product-{{ $value->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
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
                                {!! $products->withQueryString()->links() !!}
                            </div>

                        @if (count($products)!=0)

                            <div class="card-footer">
                                <button onclick="onclick(destroy_products(event,this))" id="btn_group_destroy" data-message="آیا از حذف گروهی اطمینان دارید ؟"
                                        type="button" class="btn btn-danger">حذف
                                    گروهی
                                </button>
                                <button data-message="آیا از فعال کردن گروهی اطمینان دارید ؟"
                                        id="{{route('products.active_all')}}" type="submit" class="btn btn-success">فعال
                                    کردن گروهی
                                </button>
                                <button data-message="آیا از غیر فعال کردن گروهی اطمینان دارید ؟"
                                        id="{{route('products.inactive_all')}}" type="submit" class="btn btn-warning">
                                    غیر فعال کردن گروهی
                                </button>
                            </div>

                            <div style="display: none">
                                <form id="send_data_for_group_destroy_form" method="post"
                                      action="{{route('products.destroy_all')}}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>

                        @endif

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

    $('#filterForm').on('submit', function (e) {
        e.preventDefault();
        var base_url = window.location.href;
        var route = "{{route('products.index')}}";
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

    $('#paginate').on('change', function (e) {
        e.preventDefault();
        var base_url = window.location.href;
        var route = "{{route('products.index')}}";
        var paginate = $('#paginate').val();

        if (paginate.length !== 0) {
            if (base_url.indexOf('?' + 'paginate' + '=') != -1 || base_url.indexOf('&' + 'paginate' + '=') != -1) {
                var new_url = replaceUrlParam(base_url, 'paginate', paginate);
                window.location.href = new_url;
            } else {
                if (base_url === route) {
                    $('#paginateForm').submit();
                } else {
                    var new_url = base_url + '&paginate=' + paginate;
                    window.location.href = new_url;
                }
            }
        }
    });

    function destroy_products(event, elem) {
        event.preventDefault();
        if ($('.singlechkbox:checked').length >= 1) {
            var message = $(elem).attr('data-message');
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
                    var send_data_for_group_destroy_form = $('#send_data_for_group_destroy_form');

                    var values = $("input[name='id[]']:checked")
                        .map(function () {
                            return $(this).val();
                        }).get();

                    $.each(values, function (key, value) {
                        send_data_for_group_destroy_form.append($("<input name='id[]' value='" + value + "'>"));
                        send_data_for_group_destroy_form.submit();
                    })
                }
            })
        } else {
            toastr['warning']('حداقل یک آیتم را انتخاب کنید', 'پیام');
        }
    }

    function destroyProduct(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'آیا از حذف اطمینان دارید ؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'rgb(221, 51, 51)',
            cancelButtonColor: 'rgb(48, 133, 214)',
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`destroy-Product-${id}`).submit()
            }
        })
    }
</script>
