@section('site_title')
    <title>تخفیف سنسور | استعلام ویژه کارخانجات و شرکت ها</title>
@endsection

@section('site_body')
    <body class="page home page-template-default">
    @endsection

    @include('site.layout.header')

    <div id="content" class="site-content">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="{{route('home')}}">صفحه اصلی</a>
                    <span class="delimiter">
							<i class="tm tm-arrow-left"></i>
						</span>
                    استعلام ویژه کارخانجات و شرکت ها
                </nav>

                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="type-page hentry">
                            <header class="entry-header">
                                <div class="page-header-caption">
                                    <h1 class="entry-title">استعلام ویژه کارخانجات و شرکت ها</h1>
                                </div>
                            </header>

                            <div class="entry-content">
                                <div class="row">
                                    <div class="col-md-6" style="float:none;margin:auto;">

                                        <div class="contact-form">
                                            <div role="form" class="wpcf7" id="wpcf7-f425-o1" lang="en-US" dir="ltr">

                                                <form id="inquiry_form" class="wpcf7-form" method="post"
                                                      action="{{route('inquiry')}}" enctype="multipart/form-data">

                                                    @csrf

                                                    <div class="form-group">
                                                        <label for="media">
                                                            مدیا
                                                            <abbr title="required" class="required">*</abbr>
                                                        </label>
                                                        <br>
                                                        <span class="wpcf7-form-control-wrap subject">
																<input accept=".jpg,.jpeg,.png,.xlsx,.xls,.pdf" type="file"
                                                                       class="wpcf7-form-control wpcf7-text input-text @error('media') is-invalid @enderror"
                                                                       value="{{old('media')}}" name="media" id="media" autocomplete="media" autofocus>

                                                                @error('media')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
															</span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="text">
                                                            توضیحات
                                                        </label>
                                                        <br>
                                                        <span class="wpcf7-form-control-wrap your-message">
																<textarea placeholder="در صورت تمایل توضیحات را وارد کنید" onkeyup="this.value=removeSpaces(this.value)" style="resize: vertical"
                                                                          class="wpcf7-form-control wpcf7-textarea @error('subject') is-invalid @enderror"
                                                                          rows="10" cols="40"
                                                                          name="text" id="text" autocomplete="text" autofocus>{{old('text')}}</textarea>

                                                            @error('text')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </span>
                                                    </div>

                                                    <div class="form-group clearfix">
                                                        <p>
                                                            <input type="submit" value="ارسال"
                                                                   class="wpcf7-form-control wpcf7-submit"/>
                                                        </p>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>

    @include('site.layout.footer')

    <script type="text/javascript">

        $(document).ready(function () {

            $('#inquiry_form').validate({

                rules: {
                    media: {
                        required: true
                    }
                },

                messages: {
                    media: {
                        required: "لطفا مدیا را آپلود کنید"
                    }
                }

            });

        });

    </script>
