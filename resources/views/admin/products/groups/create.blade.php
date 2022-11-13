@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | گروه ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('groups.index')}}">مدیریت گروه ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('groups.create')}}">ایجاد گروه ها</a></li>
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
                            <h3 class="card-title">ایجاد گروه ها</h3>
                        </div>

                        <form id="store_group_form" action="{{route('groups.store')}}"
                              method="post">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام گروه بندی *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام گروه بندی را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
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

        $('#store_group_form').validate({

            rules: {
                name: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام گروه بندی محصولات را وارد کنید"
                }
            }

        });

    });

</script>
