<?php

namespace App\Models\Product;

use App\Models\Product\Category\MainCategory;
use Illuminate\Database\Eloquent\Model;

class BasicNeededItem extends Model
{
    protected $guarded = [];

    public function categoryName()
    {
        return (MainCategory::find($this->main_category_id))->name;
    }
}
