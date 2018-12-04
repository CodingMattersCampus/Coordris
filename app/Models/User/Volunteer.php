<?php

namespace App\Models\User;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Volunteer extends Authenticatable
{
    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    public static function getIdByName(string $name)
    {
    	return self::whereName($name)->first()->id;
    }
}
