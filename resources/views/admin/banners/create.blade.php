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
                        <li class="breadcrumb-item"><a href="{{route('banners.index')}}">مدیریت بنر ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('banners.create')}}">ایجاد
                                بنر ها</a></li>
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
                            <h3 class="card-title">ایجاد بنر ها</h3>
                        </div>

                        <form id="store_banner_form" action="{{route('banners.store')}}"
                              method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام بنر</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام بنر را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="url">لینک بنر</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('url') is-invalid @enderror"
                                           value="{{ old('url') }}" id="url" name="url"
                                           placeholder="لطفا لینک بنر را وارد کنید"
                                           autocomplete="url" autofocus>

                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر بنر *</label>
                                    <input accept=".jpg,.jpeg,.png" type="file"
                                           class="form-control @error('image') is-invalid @enderror"
                                           autofocus id="image" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="type">نوع بنر *</label>
                                    <select class="form-control  @error('type') is-invalid @enderror"
                                            id="type"
                                            name="type">
                                        <option selected disabled value="">لطفا نوع بنر را انتخاب کنید</option>

                                        @foreach(\App\Models\Banner::$types as $value)
                                            <option
                                                @if ($value==old('type'))
                                                selected="selected"
                                                @endif
                                                value="{{$value}}">@lang($value)</option>
                                        @endforeach

                                    </select>

                                    @error('type')
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

        $('#store_banner_form').validate({

            rules: {
                image: {
                    required: true
                },

                type:{
                    required:true
                }
            },

            messages: {
                image: {
                    required: "لطفا تصویر بنر را انتخاب کنید"
                },

                type:{
                    required:"لطفا نوع بنر را انتخاب کنید"
                }
            }

        });

    });

</script>
