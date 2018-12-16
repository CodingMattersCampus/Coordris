<?php

namespace Modules\Ngo\Http\Controllers\Warehouse\Report;

use App\Models\Report\DispatchReport as DispatchReportModel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DispatchReport extends Controller
{
    public function __invoke()
    {
        $ngo = Auth::guard('ngo')->user();

        $dispatches  = DispatchReportModel::where(['ngo' => $ngo->id])->get();

        return view('ngo::report.dispatch', compact('ngo', 'dispatches'));
    }
}
