<?php

namespace Modules\Lgu\Http\Controllers\Disaster;

use App\Models\Disaster\DisasterType;
use App\Models\Location\Barangay;
use App\Models\Location\City;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class Listing extends Controller
{
    public function __invoke() : View
    {
        $cities = City::all();
        $barangays = Barangay::all();
        $types = DisasterType::all();
        return \view('disaster.listing', compact("cities", "barangays", "types"));
    }
}
