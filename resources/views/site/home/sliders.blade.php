@if (count($sliders))

    <div class="home-v1-slider home-slider">

        @foreach($sliders as $value)

            <div class="slider-1" style="background-image: url({{$value->image->original}});">
                <div class="caption">
                    <a target="_blank" href="{{$value->url}}"><div class="title">{{$value->name}}</div></a>
                </div>
            </div>

        @endforeach

    </div>

@endif
