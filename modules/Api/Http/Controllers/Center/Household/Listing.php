<?php

namespace Modules\Api\Http\Controllers\Center\Household;

use App\Models\DisasterCenter;
use App\Models\Household;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Modules\Api\Transformers\Center\Household as HouseholdResource;
use Modules\Api\Transformers\Center\HouseholdCollection;
use Yajra\DataTables\DataTables;

class Listing extends Controller
{
    public function __invoke(DisasterCenter $center)
    {
        return DataTables::of(
            Collection::make(
                new HouseholdCollection(
                    new HouseholdResource(
                        Household::where(['center_code' => $center->code])->get()
                    )
                )
            )
        )->make();
    }
}
