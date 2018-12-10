<?php

namespace App\Models\Product;

use App\Models\Product\Category\MainCategory;
use App\Models\Product\Category\Subcategory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $guarded = [];

    public function categoryName()
    {
        return (MainCategory::find($this->category_id))->name;
    }

    public function subcategoryName()
    {
        return (Subcategory::find($this->subcategory_id))->name;
    }
}
