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
                        <li class="breadcrumb-item"><a href="{{route('brands.index')}}">مدیریت برند ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('brands.edit',$brand->id)}}">ویرایش
                                برند ({{$brand->name}})</a></li>
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
                            <h3 class="card-title">ویرایش برند ({{$brand->name}})</h3>
                        </div>

                        <form id="update_brand_form" action="{{route('brands.update',$brand->id)}}"
                              method="post" enctype="multipart/form-data">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام برند *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$brand->name) }}" id="name" name="name"
                                           placeholder="لطفا نام برند را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ برند *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug',$brand->slug) }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ برند را وارد کنید"
                                           autocomplete="slug" autofocus>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر برند</label>

                                    <img class="img-bordered" style="width: 250px;height: 100px" src="{{$brand->image->original}}"
                                         alt="{{$brand->image->original}}">

                                    <input accept=".jpg,.jpeg,.png" type="file"
                                           class="form-control @error('image') is-invalid @enderror"
                                           autofocus id="image" name="image">

                                    @error('image')
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

        $('#update_brand_form').validate({

            rules: {
                name: {
                    required: true
                },

                slug: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام برند را وارد کنید"
                },

                slug: {
                    required: "لطفا اسلاگ برند را وارد کنید"
                }
            }

        });

    });

</script>
