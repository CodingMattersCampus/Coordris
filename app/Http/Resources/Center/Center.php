<?php

namespace App\Http\Resources\Center;

use App\Models\Household;
use Illuminate\Http\Resources\Json\JsonResource;

class Center extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $household = Household::where(['center_code' => $this->code])->get();
        return [
            'slug'          => $this->slug,
            'name'          => $this->centerName(),
            'structure'     => $this->structureType(),
            'city'          => $this->cityLocation(),
            'barangay'      => $this->barangayLocation(),
            'support'       => $this->supportFor(),
            'duration'      => $this->support_duration . " Day(s)",
            'water'         => ($this->has_water_supply == true) ? "Available" : "Not Available",
            'electricity'   => ($this->has_electricity_supply == true) ? "Available" : "Not Available",
            'population'    => $this->population  ." (".  $household->count() . " family)",
        ];
    }
}
