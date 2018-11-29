<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];

    public static function getIdByName(string $name)
    {
    	return self::whereName($name)->first()->id;
    }
}