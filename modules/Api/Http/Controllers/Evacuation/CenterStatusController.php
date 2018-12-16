<?php

namespace Modules\Api\Http\Controllers\Evacuation;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\DisasterCenter;

class CenterStatusController extends Controller
{
    public function __invoke(DisasterCenter $center)
    {
        $status = ($center->status == 1)?"on":"off";
        return response()->json(['status' => $status]);
    }
}
