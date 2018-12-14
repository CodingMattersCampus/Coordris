<?php

namespace Modules\Api\Http\Controllers\Lgu\Evacuation;

use App\Models\DisasterCenter;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Modules\Api\Transformers\Lgu\DisasterCenter as DisasterCenterResource;
use Modules\Api\Transformers\Lgu\DisasterCenterCollection;
use Yajra\DataTables\DataTables;

class Centers extends Controller
{
    public function __invoke(User $lgu)
    {
        return DataTables::of(
            Collection::make(
                new DisasterCenterCollection(
                    new DisasterCenterResource(
                        DisasterCenter::where(['city_id' => $lgu->getCityId()])->get()
                    )
                )
            )
        )->setRowClass(function (array $center) {
            if ($center['population'] >= $center['capacity']) {
                return 'alert alert-danger';
            }
        })->make(true);
    }
}
