<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Models\Center\Infrastructure;
use App\Models\Location\Barangay;
use App\Models\Location\City;
use Illuminate\View\View;

class Listing extends Controller
{
    public function __invoke() : View
    {
        $cities = City::all();
        $barangays = Barangay::all();
        $infrastructures = Infrastructure::all();

        return \view('center.listing', \compact('cities', 'barangays', 'infrastructures'));
    }
}
