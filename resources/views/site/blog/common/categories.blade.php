@if (count($categories))

    <div class="widget widget_categories" id="categories-2">
        <span class="gamma widget-title">دسته بندی ها</span>
        <ul>

            @foreach($categories as $value)

                <li class="cat-item cat-item-53">
                    <a href="{{$value->path()}}">{{$value->name}}</a>
                </li>

            @endforeach

        </ul>
    </div>

@endif
