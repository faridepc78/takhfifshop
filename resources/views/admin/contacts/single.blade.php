@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | تماس ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('contacts.index')}}">مدیریت تماس ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('contacts.single',$contact->id)}}">مشاهده
                                پیام ({{$contact->fullName()}})</a></li>
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
                            <h3 class="card-title">مشاهده پیام ({{$contact->fullName()}})</h3>
                        </div>

                        <div class="card-body">

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="full_name">نام و نام خانوادگی</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $contact->fullName() }}" id="full_name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile">تلفن همراه</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $contact->mobile() }}" id="mobile">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="subject">موضوع</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="{{ $contact->subject }}" id="subject">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="type">وضعیت</label>
                                    <input readonly type="text"
                                           class="form-control"
                                           value="@lang($contact->type)" id="type">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="text">متن پیام</label>
                                    <textarea id="text" class="form-control" rows="10" style="resize: vertical"
                                              readonly>{{ $contact->text }}</textarea>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@include('admin.layout.footer')
