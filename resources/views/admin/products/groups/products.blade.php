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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('groups.products',$group->id)}}">مدیریت
                                محصولات ({{$group->name}})</a></li>
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
                            <h3 class="card-title mb-3">مدیریت محصولات ({{$group->name}})</h3>

                            <div class="card-tools">
                                <form id="filterForm" method="get" action="{{route('groups.products',$group->id)}}">
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

                                <form id="paginateForm" method="get" action="{{route('groups.products',$group->id)}}">
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

                            <a href="{{route('groups.products',[$group->id,'status='.\App\Models\Product::ACTIVE])}}"
                               class="btn btn-success">@lang(\App\Models\Product::ACTIVE)</a>

                            <a href="{{route('groups.products',[$group->id,'status='.\App\Models\Product::INACTIVE])}}"
                               class="btn btn-danger">@lang(\App\Models\Product::INACTIVE)</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>اسلاگ</th>
                                    <th>دسته بندی</th>
                                    <th>برند</th>
                                    <th>قیمت</th>
                                    <th>تخفیف</th>
                                    <th>تعداد</th>
                                    <th>تصویر</th>
                                    <th>وضعیت</th>
                                </tr>

                                @if(count($products))

                                    @foreach($products as $key=>$value)

                                        @if ($value['group_id']==$group['id'])

                                            <tr>
                                                <td>{{$key+1}}</td>
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
                                            </tr>

                                        @endif

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

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">

    $('#filterForm').on('submit', function (e) {
        e.preventDefault();
        var base_url = window.location.href;
        var route = "{{route('groups.products',$group->id)}}";
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
        var route = "{{route('groups.products',$group->id)}}";
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
</script>
