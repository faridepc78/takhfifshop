<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Banner extends Model
{
    protected $table = 'banners';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'name',
            'image_id',
            'url',
            'type'
        ];

    const SHORT_TOP = 'short_top';
    const LONG_TOP = 'long_top';
    const BOTTOM = 'bottom';
    static $types =
        [
            self::SHORT_TOP,
            self::LONG_TOP,
            self::BOTTOM
        ];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }
}
