<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Http\Resources\Center\CenterCollection;
use App\Http\Resources\Center\Center as CenterResource;
use App\Models\Center;
use App\Models\Center\Infrastructure;
use App\Models\Location\Barangay;
use App\Models\Location\City;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class Listing extends Controller
{
    public function __invoke() : View
    {
        $cities = City::all();
        $barangays = Barangay::all();
        $infrastructures = Infrastructure::all();

        return \view('center.listing', \compact('cities', 'barangays', 'infrastructures'));
    }

    public function getAllAsResourceCollection()
    {
        return DataTables::of(Collection::make(new CenterCollection(new CenterResource(Center::all()))))->make();
    }
}
