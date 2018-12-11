<?php

namespace Modules\Ngo\Transformers\Warehouse;

use App\Models\Product\ProductCategory;
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
        $category = ProductCategory::where(['product_id' => $this->product_id])->first();
        return [
            'name'      => $this->product()->name,
            'brand'     => $this->product()->brandName(),
            'category'  => $category->categoryName(),
            'subcategory' => $category->subcategoryName(),
            'stocks'    => $this->quantity,
        ];
    }
}
