@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | اسلایدر ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('sliders.index')}}">مدیریت
                                اسلایدر ها</a></li>
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
                            <h3 class="card-title mb-3">مدیریت اسلایدر ها</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>لینک</th>
                                    <th>تصویر</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($sliders))

                                    @foreach($sliders as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            @if (!empty($value->name))
                                                <td>{{$value->name}}</td>
                                            @else
                                                <td>ندارد</td>
                                            @endif
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#sliderUrl{{$value['id']}}">
                                                    <i class="fa fa-eye text-success"></i>
                                                </a>
                                            </td>
                                            <td><img class="img-bordered" style="width: 250px;height: 100px"
                                                     src="{{$value->image->original}}"
                                                     alt="{{$value->image->original}}"></td>
                                            <td>
                                                <a target="_blank" href="{{route('sliders.edit',$value->id)}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                            <td><a href="{{ route('sliders.destroy', $value->id) }}"
                                                   onclick="destroySliders(event, {{ $value->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('sliders.destroy', $value->id) }}"
                                                      method="post" id="destroy-Sliders-{{ $value->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade mt-lg-5"
                                             id="sliderUrl{{$value['id']}}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h6 class="modal-title">
                                                            لینک اسلایدر
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
                            {!! $sliders->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">
    function destroySliders(event, id) {
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
                document.getElementById(`destroy-Sliders-${id}`).submit()
            }
        })
    }
</script>
