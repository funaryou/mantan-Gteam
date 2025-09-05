<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    //
    protected $fillable = [
        'menu_id',
        'option_menu_id',
        'add_price',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function optionMenu()
    {
        return $this->belongsTo(OptionMenu::class);
    }
}
