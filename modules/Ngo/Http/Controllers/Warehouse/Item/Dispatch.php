<?php

namespace Modules\Ngo\Http\Controllers\Warehouse\Item;

use App\Models\Household;
use App\Models\Report\DispatchReport;
use App\Models\User\Volunteer;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

class Dispatch extends Controller
{
    public function __invoke(Request $request, Volunteer $ngo) : JsonResponse
    {
        $household = Household::where(['HH_number' => $request->post('household'), 'center_code' => $request->post('center')])->first();
        $household->received = true;
        $household->save();

        // Do some inventory magic here :)

        DispatchReport::firstOrCreate([
            'transaction_code'  => Uuid::uuid4()->toString(),
            'ngo'               => $ngo->id,
            'center'            => $request->post('center'),
            'household'         => $request->post('household'),
            'date_given'        => Carbon::now('Asia/Manila'),
        ]);

        return response()->json([]);
    }
}
