<?php

namespace Modules\Lgu\Http\Controllers\Product\Brand;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\Brand\Brand as BrandResource;
use App\Http\Resources\Product\Brand\BrandCollection;
use App\Models\Product\Brand;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\DataTables;

class Listing extends Controller
{
    public function getAllAsResourceCollection()
    {
        return DataTables::of(Collection::make(new BrandCollection(new BrandResource(Brand::all()))))->make();
    }
}
