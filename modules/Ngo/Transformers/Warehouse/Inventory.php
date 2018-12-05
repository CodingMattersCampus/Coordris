<?php

namespace Modules\Ngo\Transformers\Warehouse;

use Illuminate\Http\Resources\Json\Resource;

class Inventory extends Resource
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
            'name'      => $this->product()->name,
            'brand'     => $this->product()->brandName(),
            'category'  => $this->product()->categoryName(),
            'stocks'    => $this->quantity,
        ];
    }
}
