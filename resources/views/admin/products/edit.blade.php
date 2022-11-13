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
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('products.edit',$product->id)}}">ویرایش
                                محصول ({{$product->name}})</a></li>
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
                            <h3 class="card-title">ویرایش محصول ({{$product->name}})</h3>
                        </div>

                        <form id="update_product_form" action="{{route('products.update',$product->id)}}"
                              method="post" enctype="multipart/form-data">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام محصول *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$product->name) }}" id="name" name="name"
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
                                           value="{{ old('slug',$product->slug) }}" id="slug" name="slug"
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
                                                            @if ($value->id==old('category_id',$product->category_id))
                                                            selected="selected"
                                                            @endif
                                                            value="{{$value->id}}">{{$value->name}}</option>

                                                    @if (count($value->sub))

                                                        @foreach($value->sub as $item)

                                                            <option style="color: red"
                                                                    @if ($item->id==old('category_id',$product->category_id))
                                                                    selected="selected"
                                                                    @endif
                                                                    value="{{$item->id}}">{{$item->name}}</option>

                                                        @endforeach

                                                        @if (count($item->sub))

                                                            @foreach($item->sub as $v)

                                                                <option style="color: deeppink"
                                                                        @if ($v->id==old('category_id',$product->category_id))
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

                                                <option @if ($value->id==old('brand_id',$product->brand_id))
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
                                    <label for="image">تصویر محصول</label>

                                    <img class="img-bordered" style="width: 150px;height: 150px" src="{{$product->image->original}}"
                                         alt="{{$product->image->original}}">

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

                                    @if (!empty($product->pdf->files))
                                        <a style="margin-right: 20px" href="{{$product->pdf->original}}"><i class="fa fa-download text-success"></i></a>
                                    @endif

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
                                           value="{{ old('price',number_format($product->price)) }}" id="price" name="price"
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
                                           value="{{ old('discount',$product->discount) }}" id="discount" name="discount"
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
                                           value="{{ old('count',number_format($product->count)) }}" id="count" name="count"
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
                                                @if ($value==old('status',$product->status))
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
                                              autofocus>{{ old('text',$product['text']) }}</textarea>

                                    @error('text')
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

@section('admin_js')
    <script type="text/javascript" src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
@endsection

@include('admin.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        var feature_field = 'feature';
        var feature_error = 'لطفا ویژگی های محصول را وارد کنید';

        $('#update_product_form').validate({

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
                if (validateCkeditor(feature_field, feature_error) === true) {
                    form.submit();
                }
            }

        });

    });

</script>
