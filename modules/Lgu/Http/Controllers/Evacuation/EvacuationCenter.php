<?php

namespace Modules\Lgu\Http\Controllers\Evacuation;

use App\Models\Center as Center;
use App\Models\Disaster\Disaster;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class EvacuationCenter extends Controller
{
    public function __invoke()
    {
        $user = Auth::guard('lgu')->user();

        $centers = Center::where(['city_id' => $user->getCityId()])->get();
        $disasters = Disaster::all();
        return view('lgu::evacuation.center', compact('centers', 'disasters', 'user'));
    }
}
