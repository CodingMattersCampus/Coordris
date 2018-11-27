<?php

namespace Modules\Lgu\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\Product as ProductResource;
use App\Http\Resources\Product\ProductCollection;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class Listing extends Controller
{
    public function __invoke() : View
    {
        $categories = Category::all();
        $brands = Brand::all();

        return \view('product.listing', \compact('brands', 'categories'));
    }

    public function getAllAsResourceCollection()
    {
        return DataTables::of(Collection::make(new ProductCollection(new ProductResource(Product::all()))))->make();
    }
}
