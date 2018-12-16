<?php

namespace Modules\Api\Transformers\Ngo\Warehouse;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DispatchReportCollection extends ResourceCollection
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
