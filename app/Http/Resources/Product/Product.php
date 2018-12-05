<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'name'      => $this->productName(),
            'brand'     => $this->brandName(),
            'category'  => $this->categoryName(),
            'stocks'    => $this->quantity,
        ];
    }
}
