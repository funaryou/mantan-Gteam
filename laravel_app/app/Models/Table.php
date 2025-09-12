<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    protected $fillable = [
        'number',
        'lang',
        'person_count',
        'session_id',
        'session_expires_at',
    ];
    protected $casts = [
        'session_expires_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
