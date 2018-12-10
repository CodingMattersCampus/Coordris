<?php

namespace Modules\Ngo\Http\Controllers\Center;

use App\Models\DisasterCenter;
use App\Models\Forum\Channel;
use Illuminate\Routing\Controller;

class Detail extends Controller
{
    public function __invoke(DisasterCenter $center)
    {
        $channel = Channel::where(['center_code' => $center->code])->first();
        return view('ngo::center.detail', compact('center', 'channel'));
    }
}
