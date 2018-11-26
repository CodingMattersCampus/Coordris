<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public static function getIdByCode(string $code) : int
    {
        $city = self::whereCode($code)->first();

        return (int) $city->id ?? 0;
    }
}
