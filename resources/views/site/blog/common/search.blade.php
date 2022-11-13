<div class="widget widget_search" id="search-2">
    <form action="{{route('blog.search')}}" class="search-form" method="get" role="search">
        <label>
            <span class="screen-reader-text">جستجو:</span>
            <input value="{{request()->input('search')}}" onkeyup="this.value=removeSpaces(this.value)" type="search" id="search" name="search" placeholder="جستجو …" class="search-field">
        </label>
        <input type="submit" value="Search" class="search-submit">
    </form>
</div>
