<?php

namespace Modules\Api\Http\Controllers\Evacuation;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\DisasterCenter;


class CenterStatusUpdateController extends Controller
{
    public function __invoke(DisasterCenter $center, Request $request)
    {
        dd($request->post());
        $center->status = $request->post('status');
        $center->save();
        return response()->json(['status' => $center->status]);
    }
}
