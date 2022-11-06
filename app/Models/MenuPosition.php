<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPosition extends Model
{
    use HasFactory;

    public static function getOptions()
    {
        $data = MenuPosition::all();
        if($data->isNotEmpty()){
            $output = [];
            foreach ($data as $item) {
                $output[$item->id] = $item->title;
            }
            return $output;
        }
        return null;
    }
}
