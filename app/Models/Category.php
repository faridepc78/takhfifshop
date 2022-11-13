<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Category extends Model
{
    protected $table = 'categories';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'name',
            'slug',
            'parent_id',
            'level',
            'image_id'
        ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')->withDefault();
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }

    public function sub()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function path()
    {
        return route('products.category', Hashids::encode($this->id) . '-' . $this->slug);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function subproducts()
    {
        return $this->hasManyThrough(Product::class, Category::class, 'parent_id', 'category_id');
    }

    public function childrenRecursive() {
        return $this->sub()->with('childrenRecursive');
    }

    public function scopeGetProducts()
    {
        return $this->products()->limit(8)->latest()->get();
    }
}
