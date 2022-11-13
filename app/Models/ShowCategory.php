<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowCategory extends Model
{
    protected $table = 'show_categories';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'category_id'
        ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault();
    }
}
