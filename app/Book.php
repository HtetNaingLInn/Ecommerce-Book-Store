<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'image',
        'price',
        'description',
        'qty',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
