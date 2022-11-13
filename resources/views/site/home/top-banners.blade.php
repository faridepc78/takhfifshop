@if (count($banners))

    <div class="banners">
        <div class="row">

            @foreach($banners as $value)

                @if ($value['type']==\App\Models\Banner::LONG_TOP)

                    <div class="banner banner-long text-in-right">
                        <a href="{{$value->url}}">
                            <div
                                style="background-size: cover; background-position: center center; background-image: url({{$value->image->original}}); height: 259px;"
                                class="banner-bg">
                                <div class="caption">
                                    <div class="banner-info">
                                        <h3 class="title">{{$value->name}}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                @endif

                @if ($value['type']==\App\Models\Banner::SHORT_TOP)

                    <div class="banner banner-short text-in-left">
                        <a href="{{$value->url}}">
                            <div
                                style="background-size: cover; background-position: center center; background-image: url({{$value->image->original}}); height: 259px;"
                                class="banner-bg">
                                <div class="caption">
                                    <div class="banner-info">
                                        <h3 class="title">{{$value->name}}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                @endif

            @endforeach

        </div>
    </div>

@endif
