<?php

namespace Modules\Ngo\Http\Controllers\Center;

use App\GivenItem;
use App\Models\DisasterCenter;
use App\Models\Forum\Channel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class Detail extends Controller
{
    public function __invoke(DisasterCenter $center)
    {
        $channel = Channel::where(['center_code' => $center->code])->first();
        $ngo = Auth::guard('ngo')->user();

        $given = GivenItem::where(['center_code' => $center->code])->get();

        return view('ngo::center.detail', compact('center', 'channel', 'ngo', 'given'));
    }
}
