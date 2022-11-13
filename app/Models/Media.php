<?php

namespace App\Models;

use App\Services\Media\MediaFileService;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'files',
            'type',
            'filename',
            'public_folder',
            'private_folder'
        ];

    const IMAGE = 'image';
    const PDF = 'pdf';
    const EXCEL = 'excel';
    static $types =
        [
            self::IMAGE,
            self::PDF,
            self::EXCEL,
        ];

    protected $casts = [
        'files' => 'json'
    ];

    protected static function booted()
    {
        static::deleting(function ($media) {
            MediaFileService::delete($media);
        });
    }

    public function getOriginalAttribute()
    {
        return MediaFileService::original($this);
    }
}
