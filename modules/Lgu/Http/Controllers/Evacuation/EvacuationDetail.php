<?php

namespace Modules\Lgu\Http\Controllers\Evacuation;

use App\Models\DisasterCenter;
use App\Models\Forum\Channel;
use Illuminate\Routing\Controller;

class EvacuationDetail extends Controller
{
    public function __invoke(DisasterCenter $evacuation)
    {
        $channel = Channel::where(['center_code' => $evacuation->code])->first();
        return view('lgu::evacuation.detail', ['center' => $evacuation, 'channel' => $channel]);
    }
}
