<?php

namespace Modules\Api\Transformers\Center;

use Illuminate\Http\Resources\Json\Resource;

class Household extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
