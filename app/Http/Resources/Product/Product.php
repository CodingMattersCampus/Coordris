<?php

namespace App\Http\Resources\Product;

use App\Models\Product\ProductCategory;
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
        $category = ProductCategory::where(['product_id' => $this->id])->first();
        return [
            'name'      => $this->productName(),
            'brand'     => $this->brandName(),
            'category'  => $category->categoryName(),
            'stocks'    => $this->quantity,
        ];
    }
}
