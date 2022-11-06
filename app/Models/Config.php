<?php

namespace App\Models;

use App\Traits\OptionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory, OptionTrait;
    protected $casts = [
        'data' => 'array'
    ];

    public static function getConfig($name, $fields = []){
        $config = Config::firstWhere('name', $name);
        if(empty($config)){
            $config = new Config();
            $config->name = $name;
            $config->data = $fields;
            $config->save();
        }
        return $config;
    }
}
