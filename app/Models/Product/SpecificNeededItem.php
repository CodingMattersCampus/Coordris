<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class SpecificNeededItem extends Model
{
    protected $guarded = [];

    public function categoryName()
    {
        return (MainCategory::find($this->main_category_id))->name;
    }

    public function subcategoryName()
    {
        return (Subcategory::find($this->subcategory_id))->name;
    }
}
