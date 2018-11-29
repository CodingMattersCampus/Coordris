<?php

namespace Modules\Ngo\Http\Controllers\Warehouse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Resources\Product\Product as ProductResource;
use App\Http\Resources\Product\ProductCollection;
use App\Models\User\Volunteer;
use Modules\Ngo\Entities\Inventory;
use App\Models\Product\Product;

class InventoryController extends Controller
{
   public function __invoke()
   {
        $user = Auth::guard("ngo")->user();
        return view("ngo::product.listing", compact("user"));
   }

   public function getAllAsResourceCollection(Volunteer $ngo)
   {
        // $user = Auth::guard("ngo")->user();
        $ids = Inventory::where(['volunteer_id'=> $ngo->id])->get();
        dd($ids->pluck('product_id')->toArray());
        return DataTables::of(Collection::make(new ProductCollection(new ProductResource(Product::whereIn('id', $ids->pluck('product_id')->toArray())))))->make();
   }
}
