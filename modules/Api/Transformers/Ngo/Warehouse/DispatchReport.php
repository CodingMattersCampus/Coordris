<?php

namespace Modules\Api\Transformers\Ngo\Warehouse;

use App\Models\DisasterCenter;
use App\Models\Household;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;;

class DispatchReport extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $household = Household::where(['center_code' => $this->center, 'HH_number' => $this->household])->first();
        $center = DisasterCenter::where(['code' => $this->center])->first();

        return [
            'center'        => $center->centerName() . " (for {$center->disasterName()})",
            'family'        => ucwords($household->head) . "'s Family",
            'rice'          => $household->rice,
            'water'         => $household->water,
            'noodles'       => $household->noodles,
            'canned_goods'  => $household->canned_goods,
            'date_given'    => Carbon::make($this->date_given)->toDayDateTimeString(),
        ];
    }
}
