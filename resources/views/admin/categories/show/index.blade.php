@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | دسته بندی های نمایشی</title>
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
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('categories.index_show')}}">مدیریت دسته بندی های نمایشی</a></li>
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
                            <h3 class="card-title">مدیریت دسته بندی های نمایشی</h3>
                        </div>

                        <form id="store_ShowCategories"
                              action="{{route('categories.store_show')}}" method="post">

                            @csrf

                            <div class="card-body">

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
                                                            @if (in_array($value->id,$array_selectShowCategories))
                                                            disabled value=""
                                                            @endif
                                                            @if ($value->id==old('category_id'))
                                                            selected="selected"
                                                            @endif
                                                            value="{{$value->id}}">{{$value->name}}</option>

                                                    @if (count($value->sub))

                                                        @foreach($value->sub as $item)

                                                            <option style="color: red"
                                                                    @if (in_array($item->id,$array_selectShowCategories))
                                                                    disabled value=""
                                                                    @endif
                                                                    @if ($item->id==old('category_id'))
                                                                    selected="selected"
                                                                    @endif
                                                                    value="{{$item->id}}">{{$item->name}}</option>

                                                        @endforeach

                                                        @if (count($item->sub))

                                                            @foreach($item->sub as $v)

                                                                <option style="color: deeppink"
                                                                        @if (in_array($v->id,$array_selectShowCategories))
                                                                        disabled value=""
                                                                        @endif
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

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">مدیریت دسته بندی های نمایشی</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($getShow))

                                    @foreach($getShow as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->category->name}}</td>
                                            <td>
                                                <a href="{{ route('categories.destroy_show', $value->id) }}"
                                                   onclick="destroyShowCategories(event,{{ $value->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form
                                                    action="{{ route('categories.destroy_show', $value->id) }}"
                                                    method="post"
                                                    id="destroy-ShowCategories-{{ $value->id }}">
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

                    </div>

                </div>
            </div>

        </div>
    </section>
</div>

@include('admin.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        $('#store_ShowCategories').validate({

            rules: {
                category_id: {
                    required: true
                }
            },

            messages: {
                category_id: {
                    required: "لطفا دسته بندی را انتخاب کنید"
                }
            }

        });

    });

    function destroyShowCategories(event, id) {
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
                document.getElementById(`destroy-ShowCategories-${id}`).submit()
            }
        })
    }
</script>
