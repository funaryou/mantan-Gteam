<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [
        'sub_category_id',
        'name',
        'description',
        'image_path',
        'price',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }


}
