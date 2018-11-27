<?php

namespace Modules\Lgu\Http\Controllers\Product\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\Category\Category as CategoryResource;
use App\Http\Resources\Product\Category\CategoryCollection;
use App\Models\Product\Category;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\DataTables;

class Listing extends Controller
{
    public function getAllAsResourceCollection()
    {
        return DataTables::of(Collection::make(new CategoryCollection(new CategoryResource(Category::all()))))->make();
    }
}
