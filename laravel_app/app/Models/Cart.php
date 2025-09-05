<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'table_id',
        'menu_id',
        'status',
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    
}
