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
                        <li class="breadcrumb-item"><a href="{{route('products.index')}}">مدیریت محصولات</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('products.import_page')}}">ایمپورت
                                فایل محصولات</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">ایمپورت فایل محصولات</h3>
                        </div>

                        <form id="import_product_file" action="{{route('products.import')}}"
                              method="post" enctype="multipart/form-data">

                            <br>

                            <a target="_blank" href="{{asset('assets/common/images/excel-en.png')}}"
                               class="btn btn-info">تصویر راهنما (انگلیسی)</a>

                            <a target="_blank" href="{{asset('assets/common/images/excel-fa.png')}}"
                               class="btn btn-info">تصویر راهنما (فارسی)</a>

                            <a href="{{route('products.export')}}"
                               class="btn btn-success">اکسپورت محصولات</a>

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="group_id">گروه محصولات *</label>
                                    <select class="form-control  @error('group_id') is-invalid @enderror"
                                            id="group_id"
                                            name="group_id">
                                        <option selected disabled value="">لطفا گروه محصولات را انتخاب کنید</option>

                                        @if (count($groups))

                                            @foreach($groups as $value)

                                                <option @if ($value->id==old('group_id'))
                                                        selected="selected"
                                                        @endif
                                                        value="{{$value->id}}">{{$value->name}}</option>

                                            @endforeach

                                        @endif

                                    </select>

                                    @error('group_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="file">فایل محصولات *</label>
                                    <input accept=".xlsx,.xls,.csv" type="file"
                                           class="form-control @error('file') is-invalid @enderror"
                                           autofocus id="file" name="file">

                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
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

        $('#import_product_file').validate({

            rules: {
                group_id: {
                    required: true
                },

                file: {
                    required: true
                }
            },

            messages: {
                group_id: {
                    required: "لطفا گروه محصولات را انتخاب کنید"
                },

                file: {
                    required: "لطفا فایل محصولات را انتخاب کنید"
                }
            }

        });

    });

</script>
