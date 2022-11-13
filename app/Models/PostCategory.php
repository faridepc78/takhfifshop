<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class PostCategory extends Model
{
    protected $table = 'posts_categories';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'name',
            'slug'
        ];

    public function path()
    {
        return route('blog.category', Hashids::encode($this->id) . '-' . $this->slug);
    }
}
