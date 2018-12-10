<?php

namespace Modules\Api\Transformers\Lgu\Center;

use Illuminate\Http\Resources\Json\Resource;

class Center extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'slug'          => $this->slug,
            'name'          => $this->centerName(),
            'structure'     => $this->structureType(),
            'city'          => $this->cityLocation(),
            'barangay'      => $this->barangayLocation(),
            'capacity'      => $this->capacity,
            'water'         => ($this->has_water_supply == true) ? "Available" : "Not Available",
            'electricity'   => ($this->has_electricity_supply == true) ? "Available" : "Not Available",
            'network'       => ($this->has_network_coverage == true) ? "Available" : "Not Available",
        ];
    }
}
