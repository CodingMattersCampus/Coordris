<?php

namespace App\Models;

use App\Models\Center\Infrastructure;
use App\Models\Location\Barangay;
use App\Models\Location\City;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function centerName()
    {
        return $this->name;
    }

    public function cityLocation()
    {
        return (City::find($this->city_id))->name;
    }

    public function barangayLocation()
    {
        return (Barangay::find($this->barangay_id))->name;
    }

    public function structureType()
    {
        return (Infrastructure::find($this->infrastructure_id))->name;
    }
}
