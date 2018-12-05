<?php

namespace Modules\Api\Transformers\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductSearch extends Resource
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
            'id'        => $this->id,
            'sku'       => $this->sku,
            'name'      => $this->name,
            'brand'     => $this->brandName(),
            'category'  => $this->categoryName(),
        ];
    }
}
