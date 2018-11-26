<?php

namespace App\Http\Resources\Center;

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
        return [
            'slug'      => $this->slug,
            'name'      => $this->centerName(),
            'structure' => $this->structureType(),
            'city'      => $this->cityLocation(),
            'barangay'  => $this->barangayLocation(),
        ];
    }
}
