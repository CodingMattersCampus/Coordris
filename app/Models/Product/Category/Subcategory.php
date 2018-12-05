<?php

namespace App\Models\Product\Category;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded =  [];

    public static function getIdByName(string $name)
    {
        return self::whereName($name)->first()->id;
    }
}
