<?php

namespace Modules\Lgu\Http\Controllers\Evacuation;

use App\GivenItem;
use App\Models\DisasterCenter;
use App\Models\Forum\Channel;
use Illuminate\Routing\Controller;

class EvacuationDetail extends Controller
{
    public function __invoke(DisasterCenter $evacuation)
    {
        $channel = Channel::where(['center_code' => $evacuation->code])->first();
        $given = GivenItem::where(['center_code' => $evacuation->code])->get();
        return view('lgu::evacuation.detail', ['center' => $evacuation, 'channel' => $channel, 'given' => $given]);
    }
}
