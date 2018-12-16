<?php

namespace App\Models;

use App\Models\Disaster\Disaster;
use Illuminate\Database\Eloquent\Model;

class DisasterCenter extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function centerName()
    {
        return (Center::where(['code' => $this->center_code])->first())->name;
    }

    public function disasterName()
    {
        return (Disaster::find($this->disaster_id))->name;
    }

    public function households()
    {
        return $this->hasMany(Household::class, 'center_code', 'code');
    }
}
