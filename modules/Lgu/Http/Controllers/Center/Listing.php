<?php

namespace Modules\Lgu\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Http\Resources\Center\CenterCollection;
use App\Http\Resources\Center\Center as CenterResource;
use App\Models\Center;
use App\Models\Center\Infrastructure;
use App\Models\Location\Barangay;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class Listing extends Controller
{
    public function __invoke() : View
    {
        $lgu = Auth::guard('lgu')->user();
        $barangays = Barangay::where(['city_code' => $lgu->getCityId()])->get();
        $infrastructures = Infrastructure::all();

        return \view('lgu::center.listing', \compact('barangays', 'infrastructures', 'lgu'));
    }

    public function getAllAsResourceCollection()
    {
        return DataTables::of(Collection::make(new CenterCollection(new CenterResource(Center::all()))))->make();
    }
}
