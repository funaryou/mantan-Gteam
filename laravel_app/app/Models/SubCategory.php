<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $fillable = [
        'big_category_id',
        'name',
    ];

    public function bigCategory()
    {
        return $this->belongsTo(BigCategory::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
