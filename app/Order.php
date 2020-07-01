<?php

namespace App;

use App\Book;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',

        'image',
        'description',
        'phone',
        'type',
        'status',
    ];

    public function book()
    {
        return $this->belongsToMany(Book::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
