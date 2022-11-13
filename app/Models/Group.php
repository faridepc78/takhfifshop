<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'name',
            'excel_id'
        ];

    public function excel()
    {
        return $this->belongsTo(Media::class, 'excel_id', 'id');
    }
}
