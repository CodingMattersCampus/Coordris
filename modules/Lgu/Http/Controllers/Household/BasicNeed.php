<?php

namespace Modules\Lgu\Http\Controllers\Household;

use App\Models\HouseholdItemSupport;
use App\Models\Product\BasicNeededItem;
use Illuminate\Routing\Controller;

class BasicNeed extends Controller
{
    public function __invoke()
    {
        $household = HouseholdItemSupport::latest()->first();
        $items = BasicNeededItem::where(['hh_support_code' => $household->hh_support_code])->get();
        return view('lgu::household.basic-need', compact('household', 'items'));
    }
}
