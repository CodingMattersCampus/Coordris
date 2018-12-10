<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class AgeRange extends Model
{
    protected $guarded = [];

    public static function getIdByName(string $range)
    {
    	return self::where(["age_between"=>$range])->first()->id;
    }
}
