<?php

namespace Modules\Lgu\Http\Controllers\Disaster;

use App\Http\Resources\Disaster\Disaster as DisasterResource;
use App\Http\Resources\Disaster\DisasterCollection;
use App\Models\Disaster\Disaster;
use App\Models\Disaster\DisasterType;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class Listing extends Controller
{
    public function __invoke() : View
    {
        $types = DisasterType::all();
        return \view('lgu::disaster.listing', compact("types"));
    }

    public function getAllAsResourceCollection()
    {
        return DataTables::of(Collection::make(new DisasterCollection(new DisasterResource(Disaster::all()))))->make();
    }
}
