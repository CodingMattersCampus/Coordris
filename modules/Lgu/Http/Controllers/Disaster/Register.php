<?php

namespace Modules\Lgu\Http\Controllers\Disaster;

use App\Models\Disaster\Disaster;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Register extends Controller
{
    public function __invoke(Request $request) : RedirectResponse
    {
        $date = date_parse($request->post('disaster_date'));
        $date = Carbon::create($date['year'], $date['month'], $date['day']);

        Disaster::create([
            'name'      => $request->post('name'),
            'disaster_date' => $date,
            'type_id'   => $request->post('type_id'),
        ]);

        return redirect()->route('disasters.listing');
    }
}
