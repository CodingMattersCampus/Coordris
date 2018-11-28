<?php

namespace App\Http\Resources\Disaster;

use Illuminate\Http\Resources\Json\JsonResource;

class Disaster extends JsonResource
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
            'name'  => $this->name,
            'type'  => $this->disasterType(),
            'date'  => $this->disaster_date,
        ];
    }
}
