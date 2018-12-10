<?php

namespace App\Models\Product;

use App\Models\Product\Category\MainCategory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $guarded = [];

    public function categoryName()
    {
        return (MainCategory::find($this->category_id))->name;
    }
}
