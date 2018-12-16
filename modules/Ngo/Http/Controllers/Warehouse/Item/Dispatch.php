<?php

namespace Modules\Ngo\Http\Controllers\Warehouse\Item;

use App\GivenItem;
use App\Models\Household;
use App\Models\Product\Product;
use App\Models\Report\DispatchReport;
use App\Models\User\Volunteer;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ngo\Entities\Inventory;
use Ramsey\Uuid\Uuid;

class Dispatch extends Controller
{
    public function __invoke(Request $request, Volunteer $ngo) : JsonResponse
    {
        $household = Household::where(['HH_number' => $request->post('household'), 'center_code' => $request->post('center')])->first();

        // Do some inventory magic here :)
        $this->deductFromInventory($ngo, "Chicken Noodles", $household->noodles);
        $this->deductFromInventory($ngo, "Corned Beef", $household->canned_goods);
        $this->deductFromInventory($ngo, "Distilled Water", $household->water);
        $this->deductFromInventory($ngo, "Rice", $household->rice);

        $report = DispatchReport::firstOrCreate([
            'transaction_code'  => Uuid::uuid4()->toString(),
            'ngo'               => $ngo->id,
            'center'            => $request->post('center'),
            'household'         => $request->post('household'),
            'date_given'        => Carbon::now('Asia/Manila'),
        ]);

        GivenItem::firstOrCreate([
            'dispatch_code' => $report->transaction_code,
            'center_code'   => $request->post('center'),
            'giver'         => $ngo->id,
            'rice'          => $household->rice,
            'water'         => $household->water,
            'canned_goods'  => $household->canned_goods,
            'noodles'       => $household->noodles,
        ]);

        $household->received = true;
        $household->save();
        return response()->json([]);
    }

    private function deductFromInventory(Volunteer $ngo, string $item, int $quantity)
    {
        $inventory = Inventory::where([
            'volunteer_id' => $ngo->id,
            'product_id' => Product::getIdByName($item),
        ])->first();

        if($inventory) {
            $inventory->quantity -= $quantity;
            $inventory->save();
        }
    }
}
