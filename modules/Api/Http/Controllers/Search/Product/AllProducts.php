<?php

namespace Modules\Api\Http\Controllers\Search\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Modules\Api\Transformers\Product\ProductSearch as ProductSearchResource;
use Modules\Api\Transformers\Product\ProductSearchCollection;

class AllProducts extends Controller
{
    public function __invoke()
    {
        return Collection::make(
            new ProductSearchCollection(
                new ProductSearchResource(
                    Product::all()
                )
            )
        );
    }
}
