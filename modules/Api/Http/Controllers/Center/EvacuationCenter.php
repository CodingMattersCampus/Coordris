<?php

namespace Modules\Api\Http\Controllers\Center;

use App\Models\DisasterCenter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Modules\Api\Transformers\Lgu\DisasterCenter as DisasterCenterResource;
use Modules\Api\Transformers\Lgu\DisasterCenterCollection;
use Yajra\DataTables\DataTables;

class EvacuationCenter extends Controller
{
    public function __invoke()
    {
        return DataTables::of(
            Collection::make(
                new DisasterCenterCollection(
                    new DisasterCenterResource(
                        DisasterCenter::all()
                    )
                )
            )
        )->make(true);
    }
}
