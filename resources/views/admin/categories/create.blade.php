@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | دسته بندی ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">مدیریت دسته بندی ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('categories.create')}}">ایجاد
                                دسته بندی ها</a></li>
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
                            <h3 class="card-title">ایجاد دسته بندی ها</h3>
                        </div>

                        <form id="store_category_form" action="{{route('categories.store')}}"
                              method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام دسته بندی *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام دسته بندی را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ دسته بندی *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug') }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ دسته بندی را وارد کنید"
                                           autocomplete="slug" autofocus>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="parent_id">والد دسته بندی</label>
                                    <select class="form-control  @error('parent_id') is-invalid @enderror"
                                            id="parent_id"
                                            name="parent_id">
                                        <option selected disabled value="">والد دسته بندی را در صورت تمایل انتخاب کنید</option>

                                        @if (count($getParents))

                                            @foreach($getParents as $value)

                                                <optgroup label="{{$value->name}}">

                                                <option style="font-size: 18px;color: blue" @if ($value->id==old('parent_id'))
                                                        selected="selected"
                                                        @endif
                                                        value="{{$value->id}}">{{$value->name}}</option>

                                                @if (count($value->sub))

                                                    @foreach($value->sub as $item)

                                                        <option style="color: red" @if ($item->id==old('parent_id'))
                                                        selected="selected"
                                                                @endif
                                                                value="{{$item->id}}">{{$item->name}}</option>

                                                    @endforeach

                                                @endif

                                                </optgroup>

                                            @endforeach

                                        @endif

                                    </select>

                                    @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر دسته بندی</label>
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

        $('#store_category_form').validate({

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
                    required: "لطفا نام دسته بندی را وارد کنید"
                },

                slug: {
                    required: "لطفا اسلاگ دسته بندی را وارد کنید"
                }
            }

        });

    });

</script>
