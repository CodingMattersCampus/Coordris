<?php

namespace App\Models\Product;

use App\Models\Product\Category\MainCategory;
use App\Models\Product\Category\Subcategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function sku() : string
    {
        return $this->sku;
    }

    public function productName() : string
    {
        return $this->name;
    }

    public function brandName() : string
    {
        return (Brand::find($this->brand_id))->name;
    }

    public function categoryName() : string
    {
        return (MainCategory::find($this->category_id))->name;
    }

    public function subcategoryName() : string
    {
        return (Subcategory::find($this->subcategory_id))->name;
    }

    public static function getIdByName(string $name)
    {
        return optional(self::whereName($name)->first())->id ?? 0;
    }
}
