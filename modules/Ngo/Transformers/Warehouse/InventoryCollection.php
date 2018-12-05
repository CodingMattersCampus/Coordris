<?php

namespace Modules\Ngo\Transformers\Warehouse;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InventoryCollection extends ResourceCollection
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
