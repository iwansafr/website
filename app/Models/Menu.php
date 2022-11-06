<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public function menu_position()
    {
        return $this->belongsTo(MenuPosition::class);
    }
    public function menu_parent()
    {
        return $this->belongsTo(Menu::class,'parent','id');
    }
}
