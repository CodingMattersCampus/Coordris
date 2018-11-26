<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

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
        return (Category::find($this->category_id))->name;
    }
}
