<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $table = 'products_gallery';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'product_id',
            'image_id'
        ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->withDefault();
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }
}
