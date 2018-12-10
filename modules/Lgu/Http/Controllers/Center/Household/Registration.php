<?php

namespace Modules\Lgu\Http\Controllers\Center\Household;

use App\Models\DisasterCenter;
use App\Models\Product\BasicNeededItem;
use App\Models\Product\Category\MainCategory;
use App\Models\Product\Category\Subcategory;
use Modules\Lgu\Http\Requests\Center\HouseholdRegistrationRequest;
use Illuminate\Routing\Controller;
use App\Models\Household;

class Registration extends Controller
{
    public function __invoke (HouseholdRegistrationRequest $request, DisasterCenter $center)
    {
        $data = $request->post();
        unset($data["_token"]);

        $total = 1;
        if(!is_null($data['spouse'])) {
            $total += 1;
        } 
        if(!is_null($data['child'])) {
            $total += 1;
        }
        if(!is_null($data['child2'])) {
            $total += 1;
        }
        if(!is_null($data['dependent1'])) {
            $total += 1;
        }
        if(!is_null($data['dependent2'])) {
            $total += 1;
        }

        $riceCount = $this->getTotalRice($total);
        $waterCount = $this->getWaterCount($total);
        $cannedCount = $this->getCannedGoodsCount($total);
        $noodlesCount = $this->getNoodlesCount($total);

        Household::firstOrCreate([
            'HH_number' => md5($data['head'].$data['spouse']),
            'head' => $data['head'],
            'spouse' => $data['spouse'] ?? "",
            'total_members' => $total,
            'center_code'   => $center->code,
            'rice'          => $riceCount,
            'water'         => $waterCount,
            'noodles'       => $noodlesCount,
            'canned_goods'  => $cannedCount,
        ]);

        $center->population += $total;
        $center->save();

        return redirect()->route('center.detail', compact('center'));
    }

    private function getTotalRice(int $members)
    {
        $item = BasicNeededItem::where(['main_category_id' => MainCategory::getIdByName('Rice')])->first();
        $minimum = 5;

        if ($members <= $minimum) {
            return (int) $item->quantity;
        } else {
            $multiplier = ceil($members/$minimum);

            return (int) $multiplier * $item->quantity;
        }
    }

    private function getWaterCount(int $members)
    {
        $item = BasicNeededItem::where(['main_category_id' => MainCategory::getIdByName('Water')])->first();
        $minimum = 5;

        if ($members <= $minimum) {
            return (int) $item->quantity;
        } else {
            $multiplier = ceil($members/$minimum);

            return (int) $multiplier * $item->quantity;
        }
    }

    private function getCannedGoodsCount(int $members)
    {
        $item = BasicNeededItem::where(['main_category_id' => MainCategory::getIdByName('Canned Goods')])->first();
        $minimum = 5;

        if ($members <= $minimum) {
            return (int) $item->quantity;
        } else {
            $multiplier = ceil($members/$minimum);

            return (int) $multiplier * $item->quantity;
        }
    }

    private function getNoodlesCount(int $members)
    {
        $item = BasicNeededItem::where([
            'main_category_id' => MainCategory::getIdByName('Instant Packaged Goods'),
            'subcategory_id' => Subcategory::getIdByName('Noodles')
        ])->first();

        $minimum = 5;

        if ($members <= $minimum) {
            return (int) $item->quantity;
        } else {
            $multiplier = ceil($members/$minimum);

            return (int) $multiplier * $item->quantity;
        }
    }
}
