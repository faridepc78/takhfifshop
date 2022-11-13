<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    protected $table = 'products_media';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'product_id',
            'media_id'
        ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->withDefault();
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id')->withDefault();
    }
}
