<?php

namespace App\Models\Disaster;

use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    protected $guarded = [];

    public function disasterType() : string
    {
        return (DisasterType::find($this->type_id))->name;
    }
}
