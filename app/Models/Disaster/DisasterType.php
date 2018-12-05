<?php

namespace App\Models\Disaster;

use Illuminate\Database\Eloquent\Model;

class DisasterType extends Model
{
    public static function getIdByName(string $name)
    {
        return self::whereName($name)->first()->id;
    }
}
