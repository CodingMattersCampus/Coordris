<?php

namespace Modules\Ngo\Entities;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = [];

    public function product()
    {
        return Product::find($this->product_id);
    }
}
