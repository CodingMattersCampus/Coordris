<?php

namespace Modules\Api\Transformers\Lgu;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DisasterCenterCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
