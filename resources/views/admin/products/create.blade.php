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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('products.create')}}">ایجاد
                                محصولات</a></li>
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
                            <h3 class="card-title">ایجاد محصولات</h3>
                        </div>

                        <form id="store_product_form" action="{{route('products.store')}}"
                              method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام محصول *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام محصول را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ محصول *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug') }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ محصول را وارد کنید"
                                           autocomplete="slug" autofocus>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_id">دسته بندی محصول *</label>
                                    <select class="form-control  @error('category_id') is-invalid @enderror"
                                            id="category_id"
                                            name="category_id">
                                        <option selected disabled value="">
                                            لطفا دسته بندی محصول را انتخاب کنید
                                        </option>

                                        @if (count($categories))

                                            @foreach($categories as $value)

                                                <optgroup label="{{$value->name}}">

                                                    <option style="font-size: 18px;color: blue"
                                                            @if ($value->id==old('category_id'))
                                                            selected="selected"
                                                            @endif
                                                            value="{{$value->id}}">{{$value->name}}</option>

                                                    @if (count($value->sub))

                                                        @foreach($value->sub as $item)

                                                            <option style="color: red"
                                                                    @if ($item->id==old('category_id'))
                                                                    selected="selected"
                                                                    @endif
                                                                    value="{{$item->id}}">{{$item->name}}</option>

                                                        @endforeach

                                                        @if (count($item->sub))

                                                            @foreach($item->sub as $v)

                                                                <option style="color: deeppink"
                                                                        @if ($v->id==old('category_id'))
                                                                        selected="selected"
                                                                        @endif
                                                                        value="{{$v->id}}">{{$v->name}}</option>

                                                            @endforeach

                                                        @endif

                                                    @endif

                                                </optgroup>

                                            @endforeach

                                        @endif

                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="brand_id">برند محصول *</label>
                                    <select class="form-control  @error('brand_id') is-invalid @enderror"
                                            id="brand_id"
                                            name="brand_id">
                                        <option selected disabled value="">
                                            لطفا برند محصول را انتخاب کنید
                                        </option>

                                        @if (count($brands))

                                            @foreach($brands as $value)

                                                <option @if ($value->id==old('brand_id'))
                                                        selected="selected"
                                                        @endif
                                                        value="{{$value->id}}">{{$value->name}}</option>

                                            @endforeach

                                        @endif

                                    </select>

                                    @error('brand_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر محصول *</label>
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
                                    <label for="pdf">پی دی اف محصول</label>
                                    <input accept=".pdf" type="file"
                                           class="form-control @error('pdf') is-invalid @enderror"
                                           autofocus id="pdf" name="pdf">

                                    @error('pdf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="price">قیمت محصول *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value);separateNum(this.value,this)"
                                           type="text"
                                           class="form-control @error('price') is-invalid @enderror"
                                           value="{{ old('price') }}" id="price" name="price"
                                           placeholder="لطفا قیمت محصول را وارد کنید"
                                           autocomplete="price" autofocus>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="discount">درصد تخفیف محصول</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)"
                                           type="text"
                                           class="form-control @error('discount') is-invalid @enderror"
                                           value="{{ old('discount') }}" id="discount" name="discount"
                                           placeholder="درصد تخفیف محصول را در صورت تمایل وارد کنید"
                                           autocomplete="discount" autofocus>

                                    @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="count">تعداد موجودی محصول *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value);separateNum(this.value,this)"
                                           type="text"
                                           class="form-control @error('count') is-invalid @enderror"
                                           value="{{ old('count') }}" id="count" name="count"
                                           placeholder="لطفا تعداد موجودی محصول را وارد کنید"
                                           autocomplete="count" autofocus>

                                    @error('count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">وضعیت محصول *</label>
                                    <select class="form-control  @error('status') is-invalid @enderror"
                                            id="status"
                                            name="status">
                                        <option selected disabled value="">لطفا وضعیت محصول را انتخاب کنید</option>

                                        @foreach(\App\Models\Product::$statuses as $value)
                                            <option
                                                @if ($value==old('status'))
                                                selected="selected"
                                                @endif
                                                value="{{$value}}">@lang($value)</option>
                                        @endforeach

                                    </select>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="text">توضیحات محصول *</label>
                                    <textarea class="form-control ckeditor @error('text') is-invalid @enderror"
                                              id="text"
                                              name="text" autocomplete="text"
                                              autofocus>{{ old('text') }}</textarea>

                                    @error('text')
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

@section('admin_js')
    <script type="text/javascript" src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
@endsection

@include('admin.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        var text_field = 'text';
        var text_error = 'لطفا توضیحات محصول را وارد کنید';

        $('#store_product_form').validate({

            rules: {
                name: {
                    required: true
                },

                slug: {
                    required: true
                },

                category_id: {
                    required: true
                },

                brand_id: {
                    required: true
                },

                image: {
                    required: true
                },

                price: {
                    required: true
                },

                count: {
                    required: true
                },

                status: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام محصول را وارد کنید"
                },

                slug: {
                    required: "لطفا اسلاگ محصول را وارد کنید"
                },

                category_id: {
                    required: "لطفا دسته بندی محصول را انتخاب کنید"
                },

                brand_id: {
                    required: "لطفا برند محصول را انتخاب کنید"
                },

                image: {
                    required: "لطفا تصویر محصول را انتخاب کنید"
                },

                price: {
                    required: "لطفا قیمت محصول را وارد کنید"
                },

                count: {
                    required: "لطفا تعداد موجودی محصول را وارد کنید"
                },

                status: {
                    required: "لطفا وضعیت محصول را انتخاب کنید"
                }
            },
            submitHandler: function (form) {
                if (validateCkeditor(text_field, text_error) === true) {
                    form.submit();
                }
            }

        });

    });

</script>
