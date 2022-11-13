<section class="brands-carousel">
    <h2 class="sr-only">برندها</h2>
    <div class="col-full" data-ride="tm-slick-carousel" data-wrap=".brands"
         data-slick="{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;responsive&quot;:[{&quot;breakpoint&quot;:400,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:800,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
        <div class="brands">

            @if (count($brands))

                @foreach($brands as $value)

                    <div class="item">
                        <a href="{{$value->path()}}">
                            <figure>
                                <figcaption class="text-overlay">
                                    <div class="info">
                                        <h4>{{$value->name}}</h4>
                                    </div>
                                </figcaption>
                                <img width="145" height="50" class="img-responsive desaturate"
                                     alt="{{$value->name}}" src="{{$value->image->original}}">
                            </figure>
                        </a>
                    </div>

                @endforeach

            @endif

        </div>
    </div>

</section>
