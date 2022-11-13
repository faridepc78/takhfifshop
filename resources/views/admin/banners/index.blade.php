@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | بنر ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('banners.index')}}">مدیریت
                                بنر ها</a></li>
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
                            <h3 class="card-title mb-3">مدیریت بنر ها</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>لینک</th>
                                    <th>تصویر</th>
                                    <th>نوع</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($banners))

                                    @foreach($banners as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                @if (!empty($value->name))
                                                    {{$value->name}}
                                                @else
                                                    ندارد
                                                @endif
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#bannerUrl{{$value['id']}}">
                                                    <i class="fa fa-eye text-success"></i>
                                                </a>
                                            </td>
                                            <td><img class="img-bordered" style="width: 250px;height: 100px"
                                                     src="{{$value->image->original}}"
                                                     alt="{{$value->image->original}}"></td>
                                            <td>@lang($value->type)</td>
                                            <td>
                                                <a target="_blank" href="{{route('banners.edit',$value->id)}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                            <td><a href="{{ route('banners.destroy', $value->id) }}"
                                                   onclick="destroyBanners(event, {{ $value->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('banners.destroy', $value->id) }}"
                                                      method="post" id="destroy-Banners-{{ $value->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade mt-lg-5"
                                             id="bannerUrl{{$value['id']}}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h6 class="modal-title">
                                                            لینک بنر
                                                            ({{$value->name}})
                                                        </h6>

                                                        <a style="color: red;cursor: pointer"
                                                           data-dismiss="modal" aria-label="Close">
                                                            <i style="color: red" class="fa fa-close"></i>
                                                        </a>

                                                    </div>

                                                    <div class="modal-body">

                                                        <p class="text-left">{{$value['url']}}</p>

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
                            {!! $banners->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">
    function destroyBanners(event, id) {
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
                document.getElementById(`destroy-Banners-${id}`).submit()
            }
        })
    }
</script>
