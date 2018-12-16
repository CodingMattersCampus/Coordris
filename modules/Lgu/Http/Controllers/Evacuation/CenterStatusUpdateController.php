<?php

namespace Modules\Lgu\Http\Controllers\Evacuation;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\DisasterCenter;


class CenterStatusUpdateController extends Controller
{
    public function __invoke(DisasterCenter $center, Request $request)
    {
        $center->status = ($request->post('status') === "true") ? 1 : 0;
        $center->save();
        
        return response()->json(['status' => $center->status]);
    }
}
