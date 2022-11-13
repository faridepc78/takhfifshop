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
                        <li class="breadcrumb-item"><a href="{{route('excel_media.index')}}">مدیریت اکسل مدیا</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('excel_media.edit',$excel_media->id)}}">ویرایش
                                اکسل مدیا ({{$excel_media->name}})</a></li>
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
                            <h3 class="card-title">ویرایش اکسل مدیا ({{$excel_media->name}})</h3>
                        </div>

                        <form id="update_ExcelMedia_form" action="{{route('excel_media.update',$excel_media->id)}}"
                              method="post" enctype="multipart/form-data">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام مدیا اکسل *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$excel_media['name']) }}" id="name" name="name"
                                           placeholder="لطفا نام مدیا اکسل را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="media">مدیا اکسل</label>

                                    @if ($excel_media->media->type=='image')
                                        <img class="img-bordered" style="width: 150px;height: 150px" src="{{$excel_media->media->original}}"
                                             alt="{{$excel_media->media->original}}">
                                    @elseif ($excel_media->media->type=='pdf')
                                        <a style="margin-right: 20px" href="{{$excel_media->media->original}}"><i class="fa fa-download text-success"></i></a>
                                    @endif

                                    <input accept=".jpg,.jpeg,.png,.pdf" type="file"
                                           class="form-control @error('media') is-invalid @enderror"
                                           autofocus id="media" name="media">

                                    @error('media')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">بروزرسانی</button>
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

    $(document).ready(function () {

        $('#update_ExcelMedia_form').validate({

            rules: {
                name: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام مدیا اکسل را وارد کنید"
                }
            }

        });

    });

</script>
