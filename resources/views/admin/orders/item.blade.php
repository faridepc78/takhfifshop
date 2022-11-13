@section('admin_title')
    <title>پنل مدیریت تخفیف سنسور | سفارشات</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                                       href="{{route('orders.items',$item->order->id)}}">محصولات
                                سفارش ({{$item->order->code}}-{{$item->order->user->fullName}})</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('orders.update_items',$item->id)}}">ویرایش
                                محصول ({{$item->product->name}})</a></li>
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
                            <h3 class="card-title">ویرایش محصول ({{$item->product->name}})</h3>
                        </div>

                        <form id="update_order_item_form" action="{{route('orders.update_items',$item->id)}}"
                              method="post">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام محصول</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{$item->product->name}}" id="name" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="count_product">تعداد موجودی محصول</label>
                                    <input type="text"
                                           class="form-control"
                                           value="{{number_format($item->product->count)}}" id="count_product" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="price">قیمت محصول</label>
                                    <input onkeyup="this.value=removeSpaces(this.value);separateNum(this.value,this)"
                                           type="text"
                                           class="form-control @error('price') is-invalid @enderror"
                                           value="{{ old('price',number_format($item->product->price)) }}" id="price" name="price"
                                           placeholder="لطفا قیمت محصول را وارد کنید"
                                           autocomplete="price" autofocus>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="count">تعداد محصول</label>
                                    <input onkeyup="this.value=removeSpaces(this.value);separateNum(this.value,this)"
                                           type="text"
                                           class="form-control @error('count') is-invalid @enderror"
                                           value="{{ old('count',number_format($item->count)) }}" id="count" name="count"
                                           placeholder="لطفا تعداد محصول را وارد کنید"
                                           autocomplete="count" autofocus>

                                    @error('count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="message">توضیحات سفارشات</label>
                                    <textarea placeholder="توضیحات سفارشات را در صورت تمایل وارد کنید" rows="5" style="resize: vertical" class="form-control @error('message') is-invalid @enderror"
                                              id="message"
                                              name="message" autocomplete="message"
                                              autofocus>{{ old('message',$item->order->message) }}</textarea>

                                    @error('message')
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

        $('#update_order_item_form').validate({

            rules: {
                price: {
                    required: true
                },

                count: {
                    required: true
                }
            },

            messages: {
                price: {
                    required: "لطفا قیمت محصول را وارد کنید"
                },

                count: {
                    required: "لطفا تعداد موجودی محصول را وارد کنید"
                }
            }

        });

    });

</script>
