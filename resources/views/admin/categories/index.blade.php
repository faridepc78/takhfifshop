@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | دسته بندی ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('categories.index')}}">مدیریت
                                دسته بندی ها</a></li>
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
                            <h3 class="card-title mb-3">مدیریت دسته بندی ها</h3>

                            <div class="card-tools">
                                <form id="paginateForm" method="get" action="{{route('categories.index')}}">
                                    <div class="input-group input-group-sm" style="width: 300px;">

                                        <select onchange="this.form.submit();" class="form-control" name="paginate" id="paginate">
                                            <option disabled selected value="">تعداد صفحه بندی را مشخص کنید
                                            </option>

                                            <option @if (request()->input('paginate')==10)
                                                selected
                                            @endif value="10">10</option>

                                            <option @if (request()->input('paginate')==15)
                                                    selected
                                                    @endif value="15">15</option>

                                            <option @if (request()->input('paginate')==20)
                                                    selected
                                                    @endif value="20">20</option>

                                            <option @if (request()->input('paginate')==25)
                                                    selected
                                                    @endif value="25">25</option>

                                            <option @if (request()->input('paginate')==30)
                                                    selected
                                                    @endif value="30">30</option>

                                            <option @if (request()->input('paginate')==40)
                                                    selected
                                                    @endif value="40">40</option>

                                            <option @if (request()->input('paginate')==50)
                                                    selected
                                                    @endif value="50">50</option>

                                            <option @if (request()->input('paginate')==100)
                                                    selected
                                                    @endif value="100">100</option>
                                        </select>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>آیدی</th>
                                    <th>نام</th>
                                    <th>اسلاگ</th>
                                    <th>زیر دسته ها</th>
                                    <th>تصویر</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($categories))

                                    @foreach($categories as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->slug}}</td>

                                            @if (count($value->sub))
                                                <td>
                                                    <a href="{{route('categories.show',$value->id)}}">
                                                        <i class="fa fa-eye text-success"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td><i class="fa fa-close text-warning"></i></td>
                                            @endif

                                            <td>
                                                @if (!empty($value->image->files))
                                                    <img class="img-size-64" src="{{$value->image->original}}"
                                                         alt="{{$value->image->original}}">
                                                @else
                                                    <p class="text text-danger">ندارد</p>
                                                @endif
                                            </td>

                                            <td>
                                                <a target="_blank" href="{{route('categories.edit',$value->id)}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                            <td><a href="{{ route('categories.destroy', $value->id) }}"
                                                   onclick="destroyCategory(event, {{ $value->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('categories.destroy', $value->id) }}"
                                                      method="post" id="destroy-Category-{{ $value->id }}">
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
                            {!! $categories->withQueryString()->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">

    function destroyCategory(event, id) {
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
                document.getElementById(`destroy-Category-${id}`).submit()
            }
        })
    }
</script>
