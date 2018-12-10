<?php

namespace Modules\Lgu\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Models\DisasterCenter;
use App\Models\Forum\Channel;
use Illuminate\View\View;

class Detail extends Controller
{
    public function __invoke(DisasterCenter $center) : View
    {
        $channel = Channel::where(['center_code' => $center->code])->first();
        return \view('lgu::center.detail', compact('center', 'channel'));
    }
}
