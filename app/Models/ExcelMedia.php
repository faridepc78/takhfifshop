<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExcelMedia extends Model
{
    protected $table = 'excel_media';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'name',
            'media_id'
        ];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id')->withDefault();
    }

    public function scopeName()
    {
        return $this->name !== null ? $this->name : 'ندارد';
    }
}
