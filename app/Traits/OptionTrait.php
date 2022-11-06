<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait OptionTrait
{
    public static function getOptions(Model $model)
    {
        $data = $model::all();
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