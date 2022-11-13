@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | استعلام ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('inquiries.index')}}">مدیریت استعلام ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('inquiries.single',$inquiry->id)}}">مشاهده
                                درخواست ({{$inquiry->user->fullName}})</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-success">

                        <div class="card-header">
                            <h3 class="card-title">مشاهده درخواست ({{$inquiry->user->fullName}})</h3>
                        </div>

                        <div class="card-body">

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="full_name">نام و نام خانوادگی</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $inquiry->user->fullName }}" id="full_name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile">تلفن همراه</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $inquiry->user->mobile }}" id="mobile">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="media">مدیا</label>

                                    @if ($inquiry->media->type==\App\Models\Media::PDF || $inquiry->media->type==\App\Models\Media::EXCEL)
                                        <a href="{{$inquiry->media->original}}"><p
                                                class="alert alert-success text text-center">دانلود</p></a>
                                    @elseif($inquiry->media->type==\App\Models\Media::IMAGE)
                                        <img width="300" src="{{$inquiry->media->original}}"
                                             alt="{{$inquiry->media->original}}">
                                        <br><br>
                                        <a target="_blank" href="{{$inquiry->media->original}}"><p
                                                class="alert alert-success text text-center">دانلود</p></a>
                                    @endif

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="type">وضعیت</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="@lang($inquiry->type)" id="type">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="text">توضیحات</label>
                                    <textarea id="text" class="form-control" rows="10" style="resize: vertical"
                                              readonly>{{ $inquiry->text }}</textarea>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@include('admin.layout.footer')
