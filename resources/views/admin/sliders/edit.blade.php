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
                        <li class="breadcrumb-item"><a href="{{route('sliders.index')}}">مدیریت اسلایدر ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('sliders.edit',$slider->id)}}">ویرایش
                                اسلایدر ({{$slider->name}})</a></li>
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
                            <h3 class="card-title">ویرایش اسلایدر ({{$slider->name}})</h3>
                        </div>

                        <form id="update_slider_form" action="{{route('sliders.update',$slider->id)}}"
                              method="post" enctype="multipart/form-data">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام اسلایدر</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$slider->name) }}" id="name" name="name"
                                           placeholder="لطفا نام اسلایدر را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="url">لینک اسلایدر</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('url') is-invalid @enderror"
                                           value="{{ old('url',$slider->url) }}" id="url" name="url"
                                           placeholder="لطفا لینک اسلایدر را وارد کنید"
                                           autocomplete="url" autofocus>

                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر اسلایدر</label>

                                    <img class="img-bordered" style="width: 250px;height: 100px" src="{{$slider->image->original}}"
                                         alt="{{$slider->image->original}}">

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
