<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BigCategory extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function menus()
    {
        return $this->hasManyThrough(
            Menu::class,
            SubCategory::class,
            'big_category_id',
            'sub_category_id',
            'id',
            'id'
        );
    }
}
