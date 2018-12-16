<?php

namespace Modules\Ngo\Http\Controllers\Warehouse;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Ngo\Transformers\Warehouse\Inventory as InventoryResource;
use Modules\Ngo\Transformers\Warehouse\InventoryCollection;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User\Volunteer;
use Modules\Ngo\Entities\Inventory;

class InventoryController extends Controller
{
   public function __invoke()
   {
        $user = Auth::guard("ngo")->user();
        return view("ngo::product.listing", compact("user"));
   }

   public function getAllAsResourceCollection(Volunteer $ngo)
   {
        return DataTables::of(
            Collection::make(
                new InventoryCollection(
                    new InventoryResource(
                        Inventory::where(['volunteer_id'=> $ngo->id])->orderBy('quantity', 'ASC')->get()
                    )
                )
            )
        )->setRowClass(function (array $data) {
            if ($data['stocks'] < $data['max_threshold']) {
                return 'alert alert-danger';
            } elseif ($data['stocks'] <= $data['min_threshold'] && $data['stocks'] >= $data['max_threshold']) {
                return 'alert alert-warning';
            }
        })->make();
   }
}
