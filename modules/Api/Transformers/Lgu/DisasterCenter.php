<?php

namespace Modules\Api\Transformers\Lgu;

use App\Models\Center;
use App\Models\Disaster\Disaster;
use App\Models\Household;
use Illuminate\Http\Resources\Json\Resource;

class DisasterCenter extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $center = Center::where(['code' => $this->center_code])->first();
        $disaster = Disaster::find($this->disaster_id);
        $household = Household::where(['center_code' => $this->code])->get();

        return [
            'code'          => $this->code,
            'population'    => $this->population . " (" . $household->count(). " family)",
            'capacity'      => $this->capacity,
            'center'        => $center->name,
            'disaster'      => $disaster->name,
            'city'          => $center->cityLocation(),
            'barangay'      => $center->barangayLocation(),
            'duration'      => $this->support_duration . " day(s)",
            'water'         => ($center->has_water_supply == true) ? "Available" : "Not Available",
            'electricity'   => ($center->has_electricity_supply == true) ? "Available" : "Not Available",
            'network'       => ($center->has_network_coverage == true) ? "Available" : "Not Available",
        ];
    }
}
