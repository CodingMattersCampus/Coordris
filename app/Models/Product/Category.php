<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public static function getIdByName(string $name)
    {
    	return self::whereName($name)->first()->id;
    }
}
