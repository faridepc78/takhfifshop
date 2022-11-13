<?php

namespace App\Providers;

use App\Http\View\Composers\BlogComposer;
use App\Http\View\Composers\CartComposer;
use App\Http\View\Composers\HeaderComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            [
                'site.blog.index',
                'site.blog.search.index',
                'site.blog.category.index',
                'site.blog.post.index'
            ], BlogComposer::class);

        View::composer([
            'site.layout.header',
            'site.cart.index',
            'site.checkout.index'
        ],CartComposer::class);

        View::composer('site.layout.header', HeaderComposer::class);
    }
}
