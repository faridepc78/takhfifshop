<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Inquiry extends Model
{
    protected $table = 'inquiries';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'user_id',
            'media_id',
            'text',
            'type',
            'code'
        ];

    const READ = 'read';
    const UNREAD = 'unread';
    static $types =
        [
            self::READ,
            self::UNREAD
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id')->withDefault();
    }

    public function type()
    {
        if ($this->type == Inquiry::READ) {
            return '<td class="alert alert-success">' . Lang::get(self::READ) . '</td>';
        } elseif ($this->type == Inquiry::UNREAD) {
            return '<td class="alert alert-danger">' . Lang::get(self::UNREAD) . '</td>';
        }
    }
}
