@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | برند ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('brands.index')}}">مدیریت
                                برند ها</a></li>
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
                            <h3 class="card-title mb-3">مدیریت برند ها</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>آیدی</th>
                                    <th>نام</th>
                                    <th>اسلاگ</th>
                                    <th>تصویر</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($brands))

                                    @foreach($brands as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->slug}}</td>
                                            <td><img class="img-bordered" style="width: 250px;height: 100px"
                                                     src="{{$value->image->original}}"
                                                     alt="{{$value->image->original}}"></td>
                                            <td>
                                                <a target="_blank" href="{{route('brands.edit',$value->id)}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                            <td><a href="{{ route('brands.destroy', $value->id) }}"
                                                   onclick="destroyBrands(event, {{ $value->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('brands.destroy', $value->id) }}"
                                                      method="post" id="destroy-Brands-{{ $value->id }}">
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
                            {!! $brands->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">
    function destroyBrands(event, id) {
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
                document.getElementById(`destroy-Brands-${id}`).submit()
            }
        })
    }
</script>
