<?php

namespace Modules\Api\Http\Controllers\Ngo\Report;

use App\Models\Report\DispatchReport;
use App\Models\User\Volunteer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Modules\Api\Transformers\Ngo\Warehouse\DispatchReport as DispatchReportResource;
use Modules\Api\Transformers\Ngo\Warehouse\DispatchReportCollection;
use Yajra\DataTables\DataTables;

class Dispatch extends Controller
{
    public function __invoke(Volunteer $ngo)
    {
        return DataTables::of(
            Collection::make(
                new DispatchReportCollection(
                    new DispatchReportResource(
                        DispatchReport::where(['ngo' => $ngo->id])->latest()->get()
                    )
                )
            )
        )->make();
    }
}
