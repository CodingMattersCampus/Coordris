<?php

namespace App\Models\User;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Volunteer extends Authenticatable
{
    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];
}
