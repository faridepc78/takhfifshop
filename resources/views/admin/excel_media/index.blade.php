@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | اکسل مدیا</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('excel_media.index')}}">مدیریت
                                اکسل مدیا</a></li>
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
                            <h3 class="card-title mb-3">مدیریت اکسل مدیا</h3>

                            <div class="card-tools">
                                <form id="filterForm" method="get" action="{{route('excel_media.index')}}">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input onkeyup="this.value=removeSpaces(this.value)" id="search" value="{{request()->input('search')}}" type="text"
                                               name="search"
                                               class="form-control float-right"
                                               placeholder="جستجو بر اساس نام">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
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
                                    <th>مدیا</th>
                                    <th>نوع</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($excel_media))

                                    @foreach($excel_media as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->media->id}}</td>
                                            <td>{{$value->Name()}}</td>

                                            @if ($value->media->type=='image')
                                                <td>
                                                    <img width="50" height="50" src="{{$value->media->original}}" alt="{{$value->media->original}}">
                                                </td>
                                                @elseif ($value->media->type=='pdf')
                                                <td>
                                                    <a href="{{$value->media->original}}"><i class="fa fa-download text-success"></i></a>
                                                </td>
                                            @endif

                                            <td>@lang($value->media->type)</td>

                                            <td>
                                                <a target="_blank" href="{{route('excel_media.edit',$value->id)}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('excel_media.destroy', $value->id) }}"
                                                   onclick="destroyExcelMedia(event, {{ $value->id }})"><i
                                                            class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('excel_media.destroy', $value->id) }}"
                                                      method="post" id="destroy-ExcelMedia-{{ $value->id }}">
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
                            {!! $excel_media->withQueryString()->links() !!}
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
        var route = "{{route('excel_media.index')}}";
        var search = $('#search').val();

        if (search.length!==0){
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

    function destroyExcelMedia(event, id) {
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
                document.getElementById(`destroy-ExcelMedia-${id}`).submit()
            }
        })
    }
</script>
