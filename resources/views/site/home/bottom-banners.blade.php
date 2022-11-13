@if (count($banners))

    @foreach($banners as $value)

        @if ($value['type']==\App\Models\Banner::BOTTOM)

            <div class="banner full-width-banner">
                <a href="{{$value->url}}">
                    <div
                        style="background-size: cover; background-position: center center; background-image: url({{$value->image->original}}); height: 236px;"
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

@endif
