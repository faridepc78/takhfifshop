@section('panel_title')
    <title>پنل کاربری تخفیف سنسور | پروفایل</title>
@endsection

@include('panel.layout.header')

@include('panel.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('user.profile')}}">ویرایش
                                پروفایل ({{$user->fullName}})</a></li>
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
                            <h3 class="card-title">ویرایش پروفایل ({{$user->fullName}})</h3>
                        </div>

                        <form id="update_profile_form" action="{{route('user.update_profile')}}"
                              method="post">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="f_name">نام *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('f_name') is-invalid @enderror"
                                           value="{{ old('f_name',$user->f_name) }}" id="f_name" name="f_name"
                                           placeholder="لطفا نام را وارد کنید"
                                           autocomplete="f_name" autofocus>

                                    @error('f_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="l_name">نام خانوادگی *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('l_name') is-invalid @enderror"
                                           value="{{ old('l_name',$user->l_name) }}" id="l_name" name="l_name"
                                           placeholder="لطفا نام خانوادگی را وارد کنید"
                                           autocomplete="l_name" autofocus>

                                    @error('l_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mobile">تلفن همراه *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('mobile') is-invalid @enderror"
                                           value="{{ old('mobile',$user->mobile) }}" id="mobile" name="mobile"
                                           placeholder="لطفا تلفن همراه را وارد کنید" autocomplete="mobile"
                                           autofocus>

                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">رمز عبور</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('password') is-invalid @enderror"
                                           value="{{ old('password') }}" id="password" name="password"
                                           placeholder="رمز عبور را وارد کنید"
                                           autocomplete="password" autofocus>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">تایید رمز عبور</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control"
                                           id="password_confirmation" name="password_confirmation"
                                           placeholder="تایید رمز عبور را وارد کنید" autofocus>
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

@include('panel.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        $('#update_profile_form').validate({

            rules: {
                f_name: {
                    required: true
                },

                l_name: {
                    required: true
                },

                mobile:{
                    required: true,
                    checkMobile:true
                },

                password: {
                    minlength: 8
                },

                password_confirmation: {
                    equalTo: "#password"
                }
            },

            messages: {
                f_name: {
                    required: "لطفا نام را وارد کنید"
                },

                l_name: {
                    required: "لطفا نام خانوادگی را وارد کنید"
                },

                mobile:{
                    required: "لطفا تلفن همراه را وارد کنید",
                    checkMobile: "لطفا تلفن همراه را صحیح وارد کنید"
                },

                password: {
                    minlength: "لطفا رمز عبور را حداقل 8 کاراکتر وارد کنید"
                },

                password_confirmation: {
                    equalTo: "لطفا تایید رمز عبور را صحیح وارد کنید"
                }
            }

        });

    });

</script>
